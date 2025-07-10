<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory, Notifiable; 
    protected $fillable = [
        'name',
        'dateTime',
        'location',
        'image',
        'type',
        'description',
        'user_id',
        'private',
    ];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subscribers(){
        return $this->hasMany(Subscriber::class);
    }
}
