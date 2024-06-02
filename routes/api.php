<?php

use App\Http\Controllers\student\AuthController;
use App\Http\Controllers\student\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/student/login', [AuthController::class, 'login']);
Route::get('/student/profile/wallet/{id}', [StudentController::class, 'getStudentProfileAndWallet']);
