@extends('layouts._404')

@section('content')
    <script type="text/javascript" src="{{ asset('js/date_time.js') }}"></script>
    <div class="wrapper">
        <div class="lgu-photo-small"></div>
        <div class="overlay-lgu-photo-small">
            <div class="front-date">
                <span id="date_time"></span>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </div>
        </div>
    </div>
	<div class="wrapper1">
		<div class="container-fluid" style="margin-top: 15px;">
			<div class="row">
	    		<div style="padding: 140px" class="col-md-12 text-center">
	    			<h1>OOPS, Page not found!</h1>
	    			<h1>404</h1>
				</div>
			</div>
		</div>
	</div>
@endsection