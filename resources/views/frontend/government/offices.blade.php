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
      <li class="breadcrumb-item"><a href="{{ route('offices') }}">{{ $breadcrumb }}</a></li>
    </ul>
</div>
<div class="container">    
    <div class="row">
        <div class="col-md-9 col-sm-9"> 
            @include('frontend.government._leftoffices')
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3">
            @include('frontend.government._rightoffices')
        </div>
    </div>
</div>
@endsection