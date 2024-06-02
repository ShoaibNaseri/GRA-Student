<?php


namespace App\Repositories\Student;

use App\Models\Student\Student;

class StudentRepository
{

    protected $studentM;

    public function __construct(Student $student)
    {
        $this->studentM = $student;
    }
    public function getAllStudent()
    {
        return $this->studentM->with('country')->get();
    }
    public function getStudentById($studentId)
    {
        return $this->studentM->where('id', $studentId)->with('country', 'creden', 'personal', 'bank', 'school', 'bachelor', 'master', 'experiences', 'lcts', 'nationalid', 'passport', 'applications')->first();
    }
    public function getStudentWithWallet($studentId)
    {
        return $this->studentM->where('id', $studentId)->with('country', 'wallet')->first();
    }
}
