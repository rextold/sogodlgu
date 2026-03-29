@extends('layouts.home')
@section('content')
<style>
/* ============================================================
   ORDINANCES PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.ord-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 40px 0 32px; position: relative; overflow: hidden;
}
.ord-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.ord-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.ord-hero .hero-icon  { font-size: 2.8rem; color: rgba(244,197,66,0.5); margin-bottom: 10px; }
.ord-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.ord-hero h1 { font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.ord-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.ord-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.ord-breadcrumb a, .ord-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.ord-breadcrumb a:hover { color: #f4c542; }
.ord-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.ord-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.ord-stats { background: linear-gradient(135deg, #ea5211, #c9460e); }
.ord-stats .os-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.ord-stats .os-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 22px; text-align: center; flex: 1; min-width: 130px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.ord-stats .os-item:last-child { border-right: none; }
.ord-stats .os-item .os-icon  { font-size: 1.2rem; color: rgba(255,255,255,0.5); margin-bottom: 3px; }
.ord-stats .os-item .os-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.ord-stats .os-item .os-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrap ---- */
.ord-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Header ---- */
.ord-section-head {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 18px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.ord-section-head .osh-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
}
.ord-section-head .osh-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.ord-section-head .osh-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.ord-section-head h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.ord-section-head p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Archive Sidebar ---- */
.ord-archive-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.ord-archive-card .oac-header {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    padding: 11px 16px; color: #fff; font-weight: 700; font-size: 0.88rem;
    border-bottom: 3px solid #f4c542;
    display: flex; align-items: center; gap: 8px;
}
.ord-archive-card .oac-body { padding: 6px 0; }
.archive-link {
    display: flex; justify-content: space-between; align-items: center;
    padding: 8px 16px; font-size: 0.82rem; color: #444; text-decoration: none;
    border-bottom: 1px solid #f5f5f5; transition: background 0.15s, color 0.15s;
}
.archive-link:hover { background: #edf3fb; color: #0052a5; text-decoration: none; }
.archive-link.active { background: #edf3fb; color: #0052a5; font-weight: 700; border-left: 3px solid #0052a5; }
.archive-link .arc-badge {
    background: #0052a5; color: #fff;
    font-size: 0.68rem; font-weight: 700; padding: 2px 7px; border-radius: 10px;
    flex-shrink: 0;
}
.archive-link:hover .arc-badge { background: #ea5211; }

/* ---- Ordinance List ---- */
.ord-list-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
}
.ord-list-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 13px 20px; color: #fff; font-weight: 700; font-size: 0.92rem;
    border-bottom: 3px solid #ea5211;
    display: flex; align-items: center; justify-content: space-between;
}
.ord-list-header .olh-count {
    background: #ea5211; color: #fff;
    font-size: 0.72rem; font-weight: 700; padding: 3px 10px; border-radius: 20px;
}

/* Each ordinance row */
.ord-item {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 18px; border-bottom: 1px solid #f0f4fb;
    text-decoration: none; color: inherit;
    transition: background 0.2s;
}
.ord-item:last-child { border-bottom: none; }
.ord-item:hover { background: #f5f8ff; text-decoration: none; }
.ord-item .oi-icon {
    width: 42px; height: 42px; border-radius: 10px; flex-shrink: 0;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1.1rem;
    transition: background 0.2s;
}
.ord-item:hover .oi-icon { background: linear-gradient(135deg, #ea5211, #c9460e); }
.ord-item .oi-body { flex: 1; min-width: 0; }
.ord-item .oi-title {
    font-size: 0.9rem; font-weight: 700; color: #001f2d; line-height: 1.4;
    margin-bottom: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.ord-item:hover .oi-title { color: #0052a5; }
.ord-item .oi-date {
    font-size: 0.74rem; color: #888;
}
.ord-item .oi-date i { color: #ea5211; margin-right: 4px; }
.ord-item .oi-views {
    font-size: 0.72rem; color: #aaa; white-space: nowrap; flex-shrink: 0;
}
.ord-item .oi-views i { color: #0052a5; margin-right: 3px; }

/* Empty state */
.ord-empty {
    padding: 40px 20px; text-align: center; color: #aaa;
}
.ord-empty i { font-size: 2.5rem; margin-bottom: 10px; display: block; }

/* ---- Sidebar cards (MVC, links) ---- */
.ord-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.ord-side-card .osc-header {
    padding: 11px 16px; color: #fff; font-weight: 700; font-size: 0.88rem;
    display: flex; align-items: center; gap: 8px;
}
.ord-side-card .osc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.ord-side-card .osc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.ord-side-card .osc-body { padding: 12px 14px; }
.mvc-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.mvc-list li a {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: background 0.2s, color 0.2s;
    line-height: 1.4;
}
.mvc-list li a:hover { background: #edf3fb; color: #0052a5; }
.mvc-list li a i { color: #0052a5; margin-top: 2px; flex-shrink: 0; }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .ord-hero h1 { font-size: 1.4rem; }
    .ord-stats .os-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .ord-stats .os-item:nth-child(even) { border-right: none; }
    .ord-item .oi-title { white-space: normal; }
}
@media (max-width: 480px) { .ord-hero h1 { font-size: 1.1rem; } }
</style>

{{-- ===== HERO ===== --}}
<div class="ord-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-gavel"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Ordinances</h1>
        <div class="hero-sub">Official legislative acts enacted by the Sangguniang Bayan of Sogod.</div>
        <div class="ord-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="#">Government</a>
            <span class="sep">/</span>
            <a href="#">Legislative</a>
            <span class="sep">/</span>
            <span class="current">Ordinances</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="ord-stats">
    <div class="container-fluid">
        <div class="os-inner">
            <div class="os-item">
                <div class="os-icon"><i class="fa fa-files-o"></i></div>
                <div class="os-value">{{ App\Ordinance::count() }}</div>
                <div class="os-label">Total Ordinances</div>
            </div>
            <div class="os-item">
                <div class="os-icon"><i class="fa fa-calendar"></i></div>
                <div class="os-value">{{ $by_date->count() }}</div>
                <div class="os-label">Archive Months</div>
            </div>
            <div class="os-item">
                <div class="os-icon"><i class="fa fa-eye"></i></div>
                <div class="os-value">{{ number_format(App\Ordinance::sum('views')) }}</div>
                <div class="os-label">Total Views</div>
            </div>
            <div class="os-item">
                <div class="os-icon"><i class="fa fa-filter"></i></div>
                <div class="os-value">{{ $ordinances->count() }}</div>
                <div class="os-label">Showing</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="ord-wrap">
    <div class="container-fluid" style="padding-left:20px;padding-right:20px;">
        <div class="row">

            {{-- ===== ARCHIVE SIDEBAR LEFT ===== --}}
            <div class="col-lg-2 col-md-3 mb-4" data-aos="fade-right">
                <div class="ord-archive-card">
                    <div class="oac-header">
                        <i class="fa fa-calendar"></i> Archives
                    </div>
                    <div class="oac-body">
                        <a class="archive-link {{ request()->route()->getName() === 'gov.legislative.ordinances' ? 'active' : '' }}"
                           href="{{ route('gov.legislative.ordinances') }}">
                            All Records
                            <span class="arc-badge">{{ App\Ordinance::count() }}</span>
                        </a>
                        @foreach($by_date as $date => $lists)
                            <a class="archive-link"
                               href="{{ route('gov.legislative.getordinances', ['month' => date('F', strtotime($date)), 'year' => date('Y', strtotime($date))]) }}">
                                {{ $date }}
                                <span class="arc-badge">{{ count($lists) }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ===== ORDINANCE LIST ===== --}}
            <div class="col-lg-7 col-md-6 mb-4" data-aos="fade-up">
                <div class="ord-section-head">
                    <div class="osh-icon orange"><i class="fa fa-gavel"></i></div>
                    <div>
                        <h2>{{ $pageHeading }}</h2>
                        <p>{{ $ordinances->count() }} ordinance(s) found</p>
                    </div>
                </div>

                <div class="ord-list-card">
                    <div class="ord-list-header">
                        <span><i class="fa fa-list"></i> &nbsp;Ordinance Directory</span>
                        <span class="olh-count">{{ $ordinances->count() }} records</span>
                    </div>

                    @forelse($ordinances as $ordinance)
                        <a class="ord-item"
                           href="{{ route('gov.legislative.show_ordinance', ['id' => $ordinance->id, 'title' => $ordinance->title]) }}">
                            <div class="oi-icon"><i class="fa fa-file-text-o"></i></div>
                            <div class="oi-body">
                                <div class="oi-title">{{ $ordinance->title }}</div>
                                <div class="oi-date">
                                    <i class="fa fa-calendar"></i>
                                    {{ $ordinance->date ? date('F d, Y', strtotime($ordinance->date)) : 'No date' }}
                                </div>
                            </div>
                            <div class="oi-views">
                                <i class="fa fa-eye"></i> {{ number_format($ordinance->views ?? 0) }}
                            </div>
                        </a>
                    @empty
                        <div class="ord-empty">
                            <i class="fa fa-folder-open-o"></i>
                            No ordinances found for this period.
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-lg-3 col-md-3">

                @include('frontend.widgets._transseal')

                {{-- Most Viewed --}}
                @if($MVordinances = App\Ordinance::mostviewed())
                <div class="ord-side-card mt-3" data-aos="fade-left">
                    <div class="osc-header blue"><i class="fa fa-fire"></i> Most Viewed</div>
                    <div class="osc-body">
                        <ul class="mvc-list">
                            @foreach($MVordinances as $MVordinance)
                            <li>
                                <a href="{{ route('gov.legislative.show_ordinance', ['id' => $MVordinance->id, 'title' => $MVordinance->title]) }}">
                                    <i class="fa fa-angle-right"></i>
                                    {!! $MVordinance->title !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Related Links --}}
                <div class="ord-side-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="osc-header orange"><i class="fa fa-compass"></i> Legislative</div>
                    <div class="osc-body">
                        <ul class="mvc-list">
                            <li><a href="{{ route('gov.legislative.resolutions') }}"><i class="fa fa-angle-right"></i> Resolutions</a></li>
                            <li><a href="{{ route('gov.legislative.officials') }}"><i class="fa fa-angle-right"></i> SB Officials</a></li>
                            <li><a href="{{ route('gov.elected.officials') }}"><i class="fa fa-angle-right"></i> Elected Officials</a></li>
                            <li><a href="{{ route('fdp.index') }}"><i class="fa fa-angle-right"></i> FDP Reports</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection