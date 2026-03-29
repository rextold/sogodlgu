@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   TOURIST SPOT DETAIL  —  v2
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Cover Hero ---- */
.tsd-cover {
    position: relative;
    height: 480px;
    overflow: hidden;
    background: #001f2d;
}
.tsd-cover-img {
    width: 100%; height: 100%; object-fit: cover;
    object-position: center;
    transition: transform 6s ease;
}
.tsd-cover:hover .tsd-cover-img { transform: scale(1.04); }
.tsd-cover-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,10,20,0.82) 0%, rgba(0,20,45,0.45) 50%, transparent 100%);
}
.tsd-cover-content {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 28px 32px;
}
.tsd-cover-content .tc-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.68rem; font-weight: 700; padding: 3px 14px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase;
    margin-bottom: 10px;
}
.tsd-cover-content h1 {
    font-size: clamp(1.5rem, 4vw, 2.4rem); font-weight: 900;
    color: #fff; margin-bottom: 8px; line-height: 1.2;
    text-shadow: 0 2px 12px rgba(0,0,0,0.5);
}
.tsd-cover-content .tc-loc {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.85rem; color: rgba(255,255,255,0.8);
}
.tsd-cover-content .tc-loc i { color: #f4c542; }

/* Gold bottom bar */
.tsd-cover::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
    z-index: 2;
}

/* ---- Breadcrumb bar ---- */
.tsd-breadbar {
    background: #fff; border-bottom: 1px solid #eee;
    padding: 9px 0;
}
.tsd-breadbar .tsd-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
}
.tsd-breadbar .tsd-breadcrumb a, .tsd-breadbar .tsd-breadcrumb span {
    font-size: 0.78rem; color: #666; text-decoration: none;
}
.tsd-breadbar .tsd-breadcrumb a:hover { color: #ea5211; }
.tsd-breadbar .tsd-breadcrumb .sep { color: #ccc; }
.tsd-breadbar .tsd-breadcrumb .current { color: #ea5211; font-weight: 600; }

/* ---- Page Wrap ---- */
.tsd-wrap { background: #f4f6f9; padding: 32px 0 50px; }

/* ---- Gallery ---- */
.tsd-gallery-card {
    background: #fff; border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 22px;
}
.tsd-gallery-card .tgc-head {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    padding: 13px 20px;
    display: flex; align-items: center; gap: 9px;
    border-bottom: 3px solid #f4c542;
    color: #fff; font-weight: 700; font-size: 0.9rem;
}
.tsd-gallery-card .tgc-body { padding: 0; }

/* Featured image area */
.tgal-featured {
    position: relative; background: #001f2d; overflow: hidden;
    cursor: zoom-in;
}
.tgal-featured-img {
    width: 100%; height: 340px; object-fit: cover; display: block;
    transition: transform 0.4s ease;
}
.tgal-featured:hover .tgal-featured-img { transform: scale(1.03); }
.tgal-feat-overlay {
    position: absolute; inset: 0; pointer-events: none;
    background: linear-gradient(to top, rgba(0,10,25,0.5) 0%, transparent 50%);
}
.tgal-feat-counter {
    position: absolute; bottom: 12px; right: 14px;
    background: rgba(0,0,0,0.55); color: #fff;
    font-size: 0.72rem; font-weight: 700; padding: 4px 10px;
    border-radius: 20px; letter-spacing: 0.5px; pointer-events: none;
}
.tgal-feat-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    background: rgba(0,0,0,0.45); color: #fff; border: none;
    width: 38px; height: 38px; border-radius: 50%; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; transition: background 0.2s; z-index: 3;
    opacity: 0; transition: opacity 0.2s, background 0.2s;
}
.tgal-featured:hover .tgal-feat-nav { opacity: 1; }
.tgal-feat-nav:hover { background: rgba(234,82,17,0.9); }
.tgal-feat-prev { left: 10px; }
.tgal-feat-next { right: 10px; }
.tgal-fullscreen {
    position: absolute; top: 10px; right: 12px;
    background: rgba(0,0,0,0.5); color: #fff; border: none;
    width: 34px; height: 34px; border-radius: 8px; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem; z-index: 3; transition: background 0.2s;
}
.tgal-fullscreen:hover { background: rgba(234,82,17,0.9); }

/* Thumbnail strip */
.tgal-strip-wrap {
    background: #1a1a2e;
    padding: 10px 12px;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
    scrollbar-color: #ea5211 #111;
}
.tgal-strip-wrap::-webkit-scrollbar { height: 4px; }
.tgal-strip-wrap::-webkit-scrollbar-track { background: #111; }
.tgal-strip-wrap::-webkit-scrollbar-thumb { background: #ea5211; border-radius: 4px; }
.tgal-strip {
    display: flex; gap: 8px; width: max-content;
}
.tsd-thumb {
    width: 72px; height: 56px; object-fit: cover; flex-shrink: 0;
    border-radius: 6px; cursor: pointer;
    border: 2px solid transparent;
    transition: border-color 0.18s, opacity 0.18s;
    opacity: 0.65;
}
.tsd-thumb:hover { opacity: 1; border-color: #ea5211; }
.tsd-thumb.active-thumb { border-color: #f4c542; opacity: 1; box-shadow: 0 0 0 2px rgba(244,197,66,0.4); }

/* ---- Sidebar ---- */
.tsd-side-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 18px;
}
.tsd-side-card .tsc-head {
    padding: 12px 16px; display: flex; align-items: center; gap: 8px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.tsd-side-card .tsc-head.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); border-bottom: 3px solid #f4c542; }
.tsd-side-card .tsc-head.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); border-bottom: 3px solid #ea5211; }
.tsd-side-card .tsc-head.orange { background: linear-gradient(135deg, #ea5211, #c9460e); border-bottom: 3px solid #f4c542; }
.tsd-side-card .tsc-body { padding: 16px; font-size: 0.85rem; color: #444; }

/* Info list */
.tsd-info-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
.tsd-info-list li { display: flex; align-items: flex-start; gap: 10px; }
.tsd-info-list li i { color: #0052a5; width: 16px; text-align: center; margin-top: 3px; flex-shrink: 0; }
.tsd-info-list li .til-label { font-size: 0.67rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.3px; color: #999; display: block; margin-bottom: 1px; }
.tsd-info-list li .til-value { font-size: 0.85rem; color: #333; font-weight: 600; }

/* Related spots */
.tsd-related-list { list-style: none; padding: 0; margin: 0; }
.tsd-related-list li { border-bottom: 1px solid #f4f4f4; }
.tsd-related-list li:last-child { border-bottom: none; }
.tsd-related-list li a {
    display: flex; align-items: center; gap: 8px;
    padding: 9px 4px; text-decoration: none; color: #444;
    font-size: 0.82rem; font-weight: 600; transition: all 0.2s;
}
.tsd-related-list li a:hover { color: #ea5211; padding-left: 8px; }
.tsd-related-list li a img {
    width: 46px; height: 46px; object-fit: cover; border-radius: 7px; flex-shrink: 0;
}
.tsd-related-list li a i { color: #ea5211; flex-shrink: 0; }

/* CTA back button */
.tsd-back-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; font-weight: 700; font-size: 0.88rem;
    padding: 13px 20px; border-radius: 10px; text-decoration: none;
    transition: all 0.22s; width: 100%;
    box-shadow: 0 4px 14px rgba(0,82,165,0.35);
}
.tsd-back-btn:hover { background: linear-gradient(135deg, #003d7a, #001f2d); color: #fff; transform: translateY(-2px); text-decoration: none; }
.tsd-back-btn i { color: #f4c542; }

/* ---- Lightbox modal ---- */
#tsdModal .modal-content { background: transparent; border: none; box-shadow: none; }
#tsdModal .modal-body { padding: 4px; }
#tsdModal img { width: 100%; border-radius: 10px; }
#tsdModal .modal-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    background: rgba(0,0,0,0.55); color: #fff; border: none;
    width: 44px; height: 44px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem; cursor: pointer; transition: background 0.2s; z-index: 10;
}
#tsdModal .modal-nav:hover { background: rgba(234,82,17,0.85); }
#tsdModal .modal-prev { left: -55px; }
#tsdModal .modal-next { right: -55px; }

/* ---- About section (no card) ---- */
.tsd-about-section { margin-bottom: 28px; }
.tsd-section-title {
    display: flex; align-items: center; gap: 10px;
    font-size: 1.15rem; font-weight: 800; color: #001f2d;
    margin-bottom: 14px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.tsd-title-bar {
    display: inline-block; width: 4px; height: 22px;
    background: #0052a5; border-radius: 3px; flex-shrink: 0;
}
.tsd-about-body {
    font-size: 0.93rem; color: #444; line-height: 1.85;
}
.tsd-about-body h2, .tsd-about-body h3 { color: #0052a5; font-weight: 700; margin-top: 18px; }
.tsd-about-body h4 { color: #001f2d; font-weight: 700; }
.tsd-about-body p { margin-bottom: 0.9rem; }
.tsd-about-body img { max-width: 100%; border-radius: 8px; }
.tsd-about-body ul, .tsd-about-body ol { padding-left: 20px; }
.tsd-about-body li { margin-bottom: 5px; }
.tsd-about-body a { color: #0052a5; }
.tsd-about-body a:hover { color: #ea5211; }
.tsd-about-body blockquote {
    border-left: 4px solid #ea5211; background: #fff8f5;
    padding: 12px 16px; border-radius: 0 8px 8px 0;
    margin: 16px 0; font-style: italic; color: #555;
}

/* ---- Responsive ---- */
@media (max-width: 991px) {
    .tsd-cover { height: 340px; }
    .tsd-cover-content { padding: 20px 20px; }
    .tgal-featured-img { height: 280px; }
}
@media (max-width: 767px) {
    .tsd-cover { height: 260px; }
    .tsd-cover-content h1 { font-size: 1.4rem; }
    .tgal-featured-img { height: 220px; }
    .tgal-feat-nav { opacity: 1; }
    #tsdModal .modal-prev { left: 0; }
    #tsdModal .modal-next { right: 0; }
}
</style>

@php $images = json_decode($tspot->image, true) ?? []; @endphp

{{-- ===== COVER HERO ===== --}}
<div class="tsd-cover">
    @if(count($images))
    <img id="cover-img" class="tsd-cover-img" src="{{ Voyager::image($images[0]) }}" alt="{{ $tspot->title }}">
    @else
    <div style="width:100%;height:100%;background:linear-gradient(135deg,#001f2d,#003d7a);"></div>
    @endif
    <div class="tsd-cover-overlay"></div>
    <div class="tsd-cover-content">
        <div class="tc-tag"><i class="fa fa-map-marker"></i> {{ optional($tspot->tourismcategory)->name ?? 'Tourist Spot' }}</div>
        <h1>{{ $tspot->title }}</h1>
        <div class="tc-loc">
            <i class="fa fa-map-o"></i> Sogod, Southern Leyte
            @if(count($images))
            <span style="margin-left:10px; color:rgba(255,255,255,0.5);">|</span>
            <i class="fa fa-camera" style="color:rgba(244,197,66,0.8);"></i>
            <span style="color:rgba(255,255,255,0.7);">{{ count($images) }} {{ count($images) == 1 ? 'Photo' : 'Photos' }}</span>
            @endif
        </div>
    </div>
</div>

{{-- ===== BREADCRUMB BAR ===== --}}
<div class="tsd-breadbar">
    <div class="container">
        <div class="tsd-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('tourism') }}">Tourism</a>
            <span class="sep">/</span>
            <span class="current">{{ Str::limit($tspot->title, 50) }}</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="tsd-wrap">
    <div class="container">
        <div class="row">

            {{-- LEFT: About + Gallery ---- --}}
            <div class="col-lg-8" data-aos="fade-up">

                {{-- About --}}
                <div class="tsd-about-section" data-aos="fade-up">
                    <h2 class="tsd-section-title">
                        <span class="tsd-title-bar"></span>
                        About {{ $tspot->title }}
                    </h2>
                    <div class="tsd-about-body">
                        @if($tspot->body)
                            {!! $tspot->body !!}
                        @else
                            <p class="text-muted" style="font-style:italic;">No description available for this spot yet.</p>
                        @endif
                    </div>
                </div>

                {{-- Photo Gallery --}}
                @if(count($images) >= 1)
                <div class="tsd-gallery-card" data-aos="fade-up" data-aos-delay="80">
                    <div class="tgc-head">
                        <i class="fa fa-camera"></i> Photo Gallery
                        <span style="margin-left:auto;font-size:0.75rem;font-weight:500;opacity:0.85;">{{ count($images) }} {{ count($images) == 1 ? 'photo' : 'photos' }}</span>
                    </div>
                    <div class="tgc-body">

                        {{-- Featured large image --}}
                        <div class="tgal-featured" id="tgal-featured">
                            <img id="gallery-main-img"
                                 class="tgal-featured-img"
                                 src="{{ Voyager::image($images[0]) }}"
                                 alt="{{ $tspot->title }}">
                            <div class="tgal-feat-overlay"></div>

                            {{-- Prev / Next arrows --}}
                            @if(count($images) > 1)
                            <button class="tgal-feat-nav tgal-feat-prev" id="galPrev"><i class="fa fa-chevron-left"></i></button>
                            <button class="tgal-feat-nav tgal-feat-next" id="galNext"><i class="fa fa-chevron-right"></i></button>
                            @endif

                            {{-- Photo index counter --}}
                            <span class="tgal-feat-counter" id="galCounter">1 / {{ count($images) }}</span>

                            {{-- Fullscreen button --}}
                            <button class="tgal-fullscreen" id="galFullscreen" title="View fullscreen">
                                <i class="fa fa-expand"></i>
                            </button>
                        </div>

                        {{-- Thumbnail strip --}}
                        @if(count($images) > 1)
                        <div class="tgal-strip-wrap">
                            <div class="tgal-strip" id="tgal-strip">
                                @foreach($images as $i => $img)
                                <img src="{{ Voyager::image($img) }}"
                                     class="tsd-thumb {{ $i === 0 ? 'active-thumb' : '' }}"
                                     data-index="{{ $i }}"
                                     alt="Photo {{ $i + 1 }}"
                                     onerror="this.style.display='none'">
                                @endforeach
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                @endif

                {{-- Share --}}
                <div class="tsd-about-section" data-aos="fade-up" data-aos-delay="120" style="margin-bottom:8px;">
                    <h2 class="tsd-section-title">
                        <span class="tsd-title-bar" style="background:#ea5211;"></span>
                        Share this Spot
                    </h2>
                    <div class="tsd-about-body" style="padding-top:4px;">
                        @include('frontend.widgets._sharethis')
                    </div>
                </div>

            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="col-lg-4" data-aos="fade-left">

                {{-- Info Card --}}
                <div class="tsd-side-card">
                    <div class="tsc-head blue"><i class="fa fa-info-circle"></i> Spot Information</div>
                    <div class="tsc-body">
                        <ul class="tsd-info-list">
                            <li>
                                <i class="fa fa-tag"></i>
                                <div>
                                    <span class="til-label">Category</span>
                                    <span class="til-value">{{ optional($tspot->tourismcategory)->name ?? '—' }}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <div>
                                    <span class="til-label">Location</span>
                                    <span class="til-value">Sogod, Southern Leyte</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <div>
                                    <span class="til-label">Last Updated</span>
                                    <span class="til-value">{{ \Carbon\Carbon::parse($tspot->updated_at)->format('M j, Y') }}</span>
                                </div>
                            </li>
                            @if(count($images))
                            <li>
                                <i class="fa fa-camera"></i>
                                <div>
                                    <span class="til-label">Photos</span>
                                    <span class="til-value">{{ count($images) }} available</span>
                                </div>
                            </li>
                            @endif
                        </ul>
                        @if($tspot->contact)
                        <hr style="margin:14px 0;border-color:#f0f0f0;">
                        <div style="font-size:0.84rem;color:#555;line-height:1.7;">{!! $tspot->contact !!}</div>
                        @endif
                    </div>
                </div>

                {{-- Related Spots --}}
                @php
                    $relatedSpots = App\TouristSpot::where('id', '!=', $tspot->id)
                        ->where('status', 1)
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
                @endphp
                @if($relatedSpots->count())
                <div class="tsd-side-card mt-2">
                    <div class="tsc-head navy"><i class="fa fa-compass"></i> More to Explore</div>
                    <div class="tsc-body" style="padding: 10px 14px;">
                        <ul class="tsd-related-list">
                            @foreach($relatedSpots as $rs)
                            @php $rsImages = json_decode($rs->image, true) ?? []; @endphp
                            <li>
                                <a href="{{ route('tourism.tourist_spot', ['name' => $rs->title]) }}">
                                    @if(count($rsImages))
                                    <img src="{{ Voyager::image($rsImages[0]) }}" alt="{{ $rs->title }}" onerror="this.style.display='none'">
                                    @else
                                    <i class="fa fa-map-marker fa-lg"></i>
                                    @endif
                                    <span>{{ $rs->title }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Back Button --}}
                <a href="{{ route('tourism') }}" class="tsd-back-btn mt-3">
                    <i class="fa fa-arrow-left"></i> Back to Tourism
                </a>

            </div>
        </div>
    </div>
</div>

{{-- ===== LIGHTBOX MODAL ===== --}}
@if(count($images))
<div class="modal fade" id="tsdModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="position:relative;">
        <button class="modal-nav modal-prev" id="prevBtn"><i class="fa fa-chevron-left"></i></button>
        <div class="modal-content">
            <div class="modal-body text-center p-1">
                <img id="modal-img" src="{{ Voyager::image($images[0]) }}" alt="Preview">
            </div>
        </div>
        <button class="modal-nav modal-next" id="nextBtn"><i class="fa fa-chevron-right"></i></button>
    </div>
</div>
@endif

<script>
(function () {
    var images  = @json($images);
    var baseUrl = '{{ Voyager::image("__IMG__") }}';
    var current = 0;
    var total   = images.length;

    function imgUrl(path) {
        return baseUrl.replace('__IMG__', path);
    }

    function goTo(idx) {
        current = (idx + total) % total;

        // Update gallery main image
        var mainImg = document.getElementById('gallery-main-img');
        if (mainImg) mainImg.src = imgUrl(images[current]);

        // Update cover hero
        var coverImg = document.getElementById('cover-img');
        if (coverImg) coverImg.src = imgUrl(images[current]);

        // Update modal
        var modalImg = document.getElementById('modal-img');
        if (modalImg) modalImg.src = imgUrl(images[current]);

        // Update counter
        var counter = document.getElementById('galCounter');
        if (counter) counter.textContent = (current + 1) + ' / ' + total;

        // Sync active thumbnail
        document.querySelectorAll('.tsd-thumb').forEach(function(t) {
            t.classList.toggle('active-thumb', parseInt(t.dataset.index) === current);
        });

        // Scroll active thumb into view
        var activeTh = document.querySelector('.tsd-thumb.active-thumb');
        if (activeTh) activeTh.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    }

    // Thumbnail clicks
    document.querySelectorAll('.tsd-thumb').forEach(function(el) {
        el.addEventListener('click', function() { goTo(parseInt(this.dataset.index)); });
    });

    // Gallery featured image prev/next
    var galPrev = document.getElementById('galPrev');
    var galNext = document.getElementById('galNext');
    if (galPrev) galPrev.addEventListener('click', function(e) { e.stopPropagation(); goTo(current - 1); });
    if (galNext) galNext.addEventListener('click', function(e) { e.stopPropagation(); goTo(current + 1); });

    // Fullscreen opens lightbox
    var galFs = document.getElementById('galFullscreen');
    if (galFs) galFs.addEventListener('click', function(e) { e.stopPropagation(); $('#tsdModal').modal('show'); });

    // Click main gallery image opens lightbox
    var featEl = document.getElementById('tgal-featured');
    if (featEl) featEl.addEventListener('click', function(e) {
        if (e.target.tagName === 'BUTTON' || e.target.tagName === 'I') return;
        $('#tsdModal').modal('show');
    });

    // Cover hero click opens lightbox
    var coverEl = document.getElementById('cover-img');
    if (coverEl) { coverEl.style.cursor = 'zoom-in'; coverEl.addEventListener('click', function() { $('#tsdModal').modal('show'); }); }

    // Lightbox prev/next
    var prevBtn = document.getElementById('prevBtn');
    var nextBtn = document.getElementById('nextBtn');
    if (prevBtn) prevBtn.addEventListener('click', function() { goTo(current - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function() { goTo(current + 1); });

    // Keyboard arrow navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft')  goTo(current - 1);
        if (e.key === 'ArrowRight') goTo(current + 1);
    });
})();
</script>
@endsection