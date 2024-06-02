<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    protected $studentRepo;
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepo = $studentRepository;
    }
    public function getStudentProfileAndWallet($id)
    {
        $data = $this->studentRepo->getStudentWithWallet($id);
        return response()->json($data);
    }
}
