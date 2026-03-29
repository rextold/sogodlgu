@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   ADVISORIES PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.adv-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px; position: relative; overflow: hidden;
}
.adv-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.adv-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.adv-hero .hero-icon  { font-size: 1.8rem; color: rgba(244,197,66,0.5); margin-bottom: 4px; }
.adv-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.adv-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; }
.adv-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.adv-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.adv-breadcrumb a, .adv-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.adv-breadcrumb a:hover { color: #f4c542; }
.adv-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.adv-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.adv-stats { background: linear-gradient(135deg, #ea5211, #c9460e); }
.adv-stats .as-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.adv-stats .as-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 22px; text-align: center; flex: 1; min-width: 130px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.adv-stats .as-item:last-child { border-right: none; }
.adv-stats .as-item .as-icon  { font-size: 1.2rem; color: rgba(255,255,255,0.5); margin-bottom: 3px; }
.adv-stats .as-item .as-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.adv-stats .as-item .as-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrap ---- */
.adv-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Header ---- */
.adv-section-head {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 18px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.adv-section-head .ash-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
    background: linear-gradient(135deg, #ea5211, #c9460e);
}
.adv-section-head h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.adv-section-head p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Search Bar ---- */
.adv-search-bar {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 16px;
    padding: 14px 16px;
    display: flex; align-items: center; gap: 10px;
}
.adv-search-bar .asb-icon { color: #ea5211; font-size: 1rem; flex-shrink: 0; }
.adv-search-bar input {
    flex: 1; border: 1.5px solid #e0e7f0; border-radius: 8px;
    padding: 8px 14px; font-size: 0.88rem; outline: none;
    transition: border-color 0.2s, box-shadow 0.2s; font-family: inherit;
}
.adv-search-bar input:focus {
    border-color: #ea5211; box-shadow: 0 0 0 3px rgba(234,82,17,0.12);
}
.adv-search-bar .asb-count { font-size: 0.75rem; color: #888; white-space: nowrap; flex-shrink: 0; }

/* ---- Advisory Cards ---- */
.adv-list-card {
    display: flex; flex-direction: column; gap: 0;
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
}
.adv-list-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 13px 20px; color: #fff; font-weight: 700; font-size: 0.92rem;
    border-bottom: 3px solid #ea5211;
    display: flex; align-items: center; justify-content: space-between;
}
.adv-list-header .alh-count {
    background: #ea5211; color: #fff;
    font-size: 0.72rem; font-weight: 700; padding: 3px 10px; border-radius: 20px;
}
.adv-item {
    display: flex; align-items: flex-start; gap: 14px;
    padding: 16px 18px; border-bottom: 1px solid #f0f4fb;
    transition: background 0.2s;
}
.adv-item:last-child { border-bottom: none; }
.adv-item:hover { background: #f5f8ff; }
.adv-thumb {
    width: 80px; height: 72px; border-radius: 8px; flex-shrink: 0;
    overflow: hidden; background: #e9eef6;
}
.adv-thumb img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.3s;
}
.adv-item:hover .adv-thumb img { transform: scale(1.06); }
.adv-thumb-placeholder {
    width: 80px; height: 72px; border-radius: 8px; flex-shrink: 0;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1.4rem;
}
.adv-body { flex: 1; min-width: 0; }
.adv-tag {
    display: inline-block; background: rgba(234,82,17,0.1); color: #ea5211;
    font-size: 0.65rem; font-weight: 700; padding: 2px 8px; border-radius: 12px;
    text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px;
}
.adv-title {
    font-size: 0.92rem; font-weight: 700; color: #001f2d; line-height: 1.4;
    margin-bottom: 5px; white-space: normal;
}
.adv-item:hover .adv-title { color: #0052a5; }
.adv-excerpt {
    font-size: 0.78rem; color: #666; line-height: 1.5; margin-bottom: 8px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.adv-meta {
    display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
}
.adv-meta span { font-size: 0.72rem; color: #999; }
.adv-meta i { color: #ea5211; margin-right: 3px; }
.adv-read-more {
    display: inline-block; margin-top: 8px;
    font-size: 0.75rem; font-weight: 700; color: #ea5211;
    text-decoration: none; transition: color 0.2s;
}
.adv-read-more:hover { color: #c9460e; text-decoration: none; }
.adv-read-more i { font-size: 0.68rem; margin-left: 3px; }

/* No results */
.adv-no-results {
    padding: 36px 20px; text-align: center; color: #aaa; display: none;
}
.adv-no-results i { font-size: 2rem; display: block; margin-bottom: 8px; }
.adv-empty { padding: 40px 20px; text-align: center; color: #aaa; }
.adv-empty i { font-size: 2.5rem; display: block; margin-bottom: 10px; }

/* ---- Pagination ---- */
.adv-pagination { padding: 16px 18px; border-top: 1px solid #f0f4fb; }
.adv-pagination .pagination { margin: 0; }
.adv-pagination .page-item .page-link {
    color: #0052a5; border-color: #e0e7f0; font-size: 0.82rem;
    padding: 5px 11px;
}
.adv-pagination .page-item.active .page-link {
    background: #ea5211; border-color: #ea5211; color: #fff;
}
.adv-pagination .page-item .page-link:hover { background: #edf3fb; color: #ea5211; }

/* ---- Sidebar ---- */
.adv-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.adv-side-card .asc-header {
    padding: 11px 16px; color: #fff; font-weight: 700; font-size: 0.88rem;
    display: flex; align-items: center; gap: 8px;
}
.adv-side-card .asc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.adv-side-card .asc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.adv-side-card .asc-body { padding: 12px 14px; }
.adv-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.adv-nav-list li a {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: background 0.2s, color 0.2s;
}
.adv-nav-list li a:hover { background: #edf3fb; color: #0052a5; }
.adv-nav-list li a i { color: #0052a5; flex-shrink: 0; }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .adv-hero h1 { font-size: 1.4rem; }
    .adv-stats .as-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .adv-stats .as-item:nth-child(even) { border-right: none; }
    .adv-thumb, .adv-thumb-placeholder { width: 60px; height: 60px; }
}
@media (max-width: 480px) { .adv-hero h1 { font-size: 1.1rem; } }
</style>

{{-- ===== HERO ===== --}}
<div class="adv-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-bullhorn"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Advisories</h1>
        <div class="hero-sub">Official advisories and public notices from the Municipal Government of Sogod, Southern Leyte.</div>
        <div class="adv-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="current">Advisories</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="adv-stats">
    <div class="container">
        <div class="as-inner">
            <div class="as-item">
                <div class="as-icon"><i class="fa fa-bullhorn"></i></div>
                <div class="as-value">{{ $advisories->total() }}</div>
                <div class="as-label">Total Advisories</div>
            </div>
            <div class="as-item">
                <div class="as-icon"><i class="fa fa-file-text-o"></i></div>
                <div class="as-value" id="advStatCount">{{ $advisories->count() }}</div>
                <div class="as-label">Showing</div>
            </div>
            <div class="as-item">
                <div class="as-icon"><i class="fa fa-files-o"></i></div>
                <div class="as-value">{{ $advisories->lastPage() }}</div>
                <div class="as-label">Total Pages</div>
            </div>
            <div class="as-item">
                <div class="as-icon"><i class="fa fa-bookmark-o"></i></div>
                <div class="as-value">{{ $advisories->currentPage() }}</div>
                <div class="as-label">Current Page</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="adv-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== ADVISORY LIST ===== --}}
            <div class="col-lg-8 col-md-8 mb-4" data-aos="fade-up">
                <div class="adv-section-head">
                    <div class="ash-icon"><i class="fa fa-bullhorn"></i></div>
                    <div>
                        <h2>Public Advisories</h2>
                        <p>{{ $advisories->total() }} advisory/advisories issued</p>
                    </div>
                </div>

                {{-- Search --}}
                <div class="adv-search-bar">
                    <i class="fa fa-search asb-icon"></i>
                    <input type="text" id="advSearchInput"
                           placeholder="Search advisories by title..."
                           oninput="filterAdvisories(this.value)">
                    <span class="asb-count" id="advSearchCount">{{ $advisories->count() }} results</span>
                </div>

                {{-- List --}}
                <div class="adv-list-card">
                    <div class="adv-list-header">
                        <span><i class="fa fa-list"></i> &nbsp;Advisory Directory</span>
                        <span class="alh-count" id="advListCount">{{ $advisories->count() }} records</span>
                    </div>

                    @forelse($advisories as $advisory)
                        <div class="adv-item" data-title="{{ strtolower($advisory->title) }}">
                            @if($advisory->photo)
                                <div class="adv-thumb">
                                    <img src="/images/advisory/{{ $advisory->photo }}"
                                         alt="{{ $advisory->title }}"
                                         onerror="this.parentElement.outerHTML='<div class=adv-thumb-placeholder><i class=fa fa-bullhorn></i></div>'">
                                </div>
                            @else
                                <div class="adv-thumb-placeholder">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                            @endif
                            <div class="adv-body">
                                <span class="adv-tag"><i class="fa fa-bullhorn"></i> Advisory</span>
                                <div class="adv-title">{{ $advisory->title }}</div>
                                @if(!empty($advisory->descriptions))
                                    <div class="adv-excerpt">{{ $advisory->descriptions }}</div>
                                @endif
                                <div class="adv-meta">
                                    <span><i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($advisory->created_at)) }}</span>
                                    <span><i class="fa fa-eye"></i> {{ number_format($advisory->hits ?? 0) }} views</span>
                                </div>
                                <a href="{{ url('advisory', [$advisory->id, $advisory->title]) }}" class="adv-read-more">
                                    View Details <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="adv-empty">
                            <i class="fa fa-folder-open-o"></i>
                            No advisories available at this time.
                        </div>
                    @endforelse

                    <div class="adv-no-results" id="advNoResults">
                        <i class="fa fa-search"></i>
                        No advisories match your search.
                    </div>

                    @if($advisories->hasPages())
                        <div class="adv-pagination">
                            {{ $advisories->links() }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-lg-4 col-md-4">

                @include('frontend.widgets._transseal')

                {{-- Quick Links --}}
                <div class="adv-side-card">
                    <div class="asc-header blue">
                        <i class="fa fa-link"></i> Quick Links
                    </div>
                    <div class="asc-body">
                        <ul class="adv-nav-list">
                            <li><a href="{{ route('home') }}"><i class="fa fa-angle-right"></i> Home</a></li>
                            <li><a href="{{ route('news') }}"><i class="fa fa-angle-right"></i> News</a></li>
                            <li><a href="{{ route('events') }}"><i class="fa fa-angle-right"></i> Events</a></li>
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

<script>
function filterAdvisories(query) {
    var q = query.toLowerCase().trim();
    var items = document.querySelectorAll('.adv-item');
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
    var countEl  = document.getElementById('advListCount');
    var countEl2 = document.getElementById('advSearchCount');
    var noRes    = document.getElementById('advNoResults');
    if (countEl)  countEl.textContent  = visible + ' records';
    if (countEl2) countEl2.textContent = visible + ' results';
    if (noRes)    noRes.style.display  = (visible === 0 && q) ? 'block' : 'none';
}
</script>
@endsection