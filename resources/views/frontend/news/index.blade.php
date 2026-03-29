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
    padding: 40px 0 32px;
    position: relative;
    overflow: hidden;
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
.news-hero .hero-icon  { font-size: 2.8rem; color: rgba(244,197,66,0.5); margin-bottom: 10px; }
.news-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.news-hero h1 { font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.news-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.news-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.news-breadcrumb a, .news-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.news-breadcrumb a:hover { color: #f4c542; }
.news-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.news-breadcrumb .current { color: #f4c542; font-weight: 600; }

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

/* ---- Featured Card ---- */
.feat-card {
    background: #fff; border-radius: 14px; overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.25s, box-shadow 0.25s;
}
.feat-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(0,0,0,0.14); }
.feat-card .fc-img {
    height: 280px; width: 100%;
    background-size: cover; background-position: center;
    position: relative;
}
.feat-card .fc-img .fc-badge {
    position: absolute; top: 14px; left: 14px;
    background: #ea5211; color: #fff;
    font-size: 0.72rem; font-weight: 700; letter-spacing: 0.5px;
    padding: 4px 12px; border-radius: 20px; text-transform: uppercase;
}
.feat-card .fc-body { padding: 20px; }
.feat-card .fc-title {
    font-size: 1.25rem; font-weight: 800; color: #001f2d;
    line-height: 1.4; margin-bottom: 8px;
}
.feat-card .fc-title a { color: inherit; text-decoration: none; }
.feat-card .fc-title a:hover { color: #0052a5; }
.feat-card .fc-meta { font-size: 0.78rem; color: #888; margin-bottom: 10px; }
.feat-card .fc-excerpt { font-size: 0.9rem; color: #444; line-height: 1.6; }
.fc-readmore {
    display: inline-block; margin-top: 14px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; font-size: 0.82rem; font-weight: 700;
    padding: 8px 20px; border-radius: 8px; text-decoration: none;
    transition: opacity 0.2s;
}
.fc-readmore:hover { opacity: 0.88; color: #fff; text-decoration: none; }

/* ---- Sidebar ---- */
.news-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 20px;
}
.news-side-card .nsc-header {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.news-side-card .nsc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.news-side-card .nsc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.news-side-card .nsc-body { padding: 14px; }

/* ---- News Grid ---- */
.news-grid-wrap { background: #fff; padding: 32px 0 40px; }
.news-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
}
.ngrid-card {
    background: #f8f9fc; border-radius: 12px; overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    transition: transform 0.25s, box-shadow 0.25s;
}
.ngrid-card:hover { transform: translateY(-4px); box-shadow: 0 12px 28px rgba(0,0,0,0.12); }
.ngrid-card .ngc-img {
    height: 160px; width: 100%;
    background-size: cover; background-position: center;
}
.ngrid-card .ngc-body { padding: 12px; }
.ngrid-card .ngc-title {
    font-size: 0.88rem; font-weight: 700; color: #001f2d;
    line-height: 1.4; margin-bottom: 6px;
}
.ngrid-card .ngc-title a { color: inherit; text-decoration: none; }
.ngrid-card .ngc-title a:hover { color: #0052a5; }
.ngrid-card .ngc-meta { font-size: 0.72rem; color: #888; }

/* ---- Responsive ---- */
@media (max-width: 991px) { .news-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 767px) {
    .news-hero h1 { font-size: 1.4rem; }
    .feat-card .fc-img { height: 200px; }
    .news-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
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

{{-- ===== MAIN CONTENT ===== --}}
<div class="news-wrap">
    <div class="container-fluid" style="padding-left:20px;padding-right:20px;">
        <div class="row">

            {{-- ===== FEATURED ===== --}}
            <div class="col-lg-8 mb-4" data-aos="fade-up">
                <div class="news-section-head">
                    <div class="nsh-icon orange"><i class="fa fa-star"></i></div>
                    <div>
                        <h2>Featured Story</h2>
                        <p>Latest headline from Sogod</p>
                    </div>
                </div>
                <div class="feat-card">
                    <div class="fc-img" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.6)), url('{{ Voyager::image($feat->image) }}');">
                        <span class="fc-badge"><i class="fa fa-bookmark"></i> {{ $feat->category->name }}</span>
                    </div>
                    <div class="fc-body">
                        <div class="fc-title">
                            <a href="{{ route('article.show',['id'=>$feat->id,'category'=>strtolower($feat->category->name),'title'=> $feat->slug]) }}">{{ $feat->title }}</a>
                        </div>
                        <div class="fc-meta">
                            <i class="fa fa-user"></i> {{ $feat->author->name }} &nbsp;|&nbsp;
                            <i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($feat->created_at)) }}
                        </div>
                        <div class="fc-excerpt">{!! substr(strip_tags($feat->excerpt), 0, 200) !!}...</div>
                        <a class="fc-readmore" href="{{ route('article.show',['id'=>$feat->id,'category'=>strtolower($feat->category->name),'title'=> $feat->slug]) }}">
                            Read full story &rarr;
                        </a>
                    </div>
                </div>
            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-4" data-aos="fade-left">
                <div class="news-section-head">
                    <div class="nsh-icon blue"><i class="fa fa-info-circle"></i></div>
                    <div>
                        <h2>Updates</h2>
                        <p>Weather &amp; advisories</p>
                    </div>
                </div>

                <div class="news-side-card">
                    <div class="nsc-header blue"><i class="fa fa-cloud"></i> &nbsp;Weather Updates</div>
                    <div class="nsc-body">
                        @include('frontend.advisory._weather')
                    </div>
                </div>

                <div class="news-side-card">
                    <div class="nsc-header orange"><i class="fa fa-bullhorn"></i> &nbsp;Advisories</div>
                    <div class="nsc-body">
                        @include('frontend.home._featureAdvisories')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== NEWS GRID ===== --}}
<div class="news-grid-wrap">
    <div class="container-fluid" style="padding-left:20px;padding-right:20px;">
        <div class="news-section-head" data-aos="fade-up">
            <div class="nsh-icon blue"><i class="fa fa-th-large"></i></div>
            <div>
                <h2>All News</h2>
                <p>Browse all stories and announcements</p>
            </div>
        </div>
        <div class="news-grid">
            @foreach($news as $idx => $article)
                @if($article->category->order != 2)
                    <div class="ngrid-card" data-aos="fade-up" data-aos-delay="{{ min(($idx % 4) * 60, 180) }}">
                        <div class="ngc-img" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.6)), url('{{ Voyager::image($article->image) }}');"></div>
                        <div class="ngc-body">
                            <div class="ngc-title">
                                <a href="{{ route('article.show',['id'=>$article->id,'category'=>strtolower($article->category->name),'title'=> $article->slug]) }}">{{ $article->title }}</a>
                            </div>
                            <div class="ngc-meta">
                                <i class="fa fa-user"></i> {{ $article->author->name }} &nbsp;|&nbsp;
                                <i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($article->created_at)) }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection