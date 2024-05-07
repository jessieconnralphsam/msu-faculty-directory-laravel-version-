@extends('layout')

@section('title', 'College')

@section('content')
<div class="container">
        <h1>{{ $college->college_name }}</h1>
        <h2>Faculty Members:</h2>
        <ul>
            @foreach ($college->faculty as $faculty)
                <li>{{ $faculty->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
