<?php
    use App\Models\Faculty;
?>
@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong>All Colleges ({{ Faculty::countDeans() }})</strong> <br>
            <div class="py-4">
                <div class="row">
                    @foreach(Faculty::where('dean', true)->get() as $faculty)
                        <x-faculty-card :faculty="$faculty" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

