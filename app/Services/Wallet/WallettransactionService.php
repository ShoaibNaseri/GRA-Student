<?php

namespace App\Services\Wallet;

use Carbon\Carbon;

class WallettransactionService
{

    public static function generateWalletName($walletName)
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
    public static function countWalletTransaction($walletId)
    {
    }
}
