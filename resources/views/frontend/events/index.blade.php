@extends('layouts.home')

@section('content')
<!-- <div id="banner">
    <img src="{{ asset('images/banner/events.jpg')}}" style="width: 100%;height: 165px;">
</div>
 -->
 <br>
<div class="container-fluid">    
    <ul class ="breadcrumb">
      <li class="breadcrumb-item"><a href="">{{ $page }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('events') }}">{{ $breadcrumb }}</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
    </div>
	<div class="row"> 
        <div class="col-md-9 col-sm-9">
            @include('frontend.events._allevents')
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3">
            <!-- <h6 class="title-h6-d">Related links</h6> -->
            
        </div>
	</div>
</div>
@endsection