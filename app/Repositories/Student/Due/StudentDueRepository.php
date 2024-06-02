<?php


namespace App\Repositories\Student\Due;

use App\Models\Student\Payment\Dueamount;

class StudentDueRepository
{
    protected $due;
    public function __construct(Dueamount $dueamount)
    {
        $this->due = $dueamount;
    }
    //Get All DUe
    public function getAllDues()
    {
        return $this->due->with('student')->get();
    }
    //Blank Due
    public function blankDue()
    {
        return new $this->due;
    }
    //Save Due AMount By Admin
    public function saveDue(array $data)
    {
        $save = $this->due->create($data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }

    public function getDueById($id)
    {
        return $this->due->where('id', $id)->first();
    }
    public function getDueByStudentId($studentId)
    {
        return $this->due->where('student_id', $studentId)->get();
    }
    public function updateDueDetailsAfterPayment($dueId, $transactionID, $type)
    {
        $update = $this->due->where('id', $dueId)->first();
        $success = $update->update([
            'transactionID' => $transactionID,
            'paidVia' => $type,
            'status' => 'Paid'
        ]);
        if ($success) {
            return true;
        } else {
            return false;
        };
    }
    public function deleteDue($id)
    {
        $getDue = $this->due->where('id', $id)->delete();
        return $getDue;
    }
}
