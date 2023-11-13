<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'teacher')->group(function () {

  //view all attendance list
  Route::get('attendance-list',[AttendanceController::class,'markedAttendance'])->name('attendanceList');
  

  //mark attendance
  
  Route::get('attendance', [AttendanceController::class, 'view'])->name('attendance');
  Route::post('attendance/mark', [AttendanceController::class, 'attendance'])->name('attendance.post');



  //add teacherdetails
  // Route::view('details','add_details');
  Route::get('details', [TeacherController::class, 'userdetails'])->name('view.details');
  Route::post('add/details/{id}', [TeacherController::class, 'addDetail'])->name('add.details');
});
