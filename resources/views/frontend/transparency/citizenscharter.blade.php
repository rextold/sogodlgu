@extends('layouts.home')

@section('content')
<!-- Banner Section -->
<div id="banner" style="background: linear-gradient(135deg, #ea5211, #ff7b3d); padding: 1px 0; color: #fff; text-align: center;">
    <div class="container">
        <h1 style="font-weight: 700; font-size: 2.2rem;">{{ $page }}</h1>
    </div>
</div>

<!-- Main Content -->
<div class="container my-5">
    <div class="row">
        <!-- Page Content -->
        <div class="col-md-9">
            @if($page = App\Page::where('slug','citizens-charter')->first())
                <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 18px rgba(0,0,0,0.08);">
                    {!! $page->body !!}
                </div>
            @endif
        </div>

        <!-- Transparency Seal -->
        <div class="col-md-3">
            <div class="trans-seal" style="background: linear-gradient(145deg, #fff8f0, #ffe5d5); padding: 20px; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <h4 style="font-weight:700; color:#ea5211;">Transparency<small style="display:block; font-weight:400; font-size:0.75rem; color:#555;">Seal</small></h4>
                <a href="#">
                    <img src="{{ asset('images/transseal/transseal.png') }}" alt="Transparency Seal" title="Transparency Seal" style="width:100%; max-width:140px; border-radius:8px; margin-top:10px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Hover effect for Transparency Seal card */
.trans-seal:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .trans-seal {
        margin-top: 20px;
    }
}
</style>
@endsection
