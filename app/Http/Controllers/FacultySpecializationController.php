<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultySpecializationController extends Controller
{
    public function updateSpecialization(Request $request, $id)
    {
        $faculty = Faculty::find($id); 

        if ($faculty) {
            $newSpecialization = $faculty->specialization ? $faculty->specialization . '; ' . $request->input('specialization') : $request->input('specialization');
            $faculty->specialization = $newSpecialization;
            $faculty->save();

            return redirect()->back()->with('success', ' Specialization updated successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }

    public function deleteSpecialization($id, $specialization)
    {
        $faculty = Faculty::find($id); 

        if ($faculty) {

            $specializationArray = explode(';', $faculty->specialization);

            $specializationArray = array_diff($specializationArray, [$specialization]);

            $updatedSpecialization = implode(';', $specializationArray);

            $faculty->specialization = $updatedSpecialization;
            $faculty->save();

            return redirect()->back()->with('success', 'Specialization item deleted successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }
}
