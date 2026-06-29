<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    protected $fillable=['question','user_id'];
    public function storeQuestions(QuestionRequest $request){
        $validated=$request->validated(); 
        Question::create([
            'question'=>$validated['question']
        ]);
    }
}
