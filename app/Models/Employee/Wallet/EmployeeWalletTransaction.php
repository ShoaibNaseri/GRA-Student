<?php

namespace App\Models\Employee\Wallet;

use App\Enums\wallet\EmployeeWalletStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWalletTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employeeWallet()
    {
        return $this->belongsTo(EmployeeWallet::class);
    }
    public function markAsCompleted()
    {
        $this->status = EmployeeWalletStatus::COMPLETE;
        $this->save();
    }
}
