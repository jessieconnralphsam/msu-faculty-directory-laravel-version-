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
        <div class="container mt-2">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                <div class="col col-md-4 mt-3">
                    <div class="container rounded bg-white shadow-sm text-center">
                        <div class="row mb-2">
                            <div class="col mt-2">
                                <h5>Edit Profile</h5>
                            </div>
                            <div class="col mt-2">
                                <i class="fa-regular fa-pen-to-square fa-lg icon-cursor" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <img src="{{ $faculty->photo }}" class="img-fluid-profile rounded mx-auto d-block" alt="...">
                            </div>
                            <div class="col">
                                <div class="container">
                                    <h3 class="text-center text-maroon mt-2 mb-2">{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->suffix }} {{ $faculty->middle_name }}</h3>
                                    <p class="text-center text-maroon mt-2 mb-2">{{$rankMap[$faculty->rank]}}</p>
                                    <p class="text-maroon">highest educational attainment</p>
                                    <p class="text-center text-maroon mt-2 mb-2">{{ $faculty->status }}</p>
                                    <small class="mt-2 mb-2"><i class="fa-solid fa-envelope"></i> {{ $faculty->email }}</small><br>
                                    <small class="mt-2 mb-2"><i class="fa-solid fa-building"></i> {{ $faculty->department->department_name }}</small><br>
                                    <small class="mt-4 mb-5"><i class="fa-solid fa-building-columns"></i> {{ $faculty->college->college_name }}</small><br>
                                    <small class="mt-3 mb-5"><strong>Google Scholar Link:</strong> {{ $faculty->google_scholar_link }}</small><br>
                                    <small class="mt-3 mb-5"><strong>Specialization:</strong> No Data</small><br>
                                    <small class="mt-3 mb-5"><strong>Research Interest:</strong> No Data</small><br>
                                    <hr class="text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                @include('modal.profile_edit')
                <div class="col col-md-8 mt-3 col-md-offset-2">
                    <div class="row">
                        <div class="col col-12 col-md-12">
                            <div class="container rounded bg-white shadow-sm">
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <h3 class="mt-3"><strong>Research Interest</strong></h3>
                                    </div>
                                    <div class="mt-3 col-2 col-1 col-md-1">
                                    </div>
                                    <div class="col-1 col-md-1">
                                        <i class="fa fa-plus-square fa-2x mt-3 icon-cursor" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#research_modal" data-bs-whatever="@mdo"></i>
                                    </div>
                                </div>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item">A list item</li>
                                    <li class="list-group-item">A list item</li>
                                    <li class="list-group-item">A list item</li>
                                </ol>
                                <hr class="text-white">
                                <!-- Modal with updated id -->
                                <div class="modal fade" id="research_modal" tabindex="-1" aria-labelledby="researchModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="researchModalLabel">New research</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col col-12 col-md-12">
                            <div class="container rounded bg-white shadow-sm">
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <h3 class="mt-3"><strong>Education</strong></h3>
                                    </div>
                                    <div class="mt-3 col-2 col-1 col-md-1">
                                    </div>
                                    <div class="col-1 col-md-1">
                                        <i class="fa fa-plus-square fa-2x mt-3" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item">A list item</li>
                                    <li class="list-group-item">A list item</li>
                                    <li class="list-group-item">A list item</li>
                                </ol>
                                <hr class="text-white">
                            </div>
                        </div>
                        <div class="col col-12 col-md-12 mt-3">
                            <div class="container rounded bg-white shadow-sm">
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <h3 class="mt-3"><strong>Specialization</strong></h3>
                                    </div>
                                    <div class="mt-3 col-2 col-1 col-md-1">
                                    </div>
                                    <div class="col-1 col-md-1">
                                        <i class="fa fa-plus-square fa-2x mt-3" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item">A list item</li>
                                    <li class="list-group-item">A list item</li>
                                    <li class="list-group-item">A list item</li>
                                </ol>
                                <hr class="text-white">
                            </div>
                        </div>
                        <div class="col col-12 col-md-12 mt-3">
                            <div class="container rounded bg-white shadow-sm">
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <h3 class="mt-3"><strong>Additional Load</strong></h3>
                                    </div>
                                    <div class="mt-3 col-2 col-1 col-md-1">
                                        
                                    </div>
                                    <div class="col-1 col-md-1">
                                        <i class="fa fa-plus-square fa-2x mt-3" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <hr>
                                <table class="table mb-3">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Equiv. Load</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>HP Lab Supervisor</td>
                                            <td class="text-center">3</td>
                                            <td>Feb-01-2024</td>
                                            <td>Feb-01-2028</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                    <div class="col"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HP Lab Supervisor</td>
                                            <td class="text-center">3</td>
                                            <td>Feb-01-2024</td>
                                            <td>Feb-01-2028</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                    <div class="col"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">Faculty not found for this email.</p>
    @endif
@endsection
