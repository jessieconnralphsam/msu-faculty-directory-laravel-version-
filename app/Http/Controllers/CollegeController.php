<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    public function show($collegeId)
    {
        $college = College::with('faculty')->findOrFail($collegeId);

        $facultyMembers = $college->faculty->sortBy('department.department_name')->map(function ($faculty) {
            return [
                'id' => $faculty->facultyid,
                'name' => $faculty->name,
                'department' => $faculty->department->department_name,
                'college' => $faculty->college->college_name,
                'specialization' => $faculty->specialization,
                'photo' => $faculty->photo ? asset(str_replace('\\', '/', $faculty->photo)) : asset('img/660f6e5997de4_def.jpg'),
                'rank' => getRankTitle($faculty->rank),
            ];
        });

        return view('college', compact('college', 'facultyMembers'));
    }

}
