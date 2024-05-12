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

            return redirect()->back()->with('success', 'Education updated successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }


    public function deleteEducation($id, $education)
    {
        $faculty = Faculty::find($id); 

        if ($faculty) {

            $educationArray = explode(';', $faculty->education);

            $educationArray = array_diff($educationArray, [$education]);

            $updatedEducation = implode(';', $educationArray);

            $faculty->education = $updatedEducation;
            $faculty->save();

            return redirect()->back()->with('success', 'Education item deleted successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }
}
