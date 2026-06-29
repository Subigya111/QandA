<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request){
        $validated=$request->validated();
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password']
        ]);
        return redirect()->route('login')->with('success','User Registered');
    }
    public function login(LoginRequest $request){
        $validated= $request->validated();
        if(!Auth::attempt($validated)){
            echo "Invalid Credentials";
        }
        $request->session()->regenerate();
    }
    public function logout(Request $request){
        Auth::logout(); //removes authenticated user
        $request->session()->invalidate(); //destroys old session value
        $request->session()->regenerateToken(); //creates fresh security token
        echo "logged out";
    }
}
