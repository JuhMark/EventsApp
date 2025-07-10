<?php

namespace App\Policies;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class SubscriberPolicy
{
    public function unsubscribe(User $user, string $subscriber){
        $subscriber = Subscriber::find($subscriber);
        return $subscriber->user->is($user);
    }

}
