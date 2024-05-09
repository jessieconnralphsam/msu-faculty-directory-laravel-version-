<?php
    use App\Models\Faculty;
?>
@extends('profile_layout')

@section('title', 'Profile - ' . $email)

@section('content')
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class=""></i> 
            </div>
            <div class="d-flex align-items-auto mt-2">
                <p><i class="fa fa-user"></i>  {{ $email }}</p>
            </div>
        </div>
    </div>
    @php
        $faculty = Faculty::findByEmail($email);
    @endphp

    @if ($faculty)
        <h1 class="mt-5">{{ $faculty->name }}</h1>
        <h1>{{ $faculty->rank }}</h1>
        <h1>{{ $faculty-> college -> college_name }}</h1>
    @else
        <p class="text-center">Faculty not found for this email.</p>
    @endif
@endsection
