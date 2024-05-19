<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    public function getProfileData($profileId)
    {
        $profile = Profile::findOrFail($profileId);

        $deanText = $this->getDeanText($profile->college->college_name);
        $firstEducation = explode(';', $profile->education)[0] ?? 'No data';

        return compact('profile', 'deanText', 'firstEducation');
    }

    private function getDeanText($collegeName)
    {
        // Logic to get the dean text
        return "Dean of " . $collegeName; // Example logic
    }
}
