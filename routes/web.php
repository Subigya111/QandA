<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AnswerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',function(){
    return view ('auth.login');
})->name('login');
Route::get('/',function(){
    return view('auth.register');
})->name('registerForm');
Route::post('/login',[AuthenticationController::class,'login'])->name('loginSubmit');
Route::post('/register',[AuthenticationController::class,'register'])->name('registerSubmit');
Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');
Route::post('/question',[QuestionController::class,'storeQuestions'])->name('questions.store');
Route::get('/question/form',[QuestionController::class,'showForm'])->name('showQuesForm');
Route::get('/question/all',[QuestionController::class,'showAllQues'])->name('showAllQuestion');
Route::get('/question/{question}',[QuestionController::class,'showOneQues'])->name('showOneQuestion');
Route::post('/question/{question}/answer',[AnswerController::class,'storeAnswers'])->name('answers.store');
