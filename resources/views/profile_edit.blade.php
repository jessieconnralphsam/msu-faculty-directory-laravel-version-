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
                                    @if($faculty->education)
                                        @php
                                            $educationArray = explode(';', $faculty->education);
                                            $firstEducation = reset($educationArray);
                                        @endphp

                                        <p class="text-maroon">{{$firstEducation}}</p>
                                    @else
                                        <!-- no data available display [optional] -->
                                        <p class="text-maroon"></p> 
                                    @endif
                                    <p class="text-center text-maroon mt-2 mb-2">{{ $faculty->status }}</p>
                                    <small class="mt-2 mb-2"><i class="fa-solid fa-envelope"></i> {{ $faculty->email }}</small><br>
                                    <small class="mt-2 mb-2"><i class="fa-solid fa-building"></i> {{ $faculty->department->department_name }}</small><br>
                                    <small class="mt-4 mb-5"><i class="fa-solid fa-building-columns"></i> {{ $faculty->college->college_name }}</small><br>
                                    <small class="mt-3 mb-5"><strong>Google Scholar Link:</strong> {{ $faculty->google_scholar_link }}</small><br>
                                    @if(empty($faculty->specialization))
                                        <small class="mt-3 mb-5"><strong>Specialization:</strong> No data</small><br>
                                    @else
                                        <small class="mt-3 mb-5"><strong>Specialization:</strong> {{ str_replace(';', ',', $faculty->specialization) }}</small><br>
                                    @endif
                                    @if(empty($faculty->research))
                                        <small class="mt-3 mb-5"><strong>Research Interest:</strong> No data</small><br>
                                    @else
                                        <small class="mt-3 mb-5"><strong>Research Interest:</strong> {{ str_replace(';', ',', $faculty->research) }}</small><br>
                                    @endif
                                    <hr class="text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Profile modal -->
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
                                    @php
                                        $researchItems = explode(';', $faculty->research);
                                    @endphp

                                    @if(count($researchItems) > 0)
                                        @foreach ($researchItems as $item)
                                            @if($item) {{-- Check if $item is not empty --}}
                                                <li class="list-group-item d-flex justify-content-between align-items-center position-relative">
                                                    <div class="position-absolute top-2 mt-3 start-2 mx-4">
                                                        <p class="text-center">{{ trim($item) }}</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{ route('delete.research', ['id' => $faculty->facultyid, 'research' => $item]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="list-group-item">No research items available.</li>
                                    @endif
                                </ol>
                                <hr class="text-white">
                                <!-- Research Modal -->
                                <div class="modal fade" id="research_modal" tabindex="-1" aria-labelledby="researchModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="researchModalLabel">Add Research Interest</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.research', ['id' => $faculty->facultyid]) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <div class="mb3">
                                                            <label for="recipient-name" class="col-form-label">Research Interest:</label>
                                                            <input type="text" class="form-control mb-3" id="research" name="research">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
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
                                        <i class="fa fa-plus-square fa-2x mt-3 icon-cursor" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#education_modal" data-bs-whatever="@ndo"></i>
                                    </div>
                                </div>
                                <ol class="list-group list-group-numbered">
                                    @php
                                        $educationItems = explode(';', $faculty->education);
                                    @endphp

                                    @if(count($educationItems) > 0)
                                        @foreach ($educationItems as $educ_item)
                                            @if( $educ_item)
                                                <li class="list-group-item d-flex justify-content-between align-items-center position-relative">
                                                    <div class="position-absolute top-2 mt-3 start-2 mx-4">
                                                        <p class="text-center">{{ trim($educ_item) }}</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{ route('delete.education', ['id' => $faculty->facultyid, 'education' => $educ_item]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="list-group-item">No Education items available.</li>
                                    @endif
                                </ol>
                                <hr class="text-white">
                                <!-- Education Modal-->
                                <div class="modal fade" id="education_modal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="educationModalLabel">Add Educational History</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.education', ['id' => $faculty->facultyid]) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <div class="mb3">
                                                            <label for="recipient-name" class="col-form-label">Education:</label><br>
                                                            <small><strong>Note:</strong> The first data should be the highest educational attainment.</small><br>
                                                            <input type="text" class="form-control mb-3" id="education" name="education">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <i class="fa fa-plus-square fa-2x mt-3 icon-cursor" aria-hidden="true" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#specialization_modal" data-bs-whatever="@zdo"></i>
                                    </div>
                                </div>
                                <ol class="list-group list-group-numbered">
                                    @php
                                        $specializationItems = explode(';', $faculty->specialization);
                                    @endphp

                                    @if(count($specializationItems) > 0)
                                        @foreach ($specializationItems as $specialization_item)
                                            @if($specialization_item)
                                                <li class="list-group-item d-flex justify-content-between align-items-center position-relative">
                                                    <div class="position-absolute top-2 mt-3 start-2 mx-4">
                                                        <p class="text-center">{{ trim($specialization_item) }}</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{ route('delete.specialization', ['id' => $faculty->facultyid, 'specialization' => $specialization_item]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="list-group-item">No Specialization items available.</li>
                                    @endif
                                </ol>
                                <hr class="text-white">
                                <!-- Specialization Modal-->
                                <div class="modal fade" id="specialization_modal" tabindex="-1" aria-labelledby="specializationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="specializationModalLabel">Add Specialization</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.specialization', ['id' => $faculty->facultyid]) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <div class="mb3">
                                                            <label for="recipient-name" class="col-form-label">Specialization:</label><br>
                                                            <input type="text" class="form-control mb-3" id="specialization" name="specialization">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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