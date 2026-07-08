<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    
    public function showForm(){
        return view('main.QA');
    }
    public function storeQuestions(QuestionRequest $request){
        $validated=$request->validated(); 
        $imgPath=null;
        if($request->hasFile('image')){
            $imgPath=$request->file('image')->store('questionPics','public');
        }
        Question::create([
            'question'=>$validated['question'],
            'category'=>$validated['category'],
            'user_id'=>auth()->id(),
            'description'=>$validated['description'],
            'imagePath'=>$imgPath
        ]);
        return redirect()->route('showAllQuestion')->with('success','Question added');
    }
    public function showAllQues(){
        $questions=Question::with('user')->orderByDesc('created_at')->get();
        return view('main.showAll',compact('questions'));
    }
    public function showOneQues(Question $question){
        $answers=Answer::with('user')->where('question_id',$question->id)->orderByDesc('created_at')->get();
        $authAnswer=Answer::where('question_id',$question->id)->where('user_id',auth()->id())->first();//fetches answer from logged in user
        return view('main.showOneQues',compact('question','answers','authAnswer'));
    }
    public function editOneQues(Question $question){
        return view('main.showEditQues',compact('question'));
    }
    public function updateOneQues(UpdateQuestionRequest $request, Question $question){
        
        $validated=$request->validated();
        $imgPath=null;
        if($request->hasFile('image')){
            $imgPath=$request->file('image')->store('questionPics','public');
            $validated['imagePath']=$imgPath;
        }
        $question->update($validated);
        return redirect()->route('showOneQuestion',$question)->with('success','Updated');
    }
    public function deleteOneQues(Question $question){
        $question->delete();
        return redirect()->route('showAllQuestion')->with('success','Deleted');
    }
}
