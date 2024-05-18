<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Services\CollegeService;

class CollegeController extends Controller
{
    protected $facultyService;

    public function __construct(CollegeService $facultyService) 
    {
        $this->facultyService = $facultyService;
    }

    public function show($collegeId)
    {
        $college = College::with('faculty')->findOrFail($collegeId);
        $facultyMembers = $this->facultyService->getFacultyMembers($college);

        return view('college', compact('college', 'facultyMembers'));
    }
}
