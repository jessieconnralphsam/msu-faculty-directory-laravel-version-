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

        // Validate picture
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg|max:2048', // Adjust max file size as needed
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            $filename = 'faculty_' . time() . '.' . $photo->getClientOriginalExtension();

            // Move the uploaded file to the public/photos directory
            //mas safe if sa storage is save ang files [good practice]
            $photo->move(public_path('assets/img/'), $filename);

            // Get the path relative to the public directory
            $photoPath = 'assets/img/' . $filename;

            // Compress ang image
            $this->compressImage(public_path($photoPath), public_path($photoPath), 60); // 60 is the quality percentage [pwede pa pababan]

            $data = [
                'name' => $request->input('name'),
                'photo' => $photoPath,
            ];

            $faculty->update($data);

            return redirect()->back()->with('success', 'Faculty updated successfully.');
        }

        return redirect()->back()->with('error', 'No photo uploaded.');
    }

    private function compressImage($source, $destination, $quality)
    {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, $quality);
        }
        elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
            imagepng($image, $destination, round(9 * $quality / 100));
        }

        imagedestroy($image);
    }
}