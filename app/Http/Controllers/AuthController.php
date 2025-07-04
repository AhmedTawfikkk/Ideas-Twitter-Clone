<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    
    }

    public function store()
    {
        $validated=request()->validate([
            'name'=>'required|min:3|max:40',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:8'
        ]);

        $user=User::create([
           'name'=>$validated['name'],
           'email'=>$validated['email'],
           'password'=>Hash::make($validated['password'])
        ]);
        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success','Account created successfully');  
    }

    public function login()
    { 
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated=request()->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'    
        ]);
       if(auth()->attempt($validated))
       {
        request()->session()->regenerate();
        return redirect()->route('dashboard')->with('success','logged in successfully');
       }  
       return redirect()->route('login')->withErrors(
        [
            'email'=>'No matching user with the provided email and password'
        ]
        );

    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success','logged out successfully');  

    }
}
