@extends('layouts.home')
@section('content')

<style>
/* ============================================================
   SEARCH RESULTS PAGE
============================================================ */
.srp-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px; position: relative; overflow: hidden;
}
.srp-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.srp-hero h1 { font-size: 1.3rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.srp-hero .srp-sub { font-size: 0.88rem; color: rgba(255,255,255,0.7); }
.srp-hero .srp-tag {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.68rem; font-weight: 700; padding: 2px 10px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.srp-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 12px;
}
.srp-breadcrumb a, .srp-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.srp-breadcrumb a:hover { color: #f4c542; }
.srp-breadcrumb .sep   { color: rgba(255,255,255,0.3); }
.srp-breadcrumb .curr  { color: #f4c542; font-weight: 600; }

/* Search bar on results page */
.srp-search-bar {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    padding: 10px 10px 10px 20px;
    display: flex; align-items: center; gap: 10px;
    margin: 24px 0;
}
.srp-search-bar input {
    flex: 1; border: none; outline: none;
    font-size: 1rem; color: #001f2d; background: transparent;
}
.srp-search-bar input::placeholder { color: #bbb; }
.srp-search-bar button {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; border: none; border-radius: 8px;
    padding: 10px 22px; font-size: 0.88rem; font-weight: 700;
    cursor: pointer; display: flex; align-items: center; gap: 6px;
    transition: opacity 0.2s;
}
.srp-search-bar button:hover { opacity: 0.88; }

/* Stats row */
.srp-stats {
    display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 24px;
}
.srp-stat {
    display: flex; align-items: center; gap: 6px;
    background: #fff; border-radius: 20px;
    padding: 5px 14px 5px 10px;
    font-size: 0.78rem; font-weight: 600; color: #444;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
}
.srp-stat .sst-dot {
    width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0;
}
.sst-dot.orange { background: #ea5211; }
.sst-dot.blue   { background: #0052a5; }
.sst-dot.green  { background: #28a745; }
.sst-dot.purple { background: #6f42c1; }
.sst-dot.teal   { background: #20c997; }

/* Section heading */
.srp-section {
    margin-bottom: 28px;
}
.srp-section-head {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 16px; border-radius: 10px;
    margin-bottom: 14px; color: #fff; font-weight: 700;
    font-size: 0.9rem;
}
.srp-section-head.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.srp-section-head.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.srp-section-head.green  { background: linear-gradient(135deg, #28a745, #1e7e34); }
.srp-section-head.purple { background: linear-gradient(135deg, #6f42c1, #52309b); }
.srp-section-head.teal   { background: linear-gradient(135deg, #20c997, #17a87e); }
.srp-section-head .srp-count {
    background: rgba(255,255,255,0.25); font-size: 0.7rem;
    padding: 2px 9px; border-radius: 20px; margin-left: auto;
}

/* Result items */
.srp-item {
    display: flex; gap: 12px; align-items: flex-start;
    background: #fff; border-radius: 10px;
    padding: 14px; margin-bottom: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    text-decoration: none; color: inherit;
    transition: transform 0.2s, box-shadow 0.2s;
    border-left: 4px solid transparent;
}
.srp-item:hover {
    transform: translateX(3px); box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    text-decoration: none; color: inherit;
}
.srp-item.orange { border-left-color: #ea5211; }
.srp-item.blue   { border-left-color: #0052a5; }
.srp-item.green  { border-left-color: #28a745; }
.srp-item.purple { border-left-color: #6f42c1; }
.srp-item.teal   { border-left-color: #20c997; }
.srp-item .sri-icon {
    width: 38px; height: 38px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; color: #fff; flex-shrink: 0;
}
.sri-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.sri-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.sri-icon.green  { background: linear-gradient(135deg, #28a745, #1e7e34); }
.sri-icon.purple { background: linear-gradient(135deg, #6f42c1, #52309b); }
.sri-icon.teal   { background: linear-gradient(135deg, #20c997, #17a87e); }
.srp-item .sri-body { flex: 1; min-width: 0; }
.srp-item .sri-title {
    font-size: 0.92rem; font-weight: 700; color: #001f2d;
    margin-bottom: 3px; line-height: 1.35;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.srp-item:hover .sri-title { color: #0052a5; }
.srp-item .sri-excerpt {
    font-size: 0.76rem; color: #666; margin-bottom: 4px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.srp-item .sri-meta { font-size: 0.7rem; color: #aaa; }
.srp-item .sri-meta i { margin-right: 2px; }

/* Empty state */
.srp-empty {
    text-align: center; padding: 60px 20px;
    background: #fff; border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
}
.srp-empty i { font-size: 3rem; color: #ddd; display: block; margin-bottom: 14px; }
.srp-empty h3 { font-size: 1.1rem; color: #555; margin-bottom: 8px; }
.srp-empty p { font-size: 0.85rem; color: #aaa; }

/* Sidebar */
.srp-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 3px 14px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.srp-side-card .ssc-head {
    padding: 10px 16px; font-weight: 700; font-size: 0.85rem;
    color: #fff; display: flex; align-items: center; gap: 8px;
}
.ssc-head.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); border-bottom: 3px solid #f4c542; }
.ssc-head.orange { background: linear-gradient(135deg, #ea5211, #c9460e); border-bottom: 3px solid #f4c542; }
.srp-side-card .ssc-body { padding: 14px; }
.srp-tip-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.srp-tip-list li { font-size: 0.8rem; color: #555; }
.srp-tip-list li i { color: #ea5211; margin-right: 5px; }
.srp-quick-links { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.srp-quick-links li a {
    display: flex; align-items: center; gap: 7px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 7px 10px; border-radius: 8px;
    background: #f8f9fc; border-left: 3px solid #0052a5;
    transition: background 0.2s, color 0.2s;
}
.srp-quick-links li a:hover { background: #edf3fb; color: #0052a5; }
.srp-quick-links li a i { color: #0052a5; }
</style>

{{-- ===== HERO ===== --}}
<div class="srp-hero">
    <div class="container">
        <div class="srp-tag"><i class="fa fa-search"></i> &nbsp;Search Results</div>
        @if($query)
            <h1>Results for: &ldquo;{{ $query }}&rdquo;</h1>
            <div class="srp-sub">
                Found <strong style="color:#f4c542;">{{ $total }}</strong> result{{ $total != 1 ? 's' : '' }} across all content
            </div>
        @else
            <h1>Search</h1>
            <div class="srp-sub">Enter a keyword to search the Sogod LGU website</div>
        @endif
        <div class="srp-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="curr">Search</span>
        </div>
    </div>
</div>

{{-- ===== CONTENT ===== --}}
<div style="background:#f4f6f9; padding:28px 0 48px;">
    <div class="container">
        <div class="row">

            {{-- Main column --}}
            <div class="col-lg-8">

                {{-- Search bar --}}
                <form class="srp-search-bar" method="GET" action="{{ route('search') }}">
                    <i class="fa fa-search" style="color:#0052a5;font-size:1.1rem;"></i>
                    <input type="text" name="q" value="{{ $query }}" placeholder="Search news, ordinances, events, tourism..." maxlength="100" autocomplete="off">
                    <button type="submit"><i class="fa fa-search"></i> Search</button>
                </form>

                @if($query && $total === 0)
                    {{-- No results --}}
                    <div class="srp-empty">
                        <i class="fa fa-search"></i>
                        <h3>No results found for &ldquo;{{ $query }}&rdquo;</h3>
                        <p>Try different keywords or check the spelling.</p>
                    </div>

                @elseif($query)
                    {{-- Stats chips --}}
                    <div class="srp-stats">
                        @if($posts->count())
                            <span class="srp-stat"><span class="sst-dot orange"></span>{{ $posts->count() }} News/Articles</span>
                        @endif
                        @if($ordinances->count())
                            <span class="srp-stat"><span class="sst-dot blue"></span>{{ $ordinances->count() }} Ordinances</span>
                        @endif
                        @if($resolutions->count())
                            <span class="srp-stat"><span class="sst-dot green"></span>{{ $resolutions->count() }} Resolutions</span>
                        @endif
                        @if($events->count())
                            <span class="srp-stat"><span class="sst-dot purple"></span>{{ $events->count() }} Events</span>
                        @endif
                        @if($spots->count())
                            <span class="srp-stat"><span class="sst-dot teal"></span>{{ $spots->count() }} Tourist Spots</span>
                        @endif
                    </div>

                    {{-- NEWS / POSTS --}}
                    @if($posts->count())
                    <div class="srp-section">
                        <div class="srp-section-head orange">
                            <i class="fa fa-newspaper-o"></i> News &amp; Articles
                            <span class="srp-count">{{ $posts->count() }} found</span>
                        </div>
                        @foreach($posts as $post)
                        <a class="srp-item orange" href="{{ route('article.show', ['id'=>$post->id,'category'=>strtolower(optional($post->category)->name ?? 'news'),'title'=>$post->slug]) }}">
                            <span class="sri-icon orange"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sri-body">
                                <span class="sri-title">{{ $post->title }}</span>
                                @if($post->excerpt)
                                    <span class="sri-excerpt">{!! strip_tags($post->excerpt) !!}</span>
                                @endif
                                <span class="sri-meta">
                                    <i class="fa fa-folder-o"></i> {{ optional($post->category)->name ?? 'News' }}
                                    &nbsp;&bull;&nbsp;
                                    <i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($post->created_at)) }}
                                </span>
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- ORDINANCES --}}
                    @if($ordinances->count())
                    <div class="srp-section">
                        <div class="srp-section-head blue">
                            <i class="fa fa-gavel"></i> Ordinances
                            <span class="srp-count">{{ $ordinances->count() }} found</span>
                        </div>
                        @foreach($ordinances as $ord)
                        <a class="srp-item blue" href="{{ route('gov.legislative.show_ordinance', ['id'=>$ord->id,'title'=>$ord->title]) }}">
                            <span class="sri-icon blue"><i class="fa fa-gavel"></i></span>
                            <span class="sri-body">
                                <span class="sri-title">{{ $ord->title }}</span>
                                @if($ord->description)
                                    <span class="sri-excerpt">{!! strip_tags($ord->description) !!}</span>
                                @endif
                                <span class="sri-meta">
                                    <i class="fa fa-calendar"></i> {{ $ord->date ? date('M d, Y', strtotime($ord->date)) : 'N/A' }}
                                </span>
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- RESOLUTIONS --}}
                    @if($resolutions->count())
                    <div class="srp-section">
                        <div class="srp-section-head green">
                            <i class="fa fa-file-text-o"></i> Resolutions
                            <span class="srp-count">{{ $resolutions->count() }} found</span>
                        </div>
                        @foreach($resolutions as $res)
                        <a class="srp-item green" href="{{ route('gov.legislative.show_resolution', ['id'=>$res->id,'title'=>$res->title]) }}">
                            <span class="sri-icon green"><i class="fa fa-file-text-o"></i></span>
                            <span class="sri-body">
                                <span class="sri-title">{{ $res->title }}</span>
                                @if($res->body)
                                    <span class="sri-excerpt">{!! strip_tags($res->body) !!}</span>
                                @endif
                                <span class="sri-meta">
                                    <i class="fa fa-calendar"></i> {{ $res->date ? date('M d, Y', strtotime($res->date)) : 'N/A' }}
                                </span>
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- EVENTS --}}
                    @if($events->count())
                    <div class="srp-section">
                        <div class="srp-section-head purple">
                            <i class="fa fa-calendar-check-o"></i> Events
                            <span class="srp-count">{{ $events->count() }} found</span>
                        </div>
                        @foreach($events as $ev)
                        <a class="srp-item purple" href="{{ route('events.show', ['id'=>$ev->id,'event'=>$ev->title]) }}">
                            <span class="sri-icon purple"><i class="fa fa-calendar-check-o"></i></span>
                            <span class="sri-body">
                                <span class="sri-title">{{ $ev->title }}</span>
                                @if($ev->body)
                                    <span class="sri-excerpt">{!! strip_tags($ev->body) !!}</span>
                                @endif
                                <span class="sri-meta">
                                    <i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($ev->event_date)) }}
                                </span>
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- TOURIST SPOTS --}}
                    @if($spots->count())
                    <div class="srp-section">
                        <div class="srp-section-head teal">
                            <i class="fa fa-camera"></i> Tourist Spots
                            <span class="srp-count">{{ $spots->count() }} found</span>
                        </div>
                        @foreach($spots as $spot)
                        <a class="srp-item teal" href="{{ route('tourism.tourist_spot', ['name'=>$spot->title]) }}">
                            <span class="sri-icon teal"><i class="fa fa-camera"></i></span>
                            <span class="sri-body">
                                <span class="sri-title">{{ $spot->title }}</span>
                                @if($spot->body)
                                    <span class="sri-excerpt">{!! strip_tags($spot->body) !!}</span>
                                @endif
                                <span class="sri-meta"><i class="fa fa-map-marker"></i> Sogod, Southern Leyte</span>
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif

                @else
                    {{-- No query — show help --}}
                    <div class="srp-empty">
                        <i class="fa fa-search"></i>
                        <h3>Start searching</h3>
                        <p>Type a keyword above to search across news, ordinances, resolutions, events, and tourism spots.</p>
                    </div>
                @endif

            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4 mt-3 mt-lg-0">

                <div class="srp-side-card">
                    <div class="ssc-head orange"><i class="fa fa-lightbulb-o"></i> Search Tips</div>
                    <div class="ssc-body">
                        <ul class="srp-tip-list">
                            <li><i class="fa fa-check-circle"></i> Use specific keywords for better results</li>
                            <li><i class="fa fa-check-circle"></i> Try ordinance numbers (e.g. &ldquo;2023-01&rdquo;)</li>
                            <li><i class="fa fa-check-circle"></i> Search by barangay name</li>
                            <li><i class="fa fa-check-circle"></i> Try event topics like &ldquo;fiesta&rdquo; or &ldquo;health&rdquo;</li>
                            <li><i class="fa fa-check-circle"></i> Tourist spot names work too</li>
                        </ul>
                    </div>
                </div>

                <div class="srp-side-card">
                    <div class="ssc-head blue"><i class="fa fa-link"></i> Quick Search Topics</div>
                    <div class="ssc-body">
                        <ul class="srp-quick-links">
                            <li><a href="{{ route('search') }}?q=ordinance"><i class="fa fa-angle-right"></i> Ordinances</a></li>
                            <li><a href="{{ route('search') }}?q=resolution"><i class="fa fa-angle-right"></i> Resolutions</a></li>
                            <li><a href="{{ route('search') }}?q=health"><i class="fa fa-angle-right"></i> Health</a></li>
                            <li><a href="{{ route('search') }}?q=tourism"><i class="fa fa-angle-right"></i> Tourism</a></li>
                            <li><a href="{{ route('search') }}?q=barangay"><i class="fa fa-angle-right"></i> Barangay</a></li>
                            <li><a href="{{ route('search') }}?q=permit"><i class="fa fa-angle-right"></i> Permits</a></li>
                        </ul>
                    </div>
                </div>

                <div class="srp-side-card">
                    <div class="ssc-head blue"><i class="fa fa-th-large"></i> Browse by Section</div>
                    <div class="ssc-body">
                        <ul class="srp-quick-links">
                            <li><a href="{{ route('news') }}"><i class="fa fa-angle-right"></i> News &amp; Updates</a></li>
                            <li><a href="{{ route('gov.legislative.ordinances') }}"><i class="fa fa-angle-right"></i> Ordinances</a></li>
                            <li><a href="{{ route('gov.legislative.resolutions') }}"><i class="fa fa-angle-right"></i> Resolutions</a></li>
                            <li><a href="{{ route('events') }}"><i class="fa fa-angle-right"></i> Events</a></li>
                            <li><a href="{{ route('tourism') }}"><i class="fa fa-angle-right"></i> Tourism</a></li>
                            <li><a href="{{ route('fdp.index') }}"><i class="fa fa-angle-right"></i> FDP Reports</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
