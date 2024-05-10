<?php
    use App\Models\Faculty;
?>
@extends('profile_layout')

@section('title', 'Profile - ' . $email)

@section('content')
    @php
        $faculty = Faculty::findByEmail($email);
    @endphp

    @if ($faculty)
        <!-- <h1 class="mt-5">{{ $faculty->name }}</h1>
        <h1>{{ $faculty->rank }}</h1>
        <h1>{{ $faculty-> college -> college_name }}</h1> -->
        <div class="container mt-4">
            <div class="row">
                <div class="col col-6 col-md-4 border rounded">
                    test
                </div>
                <div class="col col-sm-12 col-md-8 rounded">
                    <div class="container rounded border">
                        test
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">Faculty not found for this email.</p>
    @endif
@endsection
