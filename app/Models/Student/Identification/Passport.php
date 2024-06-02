<?php

namespace App\Models\Student\Identification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'fullName',
        'gender',
        'passportNumber',
        'nationality',
        'passportType',
        'issueDate',
        'expiryDate',
        'dob',
        'pob'
    ];
}
