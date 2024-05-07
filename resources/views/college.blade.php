@extends('layout')

@section('title', 'College')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="mt-3"><a href="/" class="text-gold">All Colleges</a> / {{ $college->college_name }}</strong><br>
            <div class="py-4">
                <div class="row">
                    @php
                        $currentDepartment = null;
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
                                <h6 class="text-center"><strong>{{ $faculty->name }}</strong></h6>
                                <h6 class="text-center">{{ $faculty->department->department_name }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection