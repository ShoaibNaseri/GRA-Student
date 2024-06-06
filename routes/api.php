<?php

use App\Http\Controllers\student\AuthController;
use App\Http\Controllers\student\profiling\EducationController;
use App\Http\Controllers\student\profiling\PersonelInfoController;
use App\Http\Controllers\student\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/student/login', [AuthController::class, 'login']);
Route::get('/student/profile/wallet/{id}', [StudentController::class, 'getStudentProfileAndWallet']);
Route::get('/student/profiling/personel/info/{id}', [PersonelInfoController::class, 'index']);
Route::get('/student/profiling/personel/edit/{id}', [PersonelInfoController::class, 'edit']);
Route::get('/student/profiling/education/{id}', [EducationController::class, 'index']);

//School Details
Route::post('/student/profiling/education/school/store', [EducationController::class, 'storeSchool']);
Route::get('/student/profiling/education/school/edit/{id}', [EducationController::class, 'editSchool']);
Route::post('/student/profiling/education/school/update/{id}', [EducationController::class, 'updateSchool']);
Route::delete('/student/profiling/education/school/delete/{id}', [EducationController::class, 'deleteSchool']);


//Bachelor Details

Route::post('/student/profiling/education/bachelor/store', [EducationController::class, 'storeBachelor']);
Route::get('/student/profiling/education/bachelor/edit/{id}', [EducationController::class, 'editBachelor']);
Route::post('/student/profiling/education/bachelor/update/{id}', [EducationController::class, 'updateBachelor']);
Route::delete('/student/profiling/education/bachelor/delete/{id}', [EducationController::class, 'deleteBachelor']);


//Master Degree Routes

Route::post('/student/profiling/education/master/store', [EducationController::class, 'storeMaster']);
Route::get('/student/profiling/education/master/edit/{id}', [EducationController::class, 'editMaster']);
Route::post('/student/profiling/education/master/update/{id}', [EducationController::class, 'updateMaster']);
Route::delete('/student/profiling/education/master/delete/{id}', [EducationController::class, 'deleteMaster']);
