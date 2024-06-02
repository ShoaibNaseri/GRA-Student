<?php

namespace App\Models\Employee\Bank;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBank extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
