<?php
use App\Models\Faculty;
?>
@extends('profile_layout')

@section('title', 'Dean - ' . $email)

@section('content')
<!-- @if($collegeid)
    <h2>Faculty Members:</h2>
    <ul>
        @foreach(Faculty::where('collegeid', $collegeid)->get() as $faculty)
            <li>{{$faculty->name}}</li>
        @endforeach
    </ul>
@else
    <p>No college ID specified.</p>
@endif  -->

<div class="container bg-white mt-3">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-md-3 d-flex justify-content-center align-items-center position-relative">
                        <img src="{{ asset('img/Rectangle 279.png') }}" class="rounded img-fluid mt-2 mb-2" alt="...">
                        <img src="{{ asset('img/icons8-user-96 1.png') }}" class="rounded img-fluid position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);" alt="...">
                    </div>
                    <div class="col border">test</div>
                </div>
                <div class="border">test</div>
                <div class="border">test</div>
            </div>
        </div>
        <div class="col-12 col-md-3">test</div>
        <div class="col-12 col-md-3">test</div>
        <div class="col-12 col-md-3">test</div>
    </div>
</div>
@endsection
