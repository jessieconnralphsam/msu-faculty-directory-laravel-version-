<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    public function show($collegeId)
    {
        $college = College::with('faculty')->findOrFail($collegeId);
        return view('college', compact('college'));
    }

}
