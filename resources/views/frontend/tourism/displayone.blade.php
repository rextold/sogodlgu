@extends('layouts.home')

@section('content')
<style>
/* --- THEME COLORS --- */
:root {
    --primary: #0A2E63; /* Deep Navy Blue */
    --accent: #F1B41C;  /* Golden Yellow */
    --bg: #F9FAFB;      /* Light Background */
    --text: #222;
}

body {
    background-color: var(--bg);
    font-family: 'Poppins', sans-serif;
    color: var(--text);
}

#banner {
    width: 100%;
    height: 220px;
    background: linear-gradient(135deg, var(--primary), #113E87);
}

/* --- Main Layout --- */
.container {
    margin-top: 40px;
}

/* --- Image & Modal --- */
#big-image {
    width: 100%;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}
#big-image:hover { transform: scale(1.02); }

.spot-thumbnail {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 6px;
    cursor: pointer;
    transition: transform 0.3s ease;
}
.spot-thumbnail:hover {
    transform: scale(1.05);
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
}

/* --- About Section --- */
.about-section {
    background: #fff;
    border: 1px solid #e3e3e3;
    border-radius: 8px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.05);
}
.about-section h3 {
    color: var(--primary);
    border-left: 5px solid var(--accent);
    padding-left: 10px;
    font-weight: 700;
}

/* --- Contact Details --- */
.contact-card {
    background: #fff;
    border: 1px solid #e3e3e3;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    margin-bottom: 25px;
}
.contact-card .card-header {
    background: var(--primary);
    color: #fff;
    padding: 15px 20px;
    border-bottom: 3px solid var(--accent);
    border-radius: 8px 8px 0 0;
}
.contact-card .card-body {
    padding: 20px;
    color: var(--text);
}
.contact-card small {
    color: #f1f1f1;
}

/* --- Photo Gallery --- */
.gallery-card {
    background: #fff;
    border: 1px solid #e3e3e3;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    padding: 20px;
}
.gallery-card h4 {
    color: var(--primary);
    border-left: 5px solid var(--accent);
    padding-left: 10px;
    font-weight: 700;
}
.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    grid-gap: 10px;
    margin-top: 10px;
}

/* --- Modal --- */
.modal-body {
    padding: 0;
}
.modal-body img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}
</style>

<div class="container">
    <div class="row">
        <!-- LEFT: Big Image -->
        <div class="col-lg-8 col-md-7 mb-4">
            @php $images = json_decode($tspot->image, true) ?? []; @endphp
            @if(count($images))
                <img id="big-image" src="{{ Voyager::image($images[0]) }}" data-toggle="modal" data-target="#imageModal" alt="{{ $tspot->title }}">
            @else
                <div class="alert alert-info text-center mt-3">No image available</div>
            @endif

            <!-- About Section -->
            <div class="about-section mt-4">
                <h3>About {{ $page }}</h3>
                <div class="mt-3">
                    @if($tspot->body)
                        {!! $tspot->body !!}
                    @else
                        <p>No description available.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- RIGHT: Contact + Photos -->
        <div class="col-lg-4 col-md-5">
            <!-- Contact Details -->
            <div class="contact-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fa fa-address-card"></i> Contact Details</h5>
                </div>
                <div class="card-body">
                    <small>Last Updated: {{ \Carbon\Carbon::parse($tspot->updated_at)->format('F j, Y \\a\\t g:i a') }}</small>
                    <hr>
                    {!! $tspot->contact !!}
                </div>
            </div>

            <!-- Photo Gallery -->
            @if(count($images) > 1)
            <div class="gallery-card">
                <h4><i class="fa fa-camera"></i> Photos</h4>
                <div class="photo-grid mt-3">
                    @foreach($images as $img)
                        <img src="{{ Voyager::image($img) }}" class="spot-thumbnail" alt="photo">
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal for Enlarged Image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img id="modal-img" src="" alt="Large image preview">
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
