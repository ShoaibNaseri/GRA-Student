<?php

namespace App\Enums\wallet;

class WalletTransactionStatus
{
    const REJECT = "Rejected";
    const ACCEPT = "Accepted";
    const PENDING = "Pending";
    const CANCEL = "Canceled";
    const REFUND = "Refunded";
    const WITHDRAW = "Widthraw";
    const DEPOSIT = "Deposit";
}
