<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Http\Requests\UpdateAnswerRequest;
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
        return redirect()->route('showOneQuestion', ['question' => $question, 'comments' => 'open'])->with('success','Answer added');
        
    }
    public function editAnswer(Answer $answer){
        if (auth()->id()!==$answer->user_id){
            return redirect()->route('login')->with('error','Not Allowed');
        }
        return view('answer.editAnswer',compact('answer'));
    }
    public function updateAnswer(UpdateAnswerRequest $request, Answer $answer){
        if(auth()->id()!==$answer->user_id){
            return redirect()->route('login')->with('error','Not Allowed');
        }
        $validated=$request->validated();
        $imagePath=null;
        if ($request->hasFile('image')){
            $imagePath=$request->file('image')->store('answerPics','public');
            $validated['imagePath']=$imagePath;
        }
        $answer->update($validated);
        return redirect()->route('showOneQuestion',['question' => $answer->question_id, 'comments' => 'open'])->with('success','Answer Updated');
    }
    public function deleteAnswer(Answer $answer){
        if(auth()->id()!==$answer->user_id){
            return redirect()->route('login')->with('error','Not Allowed');
        }
        $answer->delete();
        return redirect()->route('showOneQuestion',['question' => $answer->question_id, 'comments' => 'open'])->with('success','Comment Deleted');

    }
}
