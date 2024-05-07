@extends('layout')

@section('title', 'MSU FACULTY DIRECTORY')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="colleges-text">All Colleges (8)</strong> <br>
            <div class="py-4">
                <div class="row">
                    <div class="col py-2">
                        <div class="container py-2 bg-white rounded custom-container border">
                            <img src="{{ asset('img/sample.jpg') }}" class="rounded img-fluid" alt="...">
                            <h6 class="text-center mt-2 maroon"><strong>College of Agriculture</strong></h6>
                            <div class="container" style="display: flex; justify-content: center;">
                                <div style="width: 30%;">
                                    <hr style="width: 100%; border: 1px solid;">
                                </div>
                            </div>
                            <h6 class="text-center"><strong>Edward Lapong</strong></h6>
                            <h6 class="text-center">Dean of COA</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection