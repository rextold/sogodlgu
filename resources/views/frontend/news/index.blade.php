@extends('layouts.home')
@section('content')

<style>
/* ============================================================
   NEWS & UPDATES PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.news-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px; position: relative; overflow: hidden;
}
.news-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.news-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.news-hero .hero-icon  { font-size: 1.8rem; color: rgba(244,197,66,0.5); margin-bottom: 4px; }
.news-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.news-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; }
.news-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.news-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.news-breadcrumb a, .news-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.news-breadcrumb a:hover { color: #f4c542; }
.news-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.news-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.news-stats { background: linear-gradient(135deg, #ea5211, #c9460e); }
.news-stats .ns-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.news-stats .ns-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 22px; text-align: center; flex: 1; min-width: 130px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.news-stats .ns-item:last-child { border-right: none; }
.news-stats .ns-item .ns-icon  { font-size: 1.2rem; color: rgba(255,255,255,0.5); margin-bottom: 3px; }
.news-stats .ns-item .ns-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.news-stats .ns-item .ns-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrap ---- */
.news-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Head ---- */
.news-section-head {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 18px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.news-section-head .nsh-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
}
.news-section-head .nsh-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.news-section-head .nsh-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.news-section-head h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.news-section-head p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Featured Card (overlay style) ---- */
.feat-card {
    border-radius: 14px; overflow: hidden;
    box-shadow: 0 6px 24px rgba(0,0,0,0.14);
    position: relative; display: block; text-decoration: none;
    transition: transform 0.25s, box-shadow 0.25s;
}
.feat-card:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(0,0,0,0.18); text-decoration: none; }
.feat-card .fc-img {
    height: 340px; width: 100%;
    background-size: cover; background-position: center;
    position: relative;
}
.feat-card .fc-overlay {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: linear-gradient(to top, rgba(0,10,30,0.92) 0%, rgba(0,10,30,0.55) 60%, transparent 100%);
    padding: 28px 22px 22px;
}
.feat-card .fc-badge {
    display: inline-block; background: #ea5211; color: #fff;
    font-size: 0.68rem; font-weight: 700; padding: 3px 11px;
    border-radius: 20px; text-transform: uppercase; letter-spacing: 0.5px;
    margin-bottom: 8px;
}
.feat-card .fc-title {
    font-size: 1.2rem; font-weight: 800; color: #fff;
    line-height: 1.4; margin-bottom: 8px;
}
.feat-card .fc-meta {
    font-size: 0.75rem; color: rgba(255,255,255,0.72); margin-bottom: 12px;
}
.feat-card .fc-meta i { color: #f4c542; margin-right: 3px; }
.feat-card .fc-excerpt {
    font-size: 0.82rem; color: rgba(255,255,255,0.82); line-height: 1.55;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 14px;
}
.fc-readmore {
    display: inline-flex; align-items: center; gap: 6px;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; font-size: 0.78rem; font-weight: 700;
    padding: 7px 18px; border-radius: 20px; text-decoration: none;
    transition: opacity 0.2s;
}
.fc-readmore:hover { opacity: 0.88; color: #fff; text-decoration: none; }

/* ---- News Cards Grid (2-col inside main col) ---- */
.news-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-top: 24px;
}
.ngrid-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    display: flex; flex-direction: column;
    transition: transform 0.22s, box-shadow 0.22s;
}
.ngrid-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.13); }
.ngrid-card .ngc-img-wrap {
    position: relative; height: 155px; overflow: hidden;
    background: #e5eaf2;
}
.ngrid-card .ngc-img-wrap .ngc-bg {
    width: 100%; height: 100%;
    background-size: cover; background-position: center;
    transition: transform 0.35s;
}
.ngrid-card:hover .ngc-img-wrap .ngc-bg { transform: scale(1.07); }
.ngrid-card .ngc-cat {
    position: absolute; top: 9px; left: 9px;
    background: #0052a5; color: #fff;
    font-size: 0.6rem; font-weight: 700; padding: 2px 9px;
    border-radius: 20px; text-transform: uppercase; letter-spacing: 0.4px;
}
.ngrid-card .ngc-date-badge {
    position: absolute; bottom: 8px; right: 9px;
    background: rgba(0,0,0,0.5); color: #fff;
    font-size: 0.63rem; padding: 2px 7px; border-radius: 8px;
    backdrop-filter: blur(3px);
}
.ngrid-card .ngc-body {
    padding: 13px 14px; flex: 1; display: flex; flex-direction: column;
}
.ngrid-card .ngc-title {
    font-size: 0.88rem; font-weight: 700; color: #001f2d; line-height: 1.4;
    margin-bottom: 6px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.ngrid-card:hover .ngc-title { color: #0052a5; }
.ngrid-card .ngc-excerpt {
    font-size: 0.76rem; color: #666; line-height: 1.5; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 10px;
}
.ngrid-card .ngc-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding-top: 9px; border-top: 1px solid #f0f4fb;
}
.ngrid-card .ngc-author { font-size: 0.7rem; color: #aaa; }
.ngrid-card .ngc-author i { color: #0052a5; margin-right: 3px; }
.ngrid-card .ngc-readmore {
    display: inline-flex; align-items: center; gap: 4px;
    background: #0052a5; color: #fff; font-size: 0.68rem; font-weight: 700;
    padding: 4px 11px; border-radius: 16px; text-decoration: none;
    transition: background 0.2s;
}
.ngrid-card .ngc-readmore:hover { background: #ea5211; color: #fff; text-decoration: none; }

/* ---- Sidebar ---- */
.news-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.news-side-card .nsc-header {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.news-side-card .nsc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); border-bottom: 3px solid #f4c542; }
.news-side-card .nsc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); border-bottom: 3px solid #f4c542; }
.news-side-card .nsc-body { padding: 14px; }

/* Quick nav */
.news-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.news-nav-list li a {
    display: flex; align-items: center; gap: 8px; font-size: 0.8rem;
    color: #444; text-decoration: none; padding: 8px 10px; border-radius: 8px;
    background: #f8f9fc; border-left: 3px solid #0052a5;
    transition: background 0.2s, color 0.2s;
}
.news-nav-list li a:hover { background: #edf3fb; color: #0052a5; }
.news-nav-list li a i { color: #0052a5; flex-shrink: 0; }

/* ---- Filter / Search bar ---- */
.news-filter-bar {
    display: flex; align-items: center; gap: 10px;
    background: #fff; border-radius: 10px;
    padding: 8px 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 16px;
}
.news-filter-bar .nfb-icon { color: #0052a5; font-size: 1rem; flex-shrink: 0; }
.news-filter-bar input {
    border: none; outline: none; flex: 1;
    font-size: 0.88rem; color: #001f2d; background: transparent;
}
.news-filter-bar input::placeholder { color: #bbb; }
.news-filter-bar .nfb-count {
    font-size: 0.72rem; font-weight: 700; color: #fff;
    background: #0052a5; padding: 2px 10px; border-radius: 20px;
    white-space: nowrap;
}
.news-no-results {
    display: none; text-align: center; padding: 32px 0;
    color: #aaa; font-size: 0.88rem;
}
.news-no-results i { font-size: 2rem; display: block; margin-bottom: 8px; color: #ddd; }

/* ---- Responsive ---- */
@media (max-width: 991px) {
    .news-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 767px) {
    .news-hero h1 { font-size: 1.4rem; }
    .news-stats .ns-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .news-stats .ns-item:nth-child(even) { border-right: none; }
    .feat-card .fc-img { height: 240px; }
    .news-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
}
@media (max-width: 480px) {
    .news-hero h1 { font-size: 1.1rem; }
    .news-grid { grid-template-columns: 1fr; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="news-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-newspaper-o"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>News &amp; Updates</h1>
        <div class="hero-sub">Stay informed with the latest news, events, and announcements from Sogod LGU.</div>
        <div class="news-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="current">News &amp; Updates</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="news-stats">
    <div class="container">
        <div class="ns-inner">
            <div class="ns-item">
                <div class="ns-icon"><i class="fa fa-newspaper-o"></i></div>
                <div class="ns-value">{{ $news->count() }}</div>
                <div class="ns-label">Total Articles</div>
            </div>
            <div class="ns-item">
                <div class="ns-icon"><i class="fa fa-star"></i></div>
                <div class="ns-value">1</div>
                <div class="ns-label">Featured Story</div>
            </div>
            <div class="ns-item">
                <div class="ns-icon"><i class="fa fa-calendar"></i></div>
                <div class="ns-value">{{ date('Y') }}</div>
                <div class="ns-label">Current Year</div>
            </div>
            <div class="ns-item">
                <div class="ns-icon"><i class="fa fa-th-large"></i></div>
                <div class="ns-value">{{ $news->pluck('category_id')->unique()->count() }}</div>
                <div class="ns-label">Categories</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="news-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== LEFT COLUMN: Featured + Grid ===== --}}
            <div class="col-lg-8 mb-4">

                {{-- Featured Story --}}
                <div class="news-section-head" data-aos="fade-up">
                    <div class="nsh-icon orange"><i class="fa fa-star"></i></div>
                    <div>
                        <h2>Featured Story</h2>
                        <p>Latest headline from Sogod</p>
                    </div>
                </div>

                @if($feat)
                <a class="feat-card" href="{{ route('article.show',['id'=>$feat->id,'category'=>strtolower($feat->category->name),'title'=>$feat->slug]) }}" data-aos="fade-up">
                    <div class="fc-img" style="background-image: url('{{ Voyager::image($feat->image) }}');">
                        <div class="fc-overlay">
                            <span class="fc-badge"><i class="fa fa-bookmark"></i> {{ $feat->category->name }}</span>
                            <div class="fc-title">{{ $feat->title }}</div>
                            <div class="fc-meta">
                                <i class="fa fa-user"></i> {{ optional($feat->author)->name ?? 'Staff' }}
                                &nbsp;&bull;&nbsp;
                                <i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($feat->created_at)) }}
                            </div>
                            @if($feat->excerpt)
                                <div class="fc-excerpt">{!! strip_tags($feat->excerpt) !!}</div>
                            @endif
                            <span class="fc-readmore">Read full story <i class="fa fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
                @endif

                {{-- All News Grid --}}
                <div class="news-section-head" style="margin-top:28px;" data-aos="fade-up">
                    <div class="nsh-icon blue"><i class="fa fa-th-large"></i></div>
                    <div>
                        <h2>All News</h2>
                        <p>Browse all stories and announcements</p>
                    </div>
                </div>

                <div class="news-filter-bar" data-aos="fade-up">
                    <span class="nfb-icon"><i class="fa fa-search"></i></span>
                    <input type="text" id="newsSearchInput" placeholder="Search news by title..." oninput="filterNews()">
                    <span class="nfb-count" id="newsCount">{{ $news->filter(function($a){ return $a->category && $a->category->order != 2; })->count() }} articles</span>
                </div>

                <div class="news-grid" id="newsGrid">
                    @foreach($news as $idx => $article)
                        @if($article->category && $article->category->order != 2)
                            <div class="ngrid-card" data-aos="fade-up" data-aos-delay="{{ min(($idx % 2) * 80, 160) }}" data-title="{{ strtolower($article->title) }}">
                                <div class="ngc-img-wrap">
                                    <div class="ngc-bg" style="background-image: url('{{ Voyager::image($article->image) }}');"></div>
                                    <span class="ngc-cat">{{ $article->category->name }}</span>
                                    <span class="ngc-date-badge"><i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($article->created_at)) }}</span>
                                </div>
                                <div class="ngc-body">
                                    <div class="ngc-title">{{ $article->title }}</div>
                                    @if($article->excerpt)
                                        <div class="ngc-excerpt">{!! strip_tags($article->excerpt) !!}</div>
                                    @endif
                                    <div class="ngc-footer">
                                        <span class="ngc-author"><i class="fa fa-user"></i> {{ optional($article->author)->name ?? 'Staff' }}</span>
                                        <a href="{{ route('article.show',['id'=>$article->id,'category'=>strtolower($article->category->name),'title'=>$article->slug]) }}"
                                           class="ngc-readmore">Read <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="news-no-results" id="newsNoResults">
                    <i class="fa fa-search"></i>
                    No articles match your search.
                </div>

            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-lg-4" data-aos="fade-left">

                @include('frontend.widgets._transseal')

                <div class="news-side-card">
                    <div class="nsc-header blue"><i class="fa fa-cloud"></i> &nbsp;Weather Updates</div>
                    <div class="nsc-body">
                        @include('frontend.advisory._weather')
                    </div>
                </div>

                <div class="news-side-card">
                    <div class="nsc-header orange"><i class="fa fa-bullhorn"></i> &nbsp;Latest Advisories</div>
                    <div class="nsc-body">
                        @include('frontend.home._featureAdvisories')
                    </div>
                </div>

                <div class="news-side-card">
                    <div class="nsc-header blue"><i class="fa fa-link"></i> &nbsp;Quick Links</div>
                    <div class="nsc-body">
                        <ul class="news-nav-list">
                            <li><a href="{{ route('home') }}"><i class="fa fa-angle-right"></i> Home</a></li>
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

@push('scripts')
<script>
function filterNews() {
    var query = document.getElementById('newsSearchInput').value.toLowerCase().trim();
    var cards  = document.querySelectorAll('#newsGrid .ngrid-card');
    var count  = 0;

    cards.forEach(function(card) {
        var title = (card.getAttribute('data-title') || '').toLowerCase();
        var show  = !query || title.indexOf(query) !== -1;
        card.style.display = show ? '' : 'none';
        if (show) count++;
    });

    document.getElementById('newsCount').textContent = count + (count === 1 ? ' article' : ' articles');
    document.getElementById('newsNoResults').style.display = (count === 0) ? 'block' : 'none';
}
</script>
@endpush

@endsection