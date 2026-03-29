@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   BARANGAYS PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Page Hero ---- */
.brgy-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 40px 0 32px;
    position: relative;
    overflow: hidden;
}
.brgy-hero::before {
    content: '';
    position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.brgy-hero::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.brgy-hero .hero-icon  { font-size: 2.8rem; color: rgba(244,197,66,0.5); margin-bottom: 10px; }
.brgy-hero .hero-tag   {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.brgy-hero h1          { font-size: 2rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.brgy-hero .hero-sub   { font-size: 0.92rem; color: rgba(255,255,255,0.75); }
.brgy-hero .brgy-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.brgy-hero .brgy-breadcrumb a,
.brgy-hero .brgy-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.brgy-hero .brgy-breadcrumb a:hover { color: #f4c542; }
.brgy-hero .brgy-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.brgy-hero .brgy-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Stats Strip ---- */
.brgy-stats {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    padding: 0;
}
.brgy-stats .bs-inner { display: flex; flex-wrap: wrap; justify-content: space-around; }
.brgy-stats .bs-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 16px 22px; text-align: center; flex: 1; min-width: 140px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.brgy-stats .bs-item:last-child { border-right: none; }
.brgy-stats .bs-item .bs-icon  { font-size: 1.3rem; color: rgba(255,255,255,0.5); margin-bottom: 4px; }
.brgy-stats .bs-item .bs-value { font-size: 1.7rem; font-weight: 900; color: #fff; line-height: 1; }
.brgy-stats .bs-item .bs-label { font-size: 0.68rem; color: rgba(255,255,255,0.82); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px; }

/* ---- Page Wrapper ---- */
.brgy-wrap { background: #f4f6f9; padding: 32px 0 48px; }

/* ---- Search Bar ---- */
.brgy-search-bar {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    padding: 16px 20px; margin-bottom: 24px;
    display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
}
.brgy-search-bar .bsb-label { font-size: 0.85rem; font-weight: 700; color: #001f2d; white-space: nowrap; }
.brgy-search-bar input {
    flex: 1; min-width: 200px;
    border: 1.5px solid #dde2ef; border-radius: 8px;
    padding: 8px 14px; font-size: 0.88rem; color: #333;
    outline: none; transition: border-color 0.2s;
}
.brgy-search-bar input:focus { border-color: #0052a5; }
.brgy-search-bar .bsb-count { font-size: 0.8rem; color: #888; white-space: nowrap; }
.brgy-search-bar .bsb-count span { font-weight: 700; color: #0052a5; }

/* ---- Officials Table Card ---- */
.brgy-table-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;
}
.brgy-table-card .btc-header {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    padding: 13px 20px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.brgy-table-card .btc-header i { font-size: 1.1rem; opacity: 0.85; }

/* Table Styling */
.brgy-table { width: 100%; border-collapse: collapse; margin: 0; }
.brgy-table thead tr { background: #f0f4fb; }
.brgy-table thead th {
    padding: 11px 16px;
    font-size: 0.78rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 0.4px; color: #001f2d; border-bottom: 2px solid #dde2ef;
    white-space: nowrap;
}
.brgy-table tbody tr {
    border-bottom: 1px solid #f0f2f7;
    transition: background 0.15s;
}
.brgy-table tbody tr:hover { background: #f7f9ff; }
.brgy-table tbody tr:last-child { border-bottom: none; }
.brgy-table td { padding: 12px 16px; font-size: 0.88rem; color: #444; vertical-align: middle; }
.brgy-table td.brgy-name {
    font-weight: 700; color: #001f2d;
    display: flex; align-items: center; gap: 10px;
}
.brgy-table td.brgy-name .brgy-num {
    display: inline-flex; align-items: center; justify-content: center;
    width: 28px; height: 28px; border-radius: 50%;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; font-size: 0.7rem; font-weight: 800; flex-shrink: 0;
}
.brgy-table td .contact-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: #eef3fb; color: #0052a5; font-size: 0.78rem; font-weight: 600;
    padding: 3px 10px; border-radius: 20px;
}
.brgy-table td .contact-badge.none { background: #f4f4f4; color: #aaa; }
.brgy-table td .captain-name { font-weight: 600; color: #333; }

/* hidden rows when filter applied */
.brgy-row-hidden { display: none !important; }

/* ---- Sidebar Cards ---- */
.brgy-side-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 20px;
}
.brgy-side-card .bsc-header {
    padding: 11px 18px; display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.brgy-side-card .bsc-header.orange { background: linear-gradient(135deg, #ea5211, #c9460e); }
.brgy-side-card .bsc-header.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); }
.brgy-side-card .bsc-body { padding: 14px 18px; }

/* Barangay name pills */
.brgy-pill-grid { display: flex; flex-wrap: wrap; gap: 8px; }
.brgy-pill {
    display: inline-block; background: #f0f4fb;
    color: #0052a5; font-size: 0.78rem; font-weight: 600;
    padding: 5px 12px; border-radius: 20px;
    border: 1px solid #dde2ef;
    transition: background 0.2s, color 0.2s;
}
.brgy-pill:hover { background: #0052a5; color: #fff; }

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .brgy-hero h1 { font-size: 1.4rem; }
    .brgy-stats .bs-item { min-width: 50%; flex: 0 0 50%; border-bottom: 1px solid rgba(255,255,255,0.12); }
    .brgy-stats .bs-item:nth-child(even) { border-right: none; }
    .brgy-table td { padding: 10px 12px; font-size: 0.83rem; }
    .brgy-table thead th { font-size: 0.73rem; padding: 9px 12px; }
}
@media (max-width: 480px) {
    .brgy-hero h1 { font-size: 1.1rem; }
    .brgy-table td.brgy-name { flex-direction: row; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="brgy-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-building-o"></i></div>
        <div class="hero-tag"><i class="fa fa-map-marker"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Barangays of Sogod</h1>
        <div class="hero-sub">Listing of all barangays, their Barangay Captains, and contact information.</div>
        <div class="brgy-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="current">Barangays</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="brgy-stats">
    <div class="container-fluid">
        <div class="bs-inner">
            <div class="bs-item">
                <div class="bs-icon"><i class="fa fa-building-o"></i></div>
                <div class="bs-value">{{ $barangays->count() }}</div>
                <div class="bs-label">Total Barangays</div>
            </div>
            <div class="bs-item">
                <div class="bs-icon"><i class="fa fa-user"></i></div>
                <div class="bs-value">{{ $barangayofficials->count() }}</div>
                <div class="bs-label">Barangay Captains</div>
            </div>
            <div class="bs-item">
                <div class="bs-icon"><i class="fa fa-phone"></i></div>
                <div class="bs-value">{{ $barangayofficials->whereNotNull('contactnumber')->where('contactnumber','!=','')->count() }}</div>
                <div class="bs-label">With Contact No.</div>
            </div>
            <div class="bs-item">
                <div class="bs-icon"><i class="fa fa-map"></i></div>
                <div class="bs-value">Southern</div>
                <div class="bs-label">Leyte Province</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="brgy-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== MAIN COLUMN ===== --}}
            <div class="col-lg-9">

                {{-- Search Bar --}}
                <div class="brgy-search-bar" data-aos="fade-up">
                    <span class="bsb-label"><i class="fa fa-search"></i> Search:</span>
                    <input type="text" id="brgySearch" placeholder="Type barangay name or captain..." oninput="filterBarangay()">
                    <span class="bsb-count">Showing <span id="brgyCount">{{ $barangayofficials->count() }}</span> of {{ $barangayofficials->count() }} barangays</span>
                </div>

                {{-- Officials Table --}}
                <div class="brgy-table-card" data-aos="fade-up">
                    <div class="btc-header">
                        <i class="fa fa-list"></i>
                        Barangay Officials Directory
                    </div>
                    <div class="table-responsive">
                        <table class="brgy-table" id="brgyTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-building-o"></i> &nbsp;Barangay</th>
                                    <th><i class="fa fa-user"></i> &nbsp;Barangay Captain</th>
                                    <th><i class="fa fa-phone"></i> &nbsp;Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangayofficials as $i => $brgyofficial)
                                <tr class="brgy-row" data-name="{{ strtolower($brgyofficial->barangay->name ?? '') }}" data-captain="{{ strtolower($brgyofficial->captain ?? '') }}">
                                    <td style="width:44px; text-align:center; color:#aaa; font-size:0.8rem;">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="brgy-name">
                                            <span class="brgy-num">{{ $i + 1 }}</span>
                                            {{ strtoupper($brgyofficial->barangay->name ?? 'N/A') }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="captain-name">{{ $brgyofficial->captain ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        @if($brgyofficial->contactnumber)
                                            <span class="contact-badge">
                                                <i class="fa fa-phone"></i>
                                                {{ $brgyofficial->contactnumber }}
                                            </span>
                                        @else
                                            <span class="contact-badge none">
                                                <i class="fa fa-minus"></i> N/A
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-3">

                {{-- Transparency Seal --}}
                @include('frontend.widgets._transseal')

                {{-- Barangay Quick List --}}
                <div class="brgy-side-card mt-3" data-aos="fade-left" data-aos-delay="60">
                    <div class="bsc-header orange">
                        <i class="fa fa-th-list"></i> All Barangays
                    </div>
                    <div class="bsc-body">
                        <div class="brgy-pill-grid">
                            @foreach($barangays as $brgy)
                                <span class="brgy-pill">{{ $brgy->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Contact Info Card --}}
                <div class="brgy-side-card" data-aos="fade-left" data-aos-delay="120">
                    <div class="bsc-header blue">
                        <i class="fa fa-info-circle"></i> Need Help?
                    </div>
                    <div class="bsc-body">
                        <p style="font-size:0.83rem; color:#555; margin-bottom:10px;">
                            For barangay-related concerns, visit or contact your respective Barangay Hall.
                        </p>
                        <p style="font-size:0.83rem; color:#555; margin: 0;">
                            <i class="fa fa-building-o" style="color:#0052a5;"></i>
                            &nbsp;<strong>Municipal Hall</strong><br>
                            <span style="padding-left:18px;">Corner Concepcion &amp; Osmeña St.,<br>Zone 1, Sogod, Southern Leyte</span>
                        </p>
                        <hr style="border-color:#eee; margin: 10px 0;">
                        <a href="{{ route('about') }}" style="font-size:0.82rem; font-weight:700; color:#ea5211; text-decoration:none;">
                            <i class="fa fa-arrow-right"></i> Learn About Sogod
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function filterBarangay() {
    var q = document.getElementById('brgySearch').value.toLowerCase().trim();
    var rows = document.querySelectorAll('#brgyTable .brgy-row');
    var visible = 0;
    rows.forEach(function(row) {
        var name = row.getAttribute('data-name') || '';
        var captain = row.getAttribute('data-captain') || '';
        if (!q || name.includes(q) || captain.includes(q)) {
            row.classList.remove('brgy-row-hidden');
            visible++;
        } else {
            row.classList.add('brgy-row-hidden');
        }
    });
    document.getElementById('brgyCount').textContent = visible;
}
</script>
@endsection