@extends('layouts.home')
@section('content')
<style>
/* ============================================================
   LEGISLATIVE / SB OFFICIALS PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.leo-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 55%, #0052a5 100%);
    padding: 18px 0 14px;
    position: relative; overflow: hidden;
}
.leo-hero::before {
    content: '';
    position: absolute; top: -80px; right: -80px;
    width: 340px; height: 340px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.leo-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.leo-hero .hero-icon  { font-size: 1.8rem; color: rgba(244,197,66,0.5); margin-bottom: 4px; }
.leo-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 14px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.leo-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; }
.leo-hero .hero-sub   { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.leo-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.leo-breadcrumb a, .leo-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.leo-breadcrumb a:hover { color: #f4c542; }
.leo-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.leo-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.leo-stats {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    border-bottom: 3px solid #b03d0a;
    padding: 0;
}
.leo-stats .ls-inner { display: flex; flex-wrap: wrap; }
.leo-stats .ls-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 13px 20px; text-align: center; flex: 1; min-width: 120px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.leo-stats .ls-item:last-child { border-right: none; }
.leo-stats .ls-item .ls-icon  { font-size: 1rem; color: rgba(255,255,255,0.55); margin-bottom: 3px; }
.leo-stats .ls-item .ls-value { font-size: 1.5rem; font-weight: 900; color: #fff; line-height: 1; }
.leo-stats .ls-item .ls-label { font-size: 0.67rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.4px; margin-top: 3px; }

/* ---- Intro Banner ---- */
.leo-intro-banner {
    background: #fff;
    border-left: 5px solid #0052a5;
    border-radius: 0 10px 10px 0;
    padding: 14px 20px;
    margin-bottom: 24px;
    box-shadow: 0 3px 12px rgba(0,82,165,0.1);
    display: flex; align-items: flex-start; gap: 14px;
}
.leo-intro-banner .lib-icon {
    font-size: 1.6rem; color: #0052a5; flex-shrink: 0; margin-top: 2px;
}
.leo-intro-banner .lib-text h4 {
    font-size: 0.95rem; font-weight: 800; color: #001f2d; margin-bottom: 4px;
}
.leo-intro-banner .lib-text p {
    font-size: 0.82rem; color: #555; line-height: 1.6; margin: 0;
}

/* ---- Page Wrap ---- */
.leo-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Section Header ---- */
.leo-section-hdr {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 22px; padding-bottom: 12px;
    border-bottom: 2px solid #eaeff8;
}
.leo-section-hdr .lsh-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; color: #fff; flex-shrink: 0;
}
.leo-section-hdr .lsh-icon.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.leo-section-hdr .lsh-icon.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.leo-section-hdr h2 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }
.leo-section-hdr p  { font-size: 0.78rem; color: #888; margin: 0; }

/* ---- Profile Cards ---- */
.leo-cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 32px;
}

/* First card â€” full width "speaker" highlight */
.leo-cards-grid .leo-card-featured {
    grid-column: 1 / -1;
}
.leo-card {
    background: #fff; border-radius: 14px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    transition: transform 0.25s, box-shadow 0.25s;
    text-align: center;
    display: flex; flex-direction: column;
}
.leo-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(0,0,0,0.14);
}

/* Featured (first officer) horizontal card */
.leo-card.leo-card-featured {
    flex-direction: row;
    text-align: left;
    border-top: 4px solid #0052a5;
}
.leo-card.leo-card-featured .lc-photo-wrap {
    width: 220px; min-height: 240px; flex-shrink: 0;
}
.leo-card.leo-card-featured .lc-body {
    padding: 22px 24px;
    display: flex; flex-direction: column; justify-content: center;
}
.leo-card.leo-card-featured .lc-name { font-size: 1.3rem; display: block; width: 100%; }
.leo-card.leo-card-featured .lc-pos-badge {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; border: none; font-size: 0.8rem; padding: 5px 16px;
    align-self: flex-start;
    display: inline-block;
    margin-top: 4px;
}
.leo-card.leo-card-featured .lc-desc {
    font-size: 0.85rem; color: #555; line-height: 1.65; margin-top: 10px;
    overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;
}
.leo-card.leo-card-featured .lc-meta { margin-top: 12px; display: flex; flex-wrap: wrap; gap: 8px; }
.leo-card.leo-card-featured .lc-meta-item {
    display: flex; align-items: center; gap: 5px;
    font-size: 0.78rem; color: #777;
}
.leo-card.leo-card-featured .lc-meta-item i { color: #0052a5; }

/* Photo wrap (default) */
.lc-photo-wrap {
    position: relative;
    height: 190px;
    overflow: hidden;
}
.lc-photo-wrap::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 50%;
    background: linear-gradient(to top, rgba(0,31,45,0.75), transparent);
}
.lc-photo-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    object-position: center 20%;
    transition: transform 0.4s ease;
}
.leo-card:hover .lc-photo-wrap img { transform: scale(1.06); }
.lc-order-badge {
    position: absolute; top: 10px; left: 10px; z-index: 1;
    background: rgba(0,31,45,0.75); color: #f4c542;
    font-size: 0.66rem; font-weight: 800;
    padding: 3px 9px; border-radius: 20px;
    letter-spacing: 0.4px;
}
/* Body (default) */
.lc-body { padding: 13px 12px 16px; flex: 1; display: flex; flex-direction: column; }
.lc-name {
    font-size: 0.88rem; font-weight: 800; color: #001f2d;
    line-height: 1.3; margin-bottom: 7px;
}
.lc-pos-badge {
    display: inline-block;
    background: #f0f4fb; color: #0052a5;
    font-size: 0.72rem; font-weight: 700;
    padding: 4px 12px; border-radius: 20px;
    border: 1px solid #dde2ef;
    align-self: center;
}
.lc-desc-sm {
    font-size: 0.78rem; color: #777; line-height: 1.55; margin-top: 8px;
    overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
}

/* ---- Session / Contact Info Card ---- */
.leo-session-card {
    background: linear-gradient(160deg, #001f2d, #003d7a);
    border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 18px rgba(0,32,80,0.25);
    margin-bottom: 20px;
}
.leo-session-card .lssc-head {
    padding: 11px 18px;
    display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}
.leo-session-card .lssc-body { padding: 16px 18px; }
.session-info-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
.session-info-list li {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: 0.83rem;
}
.session-info-list li i { color: #f4c542; margin-top: 3px; width: 16px; flex-shrink: 0; text-align: center; }
.session-info-list li .si-label { font-size: 0.7rem; font-weight: 700; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 0.3px; display: block; margin-bottom: 1px; }
.session-info-list li .si-value { color: #fff; }

/* ---- Sidebar cards ---- */
.leo-side-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 20px;
}
.leo-side-card .lsc-head {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.leo-side-card .lsc-head.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.leo-side-card .lsc-head.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); }
.leo-side-card .lsc-head.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.leo-side-card .lsc-head.gold   { background: linear-gradient(135deg, #f4c542, #e2ac46); color: #1a1a1a; }
.leo-side-card .lsc-body { padding: 14px 18px; }

/* Link list shared style */
.lsc-link-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 6px; }
.lsc-link-list li a {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: 0.82rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: all 0.2s;
    line-height: 1.4;
}
.lsc-link-list li a:hover { background: #edf3fb; color: #0052a5; transform: translateX(3px); }
.lsc-link-list li a i { color: #0052a5; margin-top: 2px; flex-shrink: 0; }
.lsc-link-list li a.orange-link { border-left-color: #ea5211; }
.lsc-link-list li a.orange-link i { color: #ea5211; }
.lsc-link-list li a.orange-link:hover { background: #fdf3ee; color: #ea5211; }

/* Roles/committees key */
.role-key-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 6px; }
.role-key-list li {
    display: flex; align-items: center; gap: 9px;
    font-size: 0.82rem; color: #444;
    padding: 7px 10px; border-radius: 8px; background: #f8f9fc;
}
.role-key-list li .rk-dot {
    width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0;
}

/* ---- Responsive ---- */
@media (max-width: 991px) {
    .leo-cards-grid { grid-template-columns: repeat(3, 1fr); }
    .leo-card.leo-card-featured { flex-direction: column; text-align: center; }
    .leo-card.leo-card-featured .lc-photo-wrap { width: 100%; height: 280px; min-height: unset; }
    .leo-card.leo-card-featured .lc-photo-wrap img { object-position: center 20%; }
    .leo-card.leo-card-featured .lc-meta { justify-content: center; }
}
@media (max-width: 767px) {
    .leo-hero h1 { font-size: 1.4rem; }
    .leo-cards-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .leo-stats .ls-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .leo-stats .ls-item:nth-child(even) { border-right: none; }
    /* Featured card: tall enough to show full face on mobile */
    .leo-card.leo-card-featured .lc-photo-wrap { height: 260px; }
    .leo-card.leo-card-featured .lc-photo-wrap img { object-position: center 15%; }
    .leo-card.leo-card-featured .lc-name { font-size: 1.05rem; }
    /* Regular cards */
    .lc-photo-wrap:not(.leo-card-featured .lc-photo-wrap) { height: 160px; }
}
@media (max-width: 480px) {
    .leo-hero h1 { font-size: 1.1rem; }
    .leo-cards-grid { grid-template-columns: repeat(2, 1fr); gap: 8px; }
    /* Featured card on small phones */
    .leo-card.leo-card-featured .lc-photo-wrap { height: 230px; }
    /* Regular cards */
    .leo-card:not(.leo-card-featured) .lc-photo-wrap { height: 140px; }
    .lc-body { padding: 10px 9px 12px; }
    .lc-name { font-size: 0.82rem; }
}
</style>

{{-- ===== PAGE HERO ===== --}}
<div class="leo-hero">
    <div class="container">
        <div class="hero-icon">
            @if($page === 'Sangguniang Bayan Officials')
                <i class="fa fa-balance-scale"></i>
            @else
                <i class="fa fa-users"></i>
            @endif
        </div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>{{ $page }}</h1>
        <div class="hero-sub">
            @if($page === 'Sangguniang Bayan Officials')
                The legislative body of Sogod, Southern Leyte â€” crafting ordinances and resolutions that serve every citizen.
            @else
                Meet the duly elected leaders of Sogod, Southern Leyte, dedicated to public service.
            @endif
        </div>
        <div class="leo-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="#">Government</a>
            <span class="sep">/</span>
            @if($page === 'Sangguniang Bayan Officials')
                <a href="{{ route('gov.legislative.officials') }}">Legislative</a>
                <span class="sep">/</span>
            @endif
            <span class="current">{{ $page }}</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="leo-stats">
    <div class="container-fluid px-0">
        <div class="ls-inner">
            <div class="ls-item">
                <div class="ls-icon"><i class="fa fa-users"></i></div>
                <div class="ls-value">{{ $sbmembers->count() }}</div>
                <div class="ls-label">
                    @if($page === 'Sangguniang Bayan Officials') SB Members @else Officials @endif
                </div>
            </div>
            @if($page === 'Sangguniang Bayan Officials')
            <div class="ls-item">
                <div class="ls-icon"><i class="fa fa-gavel"></i></div>
                <div class="ls-value">{{ App\Ordinance::count() }}</div>
                <div class="ls-label">Ordinances</div>
            </div>
            <div class="ls-item">
                <div class="ls-icon"><i class="fa fa-file-text-o"></i></div>
                <div class="ls-value">{{ App\Resolution::count() }}</div>
                <div class="ls-label">Resolutions</div>
            </div>
            @else
            <div class="ls-item">
                <div class="ls-icon"><i class="fa fa-building-o"></i></div>
                <div class="ls-value">{{ App\Barangay::count() }}</div>
                <div class="ls-label">Barangays</div>
            </div>
            @endif
            <div class="ls-item">
                <div class="ls-icon"><i class="fa fa-map-marker"></i></div>
                <div class="ls-value">Sogod</div>
                <div class="ls-label">So. Leyte</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="leo-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== LEFT COLUMN ===== --}}
            <div class="col-lg-9">

                {{-- Contextual intro banner --}}
                <div class="leo-intro-banner" data-aos="fade-up">
                    <div class="lib-icon">
                        @if($page === 'Sangguniang Bayan Officials')
                            <i class="fa fa-balance-scale"></i>
                        @else
                            <i class="fa fa-star"></i>
                        @endif
                    </div>
                    <div class="lib-text">
                        @if($page === 'Sangguniang Bayan Officials')
                            <h4>Sangguniang Bayan of Sogod</h4>
                            <p>The Sangguniang Bayan (SB) is the local legislative body of the Municipality of Sogod. It is composed of elected councilors who enact ordinances, approve resolutions, and appropriate funds for the municipality. Regular sessions are held every Monday.</p>
                        @else
                            <h4>Elected Officials of Sogod</h4>
                            <p>These are the duly elected officials of the Municipal Government of Sogod, Southern Leyte, serving the people through their respective roles in governance, public service, and community development.</p>
                        @endif
                    </div>
                </div>

                {{-- Section header --}}
                <div class="leo-section-hdr" data-aos="fade-up">
                    <div class="lsh-icon blue"><i class="fa fa-id-badge"></i></div>
                    <div>
                        <h2>Official Directory</h2>
                        <p>{{ $sbmembers->count() }} officials currently serving</p>
                    </div>
                </div>

                {{-- Officials Grid --}}
                <div class="leo-cards-grid">
                    @foreach($sbmembers as $idx => $sbmember)
                        @if($idx === 0)
                        {{-- Featured first officer --}}
                        <div class="leo-card leo-card-featured" data-aos="fade-up">
                            <div class="lc-photo-wrap">
                                <img src="{{ Voyager::image($sbmember->official->image) }}"
                                     alt="{{ $sbmember->official->name }}"
                                     onerror="this.src='{{ asset('adminfiles/assets/images/users/profile.png') }}'">
                            </div>
                            <div class="lc-body">
                                <div class="lc-name">{{ $sbmember->official->name }}</div>
                                <span class="lc-pos-badge">{{ $sbmember->position->name }}</span>
                                @if(!empty($sbmember->official->descriptions))
                                <div class="lc-desc">{{ strip_tags($sbmember->official->descriptions) }}</div>
                                @endif
                                <div class="lc-meta">
                                    <div class="lc-meta-item"><i class="fa fa-map-marker"></i> Sogod, Southern Leyte</div>

                                </div>
                            </div>
                        </div>
                        @else
                        {{-- Regular card --}}
                        <div class="leo-card"
                             data-aos="fade-up" data-aos-delay="{{ min((($idx - 1) % 4) * 60, 180) }}">
                            <div class="lc-photo-wrap">
                                <span class="lc-order-badge">#{{ $idx + 1 }}</span>
                                <img src="{{ Voyager::image($sbmember->official->image) }}"
                                     alt="{{ $sbmember->official->name }}"
                                     onerror="this.src='{{ asset('adminfiles/assets/images/users/profile.png') }}'">
                            </div>
                            <div class="lc-body">
                                <div class="lc-name">{{ $sbmember->official->name }}</div>
                                <span class="lc-pos-badge">{{ $sbmember->position->name }}</span>
                                @if(!empty($sbmember->official->descriptions))
                                <div class="lc-desc-sm">{{ strip_tags($sbmember->official->descriptions) }}</div>
                                @endif
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                @include('frontend.widgets._sharethis')
            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-3">

                {{-- Transparency Seal --}}
                @include('frontend.widgets._transseal')
                {{-- SB Session Info (only on SB page, content from DB: pages table slug=sb-session-info) --}}
                @if($page === 'Sangguniang Bayan Officials' && !empty($sessionPage))
                <div class="leo-session-card mt-3" data-aos="fade-left">
                    <div class="lssc-head">
                        <i class="fa fa-calendar-check-o"></i> {{ $sessionPage->title }}
                    </div>
                    <div class="lssc-body">
                        <ul class="session-info-list">
                            <li>
                                <i class="fa fa-users"></i>
                                <div>
                                    <span class="si-label">Total Members</span>
                                    <span class="si-value">{{ $sbmembers->count() }} SB Members</span>
                                </div>
                            </li>
                        </ul>
                        @if($sessionPage->body)
                            <div class="session-cms-body">{!! $sessionPage->body !!}</div>
                        @endif
                    </div>
                </div>
                @endif

                {{-- Most Viewed Ordinances --}}
                @if($page === 'Sangguniang Bayan Officials')
                    @if($MVordinances = App\Ordinance::mostviewed())
                    <div class="leo-side-card mt-3" data-aos="fade-left" data-aos-delay="40">
                        <div class="lsc-head blue">
                            <i class="fa fa-gavel"></i> Most Viewed Ordinances
                        </div>
                        <div class="lsc-body">
                            <ul class="lsc-link-list">
                                @foreach($MVordinances as $MVordinance)
                                <li>
                                    <a href="{{ route('gov.legislative.show_ordinance', ['id' => $MVordinance->id, 'title' => $MVordinance->slug ?? $MVordinance->id]) }}">
                                        <i class="fa fa-angle-right"></i>
                                        {!! $MVordinance->title !!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                @endif

                {{-- Quick Government Links --}}
                <div class="leo-side-card mt-3" data-aos="fade-left" data-aos-delay="60">
                    <div class="lsc-head orange">
                        <i class="fa fa-compass"></i> Government Links
                    </div>
                    <div class="lsc-body">
                        <ul class="lsc-link-list">
                            <li><a href="{{ route('gov.elected.officials') }}" class="{{ $page !== 'Sangguniang Bayan Officials' ? 'orange-link' : '' }}"><i class="fa fa-angle-right"></i> Elected Officials</a></li>
                            <li><a href="{{ route('gov.legislative.officials') }}" class="{{ $page === 'Sangguniang Bayan Officials' ? 'orange-link' : '' }}"><i class="fa fa-angle-right"></i> SB Officials</a></li>
                            <li><a href="{{ route('gov.legislative.ordinances') }}"><i class="fa fa-angle-right"></i> Ordinances</a></li>
                            <li><a href="{{ route('gov.legislative.resolutions') }}"><i class="fa fa-angle-right"></i> Resolutions</a></li>
                            <li><a href="{{ route('barangay') }}"><i class="fa fa-angle-right"></i> Barangays</a></li>
                            <li><a href="{{ route('fdp.index') }}"><i class="fa fa-angle-right"></i> FDP / Transparency</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Legislative Functions (SB only) --}}
                @if($page === 'Sangguniang Bayan Officials')
                <div class="leo-side-card" data-aos="fade-left" data-aos-delay="80">
                    <div class="lsc-head gold">
                        <i class="fa fa-info-circle"></i> Legislative Functions
                    </div>
                    <div class="lsc-body">
                        <ul class="role-key-list">
                            <li><div class="rk-dot" style="background:#0052a5;"></div> Enact ordinances &amp; resolutions</li>
                            <li><div class="rk-dot" style="background:#ea5211;"></div> Appropriate municipal funds</li>
                            <li><div class="rk-dot" style="background:#f4c542;"></div> Review executive acts</li>
                            <li><div class="rk-dot" style="background:#186152;"></div> Approve local development plans</li>
                            <li><div class="rk-dot" style="background:#7b3fa0;"></div> Conduct public hearings</li>
                        </ul>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
