<style>
/* === Featured News - Simplified Colors === */
.featured-news-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 16px;
  padding: 20px;
  background: #ffffff; /* light warm background */
}

.featured-news-card {
  background: #f15a22; /* logo orange */
  border-radius: 10px;
  overflow: hidden;
  /*border: 1px solid #f15a22; */
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.featured-news-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
}

.featured-news-card img {
  width: 100%;
  height: 140px;
  object-fit: cover;
}

.featured-news-content {
  padding: 10px 12px;
  background: #ffffff; /* soft light background */
}

.featured-news-content h6 {
  font-weight: 600;
  font-size: 0.95rem;
  color: #0052a5; /* logo blue for text */
  margin-bottom: 4px;
  line-height: 1.25em;
  height: 38px;
  overflow: hidden;
}

.featured-news-content .date {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
}

.featured-news-content article {
  font-size: 13px;
  color: #333;
  line-height: 1.3em;
  margin-bottom: 8px;
  height: 34px;
  overflow: hidden;
}

.read-more-button {
  display: inline-block;
  border: none;
  border-radius: 20px;
  background: #0052a5; /* blue button */
  color: #fff; /* white text */
  font-size: 0.8rem;
  font-weight: 500;
  padding: 4px 12px;
  text-decoration: none;
  transition: background 0.3s ease;
}

.read-more-button:hover {
  background: #003d7a; /* darker blue hover */
}

.card-header {
  background: #f15a22; /* logo orange */
  color: #fff; /* simple white text */
  font-weight: 700;
  font-size: 1rem;
  padding: 10px 16px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  letter-spacing: 0.3px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.featured-news-see-more {
  grid-column: 1 / -1;
  text-align: center;
  margin-top: 12px;
}

.featured-news-see-more .btn {
  background-color: #0052a5; /* blue */
  color: #fff; /* white text */
  font-weight: 600;
  border-radius: 20px;
  padding: 6px 18px;
  border: none;
  transition: background 0.3s ease;
  font-size: 0.85rem;
}

.featured-news-see-more .btn:hover {
  background-color: #003d7a;
}
</style>


<div class="panel-default">
  <div class="card-header">
    <span class="glyphicon glyphicon-list-alt"></span>
    <b>Latest News and Updates</b>
  </div>

  <div class="featured-news-container">
    @if($posts = App\Post::OrderBy("created_at","desc")->where("status","PUBLISHED")->with("category")->inRandomOrder()->paginate(10))
      @foreach($posts as $post)
        @if($post->category->order != 2)
          <div class="featured-news-card">
            <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}">
            <div class="featured-news-content">
              <a href="{{ route('article.show',['id'=>$post->id,'category'=>strtolower($post->category->name),'title'=> $post->slug])}}">
                <h6>{{ $post->title }}</h6>
              </a>
              <div class="date">{{ date('M d, Y',strtotime($post->created_at)) }}</div>
              <article>{!! substr($post->excerpt,0,80) !!}...</article>
              <!--<a href="{{ route('article.show',['id'=>$post->id,'category'=>strtolower($post->category->name),'title'=> $post->slug])}}" class="read-more-button">Read</a>-->
            </div>
          </div>
        @endif
      @endforeach
      <div class="featured-news-see-more">
        <a class="btn" href="{{ url('/news') }}">See more</a>
      </div>
    @endif
  </div>
</div>