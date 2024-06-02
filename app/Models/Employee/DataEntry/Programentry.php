<?php

namespace App\Models\Employee\DataEntry;

use App\Enums\employee\DataentryStatus;
use App\Models\Employee\Employee;
use App\Models\Front\Country;
use App\Models\University\University;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programentry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    // public function markAsPending()
    // {
    //     $this->status = DataentryStatus::PENDING;
    //     $this->save();
    // }
    // public function markAsApproved()
    // {
    //     $this->status = DataentryStatus::APPROVED;
    //     $this->save();
    // }
    // public function markAsRejected()
    // {
    //     $this->status = DataentryStatus::REJECTED;
    //     $this->save();
    // }
}
