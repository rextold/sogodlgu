<link rel="stylesheet" type="text/css" href="{{ asset('css/home/news.css') }}">
<article>
	<header>	
		<div class="article-img ">
			<img src="{{ asset('images/news/'.$article->photo) }}" style="width: 100%">
		</div>
		<div style="color: #333; margin-top: 30px">
			<h2 class="h2-title">{{ $article->title }}</h2>
		</div>
		<ul class="list-inline">
			<li>
				<a href="#">
					<i class="fa fa-clock-o"></i> 
					<span class="font-lato"><time datetime="2018-09-28T07:45:46+00:00">{{ date('jS F Y',strtotime($article->created_at)) }}</time></span>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-user"></i> 
					<span class="font-lato">{{ $article->published_by }}</span>
				</a>
			</li>		
		</ul>
		{!! $article->descriptions !!}
	</header><!-- .entry-header -->
</article>