<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;

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
}
