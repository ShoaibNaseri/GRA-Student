<?php

namespace App\Models\Student\Application;

use App\Enums\application\ApplicationStatus;
use App\Models\Scholarship\Scholarship;
use App\Models\Student\Student;
use App\Models\University\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function university()
    {
        return $this->belongsTo(University::class);
    }
    //Update APplication Status
    // public function markAsProgress()
    // {
    //     $this->status = ApplicationStatus::PROG;
    //     $this->save();
    // }
    // public function markAsAccepted()
    // {
    //     $this->status = ApplicationStatus::ACCEPTED;
    //     $this->save();
    // }
    // public function markAsRejected()
    // {
    //     $this->status = ApplicationStatus::REJECTED;
    //     $this->save();
    // }
    public function applicationDetail()
    {
        return $this->hasOne(ApplicationDetail::class);
    }
}
