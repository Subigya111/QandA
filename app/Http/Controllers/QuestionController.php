<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
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
    public function showAllQues(User $user){
        $questions=Question::with('user')->orderByDesc('created_at')->get();
        $users=User::where('imagePath',$user->imagePath)->get();
        return view('main.showAll',compact('questions','users'));
    }
    public function showCategory(Request $request){
        if($request->filled('category')){
            $category = ucfirst(strtolower($request->category)); //makes first letter in capital
            $questions=Question::where('category',$category)->get();
            
        }
        return view('main.showOneCategory',compact('questions'));
    }
    public function showOneQues(Question $question){
        $answers=Answer::with('user')->where('question_id',$question->id)->orderByDesc('created_at')->get();
        $authAnswer=Answer::where('question_id',$question->id)->where('user_id',auth()->id())->first();//fetches answer from logged in user
        return view('main.showOneQues',compact('question','answers','authAnswer'));
    }
    public function editOneQues(Question $question){
        if(auth()->id()!==$question->user_id){
            return redirect()->route('login')->with('error','Not Allowed');
        }
        return view('main.showEditQues',compact('question'));
    }
    public function updateOneQues(UpdateQuestionRequest $request, Question $question){
        if (auth()->id()!==$question->user_id){
            return redirect()->route('login')->with('error','Not Allowed');
        }
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
        if (auth()->id()!==$question->user_id){
            return redirect()->route('login')->with('error','Not Allowed');
        }
        $question->delete();
        return redirect()->route('showAllQuestion')->with('success','Deleted');
    }
}
