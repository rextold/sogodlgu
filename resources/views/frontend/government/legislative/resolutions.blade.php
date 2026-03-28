@extends('layouts.home')

@section('content')  
<div id="banner"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 card">   
            <article class="card-content">
                <p><h5>Archives</h5></p>
               
                @foreach ($by_date as $date => $lists) 
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gov.legislative.getresolutions',['month'=> date('F', strtotime($date)), 'year'=> date('Y', strtotime($date))])}}">{{ $date }} <span>({{ count($lists) }})</span></a>
                        </li>
                    </ul>
                    @foreach ($lists as $list)
                        
                    @endforeach
                @endforeach
            </article>
        </div>       
        <div class="col-md-7 card" style="background-color: #152838">    
            <article class="card-content">
                <div class="card-title"><h3 style="color: azure;">{{ $pageHeading }}</h3></div>
                <!-- <div class="card-title"><h4>List of Resolutions</h4></div> -->
                @include('frontend.government.legislative._cardlist2')     
            </article>
        </div>
        <div class="col-md-3 side-style">
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