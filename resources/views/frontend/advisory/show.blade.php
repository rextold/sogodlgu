@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   ADVISORY DETAIL PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.adv-detail-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px; position: relative; overflow: hidden;
}
.adv-detail-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.adv-detail-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.adv-detail-hero .hero-icon  { font-size: 1.8rem; color: rgba(244,197,66,0.5); margin-bottom: 4px; }
.adv-detail-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.adv-detail-hero h1 { font-size: 1.25rem; font-weight: 900; color: #fff; margin-bottom: 4px; line-height: 1.4; }
.adv-detail-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.adv-detail-breadcrumb a, .adv-detail-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.adv-detail-breadcrumb a:hover { color: #f4c542; }
.adv-detail-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.adv-detail-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Page Wrap ---- */
.adv-detail-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Main Card ---- */
.adv-detail-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.09); margin-bottom: 20px;
}
.adv-detail-card-header {
    background: linear-gradient(135deg, #001f2d, #003d7a 60%, #0052a5);
    border-bottom: 3px solid #ea5211;
    padding: 18px 22px;
}
.adv-detail-card-header .adh-tag {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.65rem; font-weight: 700; padding: 2px 10px; border-radius: 12px;
    text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;
}
.adv-detail-card-header h2 {
    font-size: 1.1rem; font-weight: 800; color: #fff; margin: 0; line-height: 1.5;
}
.adv-detail-meta {
    display: flex; align-items: center; gap: 18px; flex-wrap: wrap;
    padding: 12px 22px; background: #f8f9fc; border-bottom: 1px solid #eaeff8;
}
.adv-detail-meta span { font-size: 0.78rem; color: #777; }
.adv-detail-meta i { color: #ea5211; margin-right: 4px; }

/* ---- Photo ---- */
.adv-detail-photo {
    width: 100%; max-height: 360px; object-fit: cover;
    display: block;
}
.adv-detail-photo-wrap {
    overflow: hidden;
}

/* ---- Body ---- */
.adv-detail-body {
    padding: 24px 22px;
    font-size: 0.92rem; line-height: 1.8; color: #333;
}
.adv-detail-body p:last-child { margin-bottom: 0; }

/* ---- Back Button ---- */
.adv-back-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 18px; border-radius: 8px;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; font-size: 0.82rem; font-weight: 700;
    text-decoration: none; transition: opacity 0.2s;
    margin-bottom: 20px;
}
.adv-back-btn:hover { opacity: 0.88; color: #fff; text-decoration: none; }

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
.adv-side-card .asc-body { padding: 10px 0; }

/* Recent advisories list */
.adv-recent-list { list-style: none; padding: 0; margin: 0; }
.adv-recent-list li a {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 9px 14px; border-bottom: 1px solid #f5f5f5;
    line-height: 1.4; transition: background 0.2s, color 0.2s;
}
.adv-recent-list li:last-child a { border-bottom: none; }
.adv-recent-list li a:hover { background: #fff4ef; color: #ea5211; text-decoration: none; }
.adv-recent-list li a i { color: #ea5211; margin-top: 2px; flex-shrink: 0; }

/* Quick nav */
.adv-nav-list { list-style: none; padding: 8px 10px; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.adv-nav-list li a {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: background 0.2s, color 0.2s;
}
.adv-nav-list li a:hover { background: #edf3fb; color: #0052a5; }
.adv-nav-list li a i { color: #0052a5; flex-shrink: 0; }

@media (max-width: 767px) {
    .adv-detail-hero h1 { font-size: 1.05rem; }
    .adv-detail-body { padding: 16px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="adv-detail-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-bullhorn"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Advisory</div>
        <h1>{{ $advisory->title }}</h1>
        <div class="adv-detail-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('advisories') }}">Advisories</a>
            <span class="sep">/</span>
            <span class="current">{{ Str::limit($advisory->title, 40) }}</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="adv-detail-wrap">
    <div class="container">

        <a href="{{ route('advisories') }}" class="adv-back-btn">
            <i class="fa fa-arrow-left"></i> Back to Advisories
        </a>

        <div class="row">

            {{-- ===== ADVISORY DETAIL ===== --}}
            <div class="col-lg-8 col-md-8 mb-4" data-aos="fade-up">
                <div class="adv-detail-card">

                    {{-- Header --}}
                    <div class="adv-detail-card-header">
                        <div class="adh-tag"><i class="fa fa-bullhorn"></i> Advisory</div>
                        <h2>{{ $advisory->title }}</h2>
                    </div>

                    {{-- Meta --}}
                    <div class="adv-detail-meta">
                        <span><i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($advisory->created_at)) }}</span>
                        <span><i class="fa fa-eye"></i> {{ number_format($advisory->hits ?? 0) }} views</span>
                        @if($advisory->posted)
                            <span><i class="fa fa-user-o"></i> {{ $advisory->posted }}</span>
                        @endif
                    </div>

                    {{-- Photo --}}
                    @if($advisory->photo)
                        <div class="adv-detail-photo-wrap">
                            <img src="/images/advisory/{{ $advisory->photo }}"
                                 alt="{{ $advisory->title }}"
                                 class="adv-detail-photo"
                                 onerror="this.style.display='none'">
                        </div>
                    @endif

                    {{-- Body --}}
                    <div class="adv-detail-body">
                        @if($advisory->descriptions)
                            {!! nl2br(e($advisory->descriptions)) !!}
                        @else
                            <p class="text-muted">No additional details available for this advisory.</p>
                        @endif
                    </div>

                </div>
            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-lg-4 col-md-4">

                @include('frontend.widgets._transseal')

                {{-- Recent Advisories --}}
                @if($recent->count())
                    <div class="adv-side-card">
                        <div class="asc-header orange">
                            <i class="fa fa-bullhorn"></i> Recent Advisories
                        </div>
                        <div class="asc-body">
                            <ul class="adv-recent-list">
                                @foreach($recent as $item)
                                    <li>
                                        <a href="{{ route('advisories.show', ['id' => $item->id, 'title' => $item->title]) }}">
                                            <i class="fa fa-angle-right"></i>
                                            <span>
                                                {{ Str::limit($item->title, 55) }}
                                                <br><small style="color:#aaa;">{{ date('M d, Y', strtotime($item->created_at)) }}</small>
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

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
@endsection
