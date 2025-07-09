<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function showSubscribed(){
        return view('dashboard',['subscribers' => Auth::user()->subscribedEvents,'events' => Auth::user()->events]);
    }
    public function showNotSubscribed(){
        return view('events',['subscribers' => Auth::user()->notSubscribedEvents]);
    }
    public function promptUnsubscribe($id){
        $subscriber = Subscriber::find($id);
        if($subscriber){
        return view('unsubscribe',['subscriber' => $subscriber]);
        }else{
            abort(404);
        }
    }
    public function destroy($id){
        $subscriber = Subscriber::find($id);
        if($subscriber){
            $subscriber->delete();
            return redirect('/dashboard');
        }else{
            abort(404);
        }
    }
}
