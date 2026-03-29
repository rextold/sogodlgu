@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   TOURIST SPOT DETAIL  —  v2
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Cover Hero ---- */
.tsd-cover {
    position: relative;
    height: 480px;
    overflow: hidden;
    background: #001f2d;
}
.tsd-cover-img {
    width: 100%; height: 100%; object-fit: cover;
    object-position: center;
    transition: transform 6s ease;
}
.tsd-cover:hover .tsd-cover-img { transform: scale(1.04); }
.tsd-cover-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,10,20,0.82) 0%, rgba(0,20,45,0.45) 50%, transparent 100%);
}
.tsd-cover-content {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 28px 32px;
}
.tsd-cover-content .tc-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.68rem; font-weight: 700; padding: 3px 14px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase;
    margin-bottom: 10px;
}
.tsd-cover-content h1 {
    font-size: clamp(1.5rem, 4vw, 2.4rem); font-weight: 900;
    color: #fff; margin-bottom: 8px; line-height: 1.2;
    text-shadow: 0 2px 12px rgba(0,0,0,0.5);
}
.tsd-cover-content .tc-loc {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.85rem; color: rgba(255,255,255,0.8);
}
.tsd-cover-content .tc-loc i { color: #f4c542; }

/* Gold bottom bar */
.tsd-cover::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
    z-index: 2;
}

/* ---- Breadcrumb bar ---- */
.tsd-breadbar {
    background: #fff; border-bottom: 1px solid #eee;
    padding: 9px 0;
}
.tsd-breadbar .tsd-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
}
.tsd-breadbar .tsd-breadcrumb a, .tsd-breadbar .tsd-breadcrumb span {
    font-size: 0.78rem; color: #666; text-decoration: none;
}
.tsd-breadbar .tsd-breadcrumb a:hover { color: #ea5211; }
.tsd-breadbar .tsd-breadcrumb .sep { color: #ccc; }
.tsd-breadbar .tsd-breadcrumb .current { color: #ea5211; font-weight: 600; }

/* ---- Page Wrap ---- */
.tsd-wrap { background: #f4f6f9; padding: 32px 0 50px; }

/* ---- Main content card ---- */
.tsd-main-card {
    background: #fff; border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 22px;
}
.tsd-main-card .tmc-head {
    background: linear-gradient(135deg, #001f2d, #003d7a 60%, #0052a5);
    padding: 14px 22px;
    display: flex; align-items: center; gap: 10px;
    border-bottom: 3px solid #ea5211;
}
.tsd-main-card .tmc-head .tmc-icon {
    width: 36px; height: 36px; border-radius: 8px;
    background: rgba(234,82,17,0.85);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1rem; flex-shrink: 0;
}
.tsd-main-card .tmc-head h2 { font-size: 1rem; font-weight: 800; color: #fff; margin: 0; }
.tsd-main-card .tmc-body {
    padding: 24px 26px;
    font-size: 0.93rem; color: #333; line-height: 1.85;
}
.tsd-main-card .tmc-body h2, .tsd-main-card .tmc-body h3 { color: #0052a5; font-weight: 700; margin-top: 20px; }
.tsd-main-card .tmc-body h4 { color: #001f2d; font-weight: 700; }
.tsd-main-card .tmc-body p { margin-bottom: 0.9rem; }
.tsd-main-card .tmc-body img { max-width: 100%; border-radius: 8px; }
.tsd-main-card .tmc-body ul, .tsd-main-card .tmc-body ol { padding-left: 20px; }
.tsd-main-card .tmc-body li { margin-bottom: 5px; }
.tsd-main-card .tmc-body a { color: #0052a5; }
.tsd-main-card .tmc-body a:hover { color: #ea5211; }
.tsd-main-card .tmc-body blockquote {
    border-left: 4px solid #ea5211; background: #fff8f5;
    padding: 12px 16px; border-radius: 0 8px 8px 0;
    margin: 16px 0; font-style: italic; color: #555;
}

/* ---- Gallery strip ---- */
.tsd-gallery-card {
    background: #fff; border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 22px;
}
.tsd-gallery-card .tgc-head {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    padding: 13px 20px;
    display: flex; align-items: center; gap: 9px;
    border-bottom: 3px solid #f4c542;
    color: #fff; font-weight: 700; font-size: 0.9rem;
}
.tsd-gallery-card .tgc-body { padding: 16px; }
.tsd-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    gap: 10px;
}
.tsd-thumb {
    width: 100%; aspect-ratio: 1 / 1; object-fit: cover;
    border-radius: 9px; cursor: pointer;
    transition: transform 0.28s, box-shadow 0.28s, border-color 0.2s;
    border: 2px solid transparent;
}
.tsd-thumb:hover {
    transform: scale(1.06); box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    border-color: #ea5211;
}
.tsd-thumb.active-thumb { border-color: #0052a5; box-shadow: 0 0 0 3px rgba(0,82,165,0.25); }

/* ---- Sidebar ---- */
.tsd-side-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    overflow: hidden; margin-bottom: 18px;
}
.tsd-side-card .tsc-head {
    padding: 12px 16px; display: flex; align-items: center; gap: 8px;
    color: #fff; font-weight: 700; font-size: 0.88rem;
}
.tsd-side-card .tsc-head.blue   { background: linear-gradient(135deg, #0052a5, #003d7a); border-bottom: 3px solid #f4c542; }
.tsd-side-card .tsc-head.navy   { background: linear-gradient(135deg, #001f2d, #003d7a); border-bottom: 3px solid #ea5211; }
.tsd-side-card .tsc-head.orange { background: linear-gradient(135deg, #ea5211, #c9460e); border-bottom: 3px solid #f4c542; }
.tsd-side-card .tsc-body { padding: 16px; font-size: 0.85rem; color: #444; }

/* Info list */
.tsd-info-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
.tsd-info-list li { display: flex; align-items: flex-start; gap: 10px; }
.tsd-info-list li i { color: #0052a5; width: 16px; text-align: center; margin-top: 3px; flex-shrink: 0; }
.tsd-info-list li .til-label { font-size: 0.67rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.3px; color: #999; display: block; margin-bottom: 1px; }
.tsd-info-list li .til-value { font-size: 0.85rem; color: #333; font-weight: 600; }

/* Related spots */
.tsd-related-list { list-style: none; padding: 0; margin: 0; }
.tsd-related-list li { border-bottom: 1px solid #f4f4f4; }
.tsd-related-list li:last-child { border-bottom: none; }
.tsd-related-list li a {
    display: flex; align-items: center; gap: 8px;
    padding: 9px 4px; text-decoration: none; color: #444;
    font-size: 0.82rem; font-weight: 600; transition: all 0.2s;
}
.tsd-related-list li a:hover { color: #ea5211; padding-left: 8px; }
.tsd-related-list li a img {
    width: 46px; height: 46px; object-fit: cover; border-radius: 7px; flex-shrink: 0;
}
.tsd-related-list li a i { color: #ea5211; flex-shrink: 0; }

/* CTA back button */
.tsd-back-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; font-weight: 700; font-size: 0.88rem;
    padding: 13px 20px; border-radius: 10px; text-decoration: none;
    transition: all 0.22s; width: 100%;
    box-shadow: 0 4px 14px rgba(0,82,165,0.35);
}
.tsd-back-btn:hover { background: linear-gradient(135deg, #003d7a, #001f2d); color: #fff; transform: translateY(-2px); text-decoration: none; }
.tsd-back-btn i { color: #f4c542; }

/* ---- Lightbox modal ---- */
#tsdModal .modal-content { background: transparent; border: none; box-shadow: none; }
#tsdModal .modal-body { padding: 4px; }
#tsdModal img { width: 100%; border-radius: 10px; }
#tsdModal .modal-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    background: rgba(0,0,0,0.55); color: #fff; border: none;
    width: 44px; height: 44px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem; cursor: pointer; transition: background 0.2s; z-index: 10;
}
#tsdModal .modal-nav:hover { background: rgba(234,82,17,0.85); }
#tsdModal .modal-prev { left: -55px; }
#tsdModal .modal-next { right: -55px; }

/* ---- Responsive ---- */
@media (max-width: 991px) {
    .tsd-cover { height: 340px; }
    .tsd-cover-content { padding: 20px 20px; }
}
@media (max-width: 767px) {
    .tsd-cover { height: 260px; }
    .tsd-cover-content h1 { font-size: 1.4rem; }
    .tsd-main-card .tmc-body { padding: 16px 14px; }
    #tsdModal .modal-prev { left: 0; }
    #tsdModal .modal-next { right: 0; }
}
</style>

@php $images = json_decode($tspot->image, true) ?? []; @endphp

{{-- ===== COVER HERO ===== --}}
<div class="tsd-cover">
    @if(count($images))
    <img id="cover-img" class="tsd-cover-img" src="{{ Voyager::image($images[0]) }}" alt="{{ $tspot->title }}">
    @else
    <div style="width:100%;height:100%;background:linear-gradient(135deg,#001f2d,#003d7a);"></div>
    @endif
    <div class="tsd-cover-overlay"></div>
    <div class="tsd-cover-content">
        <div class="tc-tag"><i class="fa fa-map-marker"></i> {{ optional($tspot->tourismcategory)->name ?? 'Tourist Spot' }}</div>
        <h1>{{ $tspot->title }}</h1>
        <div class="tc-loc">
            <i class="fa fa-map-o"></i> Sogod, Southern Leyte
            @if(count($images))
            <span style="margin-left:10px; color:rgba(255,255,255,0.5);">|</span>
            <i class="fa fa-camera" style="color:rgba(244,197,66,0.8);"></i>
            <span style="color:rgba(255,255,255,0.7);">{{ count($images) }} {{ count($images) == 1 ? 'Photo' : 'Photos' }}</span>
            @endif
        </div>
    </div>
</div>

{{-- ===== BREADCRUMB BAR ===== --}}
<div class="tsd-breadbar">
    <div class="container">
        <div class="tsd-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('tourism') }}">Tourism</a>
            <span class="sep">/</span>
            <span class="current">{{ Str::limit($tspot->title, 50) }}</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="tsd-wrap">
    <div class="container">
        <div class="row">

            {{-- LEFT: About + Gallery ---- --}}
            <div class="col-lg-8" data-aos="fade-up">

                {{-- About Card --}}
                <div class="tsd-main-card">
                    <div class="tmc-head">
                        <div class="tmc-icon"><i class="fa fa-info"></i></div>
                        <h2>About {{ $tspot->title }}</h2>
                    </div>
                    <div class="tmc-body">
                        @if($tspot->body)
                            {!! $tspot->body !!}
                        @else
                            <p class="text-muted" style="font-style:italic;">No description available for this spot yet.</p>
                        @endif
                    </div>
                </div>

                {{-- Photo Gallery --}}
                @if(count($images) > 1)
                <div class="tsd-gallery-card" data-aos="fade-up" data-aos-delay="80">
                    <div class="tgc-head">
                        <i class="fa fa-camera"></i> Photo Gallery
                        <span style="margin-left:auto;font-size:0.75rem;font-weight:500;opacity:0.85;">{{ count($images) }} photos</span>
                    </div>
                    <div class="tgc-body">
                        <div class="tsd-photo-grid">
                            @foreach($images as $i => $img)
                            <img src="{{ Voyager::image($img) }}"
                                 class="tsd-thumb {{ $i === 0 ? 'active-thumb' : '' }}"
                                 data-index="{{ $i }}"
                                 alt="Photo {{ $i + 1 }}"
                                 onerror="this.style.display='none'">
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                {{-- Share --}}
                <div class="tsd-side-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="tsc-head orange"><i class="fa fa-share-alt"></i> Share this Spot</div>
                    <div class="tsc-body">
                        @include('frontend.widgets._sharethis')
                    </div>
                </div>

            </div>

            {{-- RIGHT: Sidebar --}}
            <div class="col-lg-4" data-aos="fade-left">

                {{-- Info Card --}}
                <div class="tsd-side-card">
                    <div class="tsc-head blue"><i class="fa fa-info-circle"></i> Spot Information</div>
                    <div class="tsc-body">
                        <ul class="tsd-info-list">
                            <li>
                                <i class="fa fa-tag"></i>
                                <div>
                                    <span class="til-label">Category</span>
                                    <span class="til-value">{{ optional($tspot->tourismcategory)->name ?? '—' }}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <div>
                                    <span class="til-label">Location</span>
                                    <span class="til-value">Sogod, Southern Leyte</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <div>
                                    <span class="til-label">Last Updated</span>
                                    <span class="til-value">{{ \Carbon\Carbon::parse($tspot->updated_at)->format('M j, Y') }}</span>
                                </div>
                            </li>
                            @if(count($images))
                            <li>
                                <i class="fa fa-camera"></i>
                                <div>
                                    <span class="til-label">Photos</span>
                                    <span class="til-value">{{ count($images) }} available</span>
                                </div>
                            </li>
                            @endif
                        </ul>
                        @if($tspot->contact)
                        <hr style="margin:14px 0;border-color:#f0f0f0;">
                        <div style="font-size:0.84rem;color:#555;line-height:1.7;">{!! $tspot->contact !!}</div>
                        @endif
                    </div>
                </div>

                {{-- Related Spots --}}
                @php
                    $relatedSpots = App\TouristSpot::where('id', '!=', $tspot->id)
                        ->where('status', 1)
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
                @endphp
                @if($relatedSpots->count())
                <div class="tsd-side-card mt-2">
                    <div class="tsc-head navy"><i class="fa fa-compass"></i> More to Explore</div>
                    <div class="tsc-body" style="padding: 10px 14px;">
                        <ul class="tsd-related-list">
                            @foreach($relatedSpots as $rs)
                            @php $rsImages = json_decode($rs->image, true) ?? []; @endphp
                            <li>
                                <a href="{{ route('tourism.tourist_spot', ['name' => $rs->title]) }}">
                                    @if(count($rsImages))
                                    <img src="{{ Voyager::image($rsImages[0]) }}" alt="{{ $rs->title }}" onerror="this.style.display='none'">
                                    @else
                                    <i class="fa fa-map-marker fa-lg"></i>
                                    @endif
                                    <span>{{ $rs->title }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                {{-- Back Button --}}
                <a href="{{ route('tourism') }}" class="tsd-back-btn mt-3">
                    <i class="fa fa-arrow-left"></i> Back to Tourism
                </a>

            </div>
        </div>
    </div>
</div>

{{-- ===== LIGHTBOX MODAL ===== --}}
@if(count($images))
<div class="modal fade" id="tsdModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="position:relative;">
        <button class="modal-nav modal-prev" id="prevBtn"><i class="fa fa-chevron-left"></i></button>
        <div class="modal-content">
            <div class="modal-body text-center p-1">
                <img id="modal-img" src="{{ Voyager::image($images[0]) }}" alt="Preview">
            </div>
        </div>
        <button class="modal-nav modal-next" id="nextBtn"><i class="fa fa-chevron-right"></i></button>
    </div>
</div>
@endif

<script>
(function () {
    var images = @json($images);
    var currentIdx = 0;

    function setActive(idx) {
        currentIdx = (idx + images.length) % images.length;
        var src = '{{ Voyager::image("__IMG__") }}'.replace('__IMG__', images[currentIdx]);
        document.getElementById('cover-img') && (document.getElementById('cover-img').src = src);
        document.getElementById('modal-img') && (document.getElementById('modal-img').src = src);
        document.querySelectorAll('.tsd-thumb').forEach(function(t) {
            t.classList.toggle('active-thumb', parseInt(t.dataset.index) === currentIdx);
        });
    }

    document.querySelectorAll('.tsd-thumb').forEach(function(el) {
        el.addEventListener('click', function() {
            setActive(parseInt(this.dataset.index));
            $('#tsdModal').modal('show');
        });
    });

    var coverEl = document.getElementById('cover-img');
    if (coverEl) { coverEl.style.cursor = 'zoom-in'; coverEl.addEventListener('click', function() { $('#tsdModal').modal('show'); }); }

    var prevBtn = document.getElementById('prevBtn');
    var nextBtn = document.getElementById('nextBtn');
    if (prevBtn) prevBtn.addEventListener('click', function() { setActive(currentIdx - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function() { setActive(currentIdx + 1); });
})();
</script>
@endsection