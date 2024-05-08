<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show($profileId)
    {
        $profile = Profile::findOrFail($profileId);
        return view('profile', ['profile' => $profile]);
    }
}
