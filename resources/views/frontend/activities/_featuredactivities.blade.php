<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  
<link rel="stylesheet" href="{{ asset('css/home/activities.css') }}"/>
<hr>
<div class="card">
<div class="activities card-content">
  <h2 class="h2-title card-title">Featured Activities</h2>
  <div class="row">
    @foreach($featactivities as $item)
    <div class="col-md-3">
      <div class="parent">
        <div class="child" style=" background-image: url({{ asset('images/activities/1.jpg') }});">
          <!-- <span>Click here!</span> -->
        </div>
      </div>
      <div>
        <p>{!! $item->title !!}</p>
      </div>
    </div>
    @endforeach
</div>
</div>
<p class="row">
  <div class="col-md-4">
    <a href="" class="btn btn-primary">See more activities</a>
  </div>
</p>