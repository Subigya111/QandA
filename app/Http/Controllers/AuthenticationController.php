<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request){
        $validated=$request->validated();
        $path=null;
        if ($request->hasFile('image')){
            $path=$request->file('image')->store('profilePics','public');
        }
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password'],
            'remember_token'=>Str::random(),
            'imagePath'=>$path
        ]);
        return redirect()->route('login')->with('success','User Registered');
    }
    public function login(LoginRequest $request){
        $validated= $request->validated();
        if(!Auth::attempt($validated)){
            return back()->with('error', 'Invalid credentials');
        }
        $request->session()->regenerate();
        return redirect()->route('showQuesForm')->with('success','Logged in successfully');
    }
    public function logout(Request $request){
        Auth::logout(); //removes authenticated user
        $request->session()->invalidate(); //destroys old session value
        $request->session()->regenerateToken(); //creates fresh security token
        return redirect()->route('login')->with('success','Logged out successfully');
    }
}
