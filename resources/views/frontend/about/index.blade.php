@extends('layouts.home')
@section('content')  
<div id="banner"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <article class="card-content">
                {!! $history->body !!}
            </article>
        </div>
        <div class="col-md-6 side-style">
            <div class="">
                <div class="mapouter" style="position:relative; text-align:right;">
                    <div class="gmap_canvas" style="overflow:hidden;background:none!important;">
                        <iframe style="width: 100%;min-height: 478px" id="gmap_canvas" src="https://maps.google.com/maps?q=Sogod%20%20southern%20leyte%20municipal%20hall&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <br>
                    </div>
                </div>
            </div>
             <!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="616" height="519" id="gmap_canvas" src="https://maps.google.com/maps?q=Sogod%20%20southern%20leyte%20municipal%20hall&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org">pirate bay</a><br><style>.mapouter{position:relative;text-align:right;height:519px;width:616px;}</style><a href="https://www.embedgooglemap.net">how to embed google maps into html</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:519px;width:616px;}</style></div></div> -->
        </div>
    </div>
</div>
@endsection