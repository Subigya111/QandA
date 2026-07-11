<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AnswerController;

Route::middleware('guest')->group(function(){
    Route::get('/',[QuestionController::class,'showAllQues'])->name('home');

    Route::get('/login',function(){
        return view ('auth.login');
    })->name('login');

    Route::get('/register',function(){
        return view('auth.register');
    })->name('registerForm');

    Route::post('/login',[AuthenticationController::class,'login'])->name('loginSubmit');

    Route::post('/register',[AuthenticationController::class,'register'])->name('registerSubmit');

});

Route::middleware('auth')->group(function(){
    Route::get('/question/all',[QuestionController::class,'showAllQues'])->name('showAllQuestion');
    Route::post('/question/form',[QuestionController::class,'showForm'])->name('showQuesForm');
    Route::post('/question',[QuestionController::class,'storeQuestions'])->name('questions.store');
    Route::get('/question/{question}',[QuestionController::class,'showOneQues'])->name('showOneQuestion');
    Route::get('/edit/question/{question}',[QuestionController::class,'editOneQues'])->name('editQuestion');
    Route::put('/update/question/{question}',[QuestionController::class,'updateOneQues'])->name('updateQuestion');
    Route::delete('/delete/question/{question}',[QuestionController::class,'deleteOneQues'])->name('deleteQuestion');
    Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');
    Route::post('/question/{question}/answer',[AnswerController::class,'storeAnswers'])->name('answers.store');
    Route::get('/edit/answer/{answer}',[AnswerController::class,'editAnswer'])->name('editAnswer');
    Route::put('/update/answer/{answer}',[AnswerController::class,'updateAnswer'])->name('updateAnswer');
    Route::delete('/delete/answer/{answer}',[AnswerController::class,'deleteAnswer'])->name('deleteAnswer');
});


