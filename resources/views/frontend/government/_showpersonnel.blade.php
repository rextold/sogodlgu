@extends('layouts.home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/followus.css') }}">
<div id="banner">
    <img src="{{ asset('images/banner/offices.jpg')}}">
</div>
<br>
<div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ $page }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('offices') }}">Offices</a></li>
      <li class="breadcrumb-item"><a href="">{{ $breadcrumb }}</a></li>
    </ul>
</div>
<div class="container">    
    <div class="row">
        <div class="col-md-9 col-sm-9"> 
            @include('frontend.government._offices_p')
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3">
            <div class="follow">
                @include('frontend.widgets._sharethis')
            </div>
            <div class="transparency">
                @include('frontend.widgets._transseal')
            </div>
            <hr>
            <h6 class="title-h6-d"><i class="fa fa-like"></i> You may also like</h6>
            <ul class="list">
                <li><a href=""></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection