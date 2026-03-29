@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   BUSINESS PERMIT PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Page Hero ---- */
.bp-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 40px 0 32px;
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
    font-size: 3rem; color: rgba(244,197,66,0.6); margin-bottom: 10px;
}
.bp-hero .hero-tag {
    display: inline-block;
    background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase;
    margin-bottom: 8px;
}
.bp-hero h1 {
    font-size: 2rem; font-weight: 900; color: #fff;
    margin-bottom: 6px; line-height: 1.2;
}
.bp-hero .hero-sub {
    font-size: 0.92rem; color: rgba(255,255,255,0.75);
}
.bp-hero .bp-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
    margin-top: 16px;
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

/* ---- CMS Content ---- */
.bp-content-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 24px;
}
.bp-content-card .bpcc-header {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    padding: 12px 20px;
    display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.bp-content-card .bpcc-body {
    padding: 20px 24px;
    font-size: 0.92rem; color: #444; line-height: 1.75;
}
.bp-content-card .bpcc-body h2,
.bp-content-card .bpcc-body h3,
.bp-content-card .bpcc-body h4 { color: #0052a5; font-weight: 700; margin-top: 18px; }
.bp-content-card .bpcc-body ul,
.bp-content-card .bpcc-body ol { padding-left: 20px; }
.bp-content-card .bpcc-body li { margin-bottom: 5px; }
.bp-content-card .bpcc-body table {
    width: 100%; border-collapse: collapse; margin-top: 10px;
}
.bp-content-card .bpcc-body table th {
    background: #0052a5; color: #fff; padding: 8px 12px;
    font-size: 0.85rem; text-align: left;
}
.bp-content-card .bpcc-body table td {
    padding: 8px 12px; border-bottom: 1px solid #f0f0f0;
    font-size: 0.85rem;
}
.bp-content-card .bpcc-body table tr:hover td { background: #fdf5f1; }

/* ---- Process Steps ---- */
.bp-steps-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 24px;
}
.bp-steps-card .bpsc-header {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    padding: 12px 20px;
    display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.bp-steps-card .bpsc-body { padding: 20px 24px; }
.steps-list { display: flex; flex-direction: column; gap: 0; }
.step-item {
    display: flex; gap: 16px; align-items: flex-start;
    padding: 14px 0;
    border-bottom: 1px solid #f4f0ec;
    position: relative;
}
.step-item:last-child { border-bottom: none; }
.step-num {
    display: flex; align-items: center; justify-content: center;
    width: 36px; height: 36px; border-radius: 50%;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; font-weight: 800; font-size: 0.88rem;
    flex-shrink: 0; margin-top: 2px;
    box-shadow: 0 3px 8px rgba(234,82,17,0.35);
}
.step-content .step-title {
    font-weight: 700; color: #0052a5; font-size: 0.92rem; margin-bottom: 3px;
}
.step-content .step-desc {
    font-size: 0.84rem; color: #555; line-height: 1.55;
}

/* ---- Requirements Section ---- */
.bp-reqs-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 24px;
}
.bp-reqs-card .bprc-header {
    background: linear-gradient(135deg, #186152, #0e3d32);
    padding: 12px 20px;
    display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.bp-reqs-card .bprc-body { padding: 20px 24px; }
.req-tabs { display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap; }
.req-tab-btn {
    padding: 6px 16px; border-radius: 20px; font-size: 0.82rem; font-weight: 700;
    border: 2px solid #e0e0e0; background: #fff; color: #555;
    cursor: pointer; transition: all 0.2s;
}
.req-tab-btn.active {
    background: #0052a5; border-color: #0052a5; color: #fff;
}
.req-panel { display: none; }
.req-panel.active { display: block; }
.req-list {
    list-style: none; padding: 0; margin: 0;
    display: flex; flex-direction: column; gap: 8px;
}
.req-list li {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: 0.88rem; color: #444; padding: 8px 12px;
    background: #f8f9fc; border-radius: 8px; border-left: 3px solid #0052a5;
}
.req-list li i { color: #0052a5; margin-top: 2px; flex-shrink: 0; }
.req-list li.orange { border-left-color: #ea5211; }
.req-list li.orange i { color: #ea5211; }

/* ---- Fees Card ---- */
.bp-fees-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 24px;
}
.bp-fees-card .bpfc-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 12px 20px;
    display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.bp-fees-card .bpfc-body { padding: 20px 24px; }
.fees-table { width: 100%; border-collapse: collapse; }
.fees-table th {
    background: #f0f4ff; color: #003d7a;
    padding: 9px 14px; font-size: 0.82rem; font-weight: 700; text-align: left;
    border-bottom: 2px solid #0052a5;
}
.fees-table td {
    padding: 9px 14px; font-size: 0.85rem; color: #444;
    border-bottom: 1px solid #f0f0f0;
}
.fees-table tr:hover td { background: #fdf5f1; }
.fees-table .fee-note {
    font-size: 0.78rem; color: #888; font-style: italic;
    padding: 10px 14px; background: #fffbf0;
    border-top: 2px solid #f4c542; text-align: left;
}

/* ---- SIDEBAR ---- */
/* eBPLS CTA Card */
.ebpls-cta-card {
    background: linear-gradient(160deg, #001f2d 0%, #003d7a 60%, #0052a5 100%);
    border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 18px rgba(0,32,80,0.25);
    margin-bottom: 20px;
}
.ebpls-cta-card .ebpls-img img {
    width: 100%; display: block;
    max-height: 160px; object-fit: cover;
    opacity: 0.85;
}
.ebpls-cta-card .ebpls-cta-body { padding: 18px 18px 20px; }
.ebpls-cta-card .ebpls-cta-tag {
    display: inline-block; background: #f4c542; color: #001f2d;
    font-size: 0.68rem; font-weight: 800; padding: 3px 10px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase;
    margin-bottom: 8px;
}
.ebpls-cta-card .ebpls-cta-title {
    font-size: 1.05rem; font-weight: 800; color: #fff;
    line-height: 1.3; margin-bottom: 8px;
}
.ebpls-cta-card .ebpls-cta-desc {
    font-size: 0.8rem; color: rgba(255,255,255,0.72); margin-bottom: 14px; line-height: 1.55;
}
.ebpls-cta-card .ebpls-btn-group {
    display: flex; flex-direction: column; gap: 8px;
}
.ebpls-cta-card .ebpls-btn-login {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    background: #ea5211; color: #fff;
    font-weight: 700; font-size: 0.88rem;
    padding: 10px 16px; border-radius: 25px; text-decoration: none;
    transition: background 0.25s, transform 0.2s;
    box-shadow: 0 3px 10px rgba(234,82,17,0.4);
}
.ebpls-cta-card .ebpls-btn-login:hover {
    background: #f4c542; color: #001f2d; transform: translateY(-2px);
}
.ebpls-cta-card .ebpls-btn-register {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    border: 2px solid rgba(255,255,255,0.35); color: #fff;
    font-weight: 700; font-size: 0.88rem;
    padding: 8px 16px; border-radius: 25px; text-decoration: none;
    transition: all 0.25s;
}
.ebpls-cta-card .ebpls-btn-register:hover {
    border-color: #f4c542; color: #f4c542; background: rgba(244,197,66,0.1); transform: translateY(-2px);
}

/* Sidebar info cards */
.bp-info-sidebar-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 20px;
}
.bp-info-sidebar-card .bisc-header {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    padding: 10px 16px;
    display: flex; align-items: center; gap: 8px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.bp-info-sidebar-card .bisc-body { padding: 14px 16px; }
.office-info-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
.office-info-list li {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: 0.84rem; color: #444;
}
.office-info-list li i { color: #0052a5; margin-top: 2px; flex-shrink: 0; width: 14px; text-align: center; }
.office-info-list li strong { display: block; color: #001f2d; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 1px; }

/* Deadline notice */
.deadline-banner {
    background: linear-gradient(135deg, #c9460e, #ea5211);
    border-radius: 10px; padding: 14px 16px; margin-bottom: 20px;
    display: flex; gap: 12px; align-items: flex-start;
}
.deadline-banner .db-icon { font-size: 1.5rem; color: #f4c542; flex-shrink: 0; margin-top: 2px; }
.deadline-banner .db-text .db-title { font-size: 0.88rem; font-weight: 800; color: #fff; margin-bottom: 4px; }
.deadline-banner .db-text .db-desc { font-size: 0.8rem; color: rgba(255,255,255,0.85); line-height: 1.5; }

/* Share this */
.bp-share-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    padding: 14px 16px; margin-bottom: 20px;
}
.bp-share-card .bpsc-title {
    font-size: 0.8rem; font-weight: 700; color: #555; text-transform: uppercase;
    letter-spacing: 0.5px; margin-bottom: 10px;
}

/* ---- Stats Strip ---- */
.bp-stats-strip {
    background: linear-gradient(135deg, #001f2d 0%, #002d40 100%);
    border-bottom: 3px solid #ea5211;
    padding: 0;
}
.bp-stats-strip .bpss-inner {
    display: flex; flex-wrap: wrap;
}
.bp-stats-strip .bpss-item {
    flex: 1; min-width: 140px;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 14px 12px;
    border-right: 1px solid rgba(255,255,255,0.1);
    text-align: center;
}
.bp-stats-strip .bpss-item:last-child { border-right: none; }
.bp-stats-strip .bpss-num {
    font-size: 1.6rem; font-weight: 900; color: #f4c542; line-height: 1.1;
}
.bp-stats-strip .bpss-label {
    font-size: 0.68rem; color: rgba(255,255,255,0.65);
    font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 3px;
}
.bp-stats-strip .bpss-icon {
    font-size: 0.95rem; color: #ea5211; margin-bottom: 4px;
}

/* ---- Permit Types Grid ---- */
.bp-types-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 24px;
}
.bp-types-card .bptc-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 12px 20px;
    display: flex; align-items: center; gap: 9px;
    color: #fff; font-weight: 700; font-size: 0.95rem;
}
.bp-types-card .bptc-body { padding: 20px 24px; }
.permit-type-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;
}
.permit-type-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    text-align: center; padding: 16px 10px;
    border-radius: 10px; border: 2px solid #e8edf5;
    transition: all 0.25s ease; cursor: default;
}
.permit-type-item:hover {
    border-color: #0052a5; background: #f0f4ff;
    transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,82,165,0.15);
}
.permit-type-item .pti-icon {
    font-size: 1.7rem; margin-bottom: 8px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
}
.permit-type-item .pti-icon.orange {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
}
.permit-type-item .pti-label {
    font-size: 0.78rem; font-weight: 700; color: #2a3a5c; line-height: 1.3;
}

/* ---- FAQ Accordion ---- */
.bp-faq-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 24px;
}
.bp-faq-card .bpfaq-header {
    background: linear-gradient(135deg, #f4c542, #e2ac46);
    padding: 12px 20px;
    display: flex; align-items: center; gap: 9px;
    color: #1a1a1a; font-weight: 700; font-size: 0.95rem;
}
.bp-faq-card .bpfaq-body { padding: 16px 20px; }
.faq-item { border-bottom: 1px solid #f0f0f0; }
.faq-item:last-child { border-bottom: none; }
.faq-question {
    display: flex; justify-content: space-between; align-items: center;
    padding: 13px 4px; cursor: pointer;
    font-size: 0.9rem; font-weight: 700; color: #0052a5;
    transition: color 0.2s;
    gap: 8px;
    -webkit-tap-highlight-color: transparent;
}
.faq-question:hover { color: #ea5211; }
.faq-question .fq-arrow {
    font-size: 0.85rem; color: #ea5211; flex-shrink: 0;
    transition: transform 0.3s ease;
}
.faq-question.open .fq-arrow { transform: rotate(180deg); }
.faq-answer {
    display: none; padding: 0 4px 14px;
    font-size: 0.85rem; color: #555; line-height: 1.7;
}
.faq-answer a { color: #ea5211; }

/* ---- Downloads Card ---- */
.bp-downloads-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 20px;
}
.bp-downloads-card .bpdc-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 10px 16px;
    display: flex; align-items: center; gap: 8px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.bp-downloads-card .bpdc-body { padding: 12px 14px; display: flex; flex-direction: column; gap: 8px; }
.dl-item {
    display: flex; align-items: center; gap: 10px;
    background: #f8f9fc; border-radius: 8px; padding: 9px 12px;
    text-decoration: none; color: #333;
    border: 1px solid #eaeef5;
    transition: all 0.2s ease;
    font-size: 0.83rem;
}
.dl-item:hover {
    border-color: #0052a5; background: #f0f4ff; color: #0052a5; text-decoration: none;
    transform: translateX(3px);
}
.dl-item .dl-icon {
    width: 32px; height: 32px; border-radius: 6px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; flex-shrink: 0;
}
.dl-item .dl-icon.pdf { background: #fde8e8; color: #c0392b; }
.dl-item .dl-icon.word { background: #e8edf8; color: #2c5aa0; }
.dl-item .dl-text .dl-name { font-weight: 700; color: inherit; font-size: 0.82rem; }
.dl-item .dl-text .dl-type { font-size: 0.73rem; color: #999; }
.dl-item .dl-arrow { margin-left: auto; font-size: 0.78rem; color: #aaa; }

/* ---- Track Application CTA ---- */
.bp-track-card {
    background: linear-gradient(135deg, #ea5211 0%, #c9460e 100%);
    border-radius: 12px; padding: 16px 18px;
    box-shadow: 0 4px 18px rgba(234,82,17,0.3);
    margin-bottom: 20px;
    text-align: center;
}
.bp-track-card .bptc-icon { font-size: 1.8rem; color: rgba(255,255,255,0.6); margin-bottom: 8px; }
.bp-track-card .bptc-title { font-size: 0.95rem; font-weight: 800; color: #fff; margin-bottom: 6px; }
.bp-track-card .bptc-desc { font-size: 0.8rem; color: rgba(255,255,255,0.8); margin-bottom: 12px; line-height: 1.5; }
.bp-track-card .bptc-btn {
    display: inline-flex; align-items: center; gap: 7px;
    background: #fff; color: #ea5211;
    font-weight: 800; font-size: 0.85rem;
    padding: 9px 20px; border-radius: 25px; text-decoration: none;
    transition: all 0.25s; box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}
.bp-track-card .bptc-btn:hover {
    background: #f4c542; color: #001f2d; transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2); text-decoration: none;
}

/* ============================================================
   RESPONSIVE
============================================================ */

/* Tablet (≤ 991px) */
@media (max-width: 991px) {
    .bp-hero h1 { font-size: 1.65rem; }
    .bp-hero .hero-icon { font-size: 2.4rem; }
    .permit-type-grid { grid-template-columns: repeat(3, 1fr); }
}

/* Mobile (≤ 767px) */
@media (max-width: 767px) {
    /* Hero */
    .bp-hero { padding: 28px 0 24px; }
    .bp-hero .hero-icon { font-size: 2rem; margin-bottom: 6px; }
    .bp-hero h1 { font-size: 1.35rem; }
    .bp-hero .hero-sub { font-size: 0.84rem; }
    .bp-hero .bp-breadcrumb { margin-top: 10px; }
    /* Stats strip */
    .bp-stats-strip .bpss-item { min-width: 80px; padding: 10px 8px; }
    .bp-stats-strip .bpss-num { font-size: 1.2rem; }
    .bp-stats-strip .bpss-label { font-size: 0.6rem; }
    /* Permit type grid */
    .permit-type-grid { grid-template-columns: repeat(2, 1fr); }
    /* Content cards */
    .bp-content-card .bpcc-body { padding: 14px 16px; }
    .bp-steps-card .bpsc-body { padding: 14px 16px; }
    .bp-types-card .bptc-body { padding: 14px 16px; }
    .bp-faq-card .bpfaq-body { padding: 12px 14px; }
    .step-item { gap: 12px; padding: 12px 0; }
    .step-num { width: 30px; height: 30px; font-size: 0.82rem; }
    .step-content .step-title { font-size: 0.88rem; }
    .step-content .step-desc { font-size: 0.8rem; }
    /* Requirements tabs */
    .req-tab-btn { padding: 5px 12px; font-size: 0.78rem; }
    .req-list li { font-size: 0.82rem; padding: 7px 10px; }
    /* FAQ */
    .faq-question { font-size: 0.84rem; padding: 11px 4px; }
    .faq-answer { font-size: 0.81rem; }
    /* Fees table — horizontal scroll */
    .bp-fees-card .bpfc-body { padding: 14px 12px; overflow-x: auto; }
    .fees-table { min-width: 480px; }
    /* Sidebar cards */
    .deadline-banner { padding: 12px 14px; }
    .deadline-banner .db-title { font-size: 0.84rem; }
    .deadline-banner .db-desc { font-size: 0.75rem; }
    .ebpls-cta-card .ebpls-cta-title { font-size: 0.95rem; }
    /* Reorder: sidebar goes below main on mobile (Bootstrap default) */
    .bp-wrap .row { flex-direction: column; }
    .bp-wrap .col-md-8,
    .bp-wrap .col-md-4 { max-width: 100%; flex: 0 0 100%; }
}

/* Small Mobile (≤ 480px) */
@media (max-width: 480px) {
    .bp-hero h1 { font-size: 1.15rem; }
    .bp-hero .hero-tag { font-size: 0.65rem; }
    .permit-type-grid { grid-template-columns: repeat(2, 1fr); gap: 8px; }
    .permit-type-item { padding: 12px 6px; }
    .permit-type-item .pti-icon { font-size: 1.35rem; }
    .permit-type-item .pti-label { font-size: 0.72rem; }
    .req-tabs { gap: 6px; }
    .req-tab-btn { padding: 4px 10px; font-size: 0.74rem; }
    .fees-table th, .fees-table td { padding: 7px 10px; font-size: 0.78rem; }
    .ebpls-cta-card .ebpls-cta-body { padding: 14px 14px 16px; }
    .office-info-list li { font-size: 0.8rem; }
    .bp-content-card .bpcc-header,
    .bp-steps-card .bpsc-header,
    .bp-reqs-card .bprc-header,
    .bp-fees-card .bpfc-header,
    .bp-types-card .bptc-header,
    .bp-faq-card .bpfaq-header { font-size: 0.88rem; padding: 10px 14px; }
}
</style>

{{-- ===== PAGE HERO ===== --}}
<div class="bp-hero">
    <div class="container">
        <div class="hero-icon"><i class="fa fa-file-text-o"></i></div>
        <div class="hero-tag"><i class="fa fa-building"></i> &nbsp;Municipal Government of Sogod</div>
        <h1>Business Permit &amp; Licensing</h1>
        <div class="hero-sub">Apply, renew, and manage your business permit online or at the Municipal Hall.</div>
        <div class="bp-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('bpermit') }}">Transactions</a>
            <span class="sep">/</span>
            <span class="current">Business Permit</span>
        </div>
    </div>
</div>

{{-- ===== STATS STRIP ===== --}}
<div class="bp-stats-strip">
    <div class="container-fluid px-0">
        <div class="bpss-inner">
            <div class="bpss-item">
                <div class="bpss-icon"><i class="fa fa-calendar"></i></div>
                <div class="bpss-num">Jan 20</div>
                <div class="bpss-label">Renewal Deadline</div>
            </div>
            <div class="bpss-item">
                <div class="bpss-icon"><i class="fa fa-clock-o"></i></div>
                <div class="bpss-num">1–3 Days</div>
                <div class="bpss-label">Processing Time</div>
            </div>
            <div class="bpss-item">
                <div class="bpss-icon"><i class="fa fa-globe"></i></div>
                <div class="bpss-num">24/7</div>
                <div class="bpss-label">eBPLS Online</div>
            </div>
            <div class="bpss-item">
                <div class="bpss-icon"><i class="fa fa-percent"></i></div>
                <div class="bpss-num">25%</div>
                <div class="bpss-label">Late Surcharge</div>
            </div>
            <div class="bpss-item">
                <div class="bpss-icon"><i class="fa fa-file-text-o"></i></div>
                <div class="bpss-num">6 Steps</div>
                <div class="bpss-label">Application Process</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="bp-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== LEFT COLUMN ===== --}}
            <div class="col-md-8">

                {{-- CMS Page Content --}}
                @if($page = App\Page::where('slug','business-permit')->first())
                <div class="bp-content-card" data-aos="fade-up">
                    <div class="bpcc-header">
                        <i class="fa fa-file-text"></i> About Business Permit
                    </div>
                    <div class="bpcc-body">
                        {!! $page->body !!}
                    </div>
                </div>
                @endif

                {{-- Process Steps --}}
                <div class="bp-steps-card" data-aos="fade-up" data-aos-delay="60">
                    <div class="bpsc-header">
                        <i class="fa fa-list-ol"></i> How to Apply / Renew
                    </div>
                    <div class="bpsc-body">
                        <div class="steps-list">
                            <div class="step-item">
                                <div class="step-num">1</div>
                                <div class="step-content">
                                    <div class="step-title">Register / Log in to eBPLS</div>
                                    <div class="step-desc">Visit the <a href="https://prod11.ebpls.com/sogodsouthernleyte/" target="_blank" style="color:#ea5211;">eBPLS portal</a> and create an account or log in with your existing credentials.</div>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">2</div>
                                <div class="step-content">
                                    <div class="step-title">Fill Out the Application Form</div>
                                    <div class="step-desc">Complete the online application form with your business details, type of business, and location information.</div>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">3</div>
                                <div class="step-content">
                                    <div class="step-title">Upload Required Documents</div>
                                    <div class="step-desc">Upload scanned copies of all required documents. Ensure documents are clear and readable.</div>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">4</div>
                                <div class="step-content">
                                    <div class="step-title">Assessment &amp; Computation of Fees</div>
                                    <div class="step-desc">The Municipal Treasury Office will assess and compute the applicable business tax and fees based on your application.</div>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">5</div>
                                <div class="step-content">
                                    <div class="step-title">Payment of Business Tax &amp; Fees</div>
                                    <div class="step-desc">Pay the assessed fees at the Municipal Treasurer's Office or via available online payment channels.</div>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-num">6</div>
                                <div class="step-content">
                                    <div class="step-title">Release of Business Permit</div>
                                    <div class="step-desc">Upon payment, the Business Permit will be processed and released. You will be notified via email or the eBPLS portal.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Requirements --}}
                <div class="bp-reqs-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="bprc-header">
                        <i class="fa fa-paperclip"></i> Documentary Requirements
                    </div>
                    <div class="bprc-body">
                        <div class="req-tabs">
                            <button class="req-tab-btn active" onclick="showTab('new-biz', this)">New Business</button>
                            <button class="req-tab-btn" onclick="showTab('renewal', this)">Renewal</button>
                            <button class="req-tab-btn" onclick="showTab('closure', this)">Closure / Amendment</button>
                        </div>
                        <div id="new-biz" class="req-panel active">
                            <ul class="req-list">
                                <li><i class="fa fa-check"></i> Duly Accomplished Application Form</li>
                                <li><i class="fa fa-check"></i> DTI Certificate of Registration (for sole proprietorship) / SEC Registration (for corporations / partnerships)</li>
                                <li><i class="fa fa-check"></i> Barangay Business Clearance</li>
                                <li><i class="fa fa-check"></i> Community Tax Certificate (CTC / Cedula)</li>
                                <li><i class="fa fa-check"></i> Contract of Lease (if renting the business premises)</li>
                                <li><i class="fa fa-check"></i> Sanitary Permit from the Municipal Health Office</li>
                                <li><i class="fa fa-check"></i> Fire Safety Inspection Certificate (FSIC) from BFP</li>
                                <li class="orange"><i class="fa fa-info-circle"></i> Additional documents may be required depending on the type of business.</li>
                            </ul>
                        </div>
                        <div id="renewal" class="req-panel">
                            <ul class="req-list">
                                <li><i class="fa fa-check"></i> Previous Business Permit</li>
                                <li><i class="fa fa-check"></i> Barangay Business Clearance (current year)</li>
                                <li><i class="fa fa-check"></i> Community Tax Certificate (CTC / Cedula)</li>
                                <li><i class="fa fa-check"></i> Latest Income Tax Return (ITR) or Audited Financial Statement</li>
                                <li><i class="fa fa-check"></i> Sanitary Permit (current year)</li>
                                <li><i class="fa fa-check"></i> Fire Safety Inspection Certificate (FSIC) — current year</li>
                                <li class="orange"><i class="fa fa-calendar"></i> Renewal deadline: January 20 of each year. Surcharges apply for late renewal.</li>
                            </ul>
                        </div>
                        <div id="closure" class="req-panel">
                            <ul class="req-list">
                                <li><i class="fa fa-check"></i> Letter of Request for Closure / Amendment</li>
                                <li><i class="fa fa-check"></i> Original Business Permit</li>
                                <li><i class="fa fa-check"></i> Barangay Certification of Closure</li>
                                <li><i class="fa fa-check"></i> DTI / SEC documents (for name/ownership change)</li>
                                <li class="orange"><i class="fa fa-info-circle"></i> Submit requirements to the Business Permits and Licensing Office (BPLO) at the Municipal Hall.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Fees Table --}}
                <div class="bp-fees-card" data-aos="fade-up" data-aos-delay="120">
                    <div class="bpfc-header">
                        <i class="fa fa-money"></i> Fees &amp; Charges
                    </div>
                    <div class="bpfc-body">
                        <table class="fees-table">
                            <thead>
                                <tr>
                                    <th>Fee Type</th>
                                    <th>Amount</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Business Tax</td>
                                    <td>Varies</td>
                                    <td>Based on gross sales / receipts</td>
                                </tr>
                                <tr>
                                    <td>Mayor's Permit Fee</td>
                                    <td>₱500 – ₱2,000+</td>
                                    <td>Based on capitalization and business category</td>
                                </tr>
                                <tr>
                                    <td>Sanitary Permit Fee</td>
                                    <td>₱200 – ₱500</td>
                                    <td>Payable to the Municipal Health Office</td>
                                </tr>
                                <tr>
                                    <td>BFP Inspection Fee</td>
                                    <td>Varies</td>
                                    <td>Payable to Bureau of Fire Protection</td>
                                </tr>
                                <tr>
                                    <td>Surcharge (late renewal)</td>
                                    <td>25% of business tax</td>
                                    <td>Applies after January 20</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="fee-note">
                                        <i class="fa fa-info-circle"></i>
                                        Fees are subject to change per existing ordinances. Please visit the Municipal Treasurer's Office for the latest schedule of fees.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===== PERMIT TYPES ===== --}}
                <div class="bp-types-card" data-aos="fade-up" data-aos-delay="80">
                    <div class="bptc-header">
                        <i class="fa fa-th-large"></i> Types of Business Permits
                    </div>
                    <div class="bptc-body">
                        <div class="permit-type-grid">
                            <div class="permit-type-item">
                                <div class="pti-icon"><i class="fa fa-cutlery"></i></div>
                                <div class="pti-label">Food &amp; Restaurants</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon"><i class="fa fa-shopping-bag"></i></div>
                                <div class="pti-label">Retail &amp; Trading</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon"><i class="fa fa-wrench"></i></div>
                                <div class="pti-label">Services &amp; Repairs</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon orange"><i class="fa fa-heartbeat"></i></div>
                                <div class="pti-label">Health &amp; Wellness</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon orange"><i class="fa fa-building"></i></div>
                                <div class="pti-label">Real Estate &amp; Construction</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon orange"><i class="fa fa-graduation-cap"></i></div>
                                <div class="pti-label">Education &amp; Training</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon"><i class="fa fa-truck"></i></div>
                                <div class="pti-label">Transport &amp; Logistics</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon"><i class="fa fa-leaf"></i></div>
                                <div class="pti-label">Agriculture &amp; Agri-Business</div>
                            </div>
                            <div class="permit-type-item">
                                <div class="pti-icon orange"><i class="fa fa-ellipsis-h"></i></div>
                                <div class="pti-label">Other / Mixed Business</div>
                            </div>
                        </div>
                        <p style="font-size:0.78rem; color:#888; margin: 14px 0 0; text-align:center;">
                            <i class="fa fa-info-circle"></i> All business types require a Mayor's Permit from the Municipal Government.
                        </p>
                    </div>
                </div>

                {{-- ===== FAQ ===== --}}
                <div class="bp-faq-card" data-aos="fade-up" data-aos-delay="130">
                    <div class="bpfaq-header">
                        <i class="fa fa-question-circle"></i> Frequently Asked Questions
                    </div>
                    <div class="bpfaq-body">
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>When is the deadline for business permit renewal?</span>
                                <i class="fa fa-chevron-down fq-arrow"></i>
                            </div>
                            <div class="faq-answer">
                                The deadline for annual business permit renewal is <strong>January 20</strong> of each year. Applications filed after this date are subject to a <strong>25% surcharge</strong> on top of the business tax due.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>Can I apply for a business permit online?</span>
                                <i class="fa fa-chevron-down fq-arrow"></i>
                            </div>
                            <div class="faq-answer">
                                Yes. The Municipal Government of Sogod uses the <strong>eBPLS (Electronic Business Permit &amp; Licensing System)</strong>. You can register, apply, and upload documents at <a href="https://prod11.ebpls.com/sogodsouthernleyte/" target="_blank">prod11.ebpls.com/sogodsouthernleyte</a>. Payments may still need to be made at the Municipal Treasurer's Office.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>How long does processing take?</span>
                                <i class="fa fa-chevron-down fq-arrow"></i>
                            </div>
                            <div class="faq-answer">
                                Processing typically takes <strong>1–3 working days</strong> from submission of complete requirements and payment of fees, subject to inspection requirements and workload during peak seasons (particularly January).
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>Do I need a separate permit for each business location?</span>
                                <i class="fa fa-chevron-down fq-arrow"></i>
                            </div>
                            <div class="faq-answer">
                                Yes. A Mayor's Permit is required for each separate business location or establishment. Each location must secure its own Barangay Clearance, Sanitary Permit, and FSIC.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>What happens if I operate without a business permit?</span>
                                <i class="fa fa-chevron-down fq-arrow"></i>
                            </div>
                            <div class="faq-answer">
                                Operating a business without a valid Mayor's Permit is a violation of the Local Government Code and local ordinances. This may result in <strong>closure orders, fines, and penalties</strong>. All businesses are required to display their permit prominently.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>What if I want to close or transfer my business?</span>
                                <i class="fa fa-chevron-down fq-arrow"></i>
                            </div>
                            <div class="faq-answer">
                                You must file a <strong>Business Closure / Amendment</strong> with the BPLO at the Municipal Hall. Submit a letter of request, the original permit, and a Barangay Certification of Closure. Failure to file may result in continued tax assessments.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ===== RIGHT SIDEBAR ===== --}}
            <div class="col-md-4">

                {{-- Renewal Deadline Notice --}}
                <div class="deadline-banner" data-aos="fade-left">
                    <div class="db-icon"><i class="fa fa-exclamation-circle"></i></div>
                    <div class="db-text">
                        <div class="db-title">Renewal Deadline: January 20</div>
                        <div class="db-desc">Avoid surcharges. Renew your business permit before January 20 of each year. Late renewals are subject to a 25% surcharge.</div>
                    </div>
                </div>

                {{-- Track Application --}}
                <div class="bp-track-card" data-aos="fade-left" data-aos-delay="40">
                    <div class="bptc-icon"><i class="fa fa-search"></i></div>
                    <div class="bptc-title">Track Your Application</div>
                    <div class="bptc-desc">Already submitted your application? Log in to eBPLS to check the status of your business permit in real time.</div>
                    <a href="https://prod11.ebpls.com/sogodsouthernleyte/index.php/login" target="_blank" class="bptc-btn">
                        <i class="fa fa-external-link"></i> Check Status on eBPLS
                    </a>
                </div>

                {{-- eBPLS CTA --}}
                <div class="ebpls-cta-card" data-aos="fade-left" data-aos-delay="60">
                    <div class="ebpls-img">
                        <img src="{{ Voyager::image('/ebpls/displayebpls.jpg') }}" alt="eBPLS">
                    </div>
                    <div class="ebpls-cta-body">
                        <div class="ebpls-cta-tag"><i class="fa fa-globe"></i> Online Portal</div>
                        <div class="ebpls-cta-title">eBPLS — Business Permit &amp; Licensing System</div>
                        <div class="ebpls-cta-desc">Apply or renew your business permit online. Available 24/7 — no more long queues at the Municipal Hall.</div>
                        <div class="ebpls-btn-group">
                            <a href="https://prod11.ebpls.com/sogodsouthernleyte/index.php/login" target="_blank" class="ebpls-btn-login">
                                <i class="fa fa-sign-in"></i> Log In to eBPLS
                            </a>
                            <a href="https://prod11.ebpls.com/sogodsouthernleyte/index.php/register" target="_blank" class="ebpls-btn-register">
                                <i class="fa fa-user-plus"></i> Create an Account
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Office Contact --}}
                <div class="bp-info-sidebar-card" data-aos="fade-left" data-aos-delay="100">
                    <div class="bisc-header">
                        <i class="fa fa-phone"></i> Contact the BPLO
                    </div>
                    <div class="bisc-body">
                        <ul class="office-info-list">
                            <li>
                                <i class="fa fa-building-o"></i>
                                <div>
                                    <strong>Office</strong>
                                    Business Permits &amp; Licensing Office (BPLO), Municipal Hall, Sogod, Southern Leyte
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <div>
                                    <strong>Office Hours</strong>
                                    Monday – Friday, 8:00 AM – 5:00 PM (no noon break during January renewal season)
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <div>
                                    <strong>Location</strong>
                                    Sogod, Southern Leyte 6606, Philippines
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Downloadable Forms --}}
                <div class="bp-downloads-card" data-aos="fade-left" data-aos-delay="110">
                    <div class="bpdc-header">
                        <i class="fa fa-download"></i> Downloadable Forms
                    </div>
                    <div class="bpdc-body">
                        <a href="https://prod11.ebpls.com/sogodsouthernleyte/" target="_blank" class="dl-item">
                            <div class="dl-icon pdf"><i class="fa fa-file-pdf-o"></i></div>
                            <div class="dl-text">
                                <div class="dl-name">Business Permit Application Form</div>
                                <div class="dl-type">Available via eBPLS portal</div>
                            </div>
                            <i class="fa fa-external-link dl-arrow"></i>
                        </a>
                        <a href="https://prod11.ebpls.com/sogodsouthernleyte/" target="_blank" class="dl-item">
                            <div class="dl-icon word"><i class="fa fa-file-text-o"></i></div>
                            <div class="dl-text">
                                <div class="dl-name">Business Closure / Amendment Form</div>
                                <div class="dl-type">Available at BPLO Office</div>
                            </div>
                            <i class="fa fa-external-link dl-arrow"></i>
                        </a>
                        <a href="https://prod11.ebpls.com/sogodsouthernleyte/" target="_blank" class="dl-item">
                            <div class="dl-icon pdf"><i class="fa fa-file-pdf-o"></i></div>
                            <div class="dl-text">
                                <div class="dl-name">Sworn Statement of Gross Sales</div>
                                <div class="dl-type">For renewal applicants</div>
                            </div>
                            <i class="fa fa-external-link dl-arrow"></i>
                        </a>
                    </div>
                </div>

                {{-- Share This --}}
                <div class="bp-share-card" data-aos="fade-left" data-aos-delay="130">
                    <div class="bpsc-title"><i class="fa fa-share-alt"></i> Share this page</div>
                    @include('frontend.widgets._sharethis')
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function showTab(tabId, btn) {
    document.querySelectorAll('.req-panel').forEach(function(p){ p.classList.remove('active'); });
    document.querySelectorAll('.req-tab-btn').forEach(function(b){ b.classList.remove('active'); });
    document.getElementById(tabId).classList.add('active');
    btn.classList.add('active');
}
function toggleFaq(questionEl) {
    var answer = questionEl.nextElementSibling;
    var isOpen = questionEl.classList.contains('open');
    // Close all
    document.querySelectorAll('.faq-question').forEach(function(q){
        q.classList.remove('open');
        q.nextElementSibling.style.display = 'none';
    });
    // Open clicked if it wasn't already open
    if (!isOpen) {
        questionEl.classList.add('open');
        answer.style.display = 'block';
    }
}
</script>

@endsection