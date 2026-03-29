@extends('layouts.home')

@section('content')
<style>
    #banner {
        background: #ce4c14;
        color: #fff;
        padding: 18px 0 14px;
        text-align: center;
    }
    #banner h1 {
        font-weight: 600;
        margin: 0;
    }
    .filter-box {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }
    .fdp-card {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        border: 1px solid #e0e0e0;
        transition: 0.2s ease-in-out;
    }
    .fdp-card:hover {
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }
    .fdp-title {
        font-weight: 600;
        color: #0d6efd;
    }
    .fdp-meta {
        font-size: 0.9rem;
        color: #6c757d;
    }
    .fdp-btn {
        margin-top: 10px;
    }
</style>

<div id="banner">
    <div class="container">
        <h1>{{ $page }}</h1>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <!-- Main content -->
        <div class="col-md-9">

            <!-- Filter & Search -->
            <!--<form method="GET" action="{{ route('fdp.index') }}" class="filter-box">-->
            <!--    <div class="row g-3 align-items-end">-->
            <!--        <div class="col-md-5">-->
            <!--            <label for="search" class="form-label fw-semibold">Search</label>-->
            <!--            <input type="text" name="search" id="search" class="form-control"-->
            <!--                   placeholder="Search by title or description"-->
            <!--                   value="{{ request('search') }}">-->
            <!--        </div>-->
            <!--        <div class="col-md-3">-->
            <!--            <label for="year" class="form-label fw-semibold">Year</label>-->
            <!--            <select name="year" id="year" class="form-select">-->
            <!--                <option value="">All Years</option>-->
            <!--                @foreach($years as $year)-->
            <!--                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>-->
            <!--                        {{ $year }}-->
            <!--                    </option>-->
            <!--                @endforeach-->
            <!--            </select>-->
            <!--        </div>-->
            <!--        <div class="col-md-3">-->
            <!--            <label for="quarter" class="form-label fw-semibold">Quarter</label>-->
            <!--            <select name="quarter" id="quarter" class="form-select">-->
            <!--                <option value="">All Quarters</option>-->
            <!--                <option value="1st Quarter" {{ request('quarter') == '1st Quarter' ? 'selected' : '' }}>1st Quarter</option>-->
            <!--                <option value="2nd Quarter" {{ request('quarter') == '2nd Quarter' ? 'selected' : '' }}>2nd Quarter</option>-->
            <!--                <option value="3rd Quarter" {{ request('quarter') == '3rd Quarter' ? 'selected' : '' }}>3rd Quarter</option>-->
            <!--                <option value="4th Quarter" {{ request('quarter') == '4th Quarter' ? 'selected' : '' }}>4th Quarter</option>-->
            <!--            </select>-->
            <!--        </div>-->
            <!--        <div class="col-md-1">-->
            <!--            <button type="submit" class="btn btn-primary w-100">-->
            <!--                <i class="fa fa-search"></i>-->
            <!--            </button>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</form>-->

            <!-- FDP Reports List -->
            @if($reports->count())
                @foreach($reports as $report)
                    <div class="fdp-card">
                        <h5 class="fdp-title">{{ $report->title }}</h5>
                        <p class="fdp-meta mb-2">
                            <i class="fa fa-calendar"></i> {{ $report->quarter }}, {{ $report->year }}
                        </p>
                        @if($report->description)
                               <p>{!! nl2br(e($report->description)) !!}</p>
                        @endif
                       @php
                            // Decode the JSON array from the DB
                            $fileData = json_decode($report->file_path, true);
                        @endphp
                        
                        @if(!empty($fileData) && isset($fileData[0]['download_link']))
                            <a href="{{ asset('storage/' . ltrim($fileData[0]['download_link'], '/')) }}"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm fdp-btn">
                                <i class="fa fa-file-pdf-o"></i> View File
                            </a>
                        @else
                            <span class="text-muted">No file available</span>
                        @endif

                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $reports->appends(request()->input())->links() }}
                </div>
            @else
                <div class="alert alert-info mt-4">
                    No FDP Reports found for your search.
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-md-3">
            @include('frontend.widgets._transseal')
        </div>
    </div>
</div>
@endsection
