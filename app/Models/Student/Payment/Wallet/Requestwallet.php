<?php

namespace App\Models\Student\Payment\Wallet;

use App\Enums\wallet\RequestwalletStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestwallet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    // public function statusAccepted()
    // {
    //     $this->status = RequestwalletStatus::ACCEPT;
    //     $this->save();
    // }
    // public function statusRejected()
    // {
    //     $this->status = RequestwalletStatus::REJECT;
    //     $this->save();
    // }
    // public function markAsCancel()
    // {
    //     $this->status = RequestwalletStatus::CANCLE;
    //     $this->save();
    // }
    public function deleteById($id)
    {
        $getData = Requestwallet::find($id);
        $getData->delete();
        return true;
    }
}
