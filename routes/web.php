<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Session;
use App\Models\Faculty;

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
//sample data [for troubleshoot]: juniven.acapulco@msugensan.edu.ph
//jose.trillo@msugensan.edu.ph
Route::get('/profile-edit', function () {
    $email = 'jose.trillo@msugensan.edu.ph';  //change base sa email na naa sa session

    $id = Faculty::where('email', $email)->first();
    $collegeid = $id->collegeid;
    $dean = $id->dean;

    if (!empty($email) && !is_null($collegeid)) {
        Session::put('email', $email);
        return view('profile_edit', ['email' => $email, 'collegeid' => $collegeid, 'dean' => $dean]);
    } else {
        return redirect('/');
    }
});


//temporary only! [manual set email]
//session from the [faculty.msugensan.edu.ph] login
//maaccess ni sya dapat base sa session from [faculty.msugensan.edu.ph] pero dean na
Route::get('/dashboard/{collegeid}', function ($collegeid) {
    $email = 'jose.trillo@msugensan.edu.ph'; //change base sa email na naa sa session

    $faculty = Faculty::where('email', $email)->where('collegeid', $collegeid)->first();

    if (!empty($email) && $faculty && $faculty->dean === true) {
        Session::put('email', $email);
        return view('dashboard', ['email' => $email, 'collegeid' => $collegeid, 'dean'=> $faculty->dean]);
    } else {
        return redirect('/');
    }
});

//search
Route::get('/search', 'App\Http\Controllers\FacultyController@search')->name('search');

//college
Route::get('/college/{collegeId}', [CollegeController::class, 'show'])->name('college.show');

//individual profile
Route::get('/profile/{profileId}', [ProfileController::class, 'show'])->name('profile.show');

//update faculty information

Route::post('/update-faculty/{id}', 'App\Http\Controllers\FacultyUpdateController@update')->name('update.faculty');

//update faculty research information [naka base ang session sa email]

Route::post('/update-research/{id}', 'App\Http\Controllers\FacultyResearchController@updateResearch')->name('update.research');

Route::delete('/delete-research/{id}/{research}', 'App\Http\Controllers\FacultyResearchController@deleteResearch')->name('delete.research');

//update faculty education information [naka base ang session sa email]

Route::post('/update-education/{id}', 'App\Http\Controllers\FacultyEducationController@updateEducation')->name('update.education');

Route::delete('/delete-education/{id}/{education}', 'App\Http\Controllers\FacultyEducationController@deleteEducation')->name('delete.education');

// update faculty specialization information [naka base ang session sa email]

Route::post('/update-specialization/{id}', 'App\Http\Controllers\FacultySpecializationController@updateSpecialization')->name('update.specialization');

Route::delete('/delete-specialization/{id}/{specialization}', 'App\Http\Controllers\FacultySpecializationController@deleteSpecialization')->name('delete.specialization');