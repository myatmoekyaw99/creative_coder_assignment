<x-layout>
    <!-- single blog section -->
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="{{asset('storage/'.$blog->photo)}}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          @auth
          <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
            @csrf
            @if($blog->isSubscribed())
              <button type="submit" value="" class="btn btn-danger">Unsubscribe</button>
            @else
              <button type="submit" value="" class="btn btn-info">Subscribe</button>
            @endif
          </form>
          @endauth
          <div>
            <div>Author - <a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</a></div>
            <div><a href="/?category={{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a></div>
            <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
          </div>
          <p class="lh-md">
          {!!$blog->description!!}
          </p>
        </div>
      </div>
    </div>
    <x-comment :comments="$blog->comments" :blog="$blog"/>
    <!-- subscribe new blogs -->
    <x-subscribe/>
    <x-blog-you-may-like :randomBlogs="$randomBlogs"/>
</x-layout>