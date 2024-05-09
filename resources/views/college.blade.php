@extends('layout')

@section('title', $college->college_name)

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="mt-3"><a href="/" class="text-gold">All Colleges</a> / {{ $college->college_name }}</strong><br>
            <div class="py-4">
                <div class="row">
                    @php
                        $currentDepartment = null;
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

                    @foreach($college->faculty->sortBy('department.department_name') as $faculty)
                        @if($currentDepartment != $faculty->department->department_name)
                            @if($currentDepartment != null)
                                </div>
                            @endif
                            <h5>{{ $faculty->department->department_name }}</h5>
                            <div class="row">
                            @php
                                $currentDepartment = $faculty->department->department_name;
                            @endphp
                        @endif

                        <div class="col py-2">
                            @php
                                $photoPath = str_replace('\\', '/', $faculty->photo);
                                $rankTitle = $rankMap[$faculty->rank] ?? 'Unknown Rank';
                            @endphp
                            <div class="container py-2 bg-white rounded custom-container border" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" 
                                data-faculty-info='{{ json_encode(["name" => $faculty->name,
                                                                   "department" => $faculty->department->department_name,
                                                                   "college" => $faculty->college->college_name,
                                                                   "specialization" => $faculty->specialization,
                                                                   "no_photo" => asset($photoPath), 
                                                                   "photo" => asset($photoPath), 
                                                                   "id" => $faculty->facultyid,
                                                                   "rank" => $rankTitle,
                                                                   ])}}'>
                                <img src="{{ $faculty->photo ? asset($photoPath) : asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
                                <h6 class="text-center mt-2 text-maroon"><strong>{{ $faculty->college->college_name }}</strong></h6>
                                <div class="container" style="display: flex; justify-content: center;">
                                    <div style="width: 30%;">
                                        <hr style="width: 100%; border: 1px solid;">
                                    </div>
                                </div>
                                <h6 class="text-center"><strong>{{ $faculty->name }}</strong></h6> 
                                <h6 class="text-center">{{ $rankTitle }}</h6>
                            </div>
                        </div>
                    @endforeach
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
</div>
@endsection
