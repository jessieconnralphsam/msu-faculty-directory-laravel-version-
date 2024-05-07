<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $table = 'college';

    protected $fillable = [
        'college_name',
    ];

    public function faculty()
    {
        return $this->hasMany(Faculty::class, 'collegeid', 'collegeid');
    }
}
