<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthenticationController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('/question',[QuestionController::class,''])->name('questions.set');

Route::get('/login',function(){
    return view ('auth.login');
})->name('login');
Route::get('/',function(){
    return view('auth.register');
})->name('registerForm');
Route::post('/login',[AuthenticationController::class,'login'])->name('loginSubmit');
Route::post('/register',[AuthenticationController::class,'register'])->name('registerSubmit');
Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');
