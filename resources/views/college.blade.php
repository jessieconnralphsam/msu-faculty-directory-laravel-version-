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
                            <div class="container py-2 bg-white rounded custom-container border">
                                <img src="{{ asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
                                <h6 class="text-center mt-2 text-maroon"><strong>{{ $faculty->college->college_name }}</strong></h6>
                                <div class="container" style="display: flex; justify-content: center;">
                                    <div style="width: 30%;">
                                        <hr style="width: 100%; border: 1px solid;">
                                    </div>
                                </div>
                                <!-- change name format//
                                name format: {{ $faculty->last_name }}, {{ $faculty->first_name }}{{ $faculty->middle_name }}{{ $faculty->suffix }} -->
                                <h6 class="text-center"><strong>{{ $faculty->name }}</strong></h6> 
                                @php
                                    $rankTitle = $rankMap[$faculty->rank] ?? 'Unknown Rank';
                                @endphp
                                <h6 class="text-center">{{ $rankTitle }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
