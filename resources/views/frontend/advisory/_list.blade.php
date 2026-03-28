<link rel="stylesheet" type="text/css" href="{{ asset('css/events.css') }}">
<div class="wrapper1">
    <div class="page-title sgd-roboto">
        <h2>Advisories</h2>
    </div>
    <hr>
    <div class="w3-panel">
    @foreach($advisories as $advisory)
        <div class="card-media">
            <!-- media container -->
            <div class="card-media-object-container" style="width: 21%;">
              <div class="card-media-object" style="background-image: url(/images/advisory/{{ $advisory->photo }});"></div>
            </div>
            <!-- body container -->
            <div class="card-media-body">
                <div class="card-media-body-top">
                    <span class="subtle">{{ $advisory->created_at }}</span>
                    <div class="card-media-body-top-icons u-float-right">
                        <div class="subtle"><h5>Hits: {{ $advisory->hits }}</h5></div>
                    </div>
                  </div>
                  <span class="card-media-body-heading" style="font-weight: 100;font-size: 17px;line-height: 20px">{{ $advisory->title }}</span>
                <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                    <a href="{{ url('advisory',[$advisory->id,$advisory->title]) }}" class="card-media-body-supporting-bottom-text card-media-link u-float-right">VIEW DETAILS</a>
                </div>
            </div>  
        </div>
        <br>
    @endforeach
    </div>
</div>