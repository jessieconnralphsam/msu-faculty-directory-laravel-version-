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
        <div class="container mt-2">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                <div class="col col-md-4 mt-3">
                    <div class="container rounded bg-white shadow-sm text-center">
                        <div class="row mb-2">
                            <div class="col mt-2">
                                <h5>Edit Profile</h5>
                            </div>
                            <div class="col mt-2">
                                <i class="fa-regular fa-pen-to-square fa-lg"></i>
                            </div>
                        </div>
                        <hr>
                        <img src="{{ $faculty->photo }}" class="img-fluid-profile rounded mx-auto d-block" alt="...">
                        <h3 class="text-center text-maroon mt-2 mb-2">{{ $faculty->name }}</h3>
                        <div class="container">
                            <small class="text-center mt-2 mb-2"><i class="fa-solid fa-envelope"></i> {{ $faculty->email }}</small><br>
                            <small class="text-center mt-2 mb-2"><i class="fa-solid fa-building"></i> {{ $faculty->department->department_name }}</small><br>
                            <small class="text-center mt-2 mb-4"><i class="fa-solid fa-building-columns"></i> {{ $faculty->college->college_name }}</small><br>
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
