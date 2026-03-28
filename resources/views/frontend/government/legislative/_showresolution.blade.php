@extends('layouts.home')
@section('content')  
<div id="banner"></div>
<div class="container" style="color:black">
    <!-- <div class="card-title"><h1>{{ $pageHeading }}</h1></div> -->
    <div class="row">       
        <div class="col-md-9 card">    
            <article class="card-content">
                <h1>{{ $pageHeading }}</h1> 
                <span>{{ $resolution->date }}</span>
                <a href="{{ Voyager::image($resolution->file) }}" class="btn" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download" aria-hidden="true"> Download</i></a>
                <div class="card-content">{!! $resolution->body !!}</div>
            </article>
        </div>
        <div class="col-md-3 side-style" style="color:white">
            @include('frontend.widgets._transseal')
            <div>
              <div class="items">
                <div class="items-head">
                  <p>Most Viewed</p>
                  <hr>
                </div>
                <div class="items-body">
                    @if($MVresolutions = App\Resolution::mostviewed())
                    @foreach($MVresolutions as $MVresolution)
                        <div class="items-body-content">
                            <span>{!! $MVresolution->title !!}</span>
                            <i class="fa fa-angle-right"></i>
                        </div>
                    @endforeach
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection