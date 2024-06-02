<?php

namespace App\Models\Student\Payment\Wallet;

use App\Enums\wallet\WalletWisePayStatus;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walletwisepay extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    // public function markAsInprogress()
    // {
    //     $this->status = WalletWisePayStatus::IN_PROGRESS;
    //     $this->save();
    // }
    // public function markAsAccepted()
    // {
    //     $this->status = WalletWisePayStatus::ACCEPTED;
    //     $this->save();
    // }
}
