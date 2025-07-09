<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

//Guest pages
Route::get('/', function () {return view('index');});
Route::get('/login', [SessionController::class,'create'])->name('login');
Route::post('/login', [SessionController::class,'store']);
Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);
//Authenticated pages
Route::get('/dashboard',function(){return view('dashboard');})->middleware('auth');
Route::get('/logout',[SessionController::class,'promptLogout'])->middleware('auth');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');
Route::get('/profile',[SessionController::class,'show'])->middleware('auth');
Route::get('profile/edit',[SessionController::class,'edit'])->middleware('auth');
Route::patch('profile/edit',[SessionController::class,'update'])->middleware('auth');