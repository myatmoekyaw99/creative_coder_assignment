<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    // protected $fillable = ['title','description','photo'];
    // protected $guarded = ['id'];
       protected $with = ['category','author'];

    //blog belongs to a category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        // return $this->morphMany(Comment::class,'commentable');
        return $this->hasMany(Comment::class);
    }

    public function subscribedUsers(){
        return $this->belongsToMany(User::class,'subscriptions','blog_id','user_id');
    }

    public function subscribe($userId = null){
        return $this->subscribedUsers()->attach(['user_id' => $userId ?? auth()->id()]);
    }

    public function unsubscribe($userId = null){
        return $this->subscribedUsers()->detach(['user_id' => $userId ?? auth()->id()]);
    }

    public function isSubscribed($userId = null){
        return $this->subscribedUsers && $this->subscribedUsers->contains('id',$userId ?? auth()->id());
    }

    public  function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query,$filters){
        if($search=request('search')){
           $query->where(function($query) use($search){
                    $query->where('title','LIKE','%'.$search."%")
                    ->orwhere('description','LIKE','%'.$search."%");
           });
        }           

        if($search=request('category')){
            $query->whereHas('category',function ($query) use($search){
                $query->where('slug',$search);
            });
         }

         if($search=request('author')){
            $query->whereHas('author',function ($query) use($search){
                $query->where('username',$search);
            });
         }

    }
}
