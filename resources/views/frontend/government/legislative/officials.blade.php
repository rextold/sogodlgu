@extends('layouts.home')
@section('content')
<style>
/* ============================================================
   ELECTED OFFICIALS PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.eo-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 40px 0 32px;
    position: relative;
    overflow: hidden;
}
.eo-hero::before {
    content: '';
    position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.eo-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.eo-hero .hero-icon  { font-size: 2.8rem; color: rgba(244,197,66,0.5); margin-bottom: 10px; }
.eo-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.eo-hero h1 { font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.eo-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.eo-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.eo-breadcrumb a, .eo-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.eo-breadcrumb a:hover { color: #f4c542; }
.eo-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.eo-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.eo-stats {
    background: linear-gradient(135deg, #ea5211, #c9460e); padding: 0;
}
.eo-stats .es-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.eo-stats .es-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 22px; text-align: center; flex: 1; min-width: 130px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.eo-stats .es-item:last-child { border-right: none; }
.eo-stats .es-item .es-icon  { font-size: 1.2rem; color: rgba(255,255,255,0.5); margin-bottom: 3px; }
.eo-stats .es-item .es-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.eo-stats .es-item .es-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrap ---- */
.eo-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Header ---- */
.eo-section-header {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 22px; padding-bottom: 12px;
    border-bottom: 2px solid #eaeff8;
}
.eo-section-header .esh-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
}
.eo-section-header .esh-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.eo-section-header .esh-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.eo-section-header h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.eo-section-header p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Profile Cards ---- */
.eo-cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 32px;
}
.eo-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    transition: transform 0.25s, box-shadow 0.25s;
    text-align: center;
}
.eo-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(0,0,0,0.14);
}
.eo-card .eoc-photo-wrap {
    position: relative;
    height: 180px;
    overflow: hidden;
}
.eo-card .eoc-photo-wrap::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 50%;
    background: linear-gradient(to top, rgba(0,31,45,0.8), transparent);
}
.eo-card .eoc-photo-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    object-position: top center;
    transition: transform 0.4s ease;
}
.eo-card:hover .eoc-photo-wrap img { transform: scale(1.05); }
.eo-card .eoc-order {
    position: absolute; top: 10px; left: 10px;
    background: rgba(0,31,45,0.75); color: #f4c542;
    font-size: 0.68rem; font-weight: 800;
    padding: 3px 9px; border-radius: 20px; z-index: 1;
    letter-spacing: 0.5px;
}
.eo-card .eoc-body {
    padding: 14px 12px 16px;
}
.eo-card .eoc-name {
    font-size: 0.9rem; font-weight: 800; color: #001f2d;
    line-height: 1.3; margin-bottom: 6px;
}
.eo-card .eoc-position {
    display: inline-block;
    background: #f0f4fb; color: #0052a5;
    font-size: 0.74rem; font-weight: 700;
    padding: 4px 12px; border-radius: 20px;
    border: 1px solid #dde2ef;
}
/* First card (Mayor) special highlight */
.eo-card.highlight-mayor .eoc-photo-wrap::after {
    background: linear-gradient(to top, rgba(0,61,122,0.85), transparent);
}
.eo-card.highlight-mayor .eoc-position {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; border-color: transparent;
}

/* ---- Sidebar ---- */
.eo-side-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 20px;
}
.eo-side-card .essc-header {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.eo-side-card .essc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.eo-side-card .essc-header.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); }
.eo-side-card .essc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.eo-side-card .essc-body { padding: 14px 18px; }

/* Ordinance list */
.ord-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 6px; }
.ord-list li a {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: 0.82rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: background 0.2s, color 0.2s;
    line-height: 1.4;
}
.ord-list li a:hover { background: #edf3fb; color: #0052a5; }
.ord-list li a i { color: #0052a5; margin-top: 2px; flex-shrink: 0; }

/* ---- Responsive ---- */
@media (max-width: 991px) {
    .eo-cards-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 767px) {
    .eo-hero h1 { font-size: 1.4rem; }
    .eo-cards-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .eo-stats .es-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .eo-stats .es-item:nth-child(even) { border-right: none; }
}
@media (max-width: 480px) {
    .eo-hero h1 { font-size: 1.1rem; }
    .eo-cards-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .eo-card .eoc-photo-wrap { height: 140px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="eo-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-users"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Elected Officials</h1>
        <div class="hero-sub">Meet the elected leaders serving the people of Sogod, Southern Leyte.</div>
        <div class="eo-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="#">Government</a>
            <span class="sep">/</span>
            <span class="current">Elected Officials</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="eo-stats">
    <div class="container-fluid">
        <div class="es-inner">
            <div class="es-item">
                <div class="es-icon"><i class="fa fa-users"></i></div>
                <div class="es-value">{{ $sbmembers->count() }}</div>
                <div class="es-label">Elected Officials</div>
            </div>
            <div class="es-item">
                <div class="es-icon"><i class="fa fa-building-o"></i></div>
                <div class="es-value">{{ App\Barangay::count() }}</div>
                <div class="es-label">Barangays</div>
            </div>
            <div class="es-item">
                <div class="es-icon"><i class="fa fa-calendar"></i></div>
                <div class="es-value">2022</div>
                <div class="es-label">Term Start</div>
            </div>
            <div class="es-item">
                <div class="es-icon"><i class="fa fa-map-marker"></i></div>
                <div class="es-value">Sogod</div>
                <div class="es-label">Southern Leyte</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="eo-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== OFFICIALS GRID ===== --}}
            <div class="col-lg-9">
                <div class="eo-section-header" data-aos="fade-up">
                    <div class="esh-icon blue"><i class="fa fa-id-badge"></i></div>
                    <div>
                        <h2>Official Directory</h2>
                        <p>{{ $sbmembers->count() }} elected officials serving Sogod</p>
                    </div>
                </div>

                <div class="eo-cards-grid">
                    @foreach($sbmembers as $idx => $sbmember)
                    <div class="eo-card {{ $idx === 0 ? 'highlight-mayor' : '' }}"
                         data-aos="fade-up" data-aos-delay="{{ min(($idx % 4) * 60, 180) }}">
                        <div class="eoc-photo-wrap">
                            <span class="eoc-order">#{{ $idx + 1 }}</span>
                            <img src="{{ preg_replace('/\.[^.\s]{3,4}$/', '', Voyager::image($sbmember->official->image)) }}-cropped.jpg"
                                 alt="{{ $sbmember->official->name }}"
                                 onerror="this.src='{{ Voyager::image($sbmember->official->image) }}'">
                        </div>
                        <div class="eoc-body">
                            <div class="eoc-name">{{ $sbmember->official->name }}</div>
                            <span class="eoc-position">{{ $sbmember->position->name }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                @include('frontend.widgets._sharethis')
            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-3">

                {{-- Transparency Seal --}}
                @include('frontend.widgets._transseal')

                {{-- Most Viewed Ordinances --}}
                @if($MVordinances = App\Ordinance::mostviewed())
                <div class="eo-side-card mt-3" data-aos="fade-left">
                    <div class="essc-header blue">
                        <i class="fa fa-gavel"></i> Most Viewed Ordinances
                    </div>
                    <div class="essc-body">
                        <ul class="ord-list">
                            @foreach($MVordinances as $MVordinance)
                            <li>
                                <a href="{{ route('gov.legislative.show_ordinance', ['id' => $MVordinance->id, 'title' => $MVordinance->slug ?? $MVordinance->id]) }}">
                                    <i class="fa fa-angle-right"></i>
                                    {!! $MVordinance->title !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Quick Links ---- --}}
                <div class="eo-side-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="essc-header orange">
                        <i class="fa fa-compass"></i> Government Links
                    </div>
                    <div class="essc-body">
                        <ul class="ord-list">
                            <li><a href="{{ route('gov.legislative.officials') }}"><i class="fa fa-angle-right"></i> SB Officials</a></li>
                            <li><a href="{{ route('barangay') }}"><i class="fa fa-angle-right"></i> Barangays</a></li>
                            <li><a href="{{ route('gov.legislative.ordinances') }}"><i class="fa fa-angle-right"></i> Ordinances</a></li>
                            <li><a href="{{ route('gov.legislative.resolutions') }}"><i class="fa fa-angle-right"></i> Resolutions</a></li>
                            <li><a href="{{ route('fdp.index') }}"><i class="fa fa-angle-right"></i> FDP Reports</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection