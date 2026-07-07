<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Http\Requests\AnswerRequest;
class AnswerController extends Controller
{
    public function storeAnswers(AnswerRequest $request,Question $question){

        $validated=$request->validated();
        $path=null;
        if ($request->hasFile('image')){
            $path=$request->file('image')->store('answerPics','public');
        }
        Answer::create([
            'answer'=>$validated['answer'],
            'user_id'=>auth()->id(),
            'question_id'=>$question->id,
            'imagePath'=>$path

        ]);
        return redirect()->route('showOneQuestion',$question)->with('success','Answer added');
        
    }
}
