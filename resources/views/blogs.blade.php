{{--<x-layout>
<x-slot name="link"><link rel="stylesheet" href="/css/blog.css"></x-slot>
<x-slot name="title">Home</x-slot>
    @foreach($blogs as $blog)
    <div>
        <a href="/blogs/{{$blog->slug}}"><h1 class="{{ $loop->first ? 'bg-red' : ''}}">{{$blog->title}}</h1></a>
        <h4>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></h4>
        <p>{!!$blog->description!!}</p>
        Category -> <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a>
        <p>Published at - {{$blog->created_at->diffForHumans()}}</p>
    </div>   
    
    @endforeach
</x-layout> --}}

{{-- @dd($categories) --}}
<x-layout>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <x-hero/>
    <x-blogs-section 
        :blogs="$blogs"
        />
    <!-- <x-subscribe/> -->
</x-layout>
   


