<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view("login");
    }
    public function store(){
        $validatedAttributes = request()->validate([
            'email' => ['required','email','max:100'],
            'password' => ['required'],
        ]);

        $success = Auth::attempt($validatedAttributes);

        if($success){
            request()->session()->regenerate();
            return redirect('/dashboard');
        }else{
            throw ValidationException::withMessages(["Incorrect email or password!"]);
        }
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
