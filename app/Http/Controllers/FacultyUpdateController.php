<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyUpdateController extends Controller
{
    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        // Validate the form data here if needed

        $data = [
            'name' => $request->input('name'),
        ];

        // if ($request->hasFile('photo')) {
        //     if ($faculty->photo) {
        //         Storage::delete($faculty->photo);
        //     }
    
        //     $path = $request->file('photo')->store('public/assets/img');
            
        //     $data['photo'] = str_replace('public/', '', $path);
        // }

        $faculty->update($data);

        return redirect()->back()->with('success', 'Faculty updated successfully.');
    }
}
