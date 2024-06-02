<?php

namespace App\Models\Student\Credential;

use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
