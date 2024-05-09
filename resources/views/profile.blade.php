<?php
    use App\Models\Profile;
?>
@extends('layout')

@section('title', 'Profile')

@section('content')
<div class="container  py-2 px-2">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
              <strong><a href="/" class="text-gold">All Colleges</a> / {{$profile->college->college_name}}</strong>
              <div class="py-4">
                <div class="row row-cols-auto">
                    <div class="col col-12 col-md-4 mt-2">
                        <div class="container bg-white rounded shadow">
                            <div>
                                <div class="col" style="display: flex;justify-content: center;">
                                    <img src="{{ asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid align-middle mt-2 mb-2" alt="...">
                                </div>
                                <div class="col">
                                    <p class="fw-bolder fs-sm text-center"><strong>Contact Information</strong></p>
                                    <p class="fw-lighter fs-sm text-center mb-3"><i class="fa fa-envelope"></i> {{ $profile->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-8 mt-2">
                        <div class="container">
                            <div class="mb-2">
                                @switch($profile->college->college_name)
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
                                @php
                                    $rankMap = [
                                        "LECT   " => "Lecturer",
                                        "PROF1  " => "Professor",
                                        "PROF2  " => "Professor",
                                        "PROF3  " => "Professor",
                                        "PROF4  " => "Professor",
                                        "PROF5  " => "Professor",
                                        "PROF6  " => "Professor",
                                        "MTEACH2" => "Master Teacher",
                                        "TEACH1 " => "Teacher",
                                        "TEACH2 " => "Teacher",
                                        "TEACH3 " => "Teacher",
                                        "ASTPRO1" => "Assistant Professor",
                                        "ASTPRO3" => "Assistant Professor",
                                        "ASTPRO4" => "Assistant Professor",
                                        "ASOPRO1" => "Associate Professor",
                                        "ASOPRO2" => "Associate Professor",
                                        "ASOPRO3" => "Associate Professor",
                                        "ASOPRO4" => "Associate Professor",
                                        "ASOPRO5" => "Associate Professor",
                                        "INST1  " => "Instructor",
                                        "INST2  " => "Instructor",
                                        "INST3  " => "Instructor"
                                    ];
                                @endphp
                                <h2 class="profile-text" style="color: #8F0A03;"><strong>{{ $profile->name }}</strong></h2>
                                <h3 class="mt-0"><span class="fst-normal"><strong>{{$rankMap[$profile->rank]}}</strong>, {{ $profile->department->department_name }} ({{ $deanText }})</span></h3>
                                <p class="fw-lighter fs-sm mt-2">[Dr.] [Name] is an [Rank] and currently the [chairperson] in the [Department]. [She] publishes research about lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum quam lorem, sed scelerisque massa venenatis id. Nulla congue elementum augue, quis gravida massa fermentum quis.</p>
                                <h3 class="fw-bold mt-4">Specialization</h3>
                                <p class="fw-lighter fs-sm mt-2">
                                    @if(!empty($profile->specialization))
                                        {{ str_replace(';', ', ', $profile->specialization) }}
                                    @else
                                        No data
                                    @endif
                                </p>
                                <h3 class="fw-bold mt-4">Education</h3>
                                <p class="fw-lighter fs-sm mt-2">
                                    @if(!empty($profile->education))
                                        {{ str_replace(';', ', ', $profile->education) }}
                                    @else
                                        No data
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="container bg-white rounded shadow mt-5 border">
                            <div class="container">
                                <div class="d-flex align-items-center">
                                    <h3 class="fw-bold mt-3 me-3">Research Interest</h3>
                                    <div class="flex-grow-1 d-flex justify-content-end">
                                    <i class="fa fa-caret-down" style="font-size:36px"></i>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <h3 class="fw-bold mt-3 me-3">Publications</h3>
                                    <div class="flex-grow-1 d-flex justify-content-end">
                                    <i class="fa fa-caret-down" style="font-size:36px"></i>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <h3 class="fw-bold mt-3 me-3">Affiliations</h3>
                                    <div class="flex-grow-1 d-flex justify-content-end">
                                    <i class="fa fa-caret-down" style="font-size:36px"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection