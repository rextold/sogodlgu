@extends('layouts.home')
@section('content')  
<div id="banner">
    <div class="container">
        <h1></h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 card">  
            <article class="card-content">
                <p><h5>Archives</h5></p>
                @foreach ($by_date as $date => $lists) 
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gov.legislative.getordinances',['month'=> date('F', strtotime($date)), 'year'=> date('Y', strtotime($date))])}}">{{ $date }} <span>({{ count($lists) }})</span></a>
                        </li>
                    </ul>
                    @foreach ($lists as $list)
                        
                    @endforeach
                @endforeach
            </article>
        </div>       
        <div class="col-md-7 card" style="background-color: #007777;">    
            <article class="card-content">
                <div class="card-title"><h3 style="color: azure;">{{ $pageHeading }}</h3></div>
                @include('frontend.government.legislative._cardlist')
            </article>
        </div>
        <div class="col-md-3 side-style">
            @include('frontend.widgets._transseal')
            <div>
              <div class="items">
                <div class="items-head">
                  <p>Most Viewed Ordinances</p>
                  <hr>
                </div>
                
                <div class="items-body">
                    @if($MVordinances = App\Ordinance::mostviewed())
                    @foreach($MVordinances as $MVordinance)
                        <div class="items-body-content">
                            <span>{!! $MVordinance->title !!}</span>
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