<?php

namespace App\Models\Student\Todo;

use App\Enums\student\ActionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentaction extends Model
{
    use HasFactory;
    protected $guarded = [];


    // public function markAsCompleted()
    // {
    //     $this->status = ActionStatus::COMPLETED;
    //     $this->save();
    // }
    // public function markAsPending()
    // {
    //     $this->status = ActionStatus::PENDING;
    //     $this->save();
    // }
}
