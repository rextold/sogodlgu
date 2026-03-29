@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{ asset('carousel/css_owl.carousel.min.css') }}">

<style>
/* ============================================================
   TOURISM PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.tour-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 40px 0 32px;
    position: relative;
    overflow: hidden;
}
.tour-hero::before {
    content: '';
    position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.tour-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.tour-hero .hero-icon  { font-size: 2.8rem; color: rgba(244,197,66,0.5); margin-bottom: 10px; }
.tour-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.tour-hero h1 { font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.tour-hero .hero-sub   { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.tour-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.tour-breadcrumb a, .tour-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.tour-breadcrumb a:hover { color: #f4c542; }
.tour-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.tour-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.tour-stats { background: linear-gradient(135deg, #ea5211, #c9460e); }
.tour-stats .ts-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.tour-stats .ts-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 22px; text-align: center; flex: 1; min-width: 130px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.tour-stats .ts-item:last-child { border-right: none; }
.tour-stats .ts-item .ts-icon  { font-size: 1.2rem; color: rgba(255,255,255,0.5); margin-bottom: 3px; }
.tour-stats .ts-item .ts-value { font-size: 1.6rem; font-weight: 900; color: #fff; line-height: 1; }
.tour-stats .ts-item .ts-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrap ---- */
.tour-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Header ---- */
.tour-section-head {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 18px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.tour-section-head .tsh-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
}
.tour-section-head .tsh-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.tour-section-head .tsh-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.tour-section-head h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.tour-section-head p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Carousel ---- */
.tour-carousel-wrap {
    background: #fff; border-radius: 14px; overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1); margin-bottom: 24px;
}
.carousel-item img { width: 100%; height: 380px; object-fit: cover; }
.carousel-indicators li { background-color: #f4c542; }
.carousel-control-prev-icon,
.carousel-control-next-icon { filter: drop-shadow(0 0 3px rgba(0,0,0,0.8)); }

/* ---- Sidebar ---- */
.tc-sidebar-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;
}
.tc-sidebar-card .tcsc-header {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; font-weight: 700; font-size: 0.88rem;
}

/* ---- Responsive ---- */
@media (max-width: 991px)  { .carousel-item img { height: 300px; } }
@media (max-width: 767px) {
    .tour-hero h1 { font-size: 1.4rem; }
    .carousel-item img { height: 220px; }
    .tour-stats .ts-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .tour-stats .ts-item:nth-child(even) { border-right: none; }
}
@media (max-width: 480px) { .tour-hero h1 { font-size: 1.1rem; } }
</style>

{{-- ===== HERO ===== --}}
<div class="tour-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-map-o"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Sogod, Southern Leyte</div>
        <h1>Places to Visit</h1>
        <div class="hero-sub">Discover the natural wonders and cultural heritage of Sogod.</div>
        <div class="tour-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="current">Tourism</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="tour-stats">
    <div class="container-fluid">
        <div class="ts-inner">
            <div class="ts-item">
                <div class="ts-icon"><i class="fa fa-map-marker"></i></div>
                <div class="ts-value">{{ App\TouristSpot::count() }}</div>
                <div class="ts-label">Places to Visit</div>
            </div>
            <div class="ts-item">
                <div class="ts-icon"><i class="fa fa-th-large"></i></div>
                <div class="ts-value">{{ $categories->count() }}</div>
                <div class="ts-label">Categories</div>
            </div>
            <div class="ts-item">
                <div class="ts-icon"><i class="fa fa-sun-o"></i></div>
                <div class="ts-value">Year</div>
                <div class="ts-label">Round</div>
            </div>
            <div class="ts-item">
                <div class="ts-icon"><i class="fa fa-map-o"></i></div>
                <div class="ts-value">Sogod</div>
                <div class="ts-label">Southern Leyte</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="tour-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== CAROUSEL ===== --}}
            <div class="col-lg-8 mb-4" data-aos="fade-up">
                <div class="tour-section-head">
                    <div class="tsh-icon orange"><i class="fa fa-picture-o"></i></div>
                    <div>
                        <h2>Featured Spots</h2>
                        <p>Explore the beauty of Sogod</p>
                    </div>
                </div>
                <div class="tour-carousel-wrap">
                    <div id="featuredCarousel" class="carousel slide" data-ride="carousel">
                        @php
                            $feats = App\TouristSpot::inRandomOrder()->paginate(5);
                            $carouselImages = [];
                            if($feats) {
                                foreach($feats as $feat) {
                                    if(!empty($feat->image)) {
                                        foreach(json_decode($feat->image, true) as $img) {
                                            $carouselImages[] = ['src' => $img, 'title' => $feat->title];
                                        }
                                    }
                                }
                            }
                        @endphp

                        @if(count($carouselImages))
                            <ol class="carousel-indicators">
                                @foreach($carouselImages as $i => $ci)
                                    <li data-target="#featuredCarousel" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($carouselImages as $i => $ci)
                                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                        <img src="{{ Voyager::image($ci['src']) }}" alt="{{ $ci['title'] }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <small style="background:rgba(0,0,0,0.5);padding:3px 10px;border-radius:4px;">{{ $ci['title'] }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#featuredCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#featuredCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        @else
                            <div class="p-4 text-center text-muted">No featured images available.</div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-4 mb-4" data-aos="fade-left">
                <div class="tour-section-head">
                    <div class="tsh-icon blue"><i class="fa fa-list"></i></div>
                    <div>
                        <h2>Categories</h2>
                        <p>Browse by type</p>
                    </div>
                </div>
                <div class="tc-sidebar-card">
                    <div class="tcsc-header"><i class="fa fa-th-large"></i> &nbsp;Spot Categories</div>
                    @include('frontend.tourism._sidecategories')
                </div>
            </div>

        </div>

        {{-- ===== EXPLORE BY CATEGORY ===== --}}
        <div class="row mt-2">
            <div class="col-12">
                <div class="tour-section-head" data-aos="fade-up">
                    <div class="tsh-icon orange"><i class="fa fa-th"></i></div>
                    <div>
                        <h2>Explore by Category</h2>
                        <p>{{ $categories->count() }} categories available</p>
                    </div>
                </div>
                @include('frontend.tourism._categories', ['categories' => $categories])
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('carousel/js_owl.carousel.min.js') }}"></script>
@endsection
