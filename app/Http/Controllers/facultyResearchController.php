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

            $researchArray = explode(';', $faculty->research);

            $researchArray = array_diff($researchArray, [$research]);

            $updatedResearch = implode(';', $researchArray);

            $faculty->research = $updatedResearch;
            $faculty->save();

            return redirect()->back()->with('success', 'Research item deleted successfully.');
        }

        return redirect()->back()->with('error', 'Faculty not found.');
    }

}
