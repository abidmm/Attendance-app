<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth','student')->prefix('/student')->group(function (){

     //view student attendance for each student
     Route::get('myattendance',[StudentController::class,'attendancestatus'])->name('myAttendance');
     


});