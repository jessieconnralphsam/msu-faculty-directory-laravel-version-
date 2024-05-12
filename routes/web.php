<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/college', function () {
    return view('college');
});

Route::get('/profile', function () {
    return view('profile');
});

//temporary only! [manual set email]
//session from the [faculty.msugensan.edu.ph] login
//maaccess ni sya dapat base sa session from [faculty.msugensan.edu.ph]
Route::get('/profile-edit', function () {
    $email = 'jose.trillo@msugensan.edu.ph'; 

    if (!empty($email)) {
        Session::put('email', $email);
        return view('profile_edit', ['email' => $email]); // Pass $email to the view [para magamit ang email]
    } else {
        return redirect('/');
    }
});


Route::get('/search', 'App\Http\Controllers\FacultyController@search')->name('search');


Route::get('/college/{collegeId}', [CollegeController::class, 'show'])->name('college.show');

Route::get('/profile/{profileId}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('/update-faculty/{id}', 'App\Http\Controllers\FacultyUpdateController@update')->name('update.faculty');

Route::post('/update-research/{id}', 'App\Http\Controllers\FacultyResearchController@updateResearch')->name('update.research');

