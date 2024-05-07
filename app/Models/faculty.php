<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';

    protected $fillable = [
        'name', 'collegeid', 'dean', 'departmentid', 'status', 'rank', 'email',
        'google_scholar_link', 'specialization', 'research', 'photo', 'education',
        'first_name', 'middle_name', 'last_name', 'suffix',
    ];

    public function college()
    {
        return $this->belongsTo(College::class, 'collegeid', 'collegeid');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentid', 'departmentid'); 
    }

    public static function countDeans()
    {
        return self::where('dean', true)->count();
    }
}
