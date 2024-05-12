<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class facultyEducationController extends Controller
{
    public function updateEducation(Request $request, $id)
    {
        $faculty = Faculty::find($id); 

        if ($faculty) {
            $newEducation = $faculty->education ? $faculty->education . '; ' . $request->input('education') : $request->input('education');
            $faculty->education = $newEducation;
            $faculty->save();

            return redirect()->back()->with('success', 'Research interest updated successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }
}
