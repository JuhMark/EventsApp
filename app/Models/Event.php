<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'dateTime',
        'location',
        'image',
        'type',
        'description',
        'user_id',
    ];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subscribers(){
        return $this->hasMany(Subscriber::class);
    }
}
