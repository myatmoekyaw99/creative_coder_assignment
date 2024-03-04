<?php

namespace App\Models;

use App\Mail\SubscriberMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Comment extends Model
{
    use HasFactory;

    public static function boot(){
        
        parent::boot();
        static::created(function($comment){
            $subscribers = $comment->blog->subscribedUsers->filter(function ($user){
                return $user->id !== auth()->id();
            });
            $subscribers->each(function ($user) use($comment){
                Mail::to($user->email)->queue(new SubscriberMail($comment,$user));
            });
        });
    }
    
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    //accessor
}
