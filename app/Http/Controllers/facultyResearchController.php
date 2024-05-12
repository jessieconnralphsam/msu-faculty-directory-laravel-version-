<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyResearchController extends Controller
{
    public function updateResearch(Request $request, $id)
    {
        $faculty = Faculty::find($id); 

        if ($faculty) {
            $newResearch = $faculty->research ? $faculty->research . '; ' . $request->input('research') : $request->input('research');
            $faculty->research = $newResearch;
            $faculty->save();

            return redirect()->back()->with('success', 'Research interest updated successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }

    public function deleteResearch($id, $research)
    {
        $faculty = Faculty::find($id); 

        if ($faculty) {
            // Split the existing research data by ';' to create an array
            $researchArray = explode(';', $faculty->research);

            // Remove the specific research item from the array
            $researchArray = array_diff($researchArray, [$research]);

            // Join the remaining data back into a string separated by ';'
            $updatedResearch = implode(';', $researchArray);

            // Update the faculty's research field with the updated data
            $faculty->research = $updatedResearch;
            $faculty->save();

            return redirect()->back()->with('success', 'Research item deleted successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }

}
