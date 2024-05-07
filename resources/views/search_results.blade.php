@extends('layout')

@section('title', 'Search Results')

@section('content')
<div class="container mt-3 mb-3">
    <div class="container rounded bg-white">
        <div class="px-3 py-3">
            <strong id="colleges-text">All Results ({{ $results->count() }})</strong> <br> <!-- Change to show count of results -->
            <div class="py-4">
                <div class="row">
                    @foreach($results as $result)
                        <div class="col py-2">
                            <div class="container py-2 bg-white rounded custom-container border">
                                <img src="{{ asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
                                <h6 class="text-center mt-2 maroon"><strong>{{ $result->college->college_name }}</strong></h6>
                                <div class="container" style="display: flex; justify-content: center;">
                                    <div style="width: 30%;">
                                        <hr style="width: 100%; border: 1px solid;">
                                    </div>
                                </div>
                                <h6 class="text-center"><strong>{{ $result->name }}</strong></h6>
                                @php
                                    switch($result->college->college_name) {
                                        case 'College of Agriculture':
                                            $deanText = 'COA';
                                            break;
                                        case 'College of Engineering':
                                            $deanText = 'COE';
                                            break;
                                        case 'College of Social Sciences and Humanities':
                                            $deanText = 'CSSH';
                                            break;
                                        case 'College of Medicine':
                                            $deanText = 'COM';
                                            break;
                                        case 'College of Business Administration and Accountancy':
                                            $deanText = 'Ba&A';
                                            break;
                                        case 'College of Fisheries':
                                            $deanText = 'COF';
                                            break;
                                        case 'College of Natural Science and Mathematics':
                                            $deanText = 'CNSM';
                                            break;
                                        case 'School of Graduate Studies':
                                            $deanText = 'SGS';
                                            break;
                                        case 'College of Education':
                                            $deanText = 'CoEd';
                                            break;
                                        default:
                                            $deanText = 'No Match';
                                    }
                                @endphp
                                <h6 class="text-center">Dean of {{ $deanText }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
