<?php


namespace App\Repositories\Employee;

use App\Models\Employee\Employee;

class EmployeeRepository
{
    protected $employeeM;
    public function __construct(Employee $employee)
    {
        $this->employeeM = $employee;
    }
    public function getEmployeeAll()
    {
        return $this->employeeM->all();
    }
    public function getEmployeeById($id)
    {
        return $this->employeeM->where('id', $id)->with('employeebank')->first();
    }
}
