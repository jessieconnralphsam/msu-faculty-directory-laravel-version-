<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';

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

}
