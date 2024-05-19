@extends('layout')

@section('title', 'Profile')

@section('content')
<div class="container py-2 px-2">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong><a href="/" class="text-gold">All Colleges</a> / {{ $profile->college->college_name }}</strong>
            <div class="py-4">
                <div class="row row-cols-auto">
                    <div class="col col-12 col-md-4 mt-2">
                        <div class="container bg-white rounded shadow">
                            <div class="text-center">
                                <img src="{{ $profile->photo ? asset(trim($profile->photo)) : asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid mt-2 mb-2" alt="Profile Photo">
                            </div>
                            <div class="container">
                                <h3 class="text-center text-maroon mt-2 mb-2">{{ $profile->last_name }}, {{ $profile->first_name }} {{ $profile->suffix }} {{ $profile->middle_name }}</h3>
                                <p class="text-center text-maroon mt-2 mb-2">{{ getRankTitle($profile->rank) }}</p>
                                <p class="text-center text-maroon">{{ $firstEducation }}</p>
                                <small class="d-block mt-2 mb-2"><i class="fa-solid fa-envelope"></i> {{ $profile->email }}</small>
                                <small class="d-block mt-2 mb-2"><i class="fa-solid fa-building"></i> {{ $profile->department->department_name }}</small>
                                <small class="d-block mt-4 mb-5"><i class="fa-solid fa-building-columns"></i> {{ $profile->college->college_name }}</small>
                                <small class="d-block mt-3 mb-5"><strong>Google Scholar Link:</strong> {{ $profile->google_scholar_link }}</small>
                                <small class="d-block mt-3 mb-5"><strong>Specialization:</strong> {{ $profile->specialization ? str_replace(';', ',', $profile->specialization) : 'No data' }}</small>
                                <small class="d-block mt-3 mb-5"><strong>Research Interest:</strong> {{ $profile->research ? str_replace(';', ',', $profile->research) : 'No data' }}</small>
                                <hr class="text-white">
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-8 mt-2">
                        <div class="container">
                            <h2 class="profile-text text-maroon"><strong>{{ $profile->name }}</strong></h2>
                            <h3 class="mt-0"><span class="fst-normal"><strong>{{ getRankTitle($profile->rank) }}</strong>, {{ $profile->department->department_name }} ({{ $deanText }})</span></h3>
                            <p class="fw-lighter fs-sm mt-2">
                                I'm {{ $profile->first_name }} {{ $profile->last_name }}, an {{ getRankTitle($profile->rank) }} at Mindanao State University-General Santos. My expertise lies in {{ $profile->specialization ? str_replace(';', ', ', $profile->specialization) : 'No data' }}, which I teach in the {{ $profile->department->department_name }} within the {{ $profile->college->college_name }}. I hold a {{ $profile->education ? str_replace(';', ', ', $profile->education) : 'No data' }} and am actively involved in research areas such as {{ $profile->research ? str_replace(';', ', ', $profile->research) : 'No data' }}. You can find more about my work on my Google Scholar profile. Feel free to reach out to me at {{ $profile->email }} for any inquiries or collaborations.
                            </p>
                            <h3 class="fw-bold mt-4">Specialization</h3>
                            <p class="fw-lighter fs-sm mt-2">{{ $profile->specialization ? str_replace(';', ', ', $profile->specialization) : 'No data' }}</p>
                            <h3 class="fw-bold mt-4">Education</h3>
                            <p class="fw-lighter fs-sm mt-2">{{ $profile->education ? str_replace(';', ', ', $profile->education) : 'No data' }}</p>
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
