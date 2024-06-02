<?php


namespace App\Repositories\Student\Wallet;

use App\Models\Student\Payment\Wallet\Requestwallet;
use App\Models\Student\Payment\Wallet\Wallet;
use App\Models\Student\Payment\Wallet\Wallettransaction;
use App\Models\Student\Payment\Wallet\Walletwisepay;

class WalletRepository
{
    protected $wallet;
    protected $walletReqs;
    protected $walletTransaction;
    protected $walletWisePay;
    public function __construct(
        Wallet $wallet,
        Requestwallet $requestwallet,
        Wallettransaction $wallettransaction,
        Walletwisepay $walletwisepay
    ) {
        $this->wallet = $wallet;
        $this->walletReqs = $requestwallet;
        $this->walletTransaction = $wallettransaction;
        $this->walletWisePay = $walletwisepay;
    }

    public function getWalletById($id)
    {
        return $this->wallet->where('id', $id)->first();
    }
    public function getWalletByStudentId($id)
    {
        return $this->wallet->where('student_id', $id)->value('id');
    }
    public function getWalletDetailByStudentId($id)
    {
        return $this->wallet->where('student_id', $id)->first();
    }
    public function getUserIdByWalletId($walletId)
    {
        $getUserId = $this->wallet->where('id', $walletId)->value('student_id');
        return $getUserId;
    }
    public function getAllActiveWallets()
    {
        return $this->wallet->where('status', 'Active')->with('student')->get();
    }
    public function getAllInActiveWallets()
    {
        return $this->wallet->where('status', 'InActive')->get();
    }
    public function activateWallet($walletId)
    {
        $getWallet = $this->wallet->where('id', $walletId)->first();
        $getWallet->activateWallets();
        return $getWallet;
    }
    public function getWalletBalanceById($studentId)
    {
        $getBalance =
            $this->wallet->where('student_id', $studentId)->value('amount');
        return $getBalance;
    }
    public function getWalletDataById($walletId)
    {
        $wallet = $this->wallet->where('id', $walletId)->with('student', 'wallettransactions')->first();
        $requests = $this->walletReqs->where('wallet_id', $walletId)->where('status', 'Pending')->get();
        $transactions = $this->walletTransaction->where('wallet_id', $walletId)->with('wallet')->get();
        $totalDeposit = $transactions->where('type', 'Deposit')->sum('amount');
        $totalWithdraw = $transactions->where('type', 'Withdraw')->sum('amount');
        $refundRequests = $this->wallet->getWalletRefund($walletId);
        $countTransaction = $transactions->count();
        return [
            'wallet' => $wallet,
            'requests' => $requests,
            'transactions' => $transactions,
            'totalDeposit' => $totalDeposit,
            'totalWithdraw' => $totalWithdraw,
            'countTransaction' => $countTransaction,
            'refundRequests' => $refundRequests
        ];
    }
    public function getWalletData($studentId)
    {
        $checkIfWalletExist = $this->wallet->where('student_id', $studentId)->first();
        if ($checkIfWalletExist) {
            $walletRequests = $this->wallet->getWalletRequests($checkIfWalletExist->id);
            $transactions = $this->wallet->getWalletTransactions($checkIfWalletExist->id);
            $totalDeposit = $transactions->where('type', 'Deposit')->sum('amount');
            $totalWithdraw = $transactions->where('type', 'Withdraw')->sum('amount');
            $refundables = $transactions->where('type', 'Payment')->all();
            $countTransaction = $transactions->count();
            $countRequest = $walletRequests->count();
            $refundRequests = $this->wallet->getWalletRefund($checkIfWalletExist->id);
            return [
                'wallet' => $checkIfWalletExist,
                'walletRequests' => $walletRequests,
                'transactions' => $transactions,
                'totalDeposit' => $totalDeposit,
                'totalWithdraw' => $totalWithdraw,
                'countTransaction' => $countTransaction,
                'countRequest' => $countRequest,
                'refundables' => $refundables,
                'refundRequests' => $refundRequests
            ];
        } else {
            return [
                'wallet' => $checkIfWalletExist
            ];
        }
    }
    public function createWallet($studentId, $studentName)
    {
        //generate wallet name usign wallte service
        // $getWalletName = WalletService::generateWalletName($studentId, $studentName);
        // $success = $this->wallet->create([
        //     'student_id' => $studentId,
        //     'name' => $getWalletName,
        //     'amount' => 0,
        // ]);
        // if ($success) {
        //     return ['success' => true, 'message' => 'Wallet Created Successfully'];
        // } else {
        //     return ['success' => false, 'message' => 'Wallet Creattiion Faild'];
        // }
    }
    public function deleteWallet($id)
    {
    }
    public function sendDepositRequest(array $data)
    {
        $success = $this->walletReqs->create([
            'wallet_id' => $data['wallet_id'],
            'amount' => $data['amount'],
            'request_type' => $data['request_type'],
        ]);
        if ($success) {
            return ['success' => true, 'message' => 'Depoit Reqeust Sent Successfully'];
        } else {
            return ['success' => false, 'message' => 'Deposit Reqeust Sent Faild'];
        }
    }
    public function findIfTransactionIsRefundable(
        $transactionId,
        $studentId
    ) {
        //     $getTransaction = $this->wallet->getWalletTransactionById($transactionId);
        //     $checkIfApplicationIsRejected = Application::where('student_id', $studentId)->where('scholarship_id', $getTransaction->scholarship_id)->value('status');
        //     if ($checkIfApplicationIsRejected == 'Rejected') {
        //         return true;
        //     } else {
        //         return false;
        //     }
    }
    public function createRefundRequest(array $data)
    {
        // $success = Walletrefund::create($data);
        // if ($success) {
        //     return ['success' => true, 'message' => 'Refund Reqeust Sent Successfully'];
        // } else {
        //     return ['success' => false, 'message' => 'Refund Reqeust Send Faild'];
        // }
    }
    public function getWalletRequestById($reqId)
    {
        return $this->walletReqs->where('id', $reqId)->first();
    }
    public function deleteDepositRequest($id)
    {
        $success = $this->walletReqs->deleteById($id);
        if ($success) {
            return true;
        } else {
            return false;
        }
    }
    public function cancelDepositReqeust($id)
    {
        $findReq = $this->walletReqs->where('id', $id)->first();
        $findReq->markAsCancel();
        return true;
    }

    public function createDepositTransaction(array $data)
    {
        $success = Wallettransaction::create($data);
        if ($success) {
            return true;
        } else {
            return false;
        }
    }
    public function getWalletTransaction($walletId)
    {
        return $this->walletTransaction->where('wallet_id', $walletId)->get();
    }
    public function createWiseDepositRequest(array $data)
    {
        $success = $this->walletWisePay->create([
            'wallet_id' => $data['wallet_id'],
            'student_id' => $data['student_id'],
            'amount' => $data['amount'],
        ]);
        return true;
    }
    public function getWalletWisePayRequestsByStudentId($id)
    {
        return $this->walletWisePay->where('student_id', $id)->get();
    }
    public function getWiseById($id)
    {
        return $this->walletWisePay->where('id', $id)->first();
    }
    public function getAllWisePayRequest()
    {
        return $this->walletWisePay->where('status', 'Pending')->with('student', 'wallet')->get();
    }
    public function updateWisePayRequestLinkAndFile(array $data, $id)
    {
        $findWisePayReq = $this->walletWisePay->where('id', $id)->update($data);
        if ($findWisePayReq) {
            return true;
        }
    }
    public function MarkAsPaid($id)
    {
        $findAndUpdate = $this->walletWisePay->where('id', $id)->update([
            'payment_status' => 'Paid'
        ]);
        if ($findAndUpdate) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllWalletTransactions()
    {
        return $this->walletTransaction->with('wallet')->get();
    }
}
