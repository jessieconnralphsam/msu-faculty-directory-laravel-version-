<?php

namespace App\Services;

class CollegeService
{
    /**
     * Get and process the faculty members of a given college.
     *
     * @param \App\Models\College $college
     * @return \Illuminate\Support\Collection
     */

    public function getFacultyMembers($college)
    {
        // Sort the faculty members by their department name and map the data with the helper autoload
        return $college->faculty->sortBy('department.department_name')->map(function ($faculty) {

            // Return the formatted faculty member data
            return [

                'id' => $faculty->facultyid, 
                'name' => $faculty->name, 
                'department' => $faculty->department->department_name, 
                'college' => $faculty->college->college_name, 
                'specialization' => $faculty->specialization, 
                'photo' => $faculty->photo ? asset(str_replace('\\', '/', $faculty->photo)) : asset('img/660f6e5997de4_def.jpg'), // Faculty photo or default photo
                'rank' => getRankTitle($faculty->rank), // Faculty rank title function from helper

            ];
        });
    }
}
