<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($id){
        $event = Event::find($id);
        if($event){
            return view("event",['event' =>$event]);
        } else{
            abort(404);
        }
    }
    public function promptDelete($id){
        $event = Event::find($id);
        if($event){
            return view('event-delete',['event'=> $event]);
        }else{
            abort(404);
        }
    }

    public function destroy($id){
        $event = Event::find($id);
        if($event){
            $event->delete();
            return redirect('/dashboard');
        }else{
            abort(404);
        }
    }
}
