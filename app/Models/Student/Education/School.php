<?php

namespace App\Models\Student\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'schoolName',
        'startedDate',
        'graduationDate',
        'address',
        'percentage',
        'schoolType',
    ];
}
