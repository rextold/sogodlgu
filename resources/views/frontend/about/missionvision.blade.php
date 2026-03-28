@extends('layouts.home')

@section('content')
<style>
    body {
        background-color: #1b3144;
        color: white;
        font-family: "Poppins", sans-serif;
    }

    #banner {
        width: 100%;
        height: 200px;
        background: url('{{ asset("images/banner/missionvision.jpg") }}') center/cover no-repeat;
    }

    .mission-vision-section {
        background: linear-gradient(rgba(27, 49, 68, 0.85), rgba(27, 49, 68, 0.85)),
                    url('{{ Voyager::image($mv->image) }}') center/cover no-repeat;
        border-radius: 20px;
        margin-top: -50px;
        padding: 40px 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .mv-card {
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        color: #1b3144;
        padding: 25px 30px;
        margin-bottom: 25px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .mv-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    }

    .mv-card h4 {
        color: #f4511e;
        display: flex;
        align-items: center;
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 20px;
    }

    .mv-card h4 i {
        margin-right: 10px;
        font-size: 22px;
        color: #f4511e;
        opacity: 0.9;
    }

    .mv-card article {
        font-size: 14px;
        line-height: 1.6;
        text-align: justify;
        word-break: break-word;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .mv-card article {
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .mission-vision-section {
            padding: 25px 15px;
        }

        .mv-card {
            padding: 20px;
        }

        .mv-card h4 {
            font-size: 18px;
        }

        .mv-card article {
            font-size: 12.5px;
            line-height: 1.5;
        }
    }
</style>

<div class="container mission-vision-section mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="mv-card">
                <h4><i class="fas fa-bullseye"></i> Mission</h4>
                <article>{!! $mv->mission !!}</article>
            </div>

            <div class="mv-card">
                <h4><i class="fas fa-eye"></i> Vision</h4>
                <article>{!! $mv->vision !!}</article>
            </div>
        </div>
    </div>
</div>
@endsection
