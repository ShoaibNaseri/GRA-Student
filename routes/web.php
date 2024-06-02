<?php

use Illuminate\Support\Facades\Route;

Route::get('{any}', function () {
    return view('student.index');
})->where('any', '.*');
