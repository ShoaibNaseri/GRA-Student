<?php

namespace App\Models\Student\Personel;

use App\Models\Front\Country;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personelinfo extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
