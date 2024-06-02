<?php

namespace App\Models\Student\Payment\Wallet;

use App\Enums\wallet\RefundREquestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walletrefund extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function markasAccepted()
    // {
    //     $this->status = RefundREquestStatus::ACCEPT;
    //     $this->save();
    // }
    // public function markasRejected()
    // {
    //     $this->status = RefundREquestStatus::REJECT;
    //     $this->save();
    // }

    public function wallettransaction()
    {
        return $this->belongsTo(Wallettransaction::class);
    }
}
