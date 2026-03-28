@extends('layouts.home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/followus.css') }}">
<div id="banner">
    <img src="{{ asset('images/banner/keyofficials.jpg')}}">
</div>
<div class="container-fluid">
    <ul class ="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ $page }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('keyofficials') }}">{{ $breadcrumb }}</a></li>
    </ul>
</div>
<div class="container">   
    <div class="row">
         <table style="border: none;">
            <tr>
                <td>
                    <div ng-controller="showmmsgCtrl">
                        <h2 class="h2-title">Mayor's Message</h2>
                        <!-- <img src="{{ asset('images/officials/mayor.jpg') }}" alt="Avatar" class="w3-left w3-margin-right mayors-image1">    -->
                        <div ng-bind-html="mmsg.message"></div>
                        <div ng-if="mmsg.message.length < 0">No message</div>
                    </div>
                </td>
            </tr>
        </table>
    </div> 
    <div class="row">
        <div class="col-md-9 col-sm-9"> 
            @include('frontend.government._leftkey')
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3">
        <!-- <div class="large-3 medium-3 columns"> -->
            @include('frontend.government._rightkey')
        </div>
    </div>
</div>
@endsection