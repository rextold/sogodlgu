<div class="advticker bg-light">
    <div>
        <ul style="list-style: none; margin-left: 0;" class="p-1">
            @php
                $posts = App\Post::orderBy('created_at', 'desc')
                    ->where('status', 'PUBLISHED')
                    ->with('category')
                    ->inRandomOrder()
                    ->get(); // ✅ show all, not paginated
            @endphp

            @foreach($posts as $post)
                @if($post->category && $post->category->order == 2)
                    <li class="news-item">
                        <div class="mb-3 p-1">
                            <a href="{{ route('article.show', [
                                'category' => strtolower($post->category->name),
                                'id' => $post->id,
                                'title' => $post->slug
                            ]) }}">
                                <p>{{ $post->title }}</p>
                            </a>
                            <div style="font-size: 12px; color: #bbbbbbed;">
                                on <span class="font-lato">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                <article>
                                    {{ Str::limit(strip_tags($post->excerpt), 20, '...') }}
                                </article>
                            </div>
                        </div>  
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery.easy-ticker.min.js') }}"></script>
<script type="text/javascript">
    var myET = $('.advticker').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 4000,
        height: 'auto',
        mousePause: true,
        controls: {
            up: '.up',
            down: '.down',
            toggle: '.toggle',
            stopText: 'Stop !!!'
        }
    }).data('easyTicker');
</script>
