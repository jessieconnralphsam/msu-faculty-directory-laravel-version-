@extends('layout')

@section('title', $college->college_name)

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="mt-3"><a href="/" class="text-gold">All Colleges</a> / {{ $college->college_name }}</strong><br>
            <div class="py-4">
                @foreach($facultyMembers->groupBy('department') as $department => $members)
                    <h5>{{ $department }}</h5>
                    <div class="row">
                        @foreach($members as $faculty)
                            <div class="col py-2">
                                <div class="container py-2 bg-white rounded custom-container border" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" data-faculty-info='@json($faculty)'>
                                    <img src="{{ $faculty['photo'] }}" class="rounded img-fluid" alt="...">
                                    <h6 class="text-center mt-2 text-maroon"><strong>{{ $faculty['college'] }}</strong></h6>
                                    <div class="container" style="display: flex; justify-content: center;">
                                        <div style="width: 30%;">
                                            <hr style="width: 100%; border: 1px solid;">
                                        </div>
                                    </div>
                                    <h6 class="text-center"><strong>{{ $faculty['name'] }}</strong></h6> 
                                    <h6 class="text-center">{{ $faculty['rank'] }}</h6>
                                </div>
                            </div>
                        @endforeach
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
@endsection
