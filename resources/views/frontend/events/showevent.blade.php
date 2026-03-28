@extends('layouts.home')

@section('content')
<!-- <div id="banner">
    <img src="{{ asset('images/banner/events.jpg')}}" style="width: 100%;height: 165px;">
</div> -->
<br>
<div class="container-fluid">    
    <ul class ="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('events') }}">{{ $page }}</a></li>
      <li class="breadcrumb-item"><a href="{{ url()->current() }}">{{ $event->title }}</a></li>
    </ul>
</div>
<div class="container"> 
	<div class="row"> 
        <div class="col-md-8 col-sm-8">
            @include('frontend.events._displayevent')
            @include('frontend.widgets._sharethis') 
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
        </div>
	</div>
</div>
@endsection