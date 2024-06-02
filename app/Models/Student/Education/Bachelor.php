<?php

namespace App\Models\Student\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bachelor extends Model
{

    use HasFactory;
    protected $fillable = [
        'student_id',
        'universityName',
        'startedDate',
        'graduationDate',
        'address',
        'gpa',
        'degreeType',
        'feild'
    ];
}
