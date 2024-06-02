<?php

namespace App\Models\Employee\Wallet;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWidthrawTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function EmployeeWallet()
    {
        return $this->belongsTo(EmployeeWallet::class);
    }
}
