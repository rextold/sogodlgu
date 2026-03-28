@extends('layouts.home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/followus.css') }}">  
<link rel="stylesheet" type="text/css" href="{{ asset('css/home/barangay.css') }}">

<div id="banner">
    <img src="{{ asset('images/banner/barangay.jpg')}}">
</div>
<br>
<div class="container-fluid sgd-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">{{ $page }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('barangay') }}">Barangay</a></li>
            <li class="breadcrumb-item"><a href="{{ url()->current() }}">{{ $barangay->name }}</a></li>
        </ol>
    </nav>
</div>
<div class="container">    
    <div class="row">
        <div class="col-md-9 col-sm-9"> 
            <h2 class="barangay-title">Barangay {{ $barangay->name }}</h2>
            <ul class="list-inline">
                <li>
                    <span class="fa fa-clock-o" aria-hidden="true"></span>
                    <time datetime="2018-06-01" itemprop="datePublished" pubdate="">{{ date('M d, Y',strtotime($barangay->created_at)) }}</time>
                </li>
                <li class="meta-author">
                    <span class="fa fa-user" aria-hidden="true"></span><span itemprop="name">
                        <span class="fn">
                            {{ $barangay->published_by }}
                        </span>
                    </span>
                </li>
            </ul>
            @if($barangay->photo)
                <img src="{{ asset('images/barangay/'.$barangay->photo) }}" alt=" {{ $barangay->name }}" style="width: 100%">
            @else
                <img src="{{ asset('images/barangay/nophoto.jpg') }}" alt=" {{ $barangay->name }}" style="width: 100%">
            @endif
            <hr>
            <ul style="list-style: none;">
                <li><h6>Captain: {{ $barangay->captain }}</h6></li>
                <li><em>Contact Details</em></li>
                <li><i class="fa fa-phone"></i> {{ $barangay->telnumber }}</li>
                <li><i class="fa fa-mobile"></i> {{ $barangay->cellnumber }}</li>
            </ul>
           <hr>
           <h5 style="font-weight: 500;">Other Informations:</h5>
           <i style="font-size: smaller;">History, Accomplishments, Projects, Barangay officials, etc.</i>
           <div style="margin-top: 36px;margin-bottom: 50px;">{!! $barangay->other_info !!}</div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3">
            <div class="follow">
                @include('frontend.widgets._sharethis')
            </div>
            <div class="transparency">
                @include('frontend.widgets._transseal')
            </div>
            <div ng-controller="barangayCtrl">
                <h6 class="title-h6-d">You may also like</h6>
                <ul>
                    <li ng-repeat="brgy in barangays">
                        <a ng-href="@{{ url }}/government/barangay/@{{ brgy.id }}/@{{ brgy.name }}" >@{{ brgy.name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Load scripts -->
@endsection