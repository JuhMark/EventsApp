<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Subscriber;
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
    public function create(){
        return view('event-create');
    }
    public function store(){
        request()->validate([
            'name' => ['required','max:100'],
            'dateTime' => ['required','date'],
            'location' => ['required','max:100'],
            'type' => ['required','max:100'],
            'description' => ['max:200'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if(request()->image){
            $imageName = time().'.'.request()->image->extension();
            request()->image->move(public_path('images'), $imageName);
            Event::create([
                'name'=> request()->name,
                'dateTime' => request()->dateTime,
                'location'=> request()->location,
                'type'=> request()->type,
                'description'=> request()->description,
                'image'=> 'images/'.$imageName,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            Event::create([
                'name'=> request()->name,
                'dateTime' => request()->dateTime,
                'location'=> request()->location,
                'type'=> request()->type,
                'description'=> request()->description,
                'user_id' => auth()->user()->id,
            ]);
        }
        Subscriber::create([
            'event_id' => Event::max('id'),
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/dashboard');
    }
    public function edit($id){
        $event = Event::find($id);
        if($event){
            return view('event-edit',['event'=> $event]);
        }else{
            abort(404);
        }
    }
    public function update($id){
        $event = Event::find($id);
        if($event){
            request()->validate([
            'name' => ['required','max:100'],
            'dateTime' => ['required','date'],
            'location' => ['required','max:100'],
            'type' => ['required','max:100'],
            'description' => ['max:200'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if(request()->image){
                $imageName = time().'.'.request()->image->extension();
                request()->image->move(public_path('images'), $imageName);
                $event->update([
                    'name'=> request()->name,
                    'dateTime' => request()->dateTime,
                    'location'=> request()->location,
                    'type'=> request()->type,
                    'description'=> request()->description,
                    'image'=> 'images/'.$imageName,
                ]);
        }else {
            $event->update([
                'name'=> request()->name,
                'dateTime' => request()->dateTime,
                'location'=> request()->location,
                'type'=> request()->type,
                'description'=> request()->description,
            ]);
        }
        return redirect('/events/'. $event->id);
        }else{
            abort(404);
        }
    }
}
