<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/college', function () {
    return view('college');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/search', 'App\Http\Controllers\FacultyController@search')->name('search');


Route::get('/college/{collegeId}', [CollegeController::class, 'show'])->name('college.show');