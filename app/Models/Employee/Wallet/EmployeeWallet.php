<?php

namespace App\Models\Employee\Wallet;

use App\Enums\wallet\EmployeeWalletStatus;
use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWallet extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function markAsActive()
    // {
    //     $this->status = EmployeeWalletStatus::ACTIVE;
    //     $this->save();
    // }
    // public function markAsInactive()
    // {
    //     $this->status = EmployeeWalletStatus::INACTIVE;
    //     $this->save();
    // }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function employeeTransactions()
    {
        return $this->hasMany(EmployeeWalletTransaction::class);
    }
    public function employeeWidthraw()
    {
        return $this->hasMany(EmployeeWidthrawTransaction::class);
    }
}
