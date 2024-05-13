@extends('layout')

@section('title', 'Search Results')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong><a href="/" class="text-gold">Home</a> / All Results ({{ $results->count() }})</strong><br>
            <div class="py-4">
                <div class="row">
                    @foreach($results as $result)
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
                            $photoPath = str_replace('\\', '/', $result->photo);
                            $rankTitle = $rankMap[$result->rank] ?? 'Unknown Rank';
                        @endphp
                        <div class="col py-2" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
                        data-faculty-info='{{ json_encode(["name" => $result->name,
                                                           "department" => $result->department->department_name,
                                                           "college" => $result->college->college_name,
                                                           "specialization" => $result->specialization,
                                                           "education" => $result->education,
                                                           "rank" => $rankTitle,
                                                           "photo" => $result->photo ? asset($photoPath) : asset('img/660f6e5997de4_def.jpg'), 
                                                           "id" => $result->facultyid]) }}'>
                            <div class="container py-2 bg-white rounded custom-container border">
                                <img src="{{ $result->photo ? asset($photoPath) : asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
                                <h6 class="text-center mt-2 text-maroon"><strong>{{ $result->college->college_name }}</strong></h6>
                                <div class="container" style="display: flex; justify-content: center;">
                                    <div style="width: 30%;">
                                        <hr style="width: 100%; border: 1px solid;">
                                    </div>
                                </div>
                                <h6 class="text-center"><strong>{{ $result->name }}</strong></h6>
                                <h6 class="text-center">{{ $result->department->department_name }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body"> 
                                <h1 id="faculty"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
