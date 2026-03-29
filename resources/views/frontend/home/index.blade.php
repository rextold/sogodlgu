@extends('layouts.home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/followus.css') }}">
<style>
/* ============================================================
   HOME PAGE — ENHANCED DESIGN
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

#main-content { background-color: #f4f6f9; }

/* ---- Shared Card ---- */
.home-card {
    background: #fff;
    border-radius: var(--card-radius, 12px);
    box-shadow: var(--card-shadow, 0 4px 16px rgba(0,0,0,0.08));
    overflow: hidden;
    margin-bottom: 1.4rem;
    transition: box-shadow 0.3s ease;
}
.home-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.13); }
.home-card .hcard-header {
    display: flex; align-items: center; gap: 9px;
    padding: 11px 18px;
    font-weight: 700; font-size: 0.95rem; letter-spacing: 0.3px; color: #fff;
}
.home-card .hcard-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.home-card .hcard-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.home-card .hcard-header.teal   { background: linear-gradient(135deg, #186152, #0e3d32); }
.home-card .hcard-header.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); }
.home-card .hcard-body { padding: 14px 16px; }

/* ---- Stats Strip ---- */
.stats-strip {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 0;
    position: relative;
    overflow: hidden;
}
.stats-strip::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.stats-strip .ss-inner {
    display: flex; flex-wrap: wrap; justify-content: space-around;
}
.stats-strip .ss-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 18px 24px;
    text-align: center;
    min-width: 120px;
    border-right: 1px solid rgba(255,255,255,0.08);
    flex: 1;
}
.stats-strip .ss-item:last-child { border-right: none; }
.stats-strip .ss-item .ss-value {
    font-size: 1.85rem; font-weight: 900; color: #f4c542; line-height: 1;
}
.stats-strip .ss-item .ss-label {
    font-size: 0.72rem; color: rgba(255,255,255,0.75);
    font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase;
    margin-top: 4px;
}
.stats-strip .ss-item .ss-icon {
    font-size: 1.2rem; color: rgba(255,255,255,0.4); margin-bottom: 5px;
}
@media (max-width: 576px) {
    .stats-strip .ss-item { min-width: 50%; border-bottom: 1px solid rgba(255,255,255,0.08); }
}

/* ---- Services Grid ---- */
.services-section {
    padding: 2.5rem 1rem;
    background: #fff;
}
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 16px;
}
.service-card {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 22px 12px 18px;
    border-radius: 12px;
    text-decoration: none;
    text-align: center;
    transition: transform 0.25s, box-shadow 0.25s;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    position: relative; overflow: hidden;
}
.service-card::before {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0;
    height: 3px;
}
.service-card:hover { transform: translateY(-5px); box-shadow: 0 10px 26px rgba(0,0,0,0.13); text-decoration: none; }
.service-card .sc-icon {
    font-size: 2rem; margin-bottom: 10px; transition: transform 0.25s;
}
.service-card:hover .sc-icon { transform: scale(1.15); }
.service-card .sc-label {
    font-size: 0.82rem; font-weight: 700; line-height: 1.3;
}
/* Color variants */
.service-card.sc-orange { background: #fff5f1; }
.service-card.sc-orange .sc-icon { color: #ea5211; }
.service-card.sc-orange .sc-label { color: #c9460e; }
.service-card.sc-orange::before { background: #ea5211; }
.service-card.sc-blue { background: #f0f5ff; }
.service-card.sc-blue .sc-icon { color: #0052a5; }
.service-card.sc-blue .sc-label { color: #003d7a; }
.service-card.sc-blue::before { background: #0052a5; }
.service-card.sc-teal { background: #f0faf8; }
.service-card.sc-teal .sc-icon { color: #186152; }
.service-card.sc-teal .sc-label { color: #0e3d32; }
.service-card.sc-teal::before { background: #186152; }
.service-card.sc-gold { background: #fffbf0; }
.service-card.sc-gold .sc-icon { color: #c08b00; }
.service-card.sc-gold .sc-label { color: #8a6400; }
.service-card.sc-gold::before { background: #f4c542; }
.service-card.sc-navy { background: #f0f3f8; }
.service-card.sc-navy .sc-icon { color: #001f2d; }
.service-card.sc-navy .sc-label { color: #001f2d; }
.service-card.sc-navy::before { background: #001f2d; }
.service-card.sc-red { background: #fff0f0; }
.service-card.sc-red .sc-icon { color: #b92c2c; }
.service-card.sc-red .sc-label { color: #b92c2c; }
.service-card.sc-red::before { background: #b92c2c; }

/* ---- News Cards ---- */
.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(215px, 1fr));
    gap: 14px;
    padding: 14px 16px;
}
.news-grid-card {
    background: #fff; border-radius: 10px; overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.09);
    transition: transform 0.3s, box-shadow 0.3s;
    border-top: 3px solid #ea5211;
    display: flex; flex-direction: column;
}
.news-grid-card:hover { transform: translateY(-4px); box-shadow: 0 10px 22px rgba(0,0,0,0.14); }
.news-grid-card img { width: 100%; height: 130px; object-fit: cover; }
.news-grid-card .ngc-body { padding: 10px 12px; flex: 1; display: flex; flex-direction: column; }
.news-grid-card .ngc-body h6 {
    font-weight: 700; font-size: 0.88rem; color: #0052a5;
    line-height: 1.3; height: 36px; overflow: hidden; margin-bottom: 4px;
}
.news-grid-card .ngc-body .date { font-size: 11px; color: #777; margin-bottom: 5px; }
.news-grid-card .ngc-body article {
    font-size: 12px; color: #555; height: 32px; overflow: hidden;
    line-height: 1.35; margin-bottom: 8px; flex: 1;
}
.ngc-btn {
    display: inline-block; background: #ea5211; color: #fff;
    font-size: 0.75rem; font-weight: 600; padding: 4px 12px;
    border-radius: 20px; text-decoration: none; transition: background 0.25s;
    align-self: flex-start;
}
.ngc-btn:hover { background: #003d7a; color: #fff; }
.news-see-more {
    text-align: center; padding: 10px 16px 14px; border-top: 1px solid #f0f0f0;
}
.news-see-more a {
    display: inline-flex; align-items: center; gap: 7px;
    background: #0052a5; color: #fff; font-weight: 600; font-size: 0.83rem;
    padding: 7px 22px; border-radius: 25px; text-decoration: none;
    transition: background 0.25s, transform 0.2s;
}
.news-see-more a:hover { background: #003d7a; transform: translateY(-2px); color: #fff; }

/* ---- Sidebar ---- */
.adv-item { padding: 8px 0; border-bottom: 1px solid #f0ece8; }
.adv-item:last-child { border-bottom: none; }
.adv-item a { color: #0052a5; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: color 0.25s; line-height: 1.35; }
.adv-item a:hover { color: #ea5211; }
.adv-item .adv-date { font-size: 11px; color: #888; margin-top: 2px; }
.adv-item article { font-size: 12px; color: #666; margin-top: 2px; height: 28px; overflow: hidden; }

.sidebar-card {
    border-radius: var(--card-radius, 12px); overflow: hidden;
    box-shadow: var(--card-shadow, 0 4px 16px rgba(0,0,0,0.08));
    margin-bottom: 1.4rem; background: #fff; transition: box-shadow 0.3s;
}
.sidebar-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.13); }
.sidebar-card .card-header {
    display: flex; align-items: center; gap: 9px;
    padding: 11px 16px !important; font-weight: 700; font-size: 0.95rem; color: #fff;
    background: linear-gradient(135deg, #ea5211, #c9460e) !important;
    border-radius: 0 !important;
}
.sidebar-card .card-body { padding: 10px 14px; }

/* ---- Mission & Vision Teaser ---- */
.mv-teaser {
    background: linear-gradient(135deg, #0052a5 0%, #003d7a 40%, #001f2d 100%);
    position: relative; overflow: hidden;
    padding: 36px 30px;
    margin: 0;
}
.mv-teaser::before {
    content: '';
    position: absolute; top: -60px; right: -60px;
    width: 250px; height: 250px;
    background: rgba(244,197,66,0.1); border-radius: 50%;
}
.mv-teaser::after {
    content: '';
    position: absolute; bottom: -40px; left: -40px;
    width: 180px; height: 180px;
    background: rgba(234,82,17,0.1); border-radius: 50%;
}
.mv-teaser .mv-content { position: relative; z-index: 2; }
.mv-teaser .mv-tag {
    display: inline-block; background: #f4c542; color: #001f2d;
    font-size: 0.7rem; font-weight: 800; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 10px;
}
.mv-teaser .mv-title {
    font-size: 1.6rem; font-weight: 900; color: #fff; margin-bottom: 8px; line-height: 1.25;
}
.mv-teaser .mv-desc {
    font-size: 0.92rem; color: rgba(255,255,255,0.82); margin-bottom: 18px; max-width: 460px;
}
.mv-teaser .mv-excerpt {
    background: rgba(255,255,255,0.08);
    border-left: 4px solid #f4c542;
    padding: 10px 16px;
    border-radius: 0 8px 8px 0;
    font-style: italic;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.88);
    margin-bottom: 18px;
}
.mv-teaser .mv-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: #ea5211; color: #fff; font-weight: 700;
    padding: 10px 26px; border-radius: 30px; text-decoration: none;
    transition: background 0.25s, transform 0.2s;
    box-shadow: 0 4px 12px rgba(234,82,17,0.4);
    margin-right: 10px; margin-bottom: 8px;
}
.mv-teaser .mv-btn:hover { background: #f4c542; color: #001f2d; transform: translateY(-2px); }
.mv-teaser .mv-btn-outline {
    display: inline-flex; align-items: center; gap: 7px;
    border: 2px solid rgba(255,255,255,0.5); color: #fff; font-weight: 700;
    padding: 8px 22px; border-radius: 30px; text-decoration: none;
    transition: border-color 0.25s, background 0.25s, transform 0.2s;
    margin-bottom: 8px;
}
.mv-teaser .mv-btn-outline:hover {
    border-color: #f4c542; background: rgba(244,197,66,0.12);
    color: #f4c542; transform: translateY(-2px);
}

/* ---- eBPLS Section ---- */
.ebpls-section {
    background: linear-gradient(135deg, #003d7a 0%, #001f2d 100%);
    padding: 34px 20px;
    position: relative; overflow: hidden;
}
.ebpls-section::before {
    content: ''; position: absolute; top: -40px; right: -40px;
    width: 200px; height: 200px; background: rgba(244,197,66,0.1); border-radius: 50%;
}
.ebpls-section img {
    border-radius: 10px; box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    width: 100%; transition: transform 0.3s;
}
.ebpls-section img:hover { transform: scale(1.02); }
.ebpls-section .ebpls-badge {
    display: inline-block; background: #f4c542; color: #001f2d;
    font-weight: 800; font-size: 0.73rem; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.ebpls-section .ebpls-title {
    font-size: 1.5rem; font-weight: 900; color: #fff; margin-bottom: 6px; line-height: 1.2;
}
.ebpls-section .ebpls-desc {
    font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-bottom: 16px; line-height: 1.6;
}
.ebpls-section .ebpls-features {
    list-style: none; padding: 0; margin: 0 0 18px; display: flex; flex-direction: column; gap: 7px;
}
.ebpls-section .ebpls-features li {
    font-size: 0.85rem; color: rgba(255,255,255,0.85);
    display: flex; align-items: center; gap: 8px;
}
.ebpls-section .ebpls-features li i { color: #f4c542; flex-shrink: 0; }
.ebpls-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: #ea5211; color: #fff; font-weight: 700;
    padding: 11px 28px; border-radius: 30px; text-decoration: none;
    font-size: 0.95rem; transition: background 0.25s, transform 0.2s;
    box-shadow: 0 4px 14px rgba(234,82,17,0.5);
}
.ebpls-btn:hover { background: #f4c542; color: #001f2d; transform: translateY(-2px); color: #001f2d; }

/* ---- Section Label ---- */
.section-label {
    display: flex; align-items: center; gap: 12px;
    margin: 0 0 18px;
}
.section-label .sl-text {
    font-size: 1.15rem; font-weight: 800; color: #0052a5; white-space: nowrap;
}
.section-label .sl-line {
    flex: 1; height: 2px;
    background: linear-gradient(to right, #0052a5, #ea5211 55%, rgba(244,197,66,0.4));
    border-radius: 2px;
}

/* ============================================================
   RESPONSIVE
============================================================ */

/* Tablet (≤ 991px) */
@media (max-width: 991px) {
    .services-grid { grid-template-columns: repeat(3, 1fr); }
    .mv-teaser { padding: 28px 20px; }
    .mv-teaser .mv-title { font-size: 1.35rem; }
    .ebpls-section { padding: 26px 16px; }
}

/* Mobile (≤ 767px) */
@media (max-width: 767px) {
    /* Stats strip */
    .stats-strip .ss-value { font-size: 1.5rem; }
    .stats-strip .ss-label { font-size: 0.65rem; }
    /* Services */
    .services-section { padding: 1.5rem 0.5rem; }
    .services-grid { grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .service-card { padding: 16px 8px 14px; }
    .service-card .sc-icon { font-size: 1.6rem; margin-bottom: 7px; }
    .service-card .sc-label { font-size: 0.75rem; }
    /* Section label */
    .section-label .sl-text { font-size: 0.95rem; }
    /* M&V Teaser */
    .mv-teaser { padding: 24px 16px; }
    .mv-teaser .mv-title { font-size: 1.2rem; }
    .mv-teaser .mv-desc { font-size: 0.84rem; margin-bottom: 12px; }
    .mv-teaser .mv-excerpt { font-size: 0.82rem; padding: 8px 12px; margin-bottom: 14px; }
    .mv-teaser .mv-btn,
    .mv-teaser .mv-btn-outline { padding: 9px 18px; font-size: 0.82rem; }
    /* eBPLS */
    .ebpls-section { padding: 22px 14px; }
    .ebpls-section .ebpls-title { font-size: 1.2rem; }
    .ebpls-section .ebpls-desc { font-size: 0.84rem; }
    /* News grid */
    .news-grid { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 10px; padding: 10px; }
    /* Home card header */
    .home-card .hcard-header { font-size: 0.88rem; padding: 10px 14px; }
}

/* Small Mobile (≤ 480px) */
@media (max-width: 480px) {
    .services-grid { grid-template-columns: repeat(3, 1fr); gap: 8px; }
    .service-card .sc-icon { font-size: 1.35rem; }
    .service-card .sc-label { font-size: 0.68rem; }
    .news-grid { grid-template-columns: 1fr 1fr; }
    .mv-teaser .mv-title { font-size: 1.05rem; }
    .mv-teaser .mv-tag { font-size: 0.65rem; }
    .stats-strip .ss-value { font-size: 1.3rem; }
}
</style>

{{-- ===== SLIDESHOW ===== --}}
<div class="container-fluid px-0">
    <div class="px-2 pt-2">
        @include('frontend.home._slideshow')
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="stats-strip">
    <div class="container-fluid">
        <div class="ss-inner">
            <div class="ss-item">
                <div class="ss-icon"><i class="fa fa-map-marker"></i></div>
                <div class="ss-value">{{ App\Barangay::count() }}</div>
                <div class="ss-label">Barangays</div>
            </div>
            <div class="ss-item">
                <div class="ss-icon"><i class="fa fa-newspaper-o"></i></div>
                <div class="ss-value">{{ App\Post::where('status','PUBLISHED')->count() }}</div>
                <div class="ss-label">News Published</div>
            </div>
            <div class="ss-item">
                <div class="ss-icon"><i class="fa fa-camera"></i></div>
                <div class="ss-value">{{ App\TouristSpot::count() }}</div>
                <div class="ss-label">Places to Visit</div>
            </div>
            <div class="ss-item">
                <div class="ss-icon"><i class="fa fa-calendar"></i></div>
                <div class="ss-value">{{ App\Event::where('event_date','>=',now())->count() }}</div>
                <div class="ss-label">Upcoming Events</div>
            </div>
            <div class="ss-item">
                <div class="ss-icon"><i class="fa fa-building-o"></i></div>
                <div class="ss-value">{{ App\ElectedOfficial::count() }}</div>
                <div class="ss-label">Elected Officials</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== GOVERNMENT SERVICES ===== --}}
<div class="services-section">
    <div class="container-fluid">
        <div class="section-label">
            <span class="sl-text"><i class="fa fa-cogs" style="color:#ea5211;"></i> &nbsp;Online Government Services</span>
            <div class="sl-line"></div>
        </div>
        <div class="services-grid">
            <a href="{{ route('bpermit') }}" class="service-card sc-orange" data-aos="zoom-in" data-aos-delay="0">
                <i class="fa fa-file-text-o sc-icon"></i>
                <span class="sc-label">Business Permit</span>
            </a>
            <a href="#" class="service-card sc-blue" data-aos="zoom-in" data-aos-delay="60">
                <i class="fa fa-building sc-icon"></i>
                <span class="sc-label">Building Permit</span>
            </a>
            <a href="https://eservices.sogodlgu.gov.ph/" target="_blank" class="service-card sc-teal" data-aos="zoom-in" data-aos-delay="120">
                <i class="fa fa-medkit sc-icon"></i>
                <span class="sc-label">Sanitary Permit</span>
            </a>
            <a href="{{ route('citizenscharter') }}" class="service-card sc-gold" data-aos="zoom-in" data-aos-delay="180">
                <i class="fa fa-book sc-icon"></i>
                <span class="sc-label">Citizen's Charter</span>
            </a>
            <a href="{{ route('fdp.index') }}" class="service-card sc-navy" data-aos="zoom-in" data-aos-delay="240">
                <i class="fa fa-folder-open-o sc-icon"></i>
                <span class="sc-label">FDP Reports</span>
            </a>
            <a href="{{ route('gov.legislative.ordinances') }}" class="service-card sc-red" data-aos="zoom-in" data-aos-delay="300">
                <i class="fa fa-gavel sc-icon"></i>
                <span class="sc-label">Ordinances</span>
            </a>
        </div>
    </div>
</div>

{{-- ===== NEWS + SIDEBAR ===== --}}
<div class="container-fluid px-3 py-2">
    <div class="row">

        {{-- MAIN COLUMN --}}
        <div class="col-lg-9">
            {{-- Featured News --}}
            <div class="home-card" data-aos="fade-up">
                <div class="hcard-header orange">
                    <i class="fa fa-newspaper-o"></i> Latest News &amp; Announcements
                </div>
                @include('frontend.widgets._newsticker')
                <div class="news-see-more">
                    <a href="{{ route('news') }}"><i class="fa fa-arrow-right"></i> See All News</a>
                </div>
            </div>

            {{-- Upcoming Events --}}
            <div class="home-card" data-aos="fade-up" data-aos-delay="80">
                <div class="hcard-header teal">
                    <i class="fa fa-calendar"></i> Upcoming Events
                </div>
                <div class="hcard-body">
                    @include('frontend.home._featevents')
                </div>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-3">
            <div data-aos="fade-left">
                @include('frontend.home._usefullinksandothers')
            </div>
            <div class="sidebar-card" data-aos="fade-left" data-aos-delay="80">
                <div class="card-header">
                    <i class="fa fa-bullhorn"></i> Advisories
                </div>
                <div class="card-body">
                    @include('frontend.home._featureAdvisories')
                </div>
            </div>
        </div>

    </div>
</div>

{{-- ===== TOURIST SPOTS ===== --}}
<div class="container-fluid px-3" data-aos="fade-up">
    @include('frontend.home._cardfeattouristspots')
</div>

{{-- ===== MISSION & VISION TEASER ===== --}}
<div class="mv-teaser" data-aos="fade-up">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7 mv-content">
                <div class="mv-tag"><i class="fa fa-flag"></i> &nbsp;Our Direction</div>
                <div class="mv-title">Mission, Vision &amp;<br>Core Values of Sogod</div>
                <div class="mv-desc">
                    The Municipal Government of Sogod is guided by a clear mission and vision that puts the welfare
                    of every citizen at the center of governance and public service.
                </div>
                <div class="mv-excerpt">
                    "A progressive municipality with empowered citizens living in a peaceful, healthy,
                    and sustainable community under a transparent and responsive local government."
                </div>
                <a href="{{ route('about.missionvision') }}" class="mv-btn">
                    <i class="fa fa-eye"></i> Mission &amp; Vision
                </a>
                <a href="{{ route('about') }}" class="mv-btn-outline">
                    <i class="fa fa-info-circle"></i> About Sogod
                </a>
            </div>
            <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center mv-content" style="padding:20px 0;">
                <img src="{{ asset('images/logo/logo2.png') }}"
                     onerror="this.style.opacity='0'"
                     alt="Sogod LGU"
                     style="max-width:200px; opacity:0.2; filter:brightness(10);">
            </div>
        </div>
    </div>
</div>

{{-- ===== eBPLS SECTION ===== --}}
<div class="ebpls-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 mb-3 mb-md-0" data-aos="fade-right">
                <img src="{{ Voyager::image('/ebpls/displayebpls.jpg') }}" alt="eBPLS Info">
            </div>
            <div class="col-md-7" data-aos="fade-left" data-aos-delay="100">
                <div class="ebpls-badge"><i class="fa fa-star"></i> Online Services</div>
                <div class="ebpls-title">Electronic Business Permit<br>&amp; Licensing System</div>
                <div class="ebpls-desc">
                    Apply and renew your business permits online — fast, easy, and convenient.
                    No more long queues. Serving the business community of Sogod, Southern Leyte.
                </div>
                <ul class="ebpls-features">
                    <li><i class="fa fa-check-circle"></i> New &amp; Renewal Business Permit Applications</li>
                    <li><i class="fa fa-check-circle"></i> Track your application status online</li>
                    <li><i class="fa fa-check-circle"></i> Official receipts and permits via email</li>
                </ul>
                <a href="{{ route('bpermit') }}" class="ebpls-btn">
                    <i class="fa fa-arrow-circle-right"></i> Apply Now
                </a>
            </div>
        </div>
    </div>
</div>

@endsection