@extends('layouts.home')

@section('content')
<!-- <div id="banner"> -->
	<div class="container">
		<h1>Business Permit</h1>
		<!-- 	@if($page = App\Page::where('slug','business-permit')->first())
	        	<span class="label label-primary">Last Update: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $page->created_at)->format('M d, Y') }}</span>
			@endif -->
		<div class="row">
            <ul class ="breadcrumb" style="margin-left: 0">
                @for($i = 1; $i <= count(Request::segments());$i++)
                  <li class="breadcrumb-item"><a>{{ strtoupper(request()->segment($i)) }}</a></li>
                @endfor
            </ul>

        </div>

	</div>
<!-- </div> -->
<div class="container">
	<div class="row">
		<div class="col-md-9">
			@if($page = App\Page::where('slug','business-permit')->first())				
				{!! $page->body !!}
			@endif
		</div>
		<div class="col-md-3">
			@include('frontend.widgets._sharethis')
			<img style="width: 100%;border-style: none;" src="{{ Voyager::image('/ebpls/displayebpls.jpg') }}">
			<h6> <a target="_blank" href="https://prod11.ebpls.com/sogodsouthernleyte/index.php/login">Login</a> | <a href="https://prod11.ebpls.com/sogodsouthernleyte/index.php/register">Register</a></h6>
			<a href="https://prod11.ebpls.com/sogodsouthernleyte/index.php/login">eBusiness Permits and Licensing System Sogod Southern Leyte</a>
		</div>
	</div>
</div>
@endsection