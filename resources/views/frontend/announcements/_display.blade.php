<style type="text/css">
	.article-img{width: 100%;max-height: 385px;overflow-y: hidden;}
</style>
<article class="mb-4">
	<header>
		<div style="color: #333">
			<h1 class="h1-title">{{ $announcement->title }}</h1>
		</div>	
		<ul class="list-inline">
			<li>
				<a href="">
					<i class="fa fa-user"></i> 
					<span class="font-lato"> {{ $announcement->author->name }}</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-clock-o"></i> 
					<span class="font-lato"><time datetime="2018-09-28T07:45:46+00:00">{{ date('jS F Y',strtotime($announcement->created_at )) }}</time></span>
				</a>
			</li>	
			<li>
				<a href="">
					<i class="fa fa-folder"></i> {{ $announcement->category->name }}
				</a>
			</li>	
		</ul>
        <ul class ="breadcrumb" style="margin-left: 0">
            @for($i = 1; $i <= count(Request::segments());$i++)
              <li class="breadcrumb-item"><a>{{ strtoupper(request()->segment($i)) }}</a></li>
            @endfor
        </ul>
		<div class="article-img">
			<img src="{{ Voyager::image($announcement->image) }}" style="width: 100%"> 
		</div>
		{!! $announcement->body !!}
	</header>
</article>