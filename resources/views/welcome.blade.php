<?php
    use App\Models\Faculty;
?>
@extends('layout')

@section('title', 'MSU FACULTY DIRECTORY')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="colleges-text">All Colleges ({{ Faculty::countDeans() }})</strong> <br>
            <div class="py-4">
                <div class="row">
                    @foreach(Faculty::where('dean', true)->get() as $faculty)
                        @switch($faculty->college->college_name)
                            @case('College of Agriculture')
                                @php $deanText = 'COA'; @endphp
                                @break
                            @case('College of Engineering')
                                @php $deanText = 'COE'; @endphp
                                @break
                            @case('College of Social Sciences and Humanities')
                                @php $deanText = 'CSSH'; @endphp
                                @break
                            @case('College of Medicine')
                                @php $deanText = 'COM'; @endphp
                                @break
                            @case('College of Business Administration and Accountacy')
                                @php $deanText = 'Ba&A'; @endphp
                                @break
                            @case('College of Fisheries')
                                @php $deanText = 'COF'; @endphp
                                @break
                            @case('College of Natural Science and Mathematics')
                                @php $deanText = 'CNSM'; @endphp
                                @break
                            @case('School of Graduate Studies')
                                @php $deanText = 'SGS'; @endphp
                                @break
                            @case('College of Education')
                                @php $deanText = 'CoEd'; @endphp
                                @break
                            @default
                                @php $deanText = 'Ba&A'; @endphp
                        @endswitch
                        <div class="col py-2" onclick="redirectToCollege({{ $faculty->college->collegeid }})">
                            <div class="container py-2 bg-white rounded custom-container border">
                                <img src="{{ asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
                                <h6 class="text-center mt-2 text-maroon"><strong>{{ $faculty->college->college_name }}</strong></h6>
                                <div class="container" style="display: flex; justify-content: center;">
                                    <div style="width: 30%;">
                                        <hr style="width: 100%; border: 1px solid;">
                                    </div>
                                </div>
                                <h6 class="text-center"><strong>{{ $faculty->name }}</strong></h6>
                                <h6 class="text-center">Dean of {{ $deanText }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
