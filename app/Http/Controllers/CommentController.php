<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $cleanData = request()->validate([
            "body" => ["required","max:250"],
        ]);

        //  // dd($cleanData);

        $cleanData['user_id'] = auth()->id();
        // // $cleanData['blog_id'] = $blog->id;
        // // Comment::create($cleanData);
        
        $commment = $blog->comments()->create($cleanData); //hasmany query instance obj
       
        // event(new CommentCreated());
        // CommentCreated::dispatch($commment,$blog);

        return back();
    }
}
