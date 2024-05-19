<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';
    protected $primaryKey = 'facultyid';
    public $timestamps = false;
    protected $fillable = [
        'facultyid', 'name', 'collegeid', 'dean', 'departmentid', 'status', 'rank', 'email',
        'google_scholar_link', 'specialization', 'research', 'photo', 'education',
        'first_name', 'middle_name', 'last_name', 'suffix',
    ];

    // college faculty relationship
    public function college()
    {
        return $this->belongsTo(College::class, 'collegeid', 'collegeid');
    }
    //department faculty relationship
    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentid', 'departmentid'); 
    }

    //count how many deans
    public static function countDeans()
    {
        return self::where('dean', true)->count();
    }


    // important note! data dapat same sa database example 'permanent'
    //data not found! if lahi

    //count how many faculty is permanent
    public static function countPermanentfaculty()
    {
        return self::where('status', 'permanent') ->count();
    }

    //count how many faculty is casual
    public static function countCasualfaculty()
    {
        return self::where('status', 'casual') ->count();
    }

    //count how many faculty is joborder
    public static function countJoborderfaculty()
    {
        return self::where('status', 'joborder') ->count();
    }

    //count faculty rank
    public static function countRank()
    {
        $profRanks = $astproRanks = $asoproRanks = $instRanks = $lectRanks = 0;

        $faculties = self::all();

        foreach ($faculties as $faculty) {
            if (strpos($faculty->rank, 'PROF') === 0) {
                $profRanks++;
            }
            if (strpos($faculty->rank, 'ASTPRO') === 0) {
                $astproRanks++;
            }
            if (strpos($faculty->rank, 'ASOPRO') === 0) {
                $asoproRanks++;
            }
            if (strpos($faculty->rank, 'INST') === 0) {
                $instRanks++;
            }
            if (strpos($faculty->rank, 'LECT') === 0) {
                $lectRanks++;
            }
        }

        return compact('profRanks', 'astproRanks', 'asoproRanks', 'instRanks', 'lectRanks');
    }


    //find data base on [email]
    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public function getDeanTextAttribute()
    {
        $mapping = [
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

        return $mapping[$this->college->college_name] ?? 'Ba&A';
    }
}
