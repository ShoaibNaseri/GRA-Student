<?php

namespace App\Models\AppliedProgs;

use App\Enums\employee\StudentAppliedProgramStatus;
use App\Models\Scholarship\Scholarship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appliedprogram extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
    // public function markAsInprogress()
    // {
    //     $this->applicationStatus = StudentAppliedProgramStatus::INPROGRESS;
    //     $this->save();
    // }
    // public function markAsCompleted()
    // {
    //     $this->applicationStatus = StudentAppliedProgramStatus::COMPLETED;
    //     $this->save();
    // }
    // public function markAsRejected()
    // {
    //     $this->applicationStatus = StudentAppliedProgramStatus::REJECTED;
    //     $this->save();
    // }
}
