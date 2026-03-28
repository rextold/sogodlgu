@extends('layouts.home')
@section('content')

<style>
:root {
    --primary: #0A2E63; /* Navy Blue */
    --accent: #F1B41C;  /* Golden Yellow */
    --bg: #F9FAFB;      /* Light Grayish Background */
    --text: #222;       /* Main Text */
}

body {
    background-color: var(--bg);
    font-family: 'Poppins', sans-serif;
}

/* --- General Section Styling --- */
.container-fluid {
    padding-top: 30px;
    padding-bottom: 40px;
}

.page-title {
    color: var(--primary);
    font-weight: 700;
    border-left: 5px solid var(--accent);
    padding-left: 12px;
    margin-bottom: 30px;
    text-transform: uppercase;
}

/* --- Feature News Card --- */
.card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    background-color: #fff;
}
.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 14px rgba(0,0,0,0.15);
}
.card-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--primary);
}
.card-text {
    color: #444;
}
.btn-primary {
    background-color: var(--primary);
    border: none;
    border-radius: 4px;
}
.btn-primary:hover {
    background-color: var(--accent);
    color: #000;
}

/* --- Feature Image --- */
.card-img-top {
    height: 300px;
    width: 100%;
    border-radius: 8px 8px 0 0;
    background-size: cover;
    background-position: center;
}

/* --- Sidebar --- */
.sidebar-card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    margin-bottom: 25px;
    background: #fff;
}
.sidebar-card .card-header {
    background-color: var(--primary);
    color: #fff;
    font-weight: 600;
    border-bottom: 3px solid var(--accent);
    border-radius: 8px 8px 0 0;
}
.sidebar-card .card-body {
    background-color: #fff;
}

/* --- Smaller News Cards --- */
.small-news .card-img-top {
    height: 160px;
}
.small-news .card-title {
    font-size: 15px;
    font-weight: 600;
}
.small-news .small {
    font-size: 11px;
    color: #777;
}

/* --- Responsive Fixes --- */
@media (max-width: 768px) {
    .card-img-top {
        height: 220px;
    }
}
</style>

<div class="container-fluid">
    <div class="row">
        <!-- LEFT COLUMN: Featured News -->
        <div class="col-lg-8 mb-4">
            <h3 class="page-title"><i class="fa fa-newspaper text-warning"></i> Latest News & Updates</h3>

            <div class="card mb-4" data-aos="fade-up">
                <a href="{{ route('article.show',['id'=>$feat->id,'category'=>strtolower($feat->category->name),'title'=> $feat->slug]) }}">
                    <div class="card-img-top" style="background-image:linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.7)), url('{{ Voyager::image($feat->image) }}');"></div>
                </a>
                <div class="card-body">
                    <h2 class="card-title">{{ $feat->title }}</h2>
                    <div class="small text-muted mb-2">
                        {{ $feat->category->name }} |
                        <i class="fa fa-user"></i> {{ $feat->author->name }} |
                        <i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($feat->created_at)) }}
                    </div>
                    <p class="card-text">{!! substr($feat->excerpt,0,180) !!}...</p>
                    <a class="btn btn-primary mt-2" href="{{ route('article.show',['id'=>$feat->id,'category'=>strtolower($feat->category->name),'title'=> $feat->slug]) }}">Read more →</a>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-card" data-aos="fade-down">
                <div class="card-header"><i class="fa fa-cloud-sun"></i> Weather Updates</div>
                <div class="card-body weather">
                    @include('frontend.advisory._weather')
                </div>
            </div>

            <div class="sidebar-card" data-aos="fade-right">
                <div class="card-header"><i class="fa fa-bullhorn"></i> Advisories</div>
                <div class="card-body">
                    @include('frontend.home._featureAdvisories')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grid of News Cards -->
<div class="container-fluid bg-white py-4">
    <div class="col-lg-12">
        @for($i=1; $i<=$rowCount; $i++)
            <div class="row small-news">
                @foreach($news as $i => $article)
                    @if($article->category->order != 2)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card" data-aos="fade-up">
                                <a href="{{ route('article.show',['id'=>$article->id,'category'=>strtolower($article->category->name),'title'=> $article->slug]) }}">
                                    <div class="card-img-top" style="background-image:linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.7)), url('{{ Voyager::image($article->image) }}');"></div>
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('article.show',['id'=>$article->id,'category'=>strtolower($article->category->name),'title'=> $article->slug]) }}" style="color:var(--primary);">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                    <div class="small text-muted">
                                        <i class="fa fa-user"></i> {{ $article->author->name }} |
                                        <i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($article->created_at)) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endfor
    </div>
</div>

@endsection
