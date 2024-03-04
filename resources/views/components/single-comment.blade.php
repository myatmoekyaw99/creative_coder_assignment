@props(['comment'])
<div class="card mb-2 p-3 shadow">
    <div class="d-flex">
        <div>
            <img src="{{$comment->author->avatar}}" width="40" height="40" class="rounded-circle"/>
        </div>    
        <div class="ms-3">
            <h6>{{$comment->author->name}}</h6>
            <p class="text-secondary">{{$comment->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <p class="mt-1 ms-5">
        {{$comment->body}}
    </p>
</div>  