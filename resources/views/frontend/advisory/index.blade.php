@extends('layouts.home')

@section('content')
    <script type="text/javascript" src="{{ asset('js/date_time.js') }}"></script>
    <div class="wrapper">
        <div class="lgu-photo-small"></div>
        <div class="overlay-lgu-photo-small">
            <div class="front-date">
                <span id="date_time"></span>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </div>
        </div>
    </div>
    <div class="wrapper1">   
        <div class="container-fluid sgd-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $page }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('keyofficials') }}">{{ $breadcrumb }}</a></li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    @include('frontend.advisories._list')
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                   <div class="wrapper1">
                        <div class="w3-container"> 
                            <h2 class="sgd-roboto">{{ _('Social Media') }}</h2>
                            <div id="fb-root"></div>
                            <div class="fb-page" data-href="https://www.facebook.com/SogodSo.Leyte/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/SogodSo.Leyte/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SogodSo.Leyte/">Sogod, Southern Leyte</a></blockquote></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection