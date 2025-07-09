<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

//Guest pages
Route::get('/', function () {return view('index');});
Route::get('/login', [SessionController::class,'create']);
Route::post('/login', [SessionController::class,'store']);
Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);
//Authenticated pages
Route::get('/dashboard',function(){return view('dashboard');});
Route::get('/logout',function(){return view('logout');});
Route::post('/logout',[SessionController::class,'destroy']);
Route::get('/profile',[SessionController::class,'show']);
Route::get('profile/edit',[SessionController::class,'edit']);
Route::patch('profile/edit',[SessionController::class,'update']);