<?php

namespace App\Models\Student\Payment\Wallet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallettransaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function marksasAccepted()
    // {
    //     $this->status = WalletTransactionStatus::ACCEPT;
    //     $this->save();
    // }
    // public function marksasRejected()
    // {
    //     $this->status = WalletTransactionStatus::REJECT;
    //     $this->save();
    // }
    // public function markasWithdraw()
    // {
    //     $this->status = WalletTransactionStatus::WITHDRAW;
    //     $this->save();
    // }
    // public function markasDeposit()
    // {
    //     $this->status = WalletTransactionStatus::DEPOSIT;
    //     $this->save();
    // }
    // public function markasRefunded()
    // {
    //     $this->status = WalletTransactionStatus::REFUND;
    //     $this->type =
    //         WalletTransactionStatus::REFUND;
    //     $this->save();
    // }
    // public function markasPending()
    // {
    //     $this->status = WalletTransactionStatus::PENDING;
    //     $this->save();
    // }
    // public function markasCancel()
    // {
    //     $this->status = WalletTransactionStatus::CANCEL;
    //     $this->save();
    // }
    // public function scholarship()
    // {
    //     return $this->belongsTo(Scholarship::class, 'scholarship_id');
    // }
    public function requestwallet()
    {
        return $this->hasOne(Requestwallet::class);
    }
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
