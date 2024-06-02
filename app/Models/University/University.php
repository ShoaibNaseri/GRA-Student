<?php

namespace App\Models\University;

use App\Models\Employee\DataEntry\Programentry;
use App\Models\Front\Country;
use App\Models\Scholarship\Scholarship;
use App\Models\Student\Application\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function universityDetails()
    {
        return $this->hasMany(UniversityDetail::class);
    }
    public function universityGallery()
    {
        return $this->hasMany(UniversityGallery::class);
    }
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }
    public function programentries()
    {
        return $this->hasMany(Programentry::class);
    }
    public function universityInake()
    {
        return $this->hasOne(UniversityIntake::class);
    }
    public function universityFee()
    {
        return $this->hasOne(UniversityFee::class);
    }
    // public function Applieduni()
    // {
    //     return $this->belongsTo(Applie::class);
    // }
    // public function Eligibalprogram()
    // {
    //     return $this->belongsTo(Eligibalprogram::class);
    // }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
