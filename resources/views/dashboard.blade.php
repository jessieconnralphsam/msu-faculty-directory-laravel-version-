<?php
use App\Models\Faculty;
?>
@extends('profile_layout')

@section('title', 'Dean - ' . $email)

@section('content')

<div class="container bg-white mt-3 rounded-4 shadow-sm">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-md-3 d-flex justify-content-center align-items-center position-relative">
                        <img src="{{ asset('img/Rectangle 279.png') }}" class="rounded img-fluid mt-2 mb-2" alt="...">
                        <img src="{{ asset('img/icons8-user-96 1.png') }}" class="rounded img-fluid position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);" alt="...">
                    </div>
                    <div class="col">
                        <small>Overall Tally</small><br>
                        <strong>45</strong>
                    </div>
                </div>
                <div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar w-75 bg-warning"></div>
                    </div>
                </div>
                <div>
                    <small>45 out of 305 University Faculty</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-md-3 d-flex justify-content-center align-items-center position-relative">
                        <img src="{{ asset('img/bg-blue.png') }}" class="rounded img-fluid mt-2 mb-2" alt="...">
                        <img src="{{ asset('img/icon-blue.png') }}" class="rounded img-fluid position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);" alt="...">
                    </div>
                    <div class="col">
                        <small>Overall Tally</small><br>
                        <strong>45</strong>
                    </div>
                </div>
                <div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar w-75 bg-blue"></div>
                    </div>
                </div>
                <div>
                    <small>45 out of 305 University Faculty</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-md-3 d-flex justify-content-center align-items-center position-relative">
                        <img src="{{ asset('img/bg-pink.png') }}" class="rounded img-fluid mt-2 mb-2" alt="...">
                        <img src="{{ asset('img/icon-pink.png') }}" class="rounded img-fluid position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);" alt="...">
                    </div>
                    <div class="col">
                        <small>Overall Tally</small><br>
                        <strong>45</strong>
                    </div>
                </div>
                <div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar w-75 bg-pink"></div>
                    </div>
                </div>
                <div>
                    <small>45 out of 305 University Faculty</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-md-3 d-flex justify-content-center align-items-center position-relative">
                        <img src="{{ asset('img/bg-green.png') }}" class="rounded img-fluid mt-2 mb-2" alt="...">
                        <img src="{{ asset('img/icon-green.png') }}" class="rounded img-fluid position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);" alt="...">
                    </div>
                    <div class="col">
                        <small>Overall Tally</small><br>
                        <strong>45</strong>
                    </div>
                </div>
                <div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar w-50 bg-darkgreen"></div>
                    </div>
                </div>
                <div>
                    <small>45 out of 305 University Faculty</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if($collegeid)
    <h2>Faculty Members:</h2>
    <ul>
        @foreach(Faculty::where('collegeid', $collegeid)->get() as $faculty)
            <li>{{$faculty->name}}</li>
        @endforeach
    </ul>
    @else
        <p>No college ID specified.</p>
    @endif 
</div>
@endsection
