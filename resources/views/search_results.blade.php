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
                            $photoPath = str_replace('\\', '/', $result->photo);
                        @endphp
                        <div class="col py-2" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
                        data-faculty-info='{{ json_encode(["name" => $result->name,
                                                           "department" => $result->department->department_name,
                                                           "college" => $result->college->college_name,
                                                           "specialization" => $result->specialization,
                                                           "no_photo" => asset("img/660f6e5997de4_def.jpg"),
                                                           "photo" => asset($photoPath),
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
