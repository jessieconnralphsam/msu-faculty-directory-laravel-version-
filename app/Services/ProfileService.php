<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    /**
     * Get profile data based on profile ID.
     *
     * @param int $profileId The ID of the profile to fetch data for.
     * @return array The profile data including profile information, dean text, and first education.
     */
    public function getProfileData($profileId)
    {
        $profile = Profile::findOrFail($profileId);

        $deanText = $this->getDeanText($profile->college->college_name);

        $firstEducation = explode(';', $profile->education)[0] ?? 'No data';

        return compact('profile', 'deanText', 'firstEducation');
    }

    /**
     * Generate dean text based on college name.
     *
     * @param string $collegeName The name of the college.
     * @return string The dean text for the college.
     */

     private function getDeanText($collegeName)
     {
         $deanTextMap = [
             'College of Agriculture' => 'COA',
             'College of Engineering' => 'COE',
             'College of Social Sciences and Humanities' => 'CSSH',
             'College of Medicine' => 'COM',
             'College of Business Administration and Accountacy' => 'Ba&A',
             'College of Fisheries' => 'COF',
             'College of Natural Science and Mathematics' => 'CNSM',
             'School of Graduate Studies' => 'SGS',
             'College of Education' => 'CoEd',
         ];
     
         return $deanTextMap[$collegeName] ?? 'Ba&A';
     }
}
