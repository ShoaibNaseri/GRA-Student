<?php

namespace App\Models\Scholarship;

use App\Models\AppliedProgs\Appliedprogram;
use App\Models\Student\Application\Application;
use App\Models\Student\Payment\Transaction\Wisetransaction;
use App\Models\Student\Wallet\Wallettransaction;
use App\Models\University\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function scholarshipFee()
    {
        return $this->hasOne(ScholarshipFee::class);
    }
    public function scholarshipIntake()
    {
        return $this->hasOne(ScholarshipIntake::class);
    }
    public function scholarshipCategory()
    {
        return $this->belongsTo(ScholarshipCategory::class);
    }
    public function appliedprograms()
    {
        return $this->hasMany(Appliedprogram::class);
    }
    // public function eligibalprograms()
    // {
    //     return $this->hasMany(E::class);
    // }
    public function wisetransactions()
    {
        return $this->hasMany(Wisetransaction::class);
    }
    // public function wallettransactions()
    // {
    //     return $this->hasMany(Wallettransaction::class);
    // }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
