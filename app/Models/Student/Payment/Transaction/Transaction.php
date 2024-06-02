<?php

namespace App\Models\Student\Payment\Transaction;

use App\Models\Student\Payment\Refund\Refound;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function refound()
    {
        return $this->hasOne(Refound::class);
    }
}
