<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;

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
    public function promptLogout(){
        return view('logout');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
    public function show(){
        return view("profile");
    }
    public function edit(){
        return view("profile-edit");
    }
    public function update(){
        $validatedAttributes = request()->validate([
            'firstName' => ['required','max:100','alpha'],
            'lastName' => ['required','max:100','alpha'],
            'email' => ['required','email','max:100'],
            'address' => ['nullable','max:100'],
            'phone' => ['nullable','max:20'],
        ]);

        $current_email = request()->user()->email;
        $exist = User::where('email', $validatedAttributes['email'])->where('email','<>',$current_email)->first();
        if($exist) throw ValidationException::withMessages(["A user with this email already exists!"]);

        $user = User::where("email", $current_email);
        $user->update($validatedAttributes);

        return redirect('/profile');

    }
}
