<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

    /**
     * Create a new controller instance.
     *
     * @param ProfileService $profileService The profile service instance.
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Display the specified resource.
     *
     * @param int $profileId The ID of the profile to show.
     * @return \Illuminate\Http\Response The profile view.
     */
    
    public function show($profileId)
    {
        // Get profile data using ProfileService
        $data = $this->profileService->getProfileData($profileId);

        // Return the profile view with data
        return view('profile', $data);
    }
}
