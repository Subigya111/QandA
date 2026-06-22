<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
    protected $fillable=['question','user_id'];
    public function storeQuestions(Request $request){
        $validate=$request->validate([
            'question'=>'required|string|max:255'
        ]);
        $validate['user_id']=auth()->id();
        Question::create($validate);
    }
}
