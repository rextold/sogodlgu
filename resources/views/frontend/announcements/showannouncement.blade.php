@extends('layouts.home')

@section('content')
<style>
/* === Page Layout & Theme === */
:root {
    --sogod-blue: #0f3e42;
    --sogod-orange: #f15a22;
    --sogod-light: #fff8f0;
    --text-dark: #2b2b2b;
}

body {
    background-color: #f9f9f9;
}

/* === Main Container === */
.container {
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    padding: 25px;
    margin-top: 25px;
    margin-bottom: 40px;
}

/* === Announcement Section === */
#banner {
    height: 200px;
    background: linear-gradient(135deg, var(--sogod-blue), var(--sogod-orange));
    background-size: cover;
    border-bottom: 5px solid var(--sogod-orange);
}

/* === Post Display Area === */
.col-md-9 {
    padding-right: 20px;
}

h6 {
    color: var(--sogod-blue);
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* === Sidebar Section === */
.col-md-3 {
    border-left: 2px solid #eee;
    padding-left: 15px;
}

/* === Related Posts Card === */
.related-posts {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    overflow: hidden;
    transition: all 0.3s ease;
    margin-top: 25px;
}

.related-posts:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.related-header {
    background: var(--sogod-blue);
    color: #ffffff;
    font-weight: 600;
    padding: 10px 14px;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 6px;
    letter-spacing: 0.3px;
}

.related-header .glyphicon {
    font-size: 1.1rem;
}

.related-posts ul {
    margin: 0;
    padding: 10px 0;
    list-style: none;
}

.related-posts li {
    padding: 10px 14px;
    border-bottom: 1px solid #f0f0f0;
    transition: background 0.3s ease;
}

.related-posts li:last-child {
    border-bottom: none;
}

.related-posts li:hover {
    background: var(--sogod-light);
}

.related-posts a {
    color: var(--text-dark);
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 500;
    display: block;
    transition: color 0.3s ease;
}

.related-posts a:hover {
    color: var(--sogod-orange);
}

.related-posts {
    border-radius: 12px;
    background: #ffffff;
    overflow: hidden;
    border: 1px solid #e8e8e8;
    transition: all 0.3s ease-in-out;
}
.related-posts:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}

/* Header */
.related-header {
    background: linear-gradient(90deg, #0f3e42, #1b5b59);
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: 0.3px;
}
.related-header .glyphicon {
    font-size: 1.1rem;
}

/* Body */
.related-body {
    background-color: #fffdfb;
}

/* Items */
.related-item {
    transition: all 0.3s ease;
}
.related-item:last-child {
    border-bottom: none;
}
.related-item:hover {
    background: #fff4ec;
    border-radius: 8px;
    padding-left: 5px;
}

/* Link */
.related-link {
    color: #333;
    font-weight: 500;
    font-size: 0.95rem;
    text-decoration: none;
    transition: color 0.3s ease;
}
.related-link:hover {
    color: #f15a22;
}

/* Icon */
.related-item .icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #f15a22;
    font-size: 1rem;
}
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- === Main Announcement Content === -->
        <div class="col-lg-9">
            @include('frontend.announcements._display')
        </div>

        <!-- === Sidebar === -->
        <div class="col-lg-3 mt-3">
            @include('frontend.widgets._sharethis')
            @include('frontend.widgets._pageviews')
            <div class="related-posts shadow-sm rounded-3 border">
                <div class="related-header text-white px-3 py-2" style="background-color: #0f3e42; font-size: clamp(12px, 1.5vw, 15px);">
                    <span class="glyphicon glyphicon-list-alt me-1"></span>
                    <b>Related Posts</b>
                </div>
            
                <div class="related-body p-3">
                    <ul class="list-unstyled mb-0">
                        @php
                            $posts = App\Post::where('status', 'PUBLISHED')
                                ->where('category_id', $announcement->category_id ?? null)
                                ->where('id', '!=', $announcement->id)
                                ->inRandomOrder()
                                ->limit(8)
                                ->get();
                        @endphp
            
                        @forelse($posts as $post)
                            <li class="related-item d-flex align-items-start mb-2 pb-2 border-bottom" 
                                style="font-size: clamp(12px, 1.3vw, 14px);">
                                <div class="icon text-primary" 
                                     style="font-size: clamp(14px, 1.6vw, 16px); padding: 6px 8px 0 0;">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <a href="{{ route('article.show', ['id' => $post->id, 'category' => strtolower($post->category->name ?? 'general'), 'title' => $post->slug]) }}"
                                   class="related-link flex-grow-1 text-decoration-none text-dark"
                                   style="line-height: 1.4;">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @empty
                            <li class="text-center text-muted py-2" style="font-size: clamp(12px, 1.3vw, 14px);">
                                No related posts found.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

