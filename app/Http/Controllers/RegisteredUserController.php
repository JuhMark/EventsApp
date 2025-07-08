<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create(){
        return view("register");
    }

    public function store(){
        $validatedAttributes = request()->validate([
            'firstName' => ['required','max:100','alpha'],
            'lastName' => ['required','max:100','alpha'],
            'email' => ['required','email','max:100'],
            'password' => ['required',Password::min(10)->letters()->numbers(),'confirmed'],
            'password_confirmation' => ['required'],
            'address' => ['nullable','max:100'],
            'phone' => ['nullable','max:20'],
        ]);

        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
