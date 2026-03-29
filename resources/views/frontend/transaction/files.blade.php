@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   FILES & DOCUMENTS PAGE
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.fl-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 45%, #0052a5 70%, #c9460e 100%);
    padding: 18px 0 14px;
    position: relative;
    overflow: hidden;
}
.fl-hero::before {
    content: ''; position: absolute; top: -60px; right: -60px;
    width: 300px; height: 300px; background: rgba(244,197,66,0.08); border-radius: 50%;
}
.fl-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0;
    height: 4px; background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.fl-hero .hero-tag {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.fl-hero h1 { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: 4px; }
.fl-hero .hero-sub { font-size: 0.88rem; color: rgba(255,255,255,0.7); }
.fl-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 8px;
}
.fl-breadcrumb a,
.fl-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
.fl-breadcrumb a:hover { color: #f4c542; }
.fl-breadcrumb .sep  { color: rgba(255,255,255,0.3); }
.fl-breadcrumb .cur  { color: #f4c542; font-weight: 600; }

/* ---- Wrap ---- */
.fl-wrap { background: #f4f6f9; padding: 32px 0 50px; }

/* ---- Sidebar: Categories ---- */
.fl-sidebar-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07);
    overflow: hidden; margin-bottom: 24px;
    position: sticky; top: 80px;
}
.fl-sidebar-card .sc-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    padding: 12px 18px; color: #fff;
    display: flex; align-items: center; gap: 8px;
    font-weight: 700; font-size: 0.9rem;
    border-bottom: 3px solid #f4c542;
}
.fl-sidebar-card .sc-body { padding: 8px 0; }
.fl-sidebar-card .cat-link {
    display: flex; align-items: center; justify-content: space-between;
    padding: 9px 18px; color: #333; text-decoration: none;
    font-size: 0.88rem; transition: background 0.2s, color 0.2s;
    border-left: 3px solid transparent;
}
.fl-sidebar-card .cat-link:hover,
.fl-sidebar-card .cat-link.active {
    background: #fdf5f1; color: #ea5211;
    border-left-color: #ea5211;
}
.fl-sidebar-card .cat-link .badge-count {
    background: #eaeff8; color: #0052a5;
    font-size: 0.72rem; font-weight: 700;
    padding: 2px 7px; border-radius: 20px;
}
.fl-sidebar-card .cat-link.active .badge-count {
    background: #ea5211; color: #fff;
}

/* ---- Category Section ---- */
.fl-cat-section { margin-bottom: 28px; }
.fl-cat-header {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 14px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.fl-cat-header .cat-icon {
    width: 36px; height: 36px; border-radius: 8px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1rem; flex-shrink: 0;
}
.fl-cat-header h3 {
    font-size: 1.05rem; font-weight: 800; color: #001f2d; margin: 0;
}
.fl-cat-header .count-badge {
    margin-left: auto; background: #eaeff8; color: #0052a5;
    font-size: 0.75rem; font-weight: 700; padding: 2px 10px; border-radius: 20px;
}

/* ---- File Row ---- */
.fl-file-row {
    background: #fff; border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    padding: 12px 16px;
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 8px;
    transition: box-shadow 0.2s, transform 0.2s;
}
.fl-file-row:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.10);
    transform: translateY(-1px);
}
.fl-file-icon {
    width: 40px; height: 40px; border-radius: 8px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
}
.fl-file-icon.pdf  { background: #fff0eb; color: #ea5211; }
.fl-file-icon.doc  { background: #e8f0fb; color: #0052a5; }
.fl-file-icon.xls  { background: #e8f8ee; color: #1a7a40; }
.fl-file-icon.img  { background: #fff8e0; color: #c97d00; }
.fl-file-icon.gen  { background: #eaeff8; color: #555; }

.fl-file-info { flex: 1; min-width: 0; }
.fl-file-info .fname {
    font-size: 0.92rem; font-weight: 700; color: #001f2d;
    display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.fl-file-info .fdesc {
    font-size: 0.78rem; color: #888; margin-top: 2px;
    display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.fl-file-info .fext {
    display: inline-block; font-size: 0.68rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.5px;
    background: #f0f0f0; color: #666; padding: 1px 6px; border-radius: 4px;
    margin-top: 3px;
}
.fl-dl-btn {
    flex-shrink: 0;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff; border-radius: 8px; padding: 7px 14px;
    font-size: 0.8rem; font-weight: 700; text-decoration: none;
    display: flex; align-items: center; gap: 5px;
    transition: opacity 0.2s;
    white-space: nowrap;
}
.fl-dl-btn:hover { opacity: 0.85; color: #fff; text-decoration: none; }

/* ---- Empty State ---- */
.fl-empty {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    padding: 50px 30px; text-align: center; color: #bbb;
}
.fl-empty i { font-size: 2.5rem; margin-bottom: 10px; display: block; }
.fl-empty p { font-size: 0.9rem; margin: 0; }

/* ---- Search Bar ---- */
.fl-search {
    background: #fff; border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    padding: 12px 16px; margin-bottom: 20px;
    display: flex; align-items: center; gap: 8px;
}
.fl-search input {
    border: none; outline: none; width: 100%;
    font-size: 0.9rem; color: #333;
    background: transparent;
}
.fl-search .search-icon { color: #0052a5; font-size: 1rem; flex-shrink: 0; }

@media (max-width: 767px) {
    .fl-hero h1 { font-size: 1.2rem; }
    .fl-file-row { flex-wrap: wrap; }
    .fl-dl-btn { width: 100%; justify-content: center; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="fl-hero">
    <div class="container">
        <div class="hero-tag"><i class="fa fa-folder-open"></i> &nbsp;Downloads — Municipality of Sogod</div>
        <h1>Files &amp; Documents</h1>
        <p class="hero-sub">Browse and download official files, forms, and documents organized by category.</p>
        <div class="fl-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <span class="cur">Files &amp; Documents</span>
        </div>
    </div>
</div>

{{-- ===== CONTENT ===== --}}
<div class="fl-wrap">
    <div class="container">

        @php
            $hasAny = $categories->isNotEmpty() || $uncategorized->isNotEmpty();
        @endphp

        @if($hasAny)
        <div class="row">

            {{-- ===== SIDEBAR ===== --}}
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="fl-sidebar-card">
                    <div class="sc-header">
                        <i class="fa fa-tags"></i> Categories
                    </div>
                    <div class="sc-body">
                        @foreach($categories as $cat)
                            <a href="#cat-{{ $cat->id }}" class="cat-link">
                                <span><i class="fa fa-folder-o" style="margin-right:6px;"></i>{{ $cat->name }}</span>
                                <span class="badge-count">{{ $cat->files->count() }}</span>
                            </a>
                        @endforeach
                        @if($uncategorized->isNotEmpty())
                            <a href="#cat-uncategorized" class="cat-link">
                                <span><i class="fa fa-folder-o" style="margin-right:6px;"></i>Other Files</span>
                                <span class="badge-count">{{ $uncategorized->count() }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ===== MAIN ===== --}}
            <div class="col-lg-9 col-md-8">

                {{-- Search --}}
                <div class="fl-search">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" id="fl-search-input" placeholder="Search files by name…" autocomplete="off">
                </div>

                {{-- Categories with files --}}
                @foreach($categories as $cat)
                    <div class="fl-cat-section" id="cat-{{ $cat->id }}">
                        <div class="fl-cat-header">
                            <div class="cat-icon"><i class="fa fa-folder-open"></i></div>
                            <h3>{{ $cat->name }}</h3>
                            <span class="count-badge">{{ $cat->files->count() }} {{ Str::plural('file', $cat->files->count()) }}</span>
                        </div>

                        @foreach($cat->files as $file)
                            @php
                                $ext = strtolower(pathinfo($file->file, PATHINFO_EXTENSION));
                                $iconClass = in_array($ext, ['pdf']) ? 'pdf'
                                    : (in_array($ext, ['doc','docx']) ? 'doc'
                                    : (in_array($ext, ['xls','xlsx','csv']) ? 'xls'
                                    : (in_array($ext, ['jpg','jpeg','png','gif','webp']) ? 'img'
                                    : 'gen')));
                                $iconFa = $iconClass === 'pdf' ? 'fa-file-pdf-o'
                                    : ($iconClass === 'doc' ? 'fa-file-word-o'
                                    : ($iconClass === 'xls' ? 'fa-file-excel-o'
                                    : ($iconClass === 'img' ? 'fa-file-image-o'
                                    : 'fa-file-o')));
                            @endphp
                            <div class="fl-file-row" data-title="{{ strtolower($file->title) }}">
                                <div class="fl-file-icon {{ $iconClass }}">
                                    <i class="fa {{ $iconFa }}"></i>
                                </div>
                                <div class="fl-file-info">
                                    <span class="fname">{{ $file->title }}</span>
                                    @if($file->body)
                                        <span class="fdesc">{{ Str::limit(strip_tags($file->body), 80) }}</span>
                                    @endif
                                    @if($ext)
                                        <span class="fext">{{ strtoupper($ext) }}</span>
                                    @endif
                                </div>
                                @if($file->file)
                                    <a href="{{ asset('storage/' . ltrim($file->file, '/')) }}" class="fl-dl-btn" target="_blank" download>
                                        <i class="fa fa-download"></i> Download
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach

                {{-- Uncategorized files --}}
                @if($uncategorized->isNotEmpty())
                    <div class="fl-cat-section" id="cat-uncategorized">
                        <div class="fl-cat-header">
                            <div class="cat-icon" style="background:linear-gradient(135deg,#ea5211,#c9460e);">
                                <i class="fa fa-files-o"></i>
                            </div>
                            <h3>Other Files</h3>
                            <span class="count-badge">{{ $uncategorized->count() }} {{ Str::plural('file', $uncategorized->count()) }}</span>
                        </div>

                        @foreach($uncategorized as $file)
                            @php
                                $ext = strtolower(pathinfo($file->file, PATHINFO_EXTENSION));
                                $iconClass = in_array($ext, ['pdf']) ? 'pdf'
                                    : (in_array($ext, ['doc','docx']) ? 'doc'
                                    : (in_array($ext, ['xls','xlsx','csv']) ? 'xls'
                                    : (in_array($ext, ['jpg','jpeg','png','gif','webp']) ? 'img'
                                    : 'gen')));
                                $iconFa = $iconClass === 'pdf' ? 'fa-file-pdf-o'
                                    : ($iconClass === 'doc' ? 'fa-file-word-o'
                                    : ($iconClass === 'xls' ? 'fa-file-excel-o'
                                    : ($iconClass === 'img' ? 'fa-file-image-o'
                                    : 'fa-file-o')));
                            @endphp
                            <div class="fl-file-row" data-title="{{ strtolower($file->title) }}">
                                <div class="fl-file-icon {{ $iconClass }}">
                                    <i class="fa {{ $iconFa }}"></i>
                                </div>
                                <div class="fl-file-info">
                                    <span class="fname">{{ $file->title }}</span>
                                    @if($file->body)
                                        <span class="fdesc">{{ Str::limit(strip_tags($file->body), 80) }}</span>
                                    @endif
                                    @if($ext)
                                        <span class="fext">{{ strtoupper($ext) }}</span>
                                    @endif
                                </div>
                                @if($file->file)
                                    <a href="{{ asset('storage/' . ltrim($file->file, '/')) }}" class="fl-dl-btn" target="_blank" download>
                                        <i class="fa fa-download"></i> Download
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>{{-- /col-main --}}
        </div>{{-- /row --}}

        @else
        {{-- Empty State --}}
        <div class="fl-empty">
            <i class="fa fa-folder-open-o"></i>
            <p>No files have been published yet. Please check back later.</p>
        </div>
        @endif

    </div>
</div>

<script>
(function () {
    var input = document.getElementById('fl-search-input');
    if (!input) return;
    input.addEventListener('input', function () {
        var q = this.value.trim().toLowerCase();
        document.querySelectorAll('.fl-file-row').forEach(function (row) {
            var title = row.getAttribute('data-title') || '';
            row.style.display = (!q || title.includes(q)) ? '' : 'none';
        });
        // Hide empty category sections
        document.querySelectorAll('.fl-cat-section').forEach(function (sec) {
            var visible = sec.querySelectorAll('.fl-file-row:not([style*="display: none"])').length;
            sec.style.display = visible ? '' : 'none';
        });
    });

    // Sidebar smooth-scroll active highlight on click
    document.querySelectorAll('.cat-link').forEach(function (link) {
        link.addEventListener('click', function () {
            document.querySelectorAll('.cat-link').forEach(function (l) { l.classList.remove('active'); });
            link.classList.add('active');
        });
    });
})();
</script>
@endsection
