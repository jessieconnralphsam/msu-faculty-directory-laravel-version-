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
                        <img src="{{ $faculty->photo }}" class="img-fluid-profile rounded mx-auto d-block" alt="...">
                        <h3 class="text-center text-maroon mt-2 mb-2">{{ $faculty->name }}</h3>
                        <p class="text-center text-maroon mt-2 mb-2">{{$rankMap[$faculty->rank]}}</p>
                        <p class="text-center text-maroon mt-2 mb-2">{{ $faculty->status }}</p>
                        <!-- <p class="text-center text-maroon mt-2 mb-2">{{ $faculty->photo }}</p> -->
                        <div class="container">
                            <small class="text-center mt-2 mb-2"><i class="fa-solid fa-envelope"></i> {{ $faculty->email }}</small><br>
                            <small class="text-center mt-2 mb-2"><i class="fa-solid fa-building"></i> {{ $faculty->department->department_name }}</small><br>
                            <small class="text-center mt-2 mb-5"><i class="fa-solid fa-building-columns"></i> {{ $faculty->college->college_name }}</small><br>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('update.faculty', ['id' => $faculty->facultyid]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label"><strong>Name:</strong></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $faculty->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="col-form-label"><strong>Photo:</strong> (jpg only)</label>
                                        <input type="file" accept="image/jpeg" class="form-control" id="photo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label"><strong>Email:</strong></label>
                                        <!-- <input type="text" class="form-control" id="email" name="email" value="{{ $faculty->email }}"> -->
                                        <p>{{ $faculty->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="college" class="col-form-label"><strong>College:</strong></label><br>
                                        <p>{{ $faculty->college->college_name}}</p>
                                        <!-- <select class="form-control" id="college" name="college">
                                                <option value="" disabled selected>{{ $faculty->college->college_name}}</option>
                                                <option value="1">College of Engineering</option>
                                                <option value="2">College of Agriculture</option>
                                                <option value="3">College of Social Sciences and Humanities</option>
                                                <option value="4">College of Medicine</option>
                                                <option value="5">College of Business Administration and Accountacy</option>
                                                <option value="6">College of Fisheries</option>
                                                <option value="7">College of Natural Science and Mathematics</option>
                                                <option value="8">School of Graduate Studies</option>
                                                <option value="9">College of Education</option>
                                        </select> -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="Department" class="col-form-label"><strong>Department</strong>:</label><br>
                                        <p>{{ $faculty->department->department_name }}</p>
                                        <!-- <select class="form-control" id="department" name="department">
                                                <option value="" selected>{{ $faculty->department->department_name }}</option>
                                                <option value="1">Department of Elementary Education</option>
                                                <option value="2">Department of Secondary Education</option>
                                                <option value="3">Department of Physical Education</option>
                                                <option value="4">Department of Filipino</option>
                                                <option value="5">Department of Sociology</option>
                                                <option value="6">Pre-University/College Bound Program</option>
                                                <option value="7">Department of English</option>
                                                <option value="8">Department of Political Science</option>
                                                <option value="9">Department of Islamic Studies</option>
                                                <option value="10">Department of History</option>
                                                <option value="11">Department of Mathematics</option>
                                                <option value="12">Department of Information Technology & Physics</option>
                                                <option value="13">Department of Science</option>
                                                <option value="14">Doctor of Medicine</option>
                                                <option value="15">Basic Sciences</option>
                                                <option value="16">Clinical Sciences</option>
                                                <option value="17">Master in Business Administration</option>
                                                <option value="18">Master in Public Administration</option>
                                                <option value="19">Graduate Program in Education</option>
                                                <option value="20">Master in Sustainable Development</option>
                                                <option value="21">Department of Accountancy</option>
                                                <option value="22">Economics, Management & Marketing</option>
                                                <option value="23">Department of Agricultural Engineering</option>
                                                <option value="24">Animal Science & Agri Business</option>
                                                <option value="25">Agronomy</option>
                                                <option value="26">Department of Civil Engineering</option>
                                                <option value="27">Department of Electronics and Communication/Electrical Engineering</option>
                                                <option value="28">Department of Mechanical Engineering</option>
                                                <option value="29">Engineering Technology</option>
                                                <option value="30">Department of Aquaculture</option>
                                                <option value="31">Fish Processing & Marine Biology</option>
                                        </select> -->
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-8 mt-3 col-md-offset-2">
                    <div class="row">
                        <div class="col col-12 col-md-12">
                            <div class="container rounded bg-white shadow-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab rem natus ipsum quisquam, error numquam, quas suscipit dolor eum corporis, sapiente cumque! Beatae facilis nam harum earum sapiente enim. Nulla nesciunt dolore quis magni placeat vel, dolorum vero adipisci ipsa libero ipsum. Suscipit amet iste sint soluta optio recusandae, commodi rem voluptates, accusantium, reiciendis iure aspernatur consectetur ut placeat dolore! Repellendus, vitae. Vero ipsum voluptates similique, architecto obcaecati officiis repudiandae velit quia dolor in quae ab laboriosam, sapiente ipsam! Magni itaque doloribus esse asperiores saepe quas, tempore quaerat nostrum! Eos commodi nobis laboriosam totam quis fugit tenetur repudiandae, iusto nihil!
                            </div>
                        </div>
                        <div class="col col-12 col-md-12 mt-3">
                            <div class="container rounded bg-white shadow-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, impedit quibusdam maiores at suscipit illum necessitatibus? Rem doloribus in consequuntur quam libero quisquam numquam officia hic aut quas impedit aliquid incidunt, officiis iure architecto maxime quae veniam sunt nisi modi eius labore quos eligendi pariatur! Reprehenderit ducimus cum, quasi quas vero sint blanditiis voluptate exercitationem voluptates pariatur impedit atque sapiente molestias nulla quos nam explicabo reiciendis ad natus, adipisci magnam similique officiis in beatae. Odit, id adipisci. Vel aperiam nemo est hic minus praesentium expedita eligendi? Quidem libero non molestiae facilis. Nisi suscipit itaque cupiditate eum, nam ipsum minima et.
                            </div>
                        </div>
                        <div class="col col-12 col-md-12 mt-3 mb-5">
                            <div class="container rounded bg-white shadow-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, impedit quibusdam maiores at suscipit illum necessitatibus? Rem doloribus in consequuntur quam libero quisquam numquam officia hic aut quas impedit aliquid incidunt, officiis iure architecto maxime quae veniam sunt nisi modi eius labore quos eligendi pariatur! Reprehenderit ducimus cum, quasi quas vero sint blanditiis voluptate exercitationem voluptates pariatur impedit atque sapiente molestias nulla quos nam explicabo reiciendis ad natus, adipisci magnam similique officiis in beatae. Odit, id adipisci. Vel aperiam nemo est hic minus praesentium expedita eligendi? Quidem libero non molestiae facilis. Nisi suscipit itaque cupiditate eum, nam ipsum minima et.
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
