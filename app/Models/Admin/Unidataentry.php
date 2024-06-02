<?php

namespace App\Models\Admin;

use App\Enums\employee\DataentryStatus;
use App\Models\Employee\Employee;
use App\Models\Front\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidataentry extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    //Enums Use

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
