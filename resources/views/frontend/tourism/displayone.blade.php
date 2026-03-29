@extends('layouts.home')

@section('content')
<style>
/* ============================================================
   TOURIST SPOT DETAIL
   Orange #ea5211 | Blue #0052a5 | Gold #f4c542 | Navy #001f2d
============================================================ */

/* ---- Hero ---- */
.tsd-hero {
    background: linear-gradient(135deg, #001f2d 0%, #003d7a 50%, #0052a5 100%);
    padding: 40px 0 32px;
    position: relative;
    overflow: hidden;
}
.tsd-hero::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: rgba(244,197,66,0.07); border-radius: 50%;
}
.tsd-hero::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(to right, #ea5211, #f4c542, #ea5211);
}
.tsd-hero .hero-tag {
    display: inline-block; background: rgba(234,82,17,0.9); color: #fff;
    font-size: 0.7rem; font-weight: 700; padding: 3px 12px;
    border-radius: 20px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
}
.tsd-hero h1 { font-size: 1.9rem; font-weight: 900; color: #fff; margin-bottom: 6px; }
.tsd-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 14px;
}
.tsd-breadcrumb a, .tsd-breadcrumb span { font-size: 0.8rem; color: rgba(255,255,255,0.6); text-decoration: none; }
.tsd-breadcrumb a:hover { color: #f4c542; }
.tsd-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.tsd-breadcrumb .current { color: #f4c542; font-weight: 600; }

/* ---- Page Wrap ---- */
.tsd-wrap { background: #f4f6f9; padding: 36px 0 50px; }

/* ---- Big Image ---- */
#big-image {
    width: 100%; max-height: 420px; object-fit: cover;
    border-radius: 12px; cursor: pointer;
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    transition: transform 0.3s ease;
}
#big-image:hover { transform: scale(1.01); }

/* ---- About Section ---- */
.about-section {
    background: #fff; border-radius: 12px; padding: 24px;
    margin-top: 20px; margin-bottom: 20px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07);
}
.about-section .about-header {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 16px; padding-bottom: 10px;
    border-bottom: 2px solid #eaeff8;
}
.about-section .about-header .ah-icon {
    width: 36px; height: 36px; border-radius: 8px;
    background: linear-gradient(135deg, #ea5211, #c9460e);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1rem; flex-shrink: 0;
}
.about-section .about-header h3 { font-size: 1.1rem; font-weight: 800; color: #001f2d; margin: 0; }

/* ---- Contact Card ---- */
.contact-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07); margin-bottom: 20px;
}
.contact-card .cc-header {
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff; padding: 13px 18px;
    border-bottom: 3px solid #f4c542;
    display: flex; align-items: center; gap: 8px;
    font-weight: 700; font-size: 0.9rem;
}
.contact-card .cc-body { padding: 18px; color: #333; font-size: 0.88rem; }
.contact-card .cc-body small { color: #888; }

/* ---- Photo Gallery ---- */
.gallery-card {
    background: #fff; border-radius: 12px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07);
    margin-bottom: 20px;
}
.gallery-card .gc-header {
    background: linear-gradient(135deg, #001f2d, #003d7a);
    color: #fff; padding: 13px 18px;
    border-bottom: 3px solid #ea5211;
    display: flex; align-items: center; gap: 8px;
    font-weight: 700; font-size: 0.9rem;
}
.gallery-card .gc-body { padding: 16px; }
.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
    gap: 8px; margin-top: 4px;
}
.spot-thumbnail {
    width: 100%; height: 100px; object-fit: cover;
    border-radius: 8px; cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
    border: 2px solid transparent;
}
.spot-thumbnail:hover {
    transform: scale(1.06); box-shadow: 0 4px 14px rgba(0,0,0,0.18);
    border-color: #0052a5;
}

/* ---- Responsive ---- */
@media (max-width: 767px) {
    .tsd-hero h1 { font-size: 1.3rem; }
    #big-image { max-height: 250px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="tsd-hero">
    <div class="container">
        <div class="hero-tag"><i class="fa fa-map-marker"></i> &nbsp;Tourist Spot — Sogod, Southern Leyte</div>
        <h1>{{ $page }}</h1>
        <div class="tsd-breadcrumb">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
            <span class="sep">/</span>
            <a href="{{ route('tourism') }}">Tourism</a>
            <span class="sep">/</span>
            <span class="current">{{ $page }}</span>
        </div>
    </div>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="tsd-wrap">
    <div class="container">
        <div class="row">

            {{-- ===== LEFT: Image + About ===== --}}
            <div class="col-lg-8 col-md-7 mb-4" data-aos="fade-up">
                @php $images = json_decode($tspot->image, true) ?? []; @endphp
                @if(count($images))
                    <img id="big-image" src="{{ Voyager::image($images[0]) }}" data-toggle="modal" data-target="#imageModal" alt="{{ $tspot->title }}">
                @else
                    <div class="p-4 text-center text-muted bg-white rounded">No image available</div>
                @endif

                <div class="about-section">
                    <div class="about-header">
                        <div class="ah-icon"><i class="fa fa-info"></i></div>
                        <h3>About {{ $page }}</h3>
                    </div>
                    @if($tspot->body)
                        <div>{!! $tspot->body !!}</div>
                    @else
                        <p class="text-muted">No description available.</p>
                    @endif
                </div>
            </div>

            {{-- ===== RIGHT: Contact + Photos ===== --}}
            <div class="col-lg-4 col-md-5" data-aos="fade-left">

                {{-- Contact Card --}}
                <div class="contact-card">
                    <div class="cc-header">
                        <i class="fa fa-address-card"></i> Contact Details
                    </div>
                    <div class="cc-body">
                        <small>Last Updated: {{ \Carbon\Carbon::parse($tspot->updated_at)->format('F j, Y') }}</small>
                        <hr style="margin: 10px 0; border-color:#eaeff8;">
                        {!! $tspot->contact !!}
                    </div>
                </div>

                {{-- Photo Gallery --}}
                @if(count($images) > 1)
                <div class="gallery-card">
                    <div class="gc-header">
                        <i class="fa fa-camera"></i> Photos
                    </div>
                    <div class="gc-body">
                        <div class="photo-grid">
                            @foreach($images as $img)
                                <img src="{{ Voyager::image($img) }}" class="spot-thumbnail" alt="photo">
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                {{-- Back Button --}}
                <a href="{{ route('tourism') }}" class="btn btn-block" style="background:linear-gradient(135deg,#0052a5,#003d7a);color:#fff;border-radius:8px;font-weight:700;">
                    <i class="fa fa-arrow-left"></i> Back to Tourism
                </a>

            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body text-center p-0">
        <img id="modal-img" src="" alt="Large image preview" style="width:100%;border-radius:8px;">
      </div>
    </div>
  </div>
</div>

<script>
document.querySelectorAll('.spot-thumbnail').forEach(el => {
    el.addEventListener('click', () => {
        document.getElementById('big-image').src = el.src;
        document.getElementById('modal-img').src = el.src;
        $('#imageModal').modal('show');
    });
});

document.getElementById('big-image')?.addEventListener('click', function() {
    document.getElementById('modal-img').src = this.src;
});
</script>
@endsection