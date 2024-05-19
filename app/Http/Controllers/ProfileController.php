<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show($profileId)
    {
        $profile = Profile::findOrFail($profileId);

        $deanText = getDeanText($profile->college->college_name);
        $firstEducation = explode(';', $profile->education)[0] ?? 'No data';

        return view('profile', compact('profile', 'deanText', 'firstEducation'));
    }
}
