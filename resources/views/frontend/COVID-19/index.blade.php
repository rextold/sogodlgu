@extends('layouts.home')
@section('content')  
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/cov19.css') }}"> -->
<script type="module" src="{{ asset('js/cov19.js') }}"></script>
<div id="banner"></div>
    
                <div class="card-title"><h4>COVID-19 UPDATES</h4></div>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://ncovtracker.doh.gov.ph/" fullscreen></iframe>
                </div>
         
@endsection