<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
class AnswerController extends Controller
{
    protected $fillable=['answer','question_id','user_id'];
    public function storeAnswers(Request $request,Question $question){
        $validate=$request->validate([
            'answer'=>'required|string|max:255',        
        ]);
        $validate['question_id']=$question->id;
        $validate['user_id']=auth()->id();
        Answer::create($validate);
    }
}
