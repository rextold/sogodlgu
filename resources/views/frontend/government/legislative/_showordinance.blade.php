@extends('layouts.home')
@section('content')
<style>
/* ============================================================
   ORDINANCE DETAIL PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.ord-detail-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px; position: relative; overflow: hidden;
}
.ord-detail-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.ord-detail-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.ord-detail-hero .hero-icon  { font-size: 1.8rem; color: rgba(244,197,66,0.5); margin-bottom: 4px; }
.ord-detail-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.ord-detail-hero h1 { font-size: 1.25rem; font-weight: 900; color: #fff; margin-bottom: 4px; line-height: 1.35; }
.ord-detail-hero .hero-sub { font-size: 0.85rem; color: rgba(255,255,255,0.7); }
.odh-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 12px;
}
.odh-breadcrumb a, .odh-breadcrumb span { font-size: 0.78rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.odh-breadcrumb a:hover { color: #f4c542; }
.odh-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.odh-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Page Wrap ---- */
.ord-detail-wrap { background: #f4f6f9; padding: 32px 0 52px; }

/* ---- Main Document Card ---- */
.ord-doc-card {
    background: #fff; border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 24px;
}
.ord-doc-card .odc-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 16px 22px; border-bottom: 3px solid #ea5211;
    display: flex; align-items: flex-start; gap: 14px;
}
.ord-doc-card .odc-header .odc-icon {
    width: 48px; height: 48px; border-radius: 12px; flex-shrink: 0;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1.4rem;
}
.ord-doc-card .odc-header .odc-meta { flex: 1; min-width: 0; }
.ord-doc-card .odc-header .odc-title {
    font-size: 1rem; font-weight: 800; color: #fff; line-height: 1.4; margin-bottom: 6px;
}
.ord-doc-card .odc-header .odc-badges { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; }
.ord-doc-card .odc-header .odc-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 0.72rem; font-weight: 600; padding: 3px 10px; border-radius: 20px;
}
.ord-doc-card .odc-header .odc-badge.date  { background: rgba(244,197,66,0.2); color: #f4c542; border: 1px solid rgba(244,197,66,0.3); }
.ord-doc-card .odc-header .odc-badge.views { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.75); }

/* Download bar */
.ord-download-bar {
    background: #f8faff; border-bottom: 1px solid #eaeff8;
    padding: 12px 22px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
}
.ord-download-bar .odb-label { font-size: 0.82rem; color: #666; font-weight: 600; }
.ord-download-bar .odb-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; font-size: 0.82rem; font-weight: 700;
    padding: 8px 18px; border-radius: 8px; text-decoration: none;
    transition: opacity 0.2s, transform 0.2s;
    box-shadow: 0 3px 10px rgba(234,82,17,0.3);
}
.ord-download-bar .odb-btn:hover { opacity: 0.9; transform: translateY(-1px); text-decoration: none; color: #fff; }
.ord-download-bar .odb-btn i { font-size: 1rem; }

/* Body content */
.ord-doc-body {
    padding: 28px 28px 32px;
    font-size: 0.93rem; color: #3d3d3d; line-height: 1.8;
}
.ord-doc-body h1, .ord-doc-body h2, .ord-doc-body h3 {
    color: #001f2d; font-family: 'Poppins', sans-serif; margin-top: 1.4em;
}
.ord-doc-body p { margin-bottom: 1em; }
.ord-doc-body table { width: 100%; border-collapse: collapse; margin: 1.2em 0; font-size: 0.88rem; }
.ord-doc-body table th { background: #f0f4fb; padding: 9px 12px; font-weight: 700; color: #001f2d; border: 1px solid #dde2ef; }
.ord-doc-body table td { padding: 8px 12px; border: 1px solid #eaeff8; }

/* ---- Sidebar cards ---- */
.ord-side-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); margin-bottom: 18px;
}
.ord-side-card .osc-header {
    padding: 11px 16px; color: #fff; font-weight: 700; font-size: 0.88rem;
    display: flex; align-items: center; gap: 8px;
}
.ord-side-card .osc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.ord-side-card .osc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.ord-side-card .osc-body { padding: 12px 14px; }
.mvc-list2 { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px; }
.mvc-list2 li a {
    display: flex; align-items: flex-start; gap: 8px;
    font-size: 0.8rem; color: #444; text-decoration: none;
    padding: 8px 10px; border-radius: 8px; background: #f8f9fc;
    border-left: 3px solid #0052a5; transition: background 0.2s, color 0.2s;
    line-height: 1.4;
}
.mvc-list2 li a:hover { background: #edf3fb; color: #0052a5; }
.mvc-list2 li a i { color: #0052a5; margin-top: 2px; flex-shrink: 0; }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .ord-detail-hero h1 { font-size: 1.05rem; }
    .ord-doc-body { padding: 18px 16px 22px; }
    .ord-doc-card .odc-header { flex-direction: column; gap: 10px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="ord-detail-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-gavel"></i></div>
        <div class="hero-tag"><i class="fa fa-star"></i> &nbsp;Legislative — Ordinances</div>
        <h1>{{ $pageHeading }}</h1>
        @if($ordinance->date)
        <div class="hero-sub"><i class="fa fa-calendar" style="color:#f4c542;"></i> &nbsp;{{ date('F d, Y', strtotime($ordinance->date)) }}</div>
        @endif
        <div class="odh-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="#">Government</a>
            <span class="sep">/</span>
            <a href="{{ route('gov.legislative.ordinances') }}">Ordinances</a>
            <span class="sep">/</span>
            <span class="current">{{ Str::limit($pageHeading, 40) }}</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="ord-detail-wrap">
    <div class="container-fluid" style="padding-left:20px;padding-right:20px;">
        <div class="row">

            {{-- ===== DOCUMENT COLUMN ===== --}}
            <div class="col-lg-9 col-md-8 mb-4" data-aos="fade-up">
                <div class="ord-doc-card">

                    {{-- Card Header --}}
                    <div class="odc-header">
                        <div class="odc-icon"><i class="fa fa-file-text-o"></i></div>
                        <div class="odc-meta">
                            <div class="odc-title">{{ $pageHeading }}</div>
                            <div class="odc-badges">
                                @if($ordinance->date)
                                <span class="odc-badge date"><i class="fa fa-calendar"></i> {{ date('F d, Y', strtotime($ordinance->date)) }}</span>
                                @endif
                                <span class="odc-badge views"><i class="fa fa-eye"></i> {{ number_format($ordinance->views ?? 0) }} views</span>
                            </div>
                        </div>
                    </div>

                    {{-- Download Bar --}}
                    @if($ordinance->file)
                    <div class="ord-download-bar">
                        <span class="odb-label"><i class="fa fa-paperclip" style="color:#0052a5;"></i> &nbsp;Attached Document:</span>
                        <a href="{{ Voyager::image($ordinance->file) }}" class="odb-btn" target="_blank">
                            <i class="fa fa-download"></i> Download PDF
                        </a>
                    </div>
                    @endif

                    {{-- Body Content --}}
                    <div class="ord-doc-body">
                        @if($ordinance->description)
                            {!! $ordinance->description !!}
                        @else
                            <div style="text-align:center; color:#aaa; padding:40px 0;">
                                <i class="fa fa-file-text-o" style="font-size:2.5rem; margin-bottom:10px; display:block;"></i>
                                No content available. Please download the attached document.
                            </div>
                        @endif
                    </div>

                </div>

                {{-- Back Button --}}
                <a href="{{ route('gov.legislative.ordinances') }}" style="display:inline-flex; align-items:center; gap:7px; font-size:0.85rem; font-weight:700; color:#0052a5; text-decoration:none;">
                    <i class="fa fa-arrow-left"></i> Back to Ordinances
                </a>
            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-3 col-md-4">

                @include('frontend.widgets._transseal')

                {{-- Most Viewed --}}
                @if($MVordinances = App\Ordinance::mostviewed())
                <div class="ord-side-card mt-3" data-aos="fade-left">
                    <div class="osc-header blue"><i class="fa fa-fire"></i> Most Viewed</div>
                    <div class="osc-body">
                        <ul class="mvc-list2">
                            @foreach($MVordinances as $MVordinance)
                            <li>
                                <a href="{{ route('gov.legislative.show_ordinance', ['id' => $MVordinance->id, 'title' => $MVordinance->title]) }}">
                                    <i class="fa fa-angle-right"></i>
                                    {!! $MVordinance->title !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Related Links --}}
                <div class="ord-side-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="osc-header orange"><i class="fa fa-compass"></i> Legislative</div>
                    <div class="osc-body">
                        <ul class="mvc-list2" style="--border-color:#ea5211;">
                            <li><a href="{{ route('gov.legislative.resolutions') }}" style="border-left-color:#ea5211;"><i class="fa fa-angle-right" style="color:#ea5211;"></i> Resolutions</a></li>
                            <li><a href="{{ route('gov.legislative.officials') }}" style="border-left-color:#ea5211;"><i class="fa fa-angle-right" style="color:#ea5211;"></i> SB Officials</a></li>
                            <li><a href="{{ route('gov.elected.officials') }}" style="border-left-color:#ea5211;"><i class="fa fa-angle-right" style="color:#ea5211;"></i> Elected Officials</a></li>
                            <li><a href="{{ route('fdp.index') }}" style="border-left-color:#ea5211;"><i class="fa fa-angle-right" style="color:#ea5211;"></i> FDP Reports</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection