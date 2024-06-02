<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Student\Student;
use App\Models\Student\Studentstatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $student = Student::where('email', $credentials['email'])->first();
        if ($student) {
            if ($student->status === 'Verified') {
                if (Hash::check($credentials['password'], $student->password)) {
                    $date = Carbon::now();
                    $checkStatus = Studentstatus::where('student_id', $student->id)->first();
                    if ($checkStatus == null) {
                        $create = Studentstatus::create([
                            'student_id' => $student->id,
                            'date' => $date,
                        ]);
                    } else {
                        $getStatus = Studentstatus::where('student_id', $student->id)->update([
                            'date' => $date,
                        ]);
                    }
                    $changeStatus =  Studentstatus::where('student_id', $student->id)->first();
                    $changeStatus->markOnline();
                    $token = $student->createToken('StudentApp')->accessToken;
                    return response()->json(['token' => $token, 'Sid' => $student->id]);
                } else {
                    return response()->json(['error' => 'Password Incorrect'], 401);
                }
            } else {
                return response()->json(['error' => 'Your Account Hsnt Been Verified', 401]);
            }
        } else {
            $error = 'Email is incorrect';
            return response()->json(['error' => $error], 401);
        }
    }
}
