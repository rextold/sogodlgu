@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{ asset('carousel/css_owl.carousel.min.css') }}">

<style>
/* --- Sogod LGU Tourism Page Theme --- */
body {
    background-color: #F9FAFB;
    color: #222;
    font-family: 'Poppins', sans-serif;
}

#banner {
    width: 100%;
    height: 220px;
    background: linear-gradient(135deg, #0A2E63 0%, #113E87 100%);
}

.tourism-section {
    margin-top: 40px;
}

.section-title {
    font-weight: 700;
    color: #0A2E63;
    border-left: 5px solid #F1B41C;
    padding-left: 12px;
    margin-bottom: 20px;
}

/* Carousel Styling */
.carousel-item img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    border-radius: 8px;
}
.carousel-inner {
    border-radius: 8px;
    overflow: hidden;
}
.carousel-indicators li {
    background-color: #F1B41C;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: invert(28%) sepia(93%) saturate(2352%) hue-rotate(200deg) brightness(95%) contrast(94%);
}

/* Sidebar and Cards */
.side-nav-categories {
    background: #fff;
    border: 1px solid #e3e3e3;
    border-radius: 6px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.side-nav-categories .title {
    background: #0A2E63;
    color: #fff;
}
.side-nav-categories a:hover {
    color: #F1B41C;
}

.card {
    border-radius: 6px;
    border: 1px solid #e3e3e3;
}
.card-header {
    background: #0A2E63;
    color: #fff;
}
.card-body {
    background: #fff;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .carousel-item img { height: 320px; }
}
@media (max-width: 768px) {
    .carousel-item img { height: 250px; }
}
</style>

<div class="container tourism-section">
    <div class="row">
        <!-- Featured Carousel -->
        <div class="col-lg-8 col-md-7 mb-4">
            <h4 class="section-title">Featured Tourist Spots</h4>

            <div id="featuredCarousel" class="carousel slide" data-ride="carousel">
                @php
                    $feats = App\TouristSpot::inRandomOrder()->paginate(5);
                    $carouselImages = [];
                    if($feats) {
                        foreach($feats as $feat) {
                            if(!empty($feat->image)) {
                                foreach(json_decode($feat->image, true) as $img) {
                                    $carouselImages[] = $img;
                                }
                            }
                        }
                    }
                @endphp

                @if(count($carouselImages))
                    <ol class="carousel-indicators">
                        @foreach($carouselImages as $i => $img)
                            <li data-target="#featuredCarousel" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner">
                        @foreach($carouselImages as $i => $img)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                <img src="{{ Voyager::image($img) }}" alt="Slide {{ $i+1 }}">
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
                    <div class="alert alert-info text-center">No featured images available.</div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-5 mb-4">
            <h4 class="section-title">Categories</h4>
            @include('frontend.tourism._sidecategories')
        </div>
    </div>

    <!-- Categories below -->
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="section-title">Explore by Category</h4>
            @include('frontend.tourism._categories', ['categories' => $categories])
        </div>
    </div>
</div>

<script src="{{ asset('carousel/js_owl.carousel.min.js') }}"></script>
@endsection
