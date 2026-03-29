@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   BUSINESS PERMIT PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Page Hero ---- */
.bp-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 45%, #0052a5 70%, #c9460e 100%);
    padding: 18px 0 14px;
    position: relative;
    overflow: hidden;
}
.bp-hero::before {
    content: '';
    position: absolute; top: -60px; right: -60px;
    width: 300px; height: 300px;
    background: rgba(244,197,66,0.08); border-radius: 50%;
}
.bp-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.bp-hero .hero-icon {
    font-size: 1.8rem; color: rgba(244,197,66,0.6); margin-bottom: 4px;
}
.bp-hero .hero-tag {
    display: inline-block;
    background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase;
    margin-bottom: 8px;
}
.bp-hero h1 {
    font-size: 1.35rem; font-weight: 900; color: #fff;
    margin-bottom: 4px; line-height: 1.2;
}
.bp-hero .hero-sub {
    font-size: 0.92rem; color: rgba(255,255,255,0.75);
}
.bp-hero .bp-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
    margin-top: 8px;
}
.bp-hero .bp-breadcrumb a,
.bp-hero .bp-breadcrumb span {
    font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none;
    transition: color 0.2s;
}
.bp-hero .bp-breadcrumb a:hover { color: #f4c542; }
.bp-hero .bp-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.bp-hero .bp-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Layout ---- */
.bp-wrap { background: #f4f6f9; padding: 32px 0 40px; }

/* ---- Plain Content (no card) ---- */
.bp-plain-content { margin-bottom: 24px; }
.bp-content-title {
    display: flex; align-items: center; gap: 10px;
    font-size: 1.15rem; font-weight: 800; color: #001f2d;
    margin-bottom: 16px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.bp-title-bar {
    display: inline-block; width: 4px; height: 22px;
    background: #0052a5; border-radius: 3px; flex-shrink: 0;
}
.bp-content-body {
    font-size: 0.93rem; color: #444; line-height: 1.85;
}
.bp-content-body h2, .bp-content-body h3 { color: #0052a5; font-weight: 700; margin-top: 18px; }
.bp-content-body h4 { color: #001f2d; font-weight: 700; }
.bp-content-body p { margin-bottom: 0.9rem; }
.bp-content-body ul, .bp-content-body ol { padding-left: 22px; }
.bp-content-body li { margin-bottom: 5px; }
.bp-content-body table { width: 100% !important; border-collapse: collapse; margin-top: 10px; }
.bp-content-body table tr { height: auto !important; }
.bp-content-body table th {
    background: #0052a5; color: #fff; padding: 8px 12px;
    font-size: 0.85rem; text-align: left; height: auto !important;
}
.bp-content-body table td {
    padding: 8px 12px; border-bottom: 1px solid #f0f0f0; font-size: 0.85rem; height: auto !important;
}
.bp-content-body table tr:hover td { background: #fdf5f1; }
.bp-content-body blockquote {
    border-left: 4px solid #ea5211; background: #fff8f5;
    padding: 12px 16px; border-radius: 0 8px 8px 0;
    margin: 16px 0; font-style: italic; color: #555;
}

/* ---- No Content Notice ---- */
.bp-no-content {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    padding: 40px 28px; text-align: center;
    margin-bottom: 24px; color: #888;
}
.bp-no-content i { font-size: 2.5rem; color: #ddd; margin-bottom: 12px; display: block; }
.bp-no-content p { font-size: 0.9rem; margin: 0; }

/* ---- eBPLS CTA Card ---- */
.ebpls-cta-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 20px;
}
.ebpls-cta-card .ebpls-img img {
    width: 100%; height: 130px; object-fit: cover; display: block;
}
.ebpls-cta-card .ebpls-cta-body { padding: 18px 18px 20px; }
.ebpls-cta-card .ebpls-cta-tag {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(234,82,17,0.12); color: #ea5211;
    font-size: 0.7rem; font-weight: 700; padding: 3px 10px;
    border-radius: 12px; letter-spacing: 0.5px; text-transform: uppercase;
    margin-bottom: 9px; border: 1px solid rgba(234,82,17,0.25);
}
.ebpls-cta-card .ebpls-cta-title {
    font-size: 1rem; font-weight: 800; color: #001f2d;
    margin-bottom: 7px; line-height: 1.3;
}
.ebpls-cta-card .ebpls-cta-desc {
    font-size: 0.82rem; color: #666;
    margin-bottom: 14px; line-height: 1.6;
}
.ebpls-cta-card .ebpls-btn-group { display: flex; flex-direction: column; gap: 8px; }
.ebpls-cta-card .ebpls-btn-login {
    display: flex; align-items: center; justify-content: center; gap: 7px;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; font-weight: 700; font-size: 0.85rem;
    padding: 10px 14px; border-radius: 8px; text-decoration: none;
    transition: all 0.2s;
    box-shadow: 0 3px 12px rgba(234,82,17,0.35);
}
.ebpls-cta-card .ebpls-btn-login:hover {
    background: linear-gradient(135deg, #c9460e, #a33808);
    color: #fff; text-decoration: none; transform: translateY(-2px);
}

/* ---- Share Card ---- */
.bp-share-card {
    background: #fff; border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    padding: 14px 16px; margin-bottom: 20px;
}
.bp-share-card .bpsc-title {
    font-size: 0.82rem; font-weight: 700; color: #555;
    margin-bottom: 10px; display: flex; align-items: center; gap: 6px;
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 991px) {
    .bp-hero h1 { font-size: 1.65rem; }
    .bp-hero .hero-icon { font-size: 2.4rem; }
}
@media (max-width: 767px) {
    .bp-hero { padding: 28px 0 24px; }
    .bp-hero .hero-icon { font-size: 2rem; margin-bottom: 6px; }
    .bp-hero h1 { font-size: 1.35rem; }
    .bp-hero .hero-sub { font-size: 0.84rem; }
    .bp-wrap .row { flex-direction: column; }
    .bp-wrap .col-md-8,
    .bp-wrap .col-md-4 { max-width: 100%; flex: 0 0 100%; }
    .ebpls-cta-card .ebpls-cta-body { padding: 14px 14px 16px; }
}
@media (max-width: 480px) {
    .bp-hero h1 { font-size: 1.15rem; }
    .bp-hero .hero-tag { font-size: 0.65rem; }
}
</style>

{{-- ===== PAGE HERO ===== --}}
<div class="bp-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-file-text-o"></i></div>
        <div class="hero-tag"><i class="fa fa-building"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Business Permit &amp; Licensing</h1>
        <div class="hero-sub">Apply, renew, and manage your business permit at the Municipal Hall or through the eBPLS online portal.</div>
        <div class="bp-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('bpermit') }}">Transactions</a>
            <span class="sep">/</span>
            <span class="current">Business Permit</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="bp-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== LEFT COLUMN ===== --}}
            <div class="col-md-8">

                {{-- CMS Page Content — edit via Voyager Admin > Pages > slug: business-permit --}}
                @if($cmsPage && $cmsPage->body)
                <div class="bp-plain-content" data-aos="fade-up">
                    @if($cmsPage->title)
                        <h2 class="bp-content-title">
                            <span class="bp-title-bar"></span>
                            {{ $cmsPage->title }}
                        </h2>
                    @endif
                    <div class="bp-content-body">
                        {!! $cmsPage->body !!}
                    </div>
                </div>
                @else
                <div class="bp-no-content" data-aos="fade-up">
                    <i class="fa fa-file-text-o"></i>
                    <p>Business permit information is being updated.<br>Please contact the Municipal Hall for assistance.</p>
                </div>
                @endif

            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-md-4">

                {{-- eBPLS CTA — URL managed in Voyager: Pages > slug "ebpls-link" > Body field --}}
                <div class="ebpls-cta-card" data-aos="fade-left">
                    <div class="ebpls-img">
                        <img src="{{ Voyager::image('ebpls/displayebpls.jpg') }}" alt="eBPLS Online Portal"
                             onerror="this.style.display='none'">
                    </div>
                    <div class="ebpls-cta-body">
                        <div class="ebpls-cta-tag"><i class="fa fa-globe"></i> Online Portal</div>
                        <div class="ebpls-cta-title">eBPLS &mdash; Business Permit &amp; Licensing System</div>
                        <div class="ebpls-cta-desc">Apply or renew your business permit online. No need to queue at the Municipal Hall.</div>
                        @if($ebplsUrl)
                        <div class="ebpls-btn-group">
                            <a href="{{ $ebplsUrl }}" target="_blank" rel="noopener" class="ebpls-btn-login">
                                <i class="fa fa-external-link"></i> Go to eBPLS Portal
                            </a>
                        </div>
                        @else
                        <p style="font-size:0.8rem;color:#aaa;margin:0;font-style:italic;">
                            <i class="fa fa-info-circle"></i> Portal link not yet set. Admin: add a Page in Voyager with slug <strong>ebpls-link</strong> and paste the URL in the Body field.
                        </p>
                        @endif
                    </div>
                </div>

                {{-- Share This --}}
                <div class="bp-share-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="bpsc-title"><i class="fa fa-share-alt"></i> Share this page</div>
                    @include('frontend.widgets._sharethis')
                </div>

            </div>
        </div>
    </div>
</div>

@endsection