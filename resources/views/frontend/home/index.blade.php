@extends('layouts.home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/followus.css') }}">
<style>
/* === Featured News - Simplified Colors with Shadow === */
.featured-news-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 16px;
  padding: 20px;
  background: #fff8f0; /* light warm background */
}

.featured-news-card {
  background: #f15a22; /* logo orange header inside */
  border-radius: 10px;
  overflow: hidden;
  border: none; /* remove orange border */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12); /* subtle shadow */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.featured-news-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* hover shadow */
}

.featured-news-card img {
  width: 100%;
  height: 140px;
  object-fit: cover;
}

.featured-news-content {
  padding: 10px 12px;
  background: #fff3e0; /* soft light background */
}

.featured-news-content h6 {
  font-weight: 600;
  font-size: 0.95rem;
  color: #0052a5; /* logo blue for text */
  margin-bottom: 4px;
  line-height: 1.25em;
  height: 38px;
  overflow: hidden;
}

.featured-news-content .date {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
}

.featured-news-content article {
  font-size: 13px;
  color: #333;
  line-height: 1.3em;
  margin-bottom: 8px;
  height: 34px;
  overflow: hidden;
}

.read-more-button {
  display: inline-block;
  border: none;
  border-radius: 20px;
  background: #0052a5; /* blue button */
  color: #fff; /* white text */
  font-size: 0.8rem;
  font-weight: 500;
  padding: 4px 12px;
  text-decoration: none;
  transition: background 0.3s ease;
}

.read-more-button:hover {
  background: #003d7a; /* darker blue hover */
}

.card-header {
  background: #f15a22; /* logo orange */
  color: #fff; /* simple white text */
  font-weight: 700;
  font-size: 1rem;
  padding: 10px 16px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  letter-spacing: 0.3px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.featured-news-see-more {
  grid-column: 1 / -1;
  text-align: center;
  margin-top: 12px;
}

.featured-news-see-more .btn {
  background-color: #0052a5; /* blue */
  color: #fff; /* white text */
  font-weight: 600;
  border-radius: 20px;
  padding: 6px 18px;
  border: none;
  transition: background 0.3s ease;
  font-size: 0.85rem;
}

.featured-news-see-more .btn:hover {
  background-color: #003d7a;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-3">
            @include('frontend.home._slideshow')
        </div>
        <div class="col-lg-9 mt-3">
            @include('frontend.widgets._newsticker')
        </div>
        <div class="col-lg-3 mt-3">
            @include('frontend.home._usefullinksandothers')
            <div class="sidebar-card" data-aos="fade-right">
                <div class="card-header"><i class="fa fa-bullhorn"></i> Advisories</div>
                <div class="card-body">
                    @include('frontend.home._featureAdvisories')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @include('frontend.home._cardfeattouristspots')
</div>

<div class="container-fluid mt-4 mb-4 ebpls-section">
    <div class="row align-items-center" data-aos="fade-left">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <img src="{{ Voyager::image('/ebpls/displayebpls.jpg') }}" alt="eBPLS Info">
        </div>
        <div class="col-sm-6">
            <a href="{{ route('bpermit') }}">
                <img src="{{ Voyager::image('/ebpls/clickhere.jpg') }}" alt="Apply Here">
            </a>
        </div>
    </div>
</div>
@endsection