<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Mail\SubscriberMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CommentCreatedListener 
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommentCreated $event): void
    {
        //
        // $subscribers = $event->blog->subscribedUsers->filter(function ($user){
        //     return $user->id !== auth()->id();
        // });
        // $subscribers->each(function ($user) use($event){
        //     Mail::to($user->email)->queue(new SubscriberMail($event->comment,$user));
        // });

    }
}
