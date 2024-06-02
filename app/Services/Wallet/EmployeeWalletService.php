<?php

namespace App\Services\Wallet;

use App\Models\Employee\Wallet\EmployeeWallet;

use Carbon\Carbon;

class EmployeeWalletService
{



    public function generateWalletName($id, $name)
    {
        $getNameFirstLetter = substr($name, 0, 1);
        $walletName = $getNameFirstLetter . 'EW' . $id . '-' . 'Wallet';
        return $walletName;
    }
    public function addBalanceToWallet($amount, $walletId)
    {
        $getWalletBalance = EmployeeWallet::where('id', $walletId)->first();
        $getWalletBalance->amount += $amount;
        $getWalletBalance->save();
        return true;
    }
    public function cutBalanceFromWallet($amount, $walletId)
    {
        $getWalletBalance = EmployeeWallet::where('id', $walletId)->first();
        $getWalletBalance->amount -= $amount;
        $getWalletBalance->save();
        return true;
    }
    public function generateWalletTransactionNumber($walletName)
    {
        $currentDateTime = Carbon::now();
        $currentDate = $currentDateTime->toDateString(); // Get the current date in YYYY-MM-DD format
        $currentTime = $currentDateTime->toTimeString();
        $transactionNumber = $walletName . '-' . $currentDateTime->format('Ymd') . $currentDateTime->format('Hms');
        return [
            'time' => $currentTime,
            'date' => $currentDate,
            'transactionNumber' => $transactionNumber
        ];
    }
    public function calculateEmployeeFee($amount)
    {
        $employeeFee = (10 * $amount) / 100;
        return $employeeFee;
    }
    public function chekcWalletBalanceForWithdraw($id)
    {
    }
}
