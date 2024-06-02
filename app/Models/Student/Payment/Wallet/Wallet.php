<?php

namespace App\Models\Student\Payment\Wallet;

use App\Enums\WalletStatus;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function requestwallets()
    {
        return $this->hasMany(Requestwallet::class);
    }
    // public function activateWallets()
    // {
    //     $this->status = WalletStatus::ACTIVE;
    //     $this->save();
    // }
    public function wallettransactions()
    {
        return $this->hasMany(Wallettransaction::class);
    }
    public function getWalletTransactions($id)
    {
        return
            Wallettransaction::where('wallet_id', $id)->get();
    }
    public function getWalletTransactionType($id, $type)
    {
        return Wallettransaction::where('wallet_id', $id)->where('type', $type)->get();
    }
    public function getWalletRequests($id)
    {
        return Requestwallet::where('wallet_id', $id)->get();
    }
    public function getWalletRefund($id)
    {
        return Walletrefund::where('wallet_id', $id)->get();
    }
    public function getWalletTransactionById($id)
    {
        return Wallettransaction::where('id', $id)->first();
    }
}
