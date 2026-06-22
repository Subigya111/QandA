<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
Route::post('/question',[QuestionController::class,''])->name('questions.set');
});
