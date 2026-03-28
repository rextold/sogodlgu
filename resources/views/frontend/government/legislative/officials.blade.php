@extends('layouts.home')
@section('content')
<div id="banner"></div>
<div class="container-fluid officials"> 
    <div class="row">
        <div class="col-md-9">
                <h4 class="mb-2">{{ strtoupper($page) }}</h4>
                @include('frontend.widgets._sharethis') 
                <div class="row">
                    <ul class ="breadcrumb" style="margin-left: 0">
                        @for($i = 1; $i <= count(Request::segments());$i++)
                          <li class="breadcrumb-item"><a>{{ strtoupper(request()->segment($i)) }}</a></li>
                        @endfor
                    </ul>
                </div>
            @for($i=0; $i<$rowCount;$i++)
                <div class="row p-2">
                    @foreach($sbmembers as $i => $sbmember)
                        <div class="col-md-3">
                            <h4 class="text-center"><strong></strong></h4>
                            <div class="profile-card-4 text-center">
                                <img src="{{ preg_replace('/\\.[^.\\s]{3,4}$/', '', Voyager::image($sbmember->official->image)) }}-cropped.jpg" class="img img-responsive">

                                <div class="profile-content">
                                    <div class="profile-name">{{ $sbmember->official->name }}
                                        <p></p>
                                    </div>
                                    <div class="profile-description">{{ $sbmember->position->name }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor
        </div>
        <div class="col-md-3 side-style" style="color:white;">
            @include('frontend.widgets._transseal')   
            <div class="row">
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