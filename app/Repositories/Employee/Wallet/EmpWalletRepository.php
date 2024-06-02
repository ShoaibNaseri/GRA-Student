<?php


namespace App\Repositories\Employee\Wallet;

use App\Models\Employee\Bank\EmployeeBank;
use App\Models\Employee\Wallet\EmployeeWallet;
use App\Models\Employee\Wallet\EmployeeWalletTransaction;
use App\Models\Employee\Wallet\EmployeeWidthrawTransaction;
use App\Services\Wallet\EmployeeWalletService;

class EmpWalletRepository
{

    protected $EmpWallet;
    protected $empWalletService;
    protected $empWalletTransaction;
    protected $empWidthraw;
    protected $empBank;
    public function __construct(
        EmployeeWallet $employeeWallet,
        EmployeeWalletService $employeeWalletService,
        EmployeeWalletTransaction $employeeWalletTransaction,
        EmployeeWidthrawTransaction $employeeWidthrawTransaction,
        EmployeeBank $employeeBank,
    ) {
        $this->EmpWallet = $employeeWallet;
        $this->empWalletService = $employeeWalletService;
        $this->empWalletTransaction = $employeeWalletTransaction;
        $this->empWidthraw = $employeeWidthrawTransaction;
        $this->empBank = $employeeBank;
    }
    public function getAllTransactionByWalletId($walletId)
    {
        return $this->empWalletTransaction->where('employee_wallet_id', $walletId)->with('employeeWallet')->get();
    }
    public function getAllActiveWallets()
    {
        return $this->EmpWallet->where('status', 'Active')->with('employee')->get();
    }
    public function getEmployeeIdByWalletId($walletId)
    {
        $getId = $this->EmpWallet->where('id', $walletId)->value('employee_id');
        return $getId;
    }
    public function getEmployeeWalletAllData($id)
    {
        $wallet = $this->EmpWallet->where('id', $id)->with('employee')->first();
        if ($wallet == null) {
            return [
                'wallet' => $wallet
            ];
        } else {
            $getTransactions = $this->getAllTransactionByWalletId($wallet->id);
            $getWidraws = $this->getAllWidthrawTransactionsByWalletId($wallet->id);
            $countTransactionCompleted = $getTransactions->where('status', 'Completed')->count();
            $countTransactionPending = $getTransactions->where('status', 'Pending')->count();
            $sumOfCompleteds = $getTransactions->where('status', 'Completed')->sum('employeeFee');
            $sumOfPendings = $getTransactions->where('status', 'Pending')->sum('employeeFee');
            return [
                'wallet' => $wallet,
                'transactions' => $getTransactions,
                'countTransaction' => $countTransactionCompleted,
                'countPendings' => $countTransactionPending,
                'sumPendings' => $sumOfPendings,
                'totalDeposit' => $sumOfCompleteds,
                'totalWithdraw' => 0,
                'getWidthraws' => $getWidraws,
            ];
        }
    }
    public function getWalletById($id)
    {
        return $this->EmpWallet->where('id', $id)->first();
    }
    public function getAllEmployeeWallets()
    {
        return $this->EmpWallet->all();
    }
    public function getWalletByEmployeeId($employeeId)
    {
        return $this->EmpWallet->where('employee_id', $employeeId)->first();
    }
    public function getWalletBalanceByEmployeeId($employeeId)
    {
        $getBalance = $this->EmpWallet->where('employee_id', $employeeId)->value('balance');
        return $getBalance;
    }
    public function checkBalanceForWid($balance, $id)
    {

        $getBalance = $this->getWalletBalanceByEmployeeId($id);
        $total = $getBalance - $balance;
        if ($total < 100) {
            return false;
        } else {
            return true;
        }
    }
    public function getWalletNameByEmployeeId($employeeId)
    {
        return $this->EmpWallet->where('employee_id', $employeeId)->get(['walletNumber', 'id']);
    }
    public function createWallet($employeeId, $employeeName)
    {
        $generateWalletNumber = $this->empWalletService->generateWalletName($employeeId, $employeeName);
        $createWallet = $this->EmpWallet->create([
            'employee_id' => $employeeId,
            'walletNumber' => $generateWalletNumber,
            'balance' => 0,
        ]);
        if ($createWallet) {
            return true;
        }
    }
    public function activateWallet($id)
    {
        $getWallet = $this->EmpWallet->find($id);
        $getWallet->markAsActive();
        return true;
    }
    public function createTransactoin($employeeId, $applicationFee, $applicationNumber)
    {
        $getWallet = $this->getWalletByEmployeeId($employeeId);
        $getTransactionDetails = $this->empWalletService->generateWalletTransactionNumber($getWallet->walletNumber);
        $calculateEmployeeFee = $this->empWalletService->calculateEmployeeFee($applicationFee);
        $createTransaction  = $this->empWalletTransaction->create([
            'employee_wallet_id' => $getWallet->id,
            'applicationNumber' => $applicationNumber,
            'employeeFee' => $calculateEmployeeFee,
            'applicationFee' => $applicationFee,
            'transactionNumber' => $getTransactionDetails['transactionNumber'],
            'date' => $getTransactionDetails['date'],
            'time' => $getTransactionDetails['time'],

        ]);
        return true;
    }
    public function getAllTransactions()
    {
        return $this->empWalletTransaction->with('employeeWallet')->get();
    }

    //get Bank Details

    public function getEmployeeBankByEmployeeId($id)
    {
        return $this->empBank->where('employee_id', $id)->first();
    }
    public function saveWidthrawReqeust(array $data)
    {
        $save = $this->empWidthraw->create($data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllWidthrawTransactionsByWalletId($id)
    {
        return $this->empWidthraw->where('employee_wallet_id', $id)->get();
    }
    public function getAllWidthrawRequests()
    {
        return $this->empWidthraw->with('employeeWallet')->get();
    }
    public function getWidthrawDetailsById($id)
    {
        return $this->empWidthraw->where('id', $id)->first();
    }
}
