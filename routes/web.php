<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Attendance;
use App\Models\TeacherDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//for teacher and principal only
Route::middleware('auth', 'common')->group(function () {
    //user register
    Route::view('/user-register', 'principal.users_register')->name('user.register');
    Route::post('/user-register', [RegisteredUserController::class, 'store'])->name('user.register.post');

     //view students 
    Route::get('/students', [PrincipalController::class, 'viewStudents'])->name('view.students');
    //search student
    Route::post('student/search',[PrincipalController::class,'viewStudents'])->name('searchstudent');
});
    
Route::middleware('auth')->group(function () {
    //home
    Route::view('/home', 'home')->name('home');

    //add student details
    Route::get('studentdetails', [StudentController::class, 'viewstudentdetails'])->name('view.student.details');
    Route::post('add/student/details/{id}', [StudentController::class, 'addStudentDetail'])->name('add.studentDetails');
});


require __DIR__ . '/auth.php';

//principle middleware
require __DIR__ . '/custom/principal.php';
//teacher middleware
require __DIR__ . '/custom/teacher.php';
//student middleware
require __Dir__ . '/custom/student.php';
