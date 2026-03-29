@extends('layouts.home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/followus.css') }}">
<style>
/* ============================================================
   HOME PAGE — ENHANCED DESIGN (Brand-matched)
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Page Background ---- */
#main-content {
    background-color: #f4f6f9;
}

/* ---- Shared Card wrapper ---- */
.home-card {
    background: #fff;
    border-radius: var(--card-radius, 12px);
    box-shadow: var(--card-shadow, 0 4px 16px rgba(0,0,0,0.08));
    overflow: hidden;
    margin-bottom: 1.4rem;
    transition: box-shadow 0.3s ease;
}
.home-card:hover {
    box-shadow: 0 8px 28px rgba(0,0,0,0.13);
}
.home-card .hcard-header {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 11px 16px;
    font-weight: 700;
    font-size: 0.95rem;
    letter-spacing: 0.3px;
    color: #fff;
}
.home-card .hcard-header.orange {
    background: linear-gradient(135deg, #ea5211 0%, #c9460e 100%);
}
.home-card .hcard-header.blue {
    background: linear-gradient(135deg, #0052a5 0%, #003d7a 100%);
}
.home-card .hcard-header.gold {
    background: linear-gradient(135deg, #f4c542 0%, #e2ac46 100%);
    color: #1a1a1a;
}
.home-card .hcard-header.teal {
    background: linear-gradient(135deg, #186152 0%, #0e3d32 100%);
}
.home-card .hcard-body {
    padding: 14px 16px;
}

/* ---- Section Divider ---- */
.sgd-divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 28px 0 18px;
}
.sgd-divider .divider-label {
    font-size: 1.25rem;
    font-weight: 800;
    color: #0052a5;
    white-space: nowrap;
    letter-spacing: 0.3px;
}
.sgd-divider .divider-line {
    flex: 1;
    height: 3px;
    background: linear-gradient(to right, #0052a5, #ea5211 60%, #f4c542);
    border-radius: 2px;
}
.sgd-divider .divider-icon {
    color: #ea5211;
    font-size: 1.1rem;
}

/* ---- Featured News Cards ---- */
.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 14px;
    padding: 14px 16px;
}
.news-grid-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.09);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-top: 3px solid #ea5211;
}
.news-grid-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.14);
}
.news-grid-card img {
    width: 100%;
    height: 130px;
    object-fit: cover;
}
.news-grid-card .ngc-body {
    padding: 10px 12px;
}
.news-grid-card .ngc-body h6 {
    font-weight: 700;
    font-size: 0.88rem;
    color: #0052a5;
    line-height: 1.3;
    height: 36px;
    overflow: hidden;
    margin-bottom: 4px;
}
.news-grid-card .ngc-body .date {
    font-size: 11px;
    color: #777;
    margin-bottom: 5px;
}
.news-grid-card .ngc-body article {
    font-size: 12px;
    color: #555;
    height: 32px;
    overflow: hidden;
    line-height: 1.35;
    margin-bottom: 8px;
}
.ngc-btn {
    display: inline-block;
    background: #ea5211;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
    text-decoration: none;
    transition: background 0.25s;
}
.ngc-btn:hover { background: #003d7a; color: #fff; }
.news-see-more {
    text-align: center;
    padding: 10px 16px 14px;
    border-top: 1px solid #f0f0f0;
}
.news-see-more a {
    display: inline-block;
    background: #0052a5;
    color: #fff;
    font-weight: 600;
    font-size: 0.83rem;
    padding: 7px 22px;
    border-radius: 25px;
    text-decoration: none;
    transition: background 0.25s, transform 0.2s;
}
.news-see-more a:hover { background: #003d7a; transform: translateY(-2px); }

/* ---- Sidebar Advisory Items ---- */
.adv-item {
    padding: 8px 0;
    border-bottom: 1px solid #f0ece8;
}
.adv-item:last-child { border-bottom: none; }
.adv-item a {
    color: #0052a5;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.25s;
    line-height: 1.35;
}
.adv-item a:hover { color: #ea5211; }
.adv-item .adv-date {
    font-size: 11px;
    color: #888;
    margin-top: 2px;
}
.adv-item article {
    font-size: 12px;
    color: #666;
    margin-top: 2px;
    height: 28px;
    overflow: hidden;
}

/* ---- eBPLS Section ---- */
.ebpls-section {
    background: linear-gradient(135deg, #0052a5 0%, #003d7a 60%, #001f2d 100%);
    padding: 30px 20px;
    border-radius: 0;
    position: relative;
    overflow: hidden;
}
.ebpls-section::before {
    content: '';
    position: absolute;
    top: -40px; right: -40px;
    width: 200px; height: 200px;
    background: rgba(244,197,66,0.12);
    border-radius: 50%;
}
.ebpls-section img {
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    width: 100%;
    transition: transform 0.3s ease;
}
.ebpls-section img:hover { transform: scale(1.02); }
.ebpls-section .ebpls-badge {
    display: inline-block;
    background: #f4c542;
    color: #001f2d;
    font-weight: 800;
    font-size: 0.75rem;
    padding: 3px 12px;
    border-radius: 20px;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 8px;
}
.ebpls-section .ebpls-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 6px;
    line-height: 1.2;
}
.ebpls-section .ebpls-desc {
    font-size: 0.92rem;
    color: rgba(255,255,255,0.8);
    margin-bottom: 16px;
}
.ebpls-section .ebpls-btn {
    display: inline-block;
    background: #ea5211;
    color: #fff;
    font-weight: 700;
    padding: 10px 28px;
    border-radius: 30px;
    text-decoration: none;
    font-size: 0.95rem;
    transition: background 0.25s, transform 0.2s;
    box-shadow: 0 4px 12px rgba(234,82,17,0.4);
}
.ebpls-section .ebpls-btn:hover {
    background: #f4c542;
    color: #001f2d;
    transform: translateY(-2px);
}

/* ---- Sidebar card wrapper used for advisories ---- */
.sidebar-card {
    border-radius: var(--card-radius, 12px);
    overflow: hidden;
    box-shadow: var(--card-shadow, 0 4px 16px rgba(0,0,0,0.08));
    margin-bottom: 1.4rem;
    background: #fff;
    transition: box-shadow 0.3s ease;
}
.sidebar-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.13); }
.sidebar-card .card-header {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 11px 16px !important;
    font-weight: 700;
    font-size: 0.95rem;
    color: #fff;
    background: linear-gradient(135deg, #ea5211, #c9460e) !important;
    border-radius: 0 !important;
}
.sidebar-card .card-body { padding: 10px 14px; }
</style>

{{-- ===== SLIDESHOW ===== --}}
<div class="container-fluid px-0">
    <div class="px-2 pt-2">
        @include('frontend.home._slideshow')
    </div>
</div>

{{-- ===== MAIN DUAL COLUMN LAYOUT ===== --}}
<div class="container-fluid px-3 py-3">
    <div class="row">

        {{-- MAIN COLUMN (9) --}}
        <div class="col-lg-9">
            {{-- Featured News --}}
            <div class="home-card" data-aos="fade-up">
                <div class="hcard-header orange">
                    <i class="fa fa-newspaper-o"></i> Featured News &amp; Announcements
                </div>
                @include('frontend.widgets._newsticker')
                <div class="news-see-more">
                    <a href="{{ route('news') }}"><i class="fa fa-arrow-right"></i> See All News</a>
                </div>
            </div>

            {{-- Upcoming Events --}}
            <div class="home-card" data-aos="fade-up" data-aos-delay="100">
                <div class="hcard-header teal">
                    <i class="fa fa-calendar"></i> Upcoming Events
                </div>
                <div class="hcard-body">
                    @include('frontend.home._featevents')
                </div>
            </div>
        </div>

        {{-- SIDEBAR (3) --}}
        <div class="col-lg-3">
            {{-- Useful Links --}}
            <div data-aos="fade-left">
                @include('frontend.home._usefullinksandothers')
            </div>

            {{-- Advisories --}}
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

{{-- ===== TOURIST SPOTS SECTION ===== --}}
<div class="container-fluid px-3" data-aos="fade-up">
    @include('frontend.home._cardfeattouristspots')
</div>

{{-- ===== eBPLS SECTION ===== --}}
<div class="ebpls-section mt-2">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 mb-3 mb-md-0" data-aos="fade-right">
                <img src="{{ Voyager::image('/ebpls/displayebpls.jpg') }}" alt="eBPLS Info">
            </div>
            <div class="col-md-7" data-aos="fade-left" data-aos-delay="100">
                <div class="ebpls-badge"><i class="fa fa-star"></i> Online Services</div>
                <div class="ebpls-title">Electronic Business<br>Permit &amp; Licensing System</div>
                <div class="ebpls-desc">Apply and renew your business permits online — fast, easy, and convenient. Serving the business community of Sogod, Southern Leyte.</div>
                <a href="{{ route('bpermit') }}" class="ebpls-btn">
                    <i class="fa fa-arrow-circle-right"></i> &nbsp;Apply Now
                </a>
            </div>
        </div>
    </div>
</div>

@endsection