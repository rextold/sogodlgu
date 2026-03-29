@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   RESOLUTIONS PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.res-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px; position: relative; overflow: hidden;
}
.res-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.res-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.res-hero .hero-icon  { font-size: 1.8rem; color: rgba(244,197,66,0.5); margin-bottom: 4px; }
.res-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.res-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; }
.res-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.res-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.res-breadcrumb a, .res-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.res-breadcrumb a:hover { color: #f4c542; }
.res-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.res-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.res-stats { background: linear-gradient(135deg, #ea5211, #c9460e); }
.res-stats .rs-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.res-stats .rs-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 22px; text-align: center; flex: 1; min-width: 130px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.res-stats .rs-item:last-child { border-right: none; }
.res-stats .rs-item .rs-icon  { font-size: 1.2rem; color: rgba(255,255,255,0.5); margin-bottom: 3px; }
.res-stats .rs-item .rs-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.res-stats .rs-item .rs-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrap ---- */
.res-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Header ---- */
.res-section-head {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 18px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.res-section-head .rsh-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
}
.res-section-head .rsh-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.res-section-head .rsh-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.res-section-head h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.res-section-head p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Archive Sidebar ---- */
.res-archive-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.res-archive-card .rac-header {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    padding: 11px 16px; color: #fff; font-weight: 700; font-size: 0.88rem;
    border-bottom: 3px solid #f4c542;
    display: flex; align-items: center; gap: 8px;
}
.res-archive-card .rac-body { padding: 6px 0; }
.res-archive-link {
    display: flex; justify-content: space-between; align-items: center;
    padding: 8px 16px; font-size: 0.82rem; color: #444; text-decoration: none;
    border-bottom: 1px solid #f5f5f5; transition: background 0.15s, color 0.15s;
}
.res-archive-link:hover { background: #edf3fb; color: #0052a5; text-decoration: none; }
.res-archive-link.active { background: #edf3fb; color: #0052a5; font-weight: 700; border-left: 3px solid #0052a5; }
.res-archive-link .rac-badge {
    background: #0052a5; color: #fff;
    font-size: 0.68rem; font-weight: 700; padding: 2px 7px; border-radius: 10px;
    flex-shrink: 0;
}
.res-archive-link:hover .rac-badge { background: #ea5211; }

/* ---- Resolution List ---- */
.res-list-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
}
.res-list-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 13px 20px; color: #fff; font-weight: 700; font-size: 0.92rem;
    border-bottom: 3px solid #ea5211;
    display: flex; align-items: center; justify-content: space-between;
}
.res-list-header .rlh-count {
    background: #ea5211; color: #fff;
    font-size: 0.72rem; font-weight: 700; padding: 3px 10px; border-radius: 20px;
}
.res-item {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 18px; border-bottom: 1px solid #f0f4fb;
    text-decoration: none; color: inherit;
    transition: background 0.2s;
}
.res-item:last-child { border-bottom: none; }
.res-item:hover { background: #f5f8ff; text-decoration: none; }
.res-item .ri-icon {
    width: 42px; height: 42px; border-radius: 10px; flex-shrink: 0;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1.1rem;
    transition: background 0.2s;
}
.res-item:hover .ri-icon { background: linear-gradient(135deg, #0052a5, #003d7a); }
.res-item .ri-body { flex: 1; min-width: 0; }
.res-item .ri-title {
    font-size: 0.9rem; font-weight: 700; color: #001f2d; line-height: 1.4;
    margin-bottom: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.res-item:hover .ri-title { color: #0052a5; }
.res-item .ri-date { font-size: 0.74rem; color: #888; }
.res-item .ri-date i { color: #ea5211; margin-right: 4px; }
.res-item .ri-views { font-size: 0.72rem; color: #aaa; white-space: nowrap; flex-shrink: 0; }
.res-item .ri-views i { color: #0052a5; margin-right: 3px; }

/* Empty state */
.res-empty { padding: 40px 20px; text-align: center; color: #aaa; }
.res-empty i { font-size: 2.5rem; margin-bottom: 10px; display: block; }

/* ---- Sidebar cards ---- */
.res-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.res-side-card .rsc-header {
    padding: 11px 16px; color: #fff; font-weight: 700; font-size: 0.88rem;
    display: flex; align-items: center; gap: 8px;
}
.res-side-card .rsc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.res-side-card .rsc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.res-side-card .rsc-body { padding: 12px 14px; }
.res-mvc-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.res-mvc-list li a {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #ea5211; transition: background 0.2s, color 0.2s;
    line-height: 1.4;
}
.res-mvc-list li a:hover { background: #fff4ef; color: #ea5211; }
.res-mvc-list li a i { color: #ea5211; margin-top: 2px; flex-shrink: 0; }
.res-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.res-nav-list li a {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: background 0.2s, color 0.2s;
}
.res-nav-list li a:hover { background: #edf3fb; color: #0052a5; }
.res-nav-list li a i { color: #0052a5; flex-shrink: 0; }

/* ---- Search Bar ---- */
.res-search-bar {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 16px;
    padding: 14px 16px;
    display: flex; align-items: center; gap: 10px;
}
.res-search-bar .rsb-icon {
    color: #ea5211; font-size: 1rem; flex-shrink: 0;
}
.res-search-bar input {
    flex: 1; border: 1.5px solid #e0e7f0; border-radius: 8px;
    padding: 8px 14px; font-size: 0.88rem; outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
}
.res-search-bar input:focus {
    border-color: #ea5211;
    box-shadow: 0 0 0 3px rgba(234,82,17,0.12);
}
.res-search-bar .rsb-count {
    font-size: 0.75rem; color: #888; white-space: nowrap; flex-shrink: 0;
}
.res-no-results {
    padding: 36px 20px; text-align: center; color: #aaa; display: none;
}
.res-no-results i { font-size: 2rem; display: block; margin-bottom: 8px; }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .res-hero h1 { font-size: 1.4rem; }
    .res-stats .rs-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .res-stats .rs-item:nth-child(even) { border-right: none; }
    .res-item .ri-title { white-space: normal; }
}
@media (max-width: 480px) { .res-hero h1 { font-size: 1.1rem; } }
</style>

{{-- ===== HERO ===== --}}
<div class="res-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-file-text-o"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Resolutions</h1>
        <div class="hero-sub">Official resolutions passed by the Sangguniang Bayan of Sogod, Southern Leyte.</div>
        <div class="res-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="#">Government</a>
            <span class="sep">/</span>
            <a href="#">Legislative</a>
            <span class="sep">/</span>
            <span class="current">Resolutions</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="res-stats">
    <div class="container-fluid">
        <div class="rs-inner">
            <div class="rs-item">
                <div class="rs-icon"><i class="fa fa-file-text-o"></i></div>
                <div class="rs-value">{{ App\Resolution::count() }}</div>
                <div class="rs-label">Total Resolutions</div>
            </div>
            <div class="rs-item">
                <div class="rs-icon"><i class="fa fa-calendar"></i></div>
                <div class="rs-value">{{ $by_date->count() }}</div>
                <div class="rs-label">Archive Months</div>
            </div>
            <div class="rs-item">
                <div class="rs-icon"><i class="fa fa-eye"></i></div>
                <div class="rs-value">{{ number_format(App\Resolution::sum('views')) }}</div>
                <div class="rs-label">Total Views</div>
            </div>
            <div class="rs-item">
                <div class="rs-icon"><i class="fa fa-filter"></i></div>
                <div class="rs-value">{{ $resolutions->count() }}</div>
                <div class="rs-label">Showing</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="res-wrap">
    <div class="container-fluid" style="padding-left:20px;padding-right:20px;">
        <div class="row">

            {{-- ===== ARCHIVE SIDEBAR LEFT ===== --}}
            <div class="col-lg-2 col-md-3 mb-4" data-aos="fade-right">
                <div class="res-archive-card">
                    <div class="rac-header">
                        <i class="fa fa-calendar"></i> Archives
                    </div>
                    <div class="rac-body">
                        <a class="res-archive-link {{ request()->route()->getName() === 'gov.legislative.resolutions' ? 'active' : '' }}"
                           href="{{ route('gov.legislative.resolutions') }}">
                            All Records
                            <span class="rac-badge">{{ App\Resolution::count() }}</span>
                        </a>
                        @foreach($by_date as $date => $lists)
                            <a class="res-archive-link"
                               href="{{ route('gov.legislative.getresolutions', ['month' => date('F', strtotime($date)), 'year' => date('Y', strtotime($date))]) }}">
                                {{ $date }}
                                <span class="rac-badge">{{ count($lists) }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ===== RESOLUTION LIST ===== --}}
            <div class="col-lg-7 col-md-6 mb-4" data-aos="fade-up">
                <div class="res-section-head">
                    <div class="rsh-icon orange"><i class="fa fa-file-text-o"></i></div>
                    <div>
                        <h2>{{ $pageHeading }}</h2>
                        <p>{{ $resolutions->count() }} resolution(s) found</p>
                    </div>
                </div>

                <div class="res-search-bar">
                    <i class="fa fa-search rsb-icon"></i>
                    <input type="text" id="resSearchInput"
                           placeholder="Search resolutions by title..."
                           oninput="filterResolutions(this.value)">
                    <span class="rsb-count" id="resSearchCount">{{ $resolutions->count() }} results</span>
                </div>

                <div class="res-list-card">
                    <div class="res-list-header">
                        <span><i class="fa fa-list"></i> &nbsp;Resolution Directory</span>
                        <span class="rlh-count" id="resListCount">{{ $resolutions->count() }} records</span>
                    </div>

                    @forelse($resolutions as $resolution)
                        <a class="res-item"
                           data-title="{{ strtolower($resolution->title) }}"
                           href="{{ route('gov.legislative.show_resolution', ['id' => $resolution->id, 'title' => $resolution->title]) }}">
                            <div class="ri-icon"><i class="fa fa-file-text-o"></i></div>
                            <div class="ri-body">
                                <div class="ri-title">{{ $resolution->title }}</div>
                                <div class="ri-date">
                                    <i class="fa fa-calendar"></i>
                                    {{ $resolution->date ? date('F d, Y', strtotime($resolution->date)) : 'No date' }}
                                </div>
                            </div>
                            <div class="ri-views">
                                <i class="fa fa-eye"></i> {{ number_format($resolution->views ?? 0) }}
                            </div>
                        </a>
                    @empty
                        <div class="res-empty">
                            <i class="fa fa-folder-open-o"></i>
                            No resolutions found for this period.
                        </div>
                    @endforelse
                    <div class="res-no-results" id="resNoResults">
                        <i class="fa fa-search"></i>
                        No resolutions match your search.
                    </div>
                </div>
            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-lg-3 col-md-3">

                @include('frontend.widgets._transseal')

                {{-- Most Viewed --}}
                @if($MVresolutions = App\Resolution::mostviewed())
                <div class="res-side-card mt-3" data-aos="fade-left">
                    <div class="rsc-header orange"><i class="fa fa-fire"></i> Most Viewed</div>
                    <div class="rsc-body">
                        <ul class="res-mvc-list">
                            @foreach($MVresolutions as $MVresolution)
                            <li>
                                <a href="{{ route('gov.legislative.show_resolution', ['id' => $MVresolution->id, 'title' => $MVresolution->title]) }}">
                                    <i class="fa fa-angle-right"></i>
                                    {!! $MVresolution->title !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Related Links --}}
                <div class="res-side-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="rsc-header blue"><i class="fa fa-compass"></i> Legislative</div>
                    <div class="rsc-body">
                        <ul class="res-nav-list">
                            <li><a href="{{ route('gov.legislative.ordinances') }}"><i class="fa fa-angle-right"></i> Ordinances</a></li>
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
<script>
function filterResolutions(query) {
    var q = query.toLowerCase().trim();
    var items = document.querySelectorAll('.res-item');
    var visible = 0;
    items.forEach(function(item) {
        var title = item.getAttribute('data-title') || '';
        if (!q || title.indexOf(q) !== -1) {
            item.style.display = '';
            visible++;
        } else {
            item.style.display = 'none';
        }
    });
    var countEl = document.getElementById('resListCount');
    var countEl2 = document.getElementById('resSearchCount');
    var noRes = document.getElementById('resNoResults');
    if (countEl) countEl.textContent = visible + ' records';
    if (countEl2) countEl2.textContent = visible + ' results';
    if (noRes) noRes.style.display = (visible === 0 && q) ? 'block' : 'none';
}
</script>
@endsection