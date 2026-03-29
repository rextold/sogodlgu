@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   MISSION & VISION PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Page Hero ---- */
.mv-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 18px 0 14px;
    position: relative;
    overflow: hidden;
}
.mv-hero::before {
    content: '';
    position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.mv-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.mv-hero .hero-icon { font-size: 1.8rem; color: rgba(244,197,66,0.55); margin-bottom: 4px; }
.mv-hero .hero-tag {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.mv-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; line-height: 1.2; }
.mv-hero .hero-sub { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.mv-hero .mv-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.mv-hero .mv-breadcrumb a,
.mv-hero .mv-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
.mv-hero .mv-breadcrumb a:hover { color: #f4c542; }
.mv-hero .mv-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.mv-hero .mv-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Background ---- */
.mv-page-bg {
    background: #f4f6f9;
    padding: 36px 0 48px;
}

/* ---- MV Cards ---- */
.mv-card-new {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.09);
    overflow: hidden;
    margin-bottom: 28px;
    transition: transform 0.25s, box-shadow 0.25s;
}
.mv-card-new:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 32px rgba(0,0,0,0.13);
}
.mv-card-header {
    padding: 16px 24px;
    display: flex; align-items: center; gap: 12px;
    color: #fff; font-size: 1rem; font-weight: 800;
}
.mv-card-header.blue-h   { background: linear-gradient(135deg, #0052a5 0%, #003d7a 100%); }
.mv-card-header.orange-h { background: linear-gradient(135deg, #ea5211 0%, #c9460e 100%); }
.mv-card-header .mvch-icon-wrap {
    background: rgba(255,255,255,0.18);
    width: 42px; height: 42px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    font-size: 1.2rem;
}
.mv-card-header .mvch-title { font-size: 1.1rem; font-weight: 900; letter-spacing: 0.2px; }
.mv-card-header .mvch-sub  { font-size: 0.75rem; font-weight: 400; opacity: 0.85; margin-top: 1px; }
.mv-card-body {
    padding: 24px 28px;
    font-size: 0.95rem; color: #444; line-height: 1.85;
    text-align: justify; word-break: break-word;
}
.mv-card-body h1, .mv-card-body h2, .mv-card-body h3 { font-weight: 700; color: #001f2d; }
.mv-card-body p { margin-bottom: 12px; }
.mv-card-body ul { padding-left: 20px; }
.mv-card-body ul li { margin-bottom: 8px; }

/* ---- Divider Strip ---- */
.mv-divider {
    text-align: center;
    padding: 6px 0 20px;
}
.mv-divider .mv-divider-inner {
    display: inline-flex; align-items: center; gap: 12px;
    color: #bbb; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;
}
.mv-divider .mv-divider-inner::before, .mv-divider .mv-divider-inner::after {
    content: ''; display: block; width: 60px; height: 1px; background: #ddd;
}

/* ---- Core Values Section ---- */
.mv-values-section { margin-bottom: 28px; }
.mv-values-section .mvv-header {
    text-align: center; margin-bottom: 24px;
}
.mv-values-section .mvv-header .mvv-tag {
    display: inline-block; background: #f4c542; color: #001f2d;
    font-size: 0.68rem; font-weight: 800; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.mv-values-section .mvv-header h2 { font-size: 1.35rem; font-weight: 900; color: #001f2d; }
.mv-values-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px;
}
.mv-value-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    padding: 20px 16px; text-align: center;
    transition: transform 0.25s, box-shadow 0.25s;
}
.mv-value-card:hover { transform: translateY(-4px); box-shadow: 0 10px 24px rgba(0,0,0,0.14); }
.mv-value-card .mvc-icon-wrap {
    width: 52px; height: 52px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 12px; font-size: 1.4rem;
}
.mvc-icon-wrap.orange { background: #fff4ef; color: #ea5211; }
.mvc-icon-wrap.blue   { background: #edf3fb; color: #0052a5; }
.mvc-icon-wrap.gold   { background: #fffbee; color: #c08b00; }
.mvc-icon-wrap.teal   { background: #eef9f6; color: #186152; }
.mvc-icon-wrap.navy   { background: #edf2f5; color: #001f2d; }
.mvc-icon-wrap.purple { background: #f4f0fb; color: #6030a8; }
.mv-value-card .mvc-title { font-size: 0.88rem; font-weight: 800; color: #001f2d; margin-bottom: 4px; }
.mv-value-card .mvc-desc  { font-size: 0.78rem; color: #666; line-height: 1.4; }

/* ---- Back CTA ---- */
.mv-back-cta {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    border-radius: 14px; padding: 26px 28px;
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;
}
.mv-back-cta .mbc-text { color: rgba(255,255,255,0.9); }
.mv-back-cta .mbc-text h4 { font-size: 1rem; font-weight: 800; color: #fff; margin-bottom: 3px; }
.mv-back-cta .mbc-text p  { font-size: 0.82rem; color: rgba(255,255,255,0.65); margin: 0; }
.mv-back-cta .mbc-actions { display: flex; gap: 10px; flex-wrap: wrap; }
.mbc-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: #ea5211; color: #fff; font-weight: 700;
    padding: 9px 20px; border-radius: 24px; text-decoration: none;
    transition: background 0.25s, transform 0.2s; font-size: 0.85rem;
    box-shadow: 0 4px 12px rgba(234,82,17,0.4);
}
.mbc-btn:hover { background: #f4c542; color: #001f2d; transform: translateY(-2px); text-decoration: none; }
.mbc-btn-out {
    display: inline-flex; align-items: center; gap: 7px;
    border: 2px solid rgba(255,255,255,0.3); color: #fff; font-weight: 700;
    padding: 7px 18px; border-radius: 24px; text-decoration: none;
    transition: all 0.25s; font-size: 0.85rem;
}
.mbc-btn-out:hover { border-color: #f4c542; color: #f4c542; text-decoration: none; }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .mv-hero h1           { font-size: 1.4rem; }
    .mv-card-body         { padding: 18px; font-size: 0.89rem; }
    .mv-values-grid       { grid-template-columns: 1fr 1fr; }
    .mv-back-cta          { padding: 20px; }
}
@media (max-width: 480px) {
    .mv-hero h1           { font-size: 1.1rem; }
    .mv-values-grid       { grid-template-columns: 1fr 1fr; gap: 10px; }
    .mv-value-card        { padding: 16px 12px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="mv-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-eye"></i></div>
        <div class="hero-tag"><i class="fa fa-info-circle"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Mission &amp; Vision</h1>
        <div class="hero-sub">Our purpose, our direction, and the values that guide us.</div>
        <div class="mv-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('about') }}">About Sogod</a>
            <span class="sep">/</span>
            <span class="current">Mission &amp; Vision</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="mv-page-bg">
    <div class="container">

        {{-- Background image overlay (optional, uses $mv->image if set) --}}
        @if($mv && $mv->image)
        <div style="
            background: linear-gradient(rgba(0,31,45,0.84), rgba(0,61,122,0.84)),
                        url('{{ Voyager::image($mv->image) }}') center/cover no-repeat;
            border-radius: 16px; padding: 32px 28px; margin-bottom: 32px;
            text-align: center; color: rgba(255,255,255,0.9);" data-aos="fade-up">
            <i class="fa fa-quote-left" style="font-size:2rem; color:rgba(244,197,66,0.4);"></i>
            <p style="font-size:1rem; font-style:italic; font-weight:500; max-width:700px; margin:12px auto 0; color:rgba(255,255,255,0.85);">
                We envision Sogod as a thriving, progressive, and self-reliant community anchored on good governance,
                sustainable development, and the well-being of every citizen.
            </p>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                {{-- ===== MISSION CARD ===== --}}
                <div class="mv-card-new" data-aos="fade-up">
                    <div class="mv-card-header blue-h">
                        <div class="mvch-icon-wrap"><i class="fa fa-bullseye"></i></div>
                        <div>
                            <div class="mvch-title">Our Mission</div>
                            <div class="mvch-sub">What we do and who we serve</div>
                        </div>
                    </div>
                    <div class="mv-card-body">
                        @if($mv && $mv->mission)
                            {!! $mv->mission !!}
                        @else
                            <p style="color:#888; font-style:italic;">Mission content coming soon.</p>
                        @endif
                    </div>
                </div>

                <div class="mv-divider">
                    <div class="mv-divider-inner"><i class="fa fa-asterisk" style="color:#f4c542;"></i></div>
                </div>

                {{-- ===== VISION CARD ===== --}}
                <div class="mv-card-new" data-aos="fade-up">
                    <div class="mv-card-header orange-h">
                        <div class="mvch-icon-wrap"><i class="fa fa-eye"></i></div>
                        <div>
                            <div class="mvch-title">Our Vision</div>
                            <div class="mvch-sub">Where we aspire to be</div>
                        </div>
                    </div>
                    <div class="mv-card-body">
                        @if($mv && $mv->vision)
                            {!! $mv->vision !!}
                        @else
                            <p style="color:#888; font-style:italic;">Vision content coming soon.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        {{-- ===== CORE VALUES ===== --}}
        <div class="mv-values-section" data-aos="fade-up" data-aos-delay="80">
            <div class="mvv-header">
                <div class="mvv-tag"><i class="fa fa-star"></i> &nbsp;Our Foundation</div>
                <h2>Core Values</h2>
            </div>
            <div class="mv-values-grid">
                <div class="mv-value-card" data-aos="zoom-in" data-aos-delay="0">
                    <div class="mvc-icon-wrap blue"><i class="fa fa-balance-scale"></i></div>
                    <div class="mvc-title">Integrity</div>
                    <div class="mvc-desc">Upholding honesty and transparency in every public service we deliver.</div>
                </div>
                <div class="mv-value-card" data-aos="zoom-in" data-aos-delay="60">
                    <div class="mvc-icon-wrap orange"><i class="fa fa-heart"></i></div>
                    <div class="mvc-title">Service</div>
                    <div class="mvc-desc">Dedicating ourselves to the welfare and needs of every Sogodnon.</div>
                </div>
                <div class="mv-value-card" data-aos="zoom-in" data-aos-delay="120">
                    <div class="mvc-icon-wrap teal"><i class="fa fa-leaf"></i></div>
                    <div class="mvc-title">Sustainability</div>
                    <div class="mvc-desc">Protecting our environment and natural resources for future generations.</div>
                </div>
                <div class="mv-value-card" data-aos="zoom-in" data-aos-delay="0">
                    <div class="mvc-icon-wrap gold"><i class="fa fa-handshake-o"></i></div>
                    <div class="mvc-title">Unity</div>
                    <div class="mvc-desc">Building a community through partnership, respect, and inclusivity.</div>
                </div>
                <div class="mv-value-card" data-aos="zoom-in" data-aos-delay="60">
                    <div class="mvc-icon-wrap purple"><i class="fa fa-lightbulb-o"></i></div>
                    <div class="mvc-title">Innovation</div>
                    <div class="mvc-desc">Embracing technology and new ideas to improve governance and services.</div>
                </div>
                <div class="mv-value-card" data-aos="zoom-in" data-aos-delay="120">
                    <div class="mvc-icon-wrap navy"><i class="fa fa-shield"></i></div>
                    <div class="mvc-title">Accountability</div>
                    <div class="mvc-desc">Ensuring responsible use of public funds and resources at all times.</div>
                </div>
            </div>
        </div>

        {{-- ===== BACK CTA ===== --}}
        <div class="mv-back-cta" data-aos="fade-up">
            <div class="mbc-text">
                <h4><i class="fa fa-arrow-left"></i> &nbsp;Continue Exploring Sogod</h4>
                <p>Learn more about our history, local government, and community.</p>
            </div>
            <div class="mbc-actions">
                <a href="{{ route('about') }}" class="mbc-btn"><i class="fa fa-map-marker"></i> About Sogod</a>
                <a href="{{ route('gov.elected.officials') }}" class="mbc-btn-out"><i class="fa fa-users"></i> Elected Officials</a>
                <a href="{{ route('home') }}" class="mbc-btn-out"><i class="fa fa-home"></i> Home</a>
            </div>
        </div>

    </div>
</div>

@endsection
