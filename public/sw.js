/**
 * Sogod LGU Service Worker
 * Cache strategy:
 *   - Static assets (CSS, JS, fonts, images): Cache-first, update in background
 *   - HTML pages / API: Network-first, fall back to cache
 */

const CACHE_NAME = 'sogod-lgu-v1';

const PRECACHE_ASSETS = [
    '/',
    '/css/style.css',
    '/css/style2.css',
    '/css/style3.css',
    '/css/theme.css',
    '/adminfiles/assets/images/favicon.png',
    '/manifest.json'
];

/* ---- Install: pre-cache core assets ---- */
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(PRECACHE_ASSETS))
            .catch(() => { /* Silently fail if some assets are missing */ })
    );
    self.skipWaiting();
});

/* ---- Activate: remove old caches ---- */
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys =>
            Promise.all(
                keys
                    .filter(key => key !== CACHE_NAME)
                    .map(key => caches.delete(key))
            )
        )
    );
    self.clients.claim();
});

/* ---- Fetch: smart caching strategy ---- */
self.addEventListener('fetch', event => {
    const req = event.request;

    // Only handle GET requests
    if (req.method !== 'GET') return;

    // Skip chrome-extension and non-http requests
    if (!req.url.startsWith('http')) return;

    // Skip voyager admin routes
    if (req.url.includes('/admin/')) return;

    const destination = req.destination;
    const isStaticAsset = ['style', 'script', 'image', 'font'].includes(destination);

    if (isStaticAsset) {
        // Cache-first for static assets
        event.respondWith(
            caches.match(req).then(cached => {
                if (cached) {
                    // Refresh cache in background
                    fetch(req).then(resp => {
                        if (resp && resp.status === 200) {
                            caches.open(CACHE_NAME).then(cache => cache.put(req, resp));
                        }
                    }).catch(() => {});
                    return cached;
                }
                return fetch(req).then(resp => {
                    if (!resp || resp.status !== 200 || resp.type === 'opaque') return resp;
                    const clone = resp.clone();
                    caches.open(CACHE_NAME).then(cache => cache.put(req, clone));
                    return resp;
                });
            })
        );
    } else {
        // Network-first for HTML pages
        event.respondWith(
            fetch(req)
                .then(resp => {
                    if (resp && resp.status === 200) {
                        const clone = resp.clone();
                        caches.open(CACHE_NAME).then(cache => cache.put(req, clone));
                    }
                    return resp;
                })
                .catch(() => caches.match(req))
        );
    }
});
