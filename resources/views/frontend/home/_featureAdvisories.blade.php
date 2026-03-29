<div class="advticker">
    <div>
        <ul style="list-style: none; margin-left: 0; padding: 0;">
            @php
                $posts = App\Post::orderBy('created_at', 'desc')
                    ->where('status', 'PUBLISHED')
                    ->with('category')
                    ->inRandomOrder()
                    ->get();
            @endphp

            @foreach($posts as $post)
                @if($post->category && $post->category->order == 2)
                    <li class="adv-item">
                        <a href="{{ route('article.show', [
                            'category' => strtolower($post->category->name),
                            'id'       => $post->id,
                            'title'    => $post->slug
                        ]) }}">{{ $post->title }}</a>
                        <div class="adv-date">
                            <i class="fa fa-calendar-o"></i>
                            {{ date('F d, Y', strtotime($post->created_at)) }}
                        </div>
                        <article>{{ Str::limit(strip_tags($post->excerpt), 55, '...') }}</article>
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
        controls: { up: '.up', down: '.down', toggle: '.toggle', stopText: 'Stop' }
    }).data('easyTicker');
</script>
