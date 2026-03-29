@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   ANNOUNCEMENT / POST DETAIL PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.art-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 75%, #c9460e 100%);
    padding: 20px 0 16px;
    position: relative; overflow: hidden;
}
.art-hero::before {
    content: '';
    position: absolute; top: -70px; right: -70px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.art-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.art-hero .ah-tag {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 14px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.art-hero h1 {
    font-size: clamp(1rem, 2.5vw, 1.45rem); font-weight: 900; color: #fff;
    margin-bottom: 6px; line-height: 1.3;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.art-hero .ah-meta {
    display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
    font-size: 0.78rem; color: rgba(255,255,255,0.7); margin-bottom: 10px;
}
.art-hero .ah-meta i { color: rgba(244,197,66,0.8); }
.art-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 6px;
}
.art-breadcrumb a, .art-breadcrumb span { font-size: 0.78rem; color: rgba(255,255,255,0.55); text-decoration: none; }
.art-breadcrumb a:hover { color: #f4c542; }
.art-breadcrumb .sep { color: rgba(255,255,255,0.25); }
.art-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Page Wrap ---- */
.art-wrap { background: #f4f6f9; padding: 28px 0 44px; }

/* ---- Main Article Card ---- */
.art-card {
    background: #fff; border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 20px;
}
.art-card .art-feature-img {
    width: 100%; max-height: 420px; object-fit: cover; display: block;
}
.art-card .art-card-body { padding: 28px 30px 24px; }

/* Category badge */
.art-cat-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(234,82,17,0.1); color: #ea5211;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 0.5px; text-transform: uppercase;
    border: 1px solid rgba(234,82,17,0.25); margin-bottom: 14px;
}

/* Title */
.art-card .art-title {
    font-size: clamp(1.15rem, 2.5vw, 1.55rem); font-weight: 900;
    color: #001f2d; line-height: 1.35; margin-bottom: 14px;
}

/* Meta row */
.art-meta-row {
    display: flex; align-items: center; gap: 18px; flex-wrap: wrap;
    padding: 10px 0; margin-bottom: 22px;
    border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0;
}
.art-meta-row .am-item {
    display: flex; align-items: center; gap: 6px;
    font-size: 0.8rem; color: #777;
}
.art-meta-row .am-item i { color: #0052a5; font-size: 0.85rem; }
.art-meta-row .am-item strong { color: #444; font-weight: 600; }

/* Body */
.art-body-content {
    font-size: 0.95rem; color: #333; line-height: 1.85;
}
.art-body-content h2, .art-body-content h3 { color: #0052a5; font-weight: 700; margin-top: 24px; margin-bottom: 10px; }
.art-body-content h4, .art-body-content h5 { color: #001f2d; font-weight: 700; margin-top: 18px; }
.art-body-content p { margin-bottom: 1rem; }
.art-body-content img { max-width: 100%; border-radius: 8px; margin: 12px 0; }
.art-body-content ul, .art-body-content ol { padding-left: 20px; margin-bottom: 1rem; }
.art-body-content li { margin-bottom: 6px; }
.art-body-content blockquote {
    border-left: 4px solid #ea5211; background: #fff8f5;
    padding: 14px 18px; border-radius: 0 8px 8px 0;
    margin: 20px 0; font-style: italic; color: #555;
}
.art-body-content a { color: #0052a5; }
.art-body-content a:hover { color: #ea5211; }
.art-body-content table { width: 100%; border-collapse: collapse; margin: 16px 0; }
.art-body-content table th { background: #0052a5; color: #fff; padding: 8px 12px; font-size: 0.85rem; text-align: left; }
.art-body-content table td { padding: 8px 12px; border-bottom: 1px solid #f0f0f0; font-size: 0.85rem; }
.art-body-content table tr:hover td { background: #fdf5f1; }

/* ---- Prev / Next Nav ---- */
.art-prevnext {
    display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;
}
.art-prevnext a {
    display: flex; align-items: center; gap: 8px;
    flex: 1; min-width: 200px;
    background: #fff; border-radius: 10px;
    padding: 12px 16px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    text-decoration: none; color: #444;
    font-size: 0.82rem; font-weight: 600;
    transition: all 0.22s; border: 1px solid #eee;
}
.art-prevnext a:hover { background: #0052a5; color: #fff; border-color: #0052a5; transform: translateY(-2px); }
.art-prevnext a:hover i { color: #f4c542; }
.art-prevnext a i { color: #0052a5; font-size: 0.95rem; transition: color 0.22s; }
.art-prevnext .pn-label { font-size: 0.67rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; opacity: 0.6; display: block; margin-bottom: 1px; }
.art-prevnext a.pn-next { justify-content: flex-end; text-align: right; }

/* ---- Sidebar cards ---- */
.art-side-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 18px;
}
.art-side-card .asc-head {
    padding: 11px 16px; display: flex; align-items: center; gap: 8px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.art-side-card .asc-head.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.art-side-card .asc-head.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.art-side-card .asc-head.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); }
.art-side-card .asc-body { padding: 14px 16px; }

/* Related posts list */
.art-related-list { list-style: none; padding: 0; margin: 0; }
.art-related-list li { border-bottom: 1px solid #f4f4f4; }
.art-related-list li:last-child { border-bottom: none; }
.art-related-list li a {
    display: flex; align-items: flex-start; gap: 8px;
    padding: 9px 4px; text-decoration: none; color: #444;
    font-size: 0.82rem; line-height: 1.45; transition: all 0.2s;
}
.art-related-list li a:hover { color: #ea5211; padding-left: 8px; }
.art-related-list li a i { color: #ea5211; flex-shrink: 0; margin-top: 3px; }

/* Quick links */
.art-quick-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 6px; }
.art-quick-list li a {
    display: flex; align-items: center; gap: 8px;
    background: #f8f9fc; border-left: 3px solid #0052a5;
    padding: 7px 10px; border-radius: 6px;
    font-size: 0.81rem; color: #444; text-decoration: none; transition: all 0.2s;
}
.art-quick-list li a:hover { background: #edf3fb; color: #0052a5; transform: translateX(3px); }
.art-quick-list li a i { color: #0052a5; }

/* ---- Responsive ---- */
@media (max-width: 991px) {
    .art-card .art-card-body { padding: 20px 18px 18px; }
}
@media (max-width: 767px) {
    .art-hero h1 { -webkit-line-clamp: 3; }
    .art-card .art-card-body { padding: 16px 14px 14px; }
    .art-prevnext a { min-width: 140px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="art-hero">
    <div class="container">
        <div class="ah-tag">
            <i class="fa fa-newspaper-o"></i> {{ strtoupper($page ?? 'Post') }}
        </div>
        <h1>{{ $announcement->title }}</h1>
        <div class="ah-meta">
            <span><i class="fa fa-user"></i> {{ optional($announcement->author)->name ?? 'Admin' }}</span>
            <span><i class="fa fa-calendar"></i> {{ $announcement->created_at->format('F j, Y') }}</span>
            @if($announcement->category)
            <span><i class="fa fa-folder"></i> {{ $announcement->category->name }}</span>
            @endif
        </div>
        <div class="art-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="#">Posts</a>
            <span class="sep">/</span>
            @if($announcement->category)
            <a href="#">{{ $announcement->category->name }}</a>
            <span class="sep">/</span>
            @endif
            <span class="current">{{ Str::limit($announcement->title, 50) }}</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="art-wrap">
    <div class="container">
        <div class="row">

            {{-- LEFT: ARTICLE --}}
            <div class="col-lg-8" data-aos="fade-up">

                <div class="art-card">
                    @if($announcement->image)
                    <img src="{{ Voyager::image($announcement->image) }}"
                         alt="{{ $announcement->title }}"
                         class="art-feature-img"
                         onerror="this.style.display='none'">
                    @endif
                    <div class="art-card-body">
                        @if($announcement->category)
                        <div class="art-cat-badge">
                            <i class="fa fa-tag"></i> {{ $announcement->category->name }}
                        </div>
                        @endif
                        <h2 class="art-title">{{ $announcement->title }}</h2>
                        <div class="art-meta-row">
                            <div class="am-item">
                                <i class="fa fa-user-circle"></i>
                                <strong>{{ optional($announcement->author)->name ?? 'Admin' }}</strong>
                            </div>
                            <div class="am-item">
                                <i class="fa fa-calendar-o"></i>
                                {{ $announcement->created_at->format('F j, Y') }}
                            </div>
                            <div class="am-item">
                                <i class="fa fa-clock-o"></i>
                                {{ $announcement->created_at->format('g:i A') }}
                            </div>
                        </div>
                        <div class="art-body-content">
                            {!! $announcement->body !!}
                        </div>
                    </div>
                </div>

                {{-- Prev / Next Navigation --}}
                <div class="art-prevnext">
                    @if($previous)
                    @php $prevPost = App\Post::find($previous); @endphp
                    @if($prevPost)
                    <a href="{{ route('article.show', ['id' => $prevPost->id, 'category' => strtolower(optional($prevPost->category)->name ?? 'general'), 'title' => $prevPost->slug]) }}">
                        <i class="fa fa-chevron-left"></i>
                        <div>
                            <span class="pn-label">Previous</span>
                            {{ Str::limit($prevPost->title, 55) }}
                        </div>
                    </a>
                    @endif
                    @endif

                    @if($next)
                    @php $nextPost = App\Post::find($next); @endphp
                    @if($nextPost)
                    <a href="{{ route('article.show', ['id' => $nextPost->id, 'category' => strtolower(optional($nextPost->category)->name ?? 'general'), 'title' => $nextPost->slug]) }}" class="pn-next">
                        <div>
                            <span class="pn-label">Next</span>
                            {{ Str::limit($nextPost->title, 55) }}
                        </div>
                        <i class="fa fa-chevron-right"></i>
                    </a>
                    @endif
                    @endif
                </div>

                {{-- Share --}}
                <div class="art-side-card">
                    <div class="asc-head orange"><i class="fa fa-share-alt"></i> Share this Article</div>
                    <div class="asc-body">
                        @include('frontend.widgets._sharethis')
                    </div>
                </div>

            </div>

            {{-- RIGHT: SIDEBAR --}}
            <div class="col-lg-4" data-aos="fade-left">

                {{-- Page Views --}}
                <div class="art-side-card">
                    <div class="asc-body" style="padding: 10px 14px;">
                        @include('frontend.widgets._pageviews')
                    </div>
                </div>

                {{-- Transparency Seal --}}
                @include('frontend.widgets._transseal')

                {{-- Related Posts --}}
                <div class="art-side-card mt-3">
                    <div class="asc-head blue"><i class="fa fa-list-alt"></i> Related Articles</div>
                    <div class="asc-body">
                        @php
                            $relatedPosts = App\Post::where('status', 'PUBLISHED')
                                ->where('category_id', $announcement->category_id ?? null)
                                ->where('id', '!=', $announcement->id)
                                ->inRandomOrder()
                                ->limit(7)
                                ->get();
                        @endphp
                        @if($relatedPosts->count())
                        <ul class="art-related-list">
                            @foreach($relatedPosts as $rp)
                            <li>
                                <a href="{{ route('article.show', ['id' => $rp->id, 'category' => strtolower(optional($rp->category)->name ?? 'general'), 'title' => $rp->slug]) }}">
                                    <i class="fa fa-angle-right"></i>
                                    {{ Str::limit($rp->title, 70) }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p style="font-size:0.82rem;color:#aaa;margin:0;text-align:center;">No related articles found.</p>
                        @endif
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="art-side-card mt-3">
                    <div class="asc-head navy"><i class="fa fa-link"></i> Quick Links</div>
                    <div class="asc-body">
                        <ul class="art-quick-list">
                            <li><a href="{{ route('news') }}"><i class="fa fa-newspaper-o"></i> News &amp; Updates</a></li>
                            <li><a href="{{ url('posts/advisory') }}"><i class="fa fa-bell"></i> Advisories</a></li>
                            <li><a href="{{ route('gov.legislative.ordinances') }}"><i class="fa fa-gavel"></i> Ordinances</a></li>
                            <li><a href="{{ route('gov.legislative.resolutions') }}"><i class="fa fa-file-text-o"></i> Resolutions</a></li>
                            <li><a href="{{ route('tourism') }}"><i class="fa fa-map-marker"></i> Tourism</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
