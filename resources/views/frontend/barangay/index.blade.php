@extends('layouts.home')

@section('content')
<div id="banner"></div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <h4 class="">{{ strtoupper($page) }}</h4> 
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9" data-aos="fade-left">
            <div class="" style="color: #586773;">
                <div class="table-responsive">
                  <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name of Barangays</th>
                      <th scope="col">Brgy Captain</th>
                      <th scope="col">Contact Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($barangayofficials as $brgyofficial)
                        <tr>
                            <td>{{ strtoupper($brgyofficial->barangay->name)}}</td>
                            <td>{{ $brgyofficial->captain}}</td>
                            <td>{{ ($brgyofficial->contactnumber)? $brgyofficial->contactnumber:'None'}}</td>
                        </tr>
                     @endforeach
                  </tbody>
                </table>                </div>            </div>
        </div>
        <div class="col-md-3">
            @include('frontend.widgets._transseal')
        </div>
    </div>
</div>
@endsection