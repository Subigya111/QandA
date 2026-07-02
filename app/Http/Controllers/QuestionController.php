<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    protected $fillable=['question','user_id','category'];
    public function showForm(){
        return view('main.QA');
    }
    public function storeQuestions(QuestionRequest $request){
        $validated=$request->validated(); 
        Question::create([
            'question'=>$validated['question'],
            'category'=>$validated['category'],
            'user_id'=>auth()->id()
        ]);
    }
}
