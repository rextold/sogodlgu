<!doctype html>
<html class="no-js" lang="en" ng-app="myApp">
  <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- PWA -->
        <link rel="manifest" href="/manifest.json">
        <meta name="theme-color" content="#001f2d">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="Sogod LGU">
        <meta name="application-name" content="Sogod LGU">
        <meta name="msapplication-TileColor" content="#001f2d">
        <meta name="msapplication-TileImage" content="/adminfiles/assets/images/favicon.png">
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:type" content="" />
        @if(isset($announcement->title))
           <meta property="og:title" content="{{ $announcement->title }}" />
        @elseif(isset($title))
           <meta property="og:title" content="{{ $title }}" />
        @endif
        <meta property="og:description" content="" />
        @if(isset($announcement->image))
             <meta property="og:image" content="{{ Voyager::image($announcement->image) }}" />
        @endif
        
         <!-- Favicon -->
        <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
        @if($admin_favicon == '')
            <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
        @else
            <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
        @endif
        <title>{{ $title }}</title>
        <!-- <link rel="icon" href="{{ asset('images/lgu.png') }}" type="image/x-icon"> -->
        <link rel="stylesheet" href="{{ asset('bootstrap4/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/w3.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/foundation/foundation.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/foundation/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}"/>  
        <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> -->
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}"/> 
        <link rel="stylesheet" href="{{ asset('css/home/ribbon.css') }}"/> 
        <link rel="stylesheet" href="{{ asset('css/home/breadcrumbs.css') }}"/>
      
        <!-- <script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>   -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/myscript.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bootstrap4/js/bootstrap.min.js') }}"></script> 

        <script src="{{ asset('js/jquery.bootstrap.newsbox.min.js') }}" type="text/javascript"></script>       
        <link rel="stylesheet" href="{{ asset('css/style3.css') }}"/>
        <link rel="stylesheet" href="{{ asset('aos/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/card-carousel.css') }}" />
        <!-- Professional Google Fonts: Inter (body) + Poppins (headings) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800;900&display=swap">
        <!-- Global Brand CSS Variables + Masthead CSS -->
        <style>
        /* ============================================================
           SOGOD LGU BRAND DESIGN SYSTEM
           Primary Orange : #ea5211
           Dark Orange    : #c9460e
           Primary Blue   : #0052a5
           Dark Blue      : #003d7a
           Gold           : #f4c542
           Dark Navy      : #001f2d
        ============================================================ */
        :root {
            --sogod-orange:      #ea5211;
            --sogod-orange-dark: #c9460e;
            --sogod-blue:        #0052a5;
            --sogod-blue-dark:   #003d7a;
            --sogod-gold:        #f4c542;
            --sogod-navy:        #001f2d;
            --sogod-white:       #ffffff;
            --sogod-light:       #fff8f2;
            --card-radius:       12px;
            --card-shadow:       0 4px 16px rgba(0,0,0,0.09);
        }

        /* ---- Global Body ---- */
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            font-size: 15px;
            line-height: 1.65;
            color: #2d3748;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        h1, h2, h3, h4, h5, h6,
        .navbar-brand, .sgd-section-title,
        .card-title, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            letter-spacing: -0.01em;
        }

        /* ---- Section Headers ---- */
        .sgd-section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--sogod-orange), var(--sogod-orange-dark));
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            padding: 10px 18px;
            border-radius: var(--card-radius) var(--card-radius) 0 0;
            letter-spacing: 0.4px;
        }
        .sgd-section-title.blue {
            background: linear-gradient(135deg, var(--sogod-blue), var(--sogod-blue-dark));
        }
        .sgd-section-title.gold {
            background: linear-gradient(135deg, var(--sogod-gold), #e2ac46);
            color: #1a1a1a;
        }

        /* ---- Masthead ---- */
        .masthead {
            position: relative;
            padding: 0;
            overflow: hidden;
            background: linear-gradient(135deg, var(--sogod-blue-dark) 0%, var(--sogod-blue) 40%, var(--sogod-orange) 100%);
        }
        .masthead .header-bg {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            filter: blur(10px) brightness(0.45);
            z-index: 0;
        }
        .masthead .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(0,61,122,0.82) 0%, rgba(0,82,165,0.6) 50%, rgba(234,82,17,0.55) 100%);
            z-index: 1;
        }
        .masthead .masthead-inner {
            position: relative;
            z-index: 2;
            padding: 1rem 1.5rem;
        }
        .masthead .header-img {
            max-width: 520px;
            height: auto;
            border-radius: 8px;
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.3));
        }
        /* Mobile header image — full-width strip below logo/clock row */
        .masthead .header-img-mobile {
            display: block;
            width: 100%;
            max-height: 160px;
            object-fit: cover;
            border-radius: 0 0 8px 8px;
            filter: brightness(0.9);
            box-shadow: 0 3px 12px rgba(0,0,0,0.35);
        }
        .masthead .logo-img {
            width: 242px;
            height: 130px;
            object-fit: contain;
            filter: drop-shadow(0 3px 10px rgba(0,0,0,0.45));
        }
        .masthead .lgu-title-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .masthead .lgu-title-block .lgu-name {
            font-size: 1.55rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: 1px;
            text-transform: uppercase;
            line-height: 1.2;
            text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }
        .masthead .lgu-title-block .lgu-name-sogod {
            font-size: 1.9rem;
        }
        .masthead .lgu-title-block .lgu-tagline {
            font-size: 0.82rem;
            color: var(--sogod-gold);
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }
        .masthead .dateclock {
            display: inline-block;
            background: rgba(0,0,0,0.45);
            color: #fff;
            padding: 0.7rem 1.2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.4rem;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(4px);
            box-shadow: 0 3px 12px rgba(0,0,0,0.35);
            transition: background 0.3s ease;
        }
        .masthead .dateclock:hover { background: rgba(0,0,0,0.65); }
        .masthead .dateclock .time { display: block; font-size: 1.55rem; }
        .masthead .dateclock .date { display: block; margin-top: 3px; font-size: 0.9rem; color: var(--sogod-gold); font-weight: 600; }

        /* ---- Quick Services Bar ---- */
        .quick-services-bar {
            background: linear-gradient(135deg, var(--sogod-blue-dark), var(--sogod-blue));
            padding: 0;
        }
        .quick-services-bar .qs-inner {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0;
        }
        .quick-services-bar .qs-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: background 0.25s ease, transform 0.2s ease;
            border-right: 1px solid rgba(255,255,255,0.12);
            min-width: 110px;
            text-align: center;
        }
        .quick-services-bar .qs-item:last-child { border-right: none; }
        .quick-services-bar .qs-item i {
            font-size: 1.3rem;
            margin-bottom: 4px;
            color: var(--sogod-gold);
        }
        .quick-services-bar .qs-item:hover {
            background: var(--sogod-orange);
            transform: translateY(-2px);
            color: #fff;
        }
        .quick-services-bar .qs-item:hover i { color: #fff; }

        /* ---- Responsive ---- */

        /* Tablet (≤ 991px) */
        @media (max-width: 991px) {
            .masthead .lgu-title-block .lgu-name { font-size: 1.25rem; }
            .masthead .masthead-inner { padding: 0.8rem 1rem; }
        }

        /* Mobile (≤ 767px) */
        @media (max-width: 767px) {
            .masthead .logo-img { width: 90px; height: 90px; }
            .masthead .lgu-title-block .lgu-name { font-size: 0.95rem; }
            .masthead .lgu-title-block { gap: 2px; }
            .masthead .dateclock { font-size: 0.75rem; padding: 0.4rem 0.65rem; border-radius: 8px; min-width: 70px; }
            .masthead .dateclock .time { font-size: 0.92rem; }
            .masthead .dateclock .date { font-size: 0.65rem; margin-top: 2px; }
            /* Quick Services Bar — horizontal scroll on mobile */
            .quick-services-bar .qs-inner {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
                justify-content: flex-start;
            }
            .quick-services-bar .qs-inner::-webkit-scrollbar { display: none; }
            .quick-services-bar .qs-item {
                padding: 10px 14px;
                min-width: 80px;
                font-size: 0.7rem;
                flex-shrink: 0;
            }
            .quick-services-bar .qs-item i { font-size: 1.1rem; margin-bottom: 3px; }
            /* Footer */
            .footer { padding: 32px 0 16px; }
            .footer-brand-bar { font-size: 0.7rem; letter-spacing: 0.5px; padding: 8px 10px; }
            .footer .map-container iframe { height: 150px; }
        }

        /* Small Mobile (≤ 480px) */
        @media (max-width: 480px) {
            .masthead .masthead-inner { padding: 0.6rem 0.75rem; }
            .masthead .logo-img { width: 72px; height: 72px; }
            .masthead .lgu-title-block .lgu-name { font-size: 0.82rem; }
            .masthead .lgu-title-block .lgu-tagline { font-size: 0.68rem; }
        }

        /* ============================================================
           GLOBAL RESPONSIVE — legacy pages (all pages benefit)
        ============================================================ */

        /* Tables: horizontal scroll on every page */
        @media (max-width: 767px) {
            .table-responsive-auto { overflow-x: auto; -webkit-overflow-scrolling: touch; }
            .container .table,
            .container-fluid .table { font-size: 0.83rem; }
            /* Wrap any bare table in .container in overflow scroll */
            .container table:not(.fees-table) { display: block; overflow-x: auto; -webkit-overflow-scrolling: touch; width: 100%; }
        }

        /* Profile cards: 2-col grid on phones */
        @media (max-width: 575px) {
            .col-md-3 .profile-card-4 img { height: 140px; object-fit: cover; }
            /* Make col-md-3 inside a loop give 2 cards per row on mobile */
            .officials .row > .col-md-3 { flex: 0 0 50%; max-width: 50%; }
        }

        /* Map iframes: height reset on mobile */
        @media (max-width: 767px) {
            iframe[src*="maps.google"] { min-height: 220px !important; height: 220px !important; }
            .gmap_canvas iframe { height: 220px !important; min-height: 220px !important; }
        }

        /* Sidebar .side-style padding on mobile */
        @media (max-width: 767px) {
            .side-style { padding-top: 1.5rem; }
        }

        /* Breadcrumbs: wrap on mobile */
        @media (max-width: 480px) {
            .breadcrumb { flex-wrap: wrap; padding: 6px 10px; font-size: 0.78rem; }
        }

        /* General img responsiveness fallback — only for images without explicit height rules */
        img:not([style*="height"]) { max-width: 100%; }

        /* Prevent horizontal scroll: apply to a wrapper, NOT body — to avoid breaking AOS */
        .off-canvas-wrapper { overflow-x: hidden; }

        /* ============================================================
           PWA — MOBILE NATIVE BOTTOM NAVIGATION
        ============================================================ */
        .pwa-bottom-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            background: #001f2d;
            border-top: 2px solid var(--sogod-orange);
            padding-bottom: env(safe-area-inset-bottom, 0px);
            box-shadow: 0 -4px 24px rgba(0,0,0,0.45);
        }
        .pwa-bottom-nav-inner {
            display: flex;
            align-items: stretch;
        }
        .pwa-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 9px 4px 7px;
            color: rgba(255,255,255,0.5);
            text-decoration: none !important;
            font-size: 0.6rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            flex: 1;
            transition: color 0.2s ease, background 0.2s ease;
            -webkit-tap-highlight-color: transparent;
            position: relative;
            gap: 3px;
            line-height: 1;
        }
        .pwa-nav-item i {
            font-size: 1.25rem;
            transition: transform 0.2s ease;
        }
        .pwa-nav-item.pwa-active {
            color: var(--sogod-orange);
            background: rgba(234,82,17,0.08);
        }
        .pwa-nav-item.pwa-active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20%;
            right: 20%;
            height: 3px;
            background: var(--sogod-orange);
            border-radius: 0 0 4px 4px;
        }
        .pwa-nav-item.pwa-active i {
            transform: translateY(-2px);
        }

        /* ---- Phone-only rules (<= 767px) ---- */
        @media (max-width: 767px) {
            /* Show bottom nav */
            .pwa-bottom-nav { display: block; }

            /* Push main content above the nav bar */
            #main-content {
                padding-bottom: calc(68px + env(safe-area-inset-bottom, 0px));
            }

            /* Hide the full desktop footer — bottom nav replaces it */
            .footer,
            .footer-brand-bar,
            #gwt-standard-footer {
                display: none !important;
            }

            /* Native-feel scrolling */
            .off-canvas-content {
                -webkit-overflow-scrolling: touch;
            }

            /* Prevent text resize on orientation change */
            html {
                -webkit-text-size-adjust: 100%;
                text-size-adjust: 100%;
            }

            /* Remove tap highlight on all interactive elements */
            a, button, input, select, textarea {
                -webkit-tap-highlight-color: rgba(0,0,0,0);
            }

            /* Compact the navbar on phone — one tap opens menu */
            #main-nav .top-bar { padding: 6px 12px; }
        }
        </style>


        <script>
            function updateClock() {
                const now = new Date();
                const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                const date = now.toLocaleDateString(undefined, options);
                document.getElementById('clock').innerHTML = `
                    <span class="date">${date}</span>
                    <span class="time">${time}</span>
                `;
            }
            setInterval(updateClock, 1000);
            updateClock(); // initial call
        </script>
</head>

<body>


<!-- <input id="tmp-link" type="hidden" data-link=""> -->
    @include('frontend.widgets._accessibility')

<!-- Start of Off Canvas -->
<div class="off-canvas-wrapper"  id="app">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

<!-- Off Canvas Menu -->
    @include('frontend.widgets._navbar-right')

<div class="off-canvas-content" data-off-canvas-content>

    @include('frontend.widgets._navbar-left')

    <!-- ===== MASTHEAD ===== -->
    <div class="masthead">
        @php $headerImg = App\PageHeader::where('status',2)->first(); @endphp
        @if($headerImg)
            <div class="header-bg" style="background-image: url('{{ Voyager::image($headerImg->image) }}');"></div>
            <div class="overlay"></div>
        @endif
        <div class="masthead-inner">
            <div class="container-fluid">
                <!-- Row 1: Logo (left) + Clock (right) — always side-by-side -->
                <div class="row align-items-center">
                    <div class="col col-md-10">
                        <div class="d-flex align-items-center" style="gap:18px;">
                            <img src="{{ asset('images/logo/logo2.png') }}" class="logo-img" alt="Sogod LGU Logo">
                            @if($headerImg)
                                <img src="{{ Voyager::image($headerImg->image) }}" class="header-img d-none d-lg-block" alt="Page Header">
                            @endif
                        </div>
                    </div>
                    <div class="col-auto col-md-2 text-right">
                        <div id="clock" class="dateclock"></div>
                    </div>
                </div>
                <!-- Row 2: Header image — mobile only, full-width strip -->
                @if($headerImg)
                <div class="row d-md-none" style="margin-top:10px;">
                    <div class="col-12 px-0">
                        <img src="{{ Voyager::image($headerImg->image) }}" class="header-img-mobile" alt="Page Header">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- ===== QUICK SERVICES BAR ===== -->
    <div class="quick-services-bar">
        <div class="container-fluid px-0">
            <div class="qs-inner">
                <a href="{{ route('home') }}" class="qs-item"><i class="fa fa-home"></i>Home</a>
                <a href="{{ route('bpermit') }}" class="qs-item"><i class="fa fa-file-text-o"></i>Business Permit</a>
                <a href="{{ route('gov.elected.officials') }}" class="qs-item"><i class="fa fa-users"></i>Officials</a>
                <a href="{{ route('news') }}" class="qs-item"><i class="fa fa-newspaper-o"></i>News</a>
                <a href="{{ route('tourism') }}" class="qs-item"><i class="fa fa-camera"></i>Tourism</a>
                <a href="{{ route('fdp.index') }}" class="qs-item"><i class="fa fa-folder-open-o"></i>Transparency</a>
                <a href="{{ route('barangay') }}" class="qs-item"><i class="fa fa-building-o"></i>Barangays</a>
                <a href="{{ route('about') }}" class="qs-item"><i class="fa fa-info-circle"></i>About Sogod</a>
            </div>
        </div>
    </div>

<!-- main -->
    <div id="main-content">
        @yield('content')
    </div>

<!-- main end -->
<style>
/* ============ ENHANCED FOOTER ============ */
.footer {
    background: linear-gradient(180deg, #001a2c 0%, #001f2d 100%);
    color: #d8dde2;
    font-family: 'Inter', 'Segoe UI', sans-serif;
    padding: 50px 0 20px;
    border-top: 4px solid var(--sogod-orange);
}
.footer-brand-bar {
    background: var(--sogod-orange);
    padding: 10px 0;
    text-align: center;
    font-size: 0.82rem;
    font-weight: 700;
    color: #fff;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}
.footer a {
    color: var(--sogod-gold);
    text-decoration: none;
    transition: color 0.25s;
}
.footer a:hover { color: var(--sogod-orange); }
.footer .footer-logo img {
    width: 85px;
    margin-bottom: 12px;
    filter: drop-shadow(0 2px 6px rgba(0,0,0,0.4));
}
.footer .footer-section h6 {
    font-weight: 700;
    font-size: 0.85rem;
    margin-bottom: 14px;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    padding-bottom: 6px;
    border-bottom: 2px solid var(--sogod-orange);
    display: inline-block;
}
.footer .list-group-item {
    padding: 5px 0;
    font-size: 13px;
    background: transparent;
    border: none;
    color: #b0b8c0;
}
.footer .list-group-item::before {
    content: '›';
    color: var(--sogod-orange);
    margin-right: 6px;
    font-weight: bold;
}
.footer .map-container iframe {
    border-radius: 10px;
    width: 100%;
    height: 180px;
    border: 0;
}
.footer .followus { margin-bottom: 20px; }
.footer-bottom {
    background: rgba(0,0,0,0.35);
    text-align: center;
    padding: 12px 0;
    font-size: 12px;
    color: #7a8a96;
    margin-top: 30px;
}
.footer-bottom span { color: var(--sogod-orange); }
</style>

<div class="footer-brand-bar">
    Official Website — Municipality of Sogod, Southern Leyte &nbsp;|&nbsp; www.sogodlgu.gov.ph
</div>
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <!-- Logo and About -->
            <div class="col-md-3 footer-section mb-4">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Sogod LGU Logo">
                </div>
                <h6>About the Website</h6>
                <p style="font-size:13px; color:#9aa5ad;">Official portal of the Municipal Government of Sogod, Southern Leyte. Serving our community with transparency and accountability.</p>
            </div>

            <!-- Links & Socials -->
            <div class="col-md-4 footer-section mb-4">
                <div class="followus">
                    @include('frontend.widgets._followus')
                </div>
                <h6>Useful Links</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('tourism') }}">Tourism</a></li>
                    <li class="list-group-item"><a href="#">Sogod Police Station</a></li>
                    <li class="list-group-item"><a href="#">Postal Office Sogod</a></li>
                    <li class="list-group-item"><a href="#">Southern Leyte State University</a></li>
                    <li class="list-group-item"><a href="#">RHU Sogod</a></li>
                </ul>
            </div>

            <!-- Map & Contact -->
            <div class="col-md-5 footer-section mb-4">
                <h6>Municipal Hall Location</h6>
                <div class="map-container mb-3">
                    <iframe src="https://maps.google.com/maps?q=Sogod%20southern%20leyte%20municipal%20hall&t=k&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6>Address</h6>
                        <p style="font-size:13px; color:#9aa5ad;">Corner Concepcion St. &amp; Osmeña Street Zone 1, Sogod, Southern Leyte</p>
                    </div>
                    <div class="col-6">
                        <h6>Telephone</h6>
                        <p style="font-size:13px; color:#9aa5ad;">(Insert numbers here)</p>
                        <h6>Email</h6>
                        <p style="font-size:13px; color:#9aa5ad;">(Insert email here)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} <span>Municipal Government of Sogod</span>, Southern Leyte. All rights reserved.
    </div>
</div>
<!--Standard Footer-->
<div id="gwt-standard-footer" style="margin-top: 10px"></div>

<div><a href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>
</a></div>

      </div><!-- off-canvas-content -->
    </div><!-- off-canvas-wrapper-inner -->
  </div><!-- off-canvas-wrapper -->

<!-- ===== PWA MOBILE BOTTOM NAVIGATION ===== -->
@php
    $pwaPath = request()->path();
    $pwaRoute = request()->route() ? request()->route()->getName() : '';
    $pwaIsHome       = $pwaPath === '/' || $pwaRoute === 'home';
    $pwaIsNews       = str_starts_with($pwaPath, 'news') || $pwaRoute === 'news';
    $pwaIsTourism    = str_starts_with($pwaPath, 'tourism') || str_starts_with($pwaRoute ?? '', 'tourism');
    $pwaIsBarangay   = str_starts_with($pwaPath, 'barangay') || $pwaRoute === 'barangay';
    $pwaIsGov        = str_starts_with($pwaPath, 'government') || str_starts_with($pwaRoute ?? '', 'gov.');
@endphp
<nav class="pwa-bottom-nav" aria-label="Mobile Navigation">
    <div class="pwa-bottom-nav-inner">
        <a href="{{ route('home') }}" class="pwa-nav-item {{ $pwaIsHome ? 'pwa-active' : '' }}">
            <i class="fa fa-home"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('news') }}" class="pwa-nav-item {{ $pwaIsNews ? 'pwa-active' : '' }}">
            <i class="fa fa-newspaper-o"></i>
            <span>News</span>
        </a>
        <a href="{{ route('tourism') }}" class="pwa-nav-item {{ $pwaIsTourism ? 'pwa-active' : '' }}">
            <i class="fa fa-camera"></i>
            <span>Tourism</span>
        </a>
        <a href="{{ route('barangay') }}" class="pwa-nav-item {{ $pwaIsBarangay ? 'pwa-active' : '' }}">
            <i class="fa fa-building-o"></i>
            <span>Barangays</span>
        </a>
        <a href="{{ route('gov.elected.officials') }}" class="pwa-nav-item {{ $pwaIsGov ? 'pwa-active' : '' }}">
            <i class="fa fa-sitemap"></i>
            <span>Officials</span>
        </a>
    </div>
</nav>

    <script type="text/javascript">
    (function(d, s, id) {
    var js, gjs = d.getElementById('gwt-standard-footer');

    js = d.createElement(s); js.id = id;
    js.src = "//gwhs.i.gov.ph/gwt-footer/footer.js";
    gjs.parentNode.insertBefore(js, gjs);
    }(document, 'script', 'gwt-footer-jsdk'));
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=681125882287520&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
<!--Standard Footer End-->
    <script src="{{ asset('js/angular-module/angular.min.js') }}"></script>
    <script src="{{ asset('js/angular-module/angular-sanitize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular-module/featured.js') }}"></script>

    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.min.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
      <script src="{{ asset('aos/aos.js') }}"></script>
      <script>
        AOS.init();
      </script>

    <!-- Service Worker Registration (PWA) -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('/sw.js')
                    .catch(function () { /* SW not supported or blocked */ });
            });
        }
    </script>
</body>
  
</html>
