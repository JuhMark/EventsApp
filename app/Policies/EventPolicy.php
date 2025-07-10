<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    public function belongs(User $user, string $event){
        $event = Event::find($event);
        return $event->user->is($user);
    }
    public function notSubscribed(User $user, string $event){
        $subscriber = Subscriber::where("user_id", $user->id)->where("event_id", $event)->first();
        return $subscriber == null;
    }
}
