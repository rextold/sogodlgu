<style>
/* ---- Latest Advisories Widget ---- */
.fadv-list {
    list-style: none; padding: 0; margin: 0;
    display: flex; flex-direction: column; gap: 0;
}
.fadv-item {
    padding: 10px 4px;
    border-bottom: 1px solid #f0f0f0;
}
.fadv-item:last-child { border-bottom: none; }
.fadv-item a {
    display: block;
    font-size: 0.82rem; font-weight: 700;
    color: #001f2d; line-height: 1.4;
    text-decoration: none; margin-bottom: 4px;
    transition: color 0.2s;
}
.fadv-item a:hover { color: #ea5211; }
.fadv-date {
    display: flex; align-items: center; gap: 5px;
    font-size: 0.72rem; color: #999; margin-bottom: 4px;
}
.fadv-date i { color: #ea5211; }
.fadv-excerpt {
    font-size: 0.76rem; color: #777; line-height: 1.5;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.fadv-empty {
    font-size: 0.82rem; color: #aaa; text-align: center; padding: 12px 0;
}
</style>

@php
    $advisories = App\Post::where('status', 'PUBLISHED')
        ->with('category')
        ->orderBy('created_at', 'desc')
        ->get()
        ->filter(function($p){ return $p->category && $p->category->order == 2; })
        ->take(6);
@endphp

@if($advisories->count())
<ul class="fadv-list">
    @foreach($advisories as $adv)
    <li class="fadv-item">
        <a href="{{ route('article.show', [
            'category' => strtolower($adv->category->name),
            'id'       => $adv->id,
            'title'    => $adv->slug
        ]) }}">{{ $adv->title }}</a>
        <div class="fadv-date">
            <i class="fa fa-calendar-o"></i>
            {{ $adv->created_at->format('M d, Y') }}
        </div>
        @if($adv->excerpt)
        <div class="fadv-excerpt">{{ strip_tags($adv->excerpt) }}</div>
        @endif
    </li>
    @endforeach
</ul>
@else
<div class="fadv-empty"><i class="fa fa-bell-o"></i> No advisories at this time.</div>
@endif

