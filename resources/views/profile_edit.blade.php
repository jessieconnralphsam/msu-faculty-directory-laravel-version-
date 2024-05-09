<?php
    use App\Models\Faculty;
?>
@extends('layout')

@section('title', 'Profile - ' . $email)

@section('content')
    <h1 class="text-center">Hello World</h1>
    <p class="text-center">Email: {{ $email }}</p>

    @php
        $faculty = Faculty::findByEmail($email);
    @endphp

    @if ($faculty)
        <p class="text-center">Name: {{ $faculty->name }}</p>
    @else
        <p class="text-center">Faculty not found for this email.</p>
    @endif
@endsection
