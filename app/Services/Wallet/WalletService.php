<?php

namespace App\Services\Wallet;

use App\Models\Student\Payment\Wallet\Wallet;

class WalletService
{
    public static function generateWalletName($id, $name)
    {
        $getNameFirstLetter = substr($name, 0, 1);
        $walletName = $getNameFirstLetter . 'W' . $id . '-' . 'Wallet';
        return $walletName;
    }
    public static function updateWalletBalance($walletId, $ammount)
    {
        $getWalletBalance = Wallet::where('id', $walletId)->first();
        $getWalletBalance->amount += $ammount;
        $getWalletBalance->save();
        return true;
    }
    public static function cutWalletBalance($walletId, $amount)
    {
        $getWalletBalance = Wallet::where('id', $walletId)->first();
        $getWalletBalance->amount -= $amount;
        $getWalletBalance->save();
        return true;
    }
}
