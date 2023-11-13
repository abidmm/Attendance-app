<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Route;

Route::middleware('principal.register')->group(function () {


    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
});


Route::middleware('auth', 'principal')->group(function () {


    // view teacher
    Route::get('/teachers', [PrincipalController::class, 'viewTeachers'])->name('view.teachers');
    //view students in common
    Route::post('/searchteacher',[PrincipalController::class,'viewTeachers'])->name('searchteacher');
    
});
