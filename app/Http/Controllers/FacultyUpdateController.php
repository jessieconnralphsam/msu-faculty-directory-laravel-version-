<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image; 

class FacultyUpdateController extends Controller
{
    public function index()
    {
        return view('profile-edit');
    }

    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        // Validate name and optionally validate photo
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg|max:2048', // Allow photo to be nullable
        ]);

        $data = [
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'suffix' => $request->input('suffix'),
        ];

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            $filename = 'faculty_' . time() . '.' . $photo->getClientOriginalExtension();

            // Move the uploaded file to the public/photos directory
            $photo->move(public_path('assets/img/'), $filename);

            // Get the path relative to the public directory
            $photoPath = 'assets/img/' . $filename;

            // Compress the image
            $this->compressImage(public_path($photoPath), public_path($photoPath), 60); // 60 is the quality percentage

            $data['photo'] = $photoPath;
        }

        $faculty->update($data);

        return redirect()->back()->with('success', 'Faculty updated successfully.');
    }

    private function compressImage($source, $destination, $quality)
    {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, $quality);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
            imagepng($image, $destination, round(9 * $quality / 100));
        }

        imagedestroy($image);
    }
}