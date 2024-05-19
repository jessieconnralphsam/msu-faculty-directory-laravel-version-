<?php
/**
* Helper Autoload 
*
*/


//map Rank Title
if (!function_exists('getRankTitle')) {
    function getRankTitle($rank) {
        $rankMap = [
            "LECT   " => "Lecturer",
            "PROF1  " => "Professor",
            "PROF2  " => "Professor",
            "PROF3  " => "Professor",
            "PROF4  " => "Professor",
            "PROF5  " => "Professor",
            "PROF6  " => "Professor",
            "MTEACH2" => "Master Teacher",
            "TEACH1 " => "Teacher",
            "TEACH2 " => "Teacher",
            "TEACH3 " => "Teacher",
            "ASTPRO1" => "Assistant Professor",
            "ASTPRO3" => "Assistant Professor",
            "ASTPRO4" => "Assistant Professor",
            "ASOPRO1" => "Associate Professor",
            "ASOPRO2" => "Associate Professor",
            "ASOPRO3" => "Associate Professor",
            "ASOPRO4" => "Associate Professor",
            "ASOPRO5" => "Associate Professor",
            "INST1  " => "Instructor",
            "INST2  " => "Instructor",
            "INST3  " => "Instructor"
        ];

        return $rankMap[$rank] ?? 'Unknown Rank';
    }
}

//map Dean Text
if (!function_exists('getDeanText')) {
    function getDeanText($collegeName) {
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