@extends('layouts.home')
@section('content')
<style>
/* ============================================================
   ABOUT SOGOD PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Page Hero ---- */
.about-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px;
    position: relative;
    overflow: hidden;
}
.about-hero::before {
    content: '';
    position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.about-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.about-hero .hero-icon { font-size: 1.8rem; color: rgba(244,197,66,0.55); margin-bottom: 4px; }
.about-hero .hero-tag {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.about-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; line-height: 1.2; }
.about-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.about-hero .about-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.about-hero .about-breadcrumb a,
.about-hero .about-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
.about-hero .about-breadcrumb a:hover { color: #f4c542; }
.about-hero .about-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.about-hero .about-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Quick Facts Strip ---- */
.facts-strip {
    background: linear-gradient(135deg, #ea5211 0%, #c9460e 100%);
    padding: 0;
}
.facts-strip .fs-inner {
    display: flex; flex-wrap: wrap; justify-content: space-around;
}
.facts-strip .fs-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 16px 22px; text-align: center; min-width: 120px; flex: 1;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.facts-strip .fs-item:last-child { border-right: none; }
.facts-strip .fs-item .fs-icon { font-size: 1.3rem; color: rgba(255,255,255,0.5); margin-bottom: 4px; }
.facts-strip .fs-item .fs-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.facts-strip .fs-item .fs-label { font-size: 0.68rem; color: rgba(255,255,255,0.8); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }
@media (max-width: 576px) {
    .facts-strip .fs-item { min-width: 50%; border-bottom: 1px solid rgba(255,255,255,0.12); flex: 0 0 50%; }
    .facts-strip .fs-item:nth-child(even) { border-right: none; }
}

/* ---- Main Layout ---- */
.about-wrap { background: #f4f6f9; padding: 32px 0 40px; }

/* ---- History Content Card ---- */
.about-history-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 24px;
}
.about-history-card .ahc-header {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    padding: 12px 20px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.about-history-card .ahc-body {
    padding: 24px 28px; font-size: 0.93rem; color: #444; line-height: 1.8;
}
.about-history-card .ahc-body h1,
.about-history-card .ahc-body h2,
.about-history-card .ahc-body h3 { color: #0052a5; font-weight: 700; margin-top: 20px; }
.about-history-card .ahc-body p { margin-bottom: 14px; }
.about-history-card .ahc-body img { border-radius: 10px; box-shadow: 0 4px 14px rgba(0,0,0,0.1); }

/* ---- Sidebar Info Card ---- */
.about-info-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 20px;
}
.about-info-card .aic-header {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.about-info-card .aic-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.about-info-card .aic-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.about-info-card .aic-header.teal   { background: linear-gradient(135deg, #186152, #0e3d32); }
.about-info-card .aic-header.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); }
.about-info-card .aic-body { padding: 14px 18px; }

/* Sogod facts list */
.sogod-facts-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
.sogod-facts-list li {
    display: flex; align-items: flex-start; gap: 10px; font-size: 0.85rem; color: #444;
    padding: 8px 12px; background: #f8f9fc; border-radius: 8px;
    border-left: 3px solid #0052a5;
}
.sogod-facts-list li i { color: #0052a5; margin-top: 2px; flex-shrink: 0; width: 14px; text-align: center; }
.sogod-facts-list li strong { display: block; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.3px; color: #001f2d; margin-bottom: 1px; }

/* ---- Map Card ---- */
.about-map-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 24px;
}
.about-map-card .amc-header {
    background: linear-gradient(135deg, #186152, #0e3d32);
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.about-map-card iframe {
    width: 100%; height: 280px; display: block; border: 0;
}

/* ---- CTA Link Cards ---- */
.about-cta-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 20px;
}
.about-cta-card {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 20px 14px; border-radius: 12px; text-decoration: none; text-align: center;
    transition: transform 0.25s, box-shadow 0.25s;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
}
.about-cta-card:hover { transform: translateY(-4px); box-shadow: 0 10px 24px rgba(0,0,0,0.14); text-decoration: none; }
.about-cta-card .acc-icon { font-size: 1.8rem; margin-bottom: 8px; }
.about-cta-card .acc-label { font-size: 0.82rem; font-weight: 700; line-height: 1.3; }
.about-cta-card.nav { background: #f0f5ff; }
.about-cta-card.nav .acc-icon { color: #0052a5; }
.about-cta-card.nav .acc-label { color: #003d7a; }
.about-cta-card.orn { background: #fff5f1; }
.about-cta-card.orn .acc-icon { color: #ea5211; }
.about-cta-card.orn .acc-label { color: #c9460e; }
.about-cta-card.tel { background: #f0faf8; }
.about-cta-card.tel .acc-icon { color: #186152; }
.about-cta-card.tel .acc-label { color: #0e3d32; }
.about-cta-card.gld { background: #fffbf0; }
.about-cta-card.gld .acc-icon { color: #c08b00; }
.about-cta-card.gld .acc-label { color: #8a6400; }

/* ---- Explore Banner ---- */
.about-explore-banner {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 60%, #0052a5 100%);
    padding: 32px 28px; position: relative; overflow: hidden;
}
.about-explore-banner::before {
    content: ''; position: absolute; top: -50px; right: -50px;
    width: 220px; height: 220px; background: rgba(244,197,66,0.08); border-radius: 50%;
}
.about-explore-banner .aeb-tag {
    display: inline-block; background: #f4c542; color: #001f2d;
    font-size: 0.7rem; font-weight: 800; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.about-explore-banner .aeb-title { font-size: 1.45rem; font-weight: 900; color: #fff; line-height: 1.2; margin-bottom: 8px; }
.about-explore-banner .aeb-desc { font-size: 0.88rem; color: rgba(255,255,255,0.78); margin-bottom: 18px; line-height: 1.6; }
.about-explore-banner .aeb-actions { display: flex; flex-wrap: wrap; gap: 10px; }
.aeb-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: #ea5211; color: #fff; font-weight: 700;
    padding: 10px 22px; border-radius: 28px; text-decoration: none;
    transition: background 0.25s, transform 0.2s;
    box-shadow: 0 4px 12px rgba(234,82,17,0.4);
    font-size: 0.88rem;
}
.aeb-btn:hover { background: #f4c542; color: #001f2d; transform: translateY(-2px); }
.aeb-btn-outline {
    display: inline-flex; align-items: center; gap: 7px;
    border: 2px solid rgba(255,255,255,0.4); color: #fff; font-weight: 700;
    padding: 8px 20px; border-radius: 28px; text-decoration: none;
    transition: all 0.25s; font-size: 0.88rem;
}
.aeb-btn-outline:hover { border-color: #f4c542; color: #f4c542; background: rgba(244,197,66,0.1); transform: translateY(-2px); }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .about-hero h1 { font-size: 1.4rem; }
    .about-history-card .ahc-body { padding: 16px 18px; font-size: 0.88rem; }
    .about-explore-banner { padding: 24px 18px; }
    .about-explore-banner .aeb-title { font-size: 1.2rem; }
    .about-cta-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
    .about-cta-card { padding: 16px 10px; }
    .about-cta-card .acc-icon { font-size: 1.5rem; }
}
@media (max-width: 480px) {
    .about-hero h1 { font-size: 1.1rem; }
    .about-cta-card .acc-label { font-size: 0.74rem; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="about-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-map-marker"></i></div>
        <div class="hero-tag"><i class="fa fa-info-circle"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>About Sogod, Southern Leyte</h1>
        <div class="hero-sub">Learn about the history, culture, and geography of our municipality.</div>
        <div class="about-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="current">About Sogod</span>
        </div>
    </div>
</div>

{{-- ===== QUICK FACTS STRIP ===== --}}
<div class="facts-strip">
    <div class="container-fluid">
        <div class="fs-inner">
            <div class="fs-item">
                <div class="fs-icon"><i class="fa fa-map-marker"></i></div>
                <div class="fs-value">{{ App\Barangay::count() }}</div>
                <div class="fs-label">Barangays</div>
            </div>
            <div class="fs-item">
                <div class="fs-icon"><i class="fa fa-users"></i></div>
                <div class="fs-value">{{ App\ElectedOfficial::count() }}</div>
                <div class="fs-label">Elected Officials</div>
            </div>
            <div class="fs-item">
                <div class="fs-icon"><i class="fa fa-camera"></i></div>
                <div class="fs-value">{{ App\TouristSpot::count() }}</div>
                <div class="fs-label">Places to Visit</div>
            </div>
            <div class="fs-item">
                <div class="fs-icon"><i class="fa fa-newspaper-o"></i></div>
                <div class="fs-value">{{ App\Post::where('status','PUBLISHED')->count() }}</div>
                <div class="fs-label">News Articles</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="about-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== MAIN COLUMN ===== --}}
            <div class="col-lg-8">

                {{-- History / Body Content from CMS --}}
                <div class="about-history-card" data-aos="fade-up">
                    <div class="ahc-header">
                        <i class="fa fa-book"></i> History of Sogod
                    </div>
                    <div class="ahc-body">
                        @if($history && $history->body)
                            {!! $history->body !!}
                        @else
                            <p style="color:#888; font-style:italic;">History content coming soon. Please check back later.</p>
                        @endif
                    </div>
                </div>

                {{-- Explore Banner --}}
                <div class="about-explore-banner" data-aos="fade-up">
                    <div class="aeb-tag"><i class="fa fa-flag"></i> &nbsp;Discover More</div>
                    <div class="aeb-title">Explore the Best of Sogod,<br>Southern Leyte</div>
                    <div class="aeb-desc">
                        From scenic destinations, hotels, cafes, and rich cultural heritage to transparent governance and online services —
                        Sogod has something for everyone.
                    </div>
                    <div class="aeb-actions">
                        <a href="{{ route('tourism') }}" class="aeb-btn"><i class="fa fa-camera"></i> Explore Tourism</a>
                        <a href="{{ route('about.missionvision') }}" class="aeb-btn-outline"><i class="fa fa-eye"></i> Mission &amp; Vision</a>
                        <a href="{{ route('news') }}" class="aeb-btn-outline"><i class="fa fa-newspaper-o"></i> Latest News</a>
                    </div>
                </div>

            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-4">

                {{-- Quick Facts --}}
                <div class="about-info-card" data-aos="fade-left">
                    <div class="aic-header orange">
                        <i class="fa fa-list-ul"></i> Sogod at a Glance
                    </div>
                    <div class="aic-body">
                        <ul class="sogod-facts-list">
                            <li>
                                <i class="fa fa-map"></i>
                                <div><strong>Province</strong>Southern Leyte</div>
                            </li>
                            <li>
                                <i class="fa fa-globe"></i>
                                <div><strong>Region</strong>Region VIII — Eastern Visayas</div>
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <div><strong>Zip Code</strong>6606</div>
                            </li>
                            <li>
                                <i class="fa fa-map-signs"></i>
                                <div><strong>Address</strong>Corner Concepcion St. &amp; Osmeña St., Zone 1, Sogod</div>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <div><strong>Office Hours</strong>Monday – Friday, 8:00 AM – 5:00 PM</div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Map --}}
                <div class="about-map-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="amc-header">
                        <i class="fa fa-map-o"></i> Location Map
                    </div>
                    <iframe
                        src="https://maps.google.com/maps?q=Sogod+southern+leyte+municipal+hall&t=k&z=13&ie=UTF8&iwloc=&output=embed"
                        allowfullscreen loading="lazy"
                        title="Sogod Municipal Hall Location">
                    </iframe>
                </div>

                {{-- Quick Nav CTA Cards --}}
                <div class="about-info-card" data-aos="fade-left" data-aos-delay="100">
                    <div class="aic-header blue">
                        <i class="fa fa-compass"></i> Explore More
                    </div>
                    <div class="aic-body" style="padding-top:16px;">
                        <div class="about-cta-grid">
                            <a href="{{ route('about.missionvision') }}" class="about-cta-card nav">
                                <i class="fa fa-eye acc-icon"></i>
                                <span class="acc-label">Mission &amp; Vision</span>
                            </a>
                            <a href="{{ route('gov.elected.officials') }}" class="about-cta-card orn">
                                <i class="fa fa-users acc-icon"></i>
                                <span class="acc-label">Elected Officials</span>
                            </a>
                            <a href="{{ route('barangay') }}" class="about-cta-card tel">
                                <i class="fa fa-building-o acc-icon"></i>
                                <span class="acc-label">Barangays</span>
                            </a>
                            <a href="{{ route('tourism') }}" class="about-cta-card gld">
                                <i class="fa fa-camera acc-icon"></i>
                                <span class="acc-label">Tourism</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection