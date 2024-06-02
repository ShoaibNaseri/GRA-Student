<?php

namespace App\Models\Student\Payment\Refund;

use App\Models\Scholarship\Scholarship;
use App\Models\Student\Payment\Transaction\Transaction;
use App\Models\Student\Payment\Transaction\Wisetransaction;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refound extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function wiseTransaction()
    {
        return $this->belongsTo(Wisetransaction::class, 'wisetransaction_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }
}
