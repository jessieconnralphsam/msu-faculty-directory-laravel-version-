<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Services\CollegeService;

class CollegeController extends Controller
{
    /**
     * The faculty service instance.
     */
    protected $facultyService;

     /**
     * Create a new controller instance.
     *
     * @param CollegeService $facultyService
     */

    public function __construct(CollegeService $facultyService) 
    {
         // injected service to the protected property
        $this->facultyService = $facultyService;
    }

    /**
     * Display the specified college along with its faculty members.
     *
     * @param int $collegeId
     * @return \Illuminate\View\View
     */
    
    public function show($collegeId)
    {
        $college = College::with('faculty')->findOrFail($collegeId);
        $facultyMembers = $this->facultyService->getFacultyMembers($college);

        return view('college', compact('college', 'facultyMembers'));
    }
}
