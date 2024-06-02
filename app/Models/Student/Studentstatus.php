<?php

namespace App\Models\Student;

use App\Enums\student\StudentActiveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentstatus extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function markOnline()
    {
        $this->status = StudentActiveStatus::ONLINE;
        $this->save();
    }
    public function markOffline()
    {
        $this->status = StudentActiveStatus::OFFLINE;
        $this->save();
    }
}
