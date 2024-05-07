@extends('layout')

@section('title', 'Search Results')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="colleges-text"><a href="/" class="text-gold">Home</a> / All Results ({{ $results->count() }})</strong> <br>
            <div class="py-4">
                <div class="row">
                    @foreach($results as $result)
                        <div class="col py-2">
                            <div class="container py-2 bg-white rounded custom-container border">
                                <img src="{{ asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
                                <h6 class="text-center mt-2 text-maroon"><strong>{{ $result->college->college_name }}</strong></h6>
                                <div class="container" style="display: flex; justify-content: center;">
                                    <div style="width: 30%;">
                                        <hr style="width: 100%; border: 1px solid;">
                                    </div>
                                </div>
                                <h6 class="text-center"><strong>{{ $result->name }}</strong></h6>
                                <h6 class="text-center">{{ $result->department->department_name }}</h6> <!-- Display department name -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
