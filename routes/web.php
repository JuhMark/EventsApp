<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\SubscriberController;
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
Route::get('/dashboard',[SubscriberController::class,'showSubscribed'])->middleware('auth');
Route::get('/subscriptions/{subscriber}',[SubscriberController::class,'promptUnsubscribe'])
->middleware('auth')
->can('unsubscribe','subscriber');
Route::delete('/subscriptions/{subscriber}',[SubscriberController::class,'destroy'])
->middleware('auth')
->can('unsubscribe','subscriber');;
Route::get('/events/create',[EventController::class,'create'] )->middleware('auth');
Route::post('/events/create',[EventController::class,'store'] )->middleware('auth');
Route::get('/events/edit/{event}',[EventController::class,'edit'] )
->middleware('auth')
->can('belongs','event');
Route::patch('/events/edit/{event}',[EventController::class,'update'] )
->middleware('auth')
->can('belongs','event');
Route::get('/events/delete/{event}',[EventController::class,'promptDelete'])
->middleware('auth')
->can('belongs','event');
Route::delete('/events/delete/{event}',[EventController::class,'destroy'])
->middleware('auth')
->can('belongs','event');
Route::get('/events',[SubscriberController::class,'showNotSubscribed'])->middleware('auth');
Route::get('/events/subscribe/{event}',[SubscriberController::class,'create'])
->middleware('auth')
->can('notSubscribed','event');
Route::post('/events/subscribe/{event}',[SubscriberController::class,'store'])
->middleware('auth')
->can('notSubscribed','event');
Route::get('/events/{event}',[EventController::class,'show'])->middleware('auth');
Route::get('/logout',[SessionController::class,'promptLogout'])->middleware('auth');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');
Route::get('/profile',[SessionController::class,'show'])->middleware('auth');
Route::get('profile/edit',[SessionController::class,'edit'])->middleware('auth');
Route::patch('profile/edit',[SessionController::class,'update'])->middleware('auth');