{{-- News grid styles defined in home/index.blade.php --}}
<div class="panel-default">
  <div class="news-grid">
    @if($posts = App\Post::orderBy("created_at","desc")->where("status","PUBLISHED")->with("category")->inRandomOrder()->paginate(10))
      @foreach($posts as $post)
        @if($post->category && $post->category->order != 2)
          <div class="news-grid-card">
            <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}">
            <div class="ngc-body">
              <div class="date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($post->created_at)) }}</div>
              <a href="{{ route('article.show', ['id'=>$post->id, 'category'=>strtolower($post->category->name), 'title'=>$post->slug]) }}">
                <h6>{{ $post->title }}</h6>
              </a>
              <article>{!! substr(strip_tags($post->excerpt), 0, 75) !!}...</article>
              <a href="{{ route('article.show', ['id'=>$post->id, 'category'=>strtolower($post->category->name), 'title'=>$post->slug]) }}" class="ngc-btn">Read More</a>
            </div>
          </div>
        @endif
      @endforeach
    @endif
  </div>
</div>