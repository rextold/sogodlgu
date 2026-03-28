<article>
	<header>	
		<img src="{{ asset('images/events/'.$event->photo) }}"> 
		<div style="color: #333; margin-top: 30px;">
			<h2 class="h2-title">{{ $event->title }}</h2>
		</div>
		<ul class="list-inline">
			<li>
				<i class="fa fa-clock-o"></i> 
				<span class="font-lato"><time datetime="2018-09-28T07:45:46+00:00">{{ date('jS F Y',strtotime($event->created_at)) }}</time></span>
			</li>
			<li>
				<i class="fa fa-user"></i> 
				<span class="font-lato">{{ $event->posted_by }}</span>
			</li>		
		</ul>
		{!! $event->descriptions !!}
	</header><!-- .entry-header -->
	<div>
		
	</div>
</article>