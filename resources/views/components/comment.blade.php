@props(['comments','blog'])
<div class="container-fluid p-4" style="background-color: #fee;">
<section class="container">
    <div class="col-md-8 mx-auto">
      <h5 class="text-secondary">Comments ({{$comments->count()}})</h5>
      @auth
      <form action="/blogs/{{$blog->slug}}/comments" method="POST" class="my-3">
        @csrf
        <textarea class="form-control mt-3" id="body" name="body" rows="10" cols="20" placeholder="Enter your comment"></textarea>
          <button
            class="btn btn-primary text-light mx-auto my-4"
          >
            Sent
          </button>
      </form>
      @endauth
      @foreach($c = $blog->comments()->paginate(4) as $comment)
        <x-single-comment :comment="$comment"/>
      @endforeach
    </div>  
{{$c->links()}}
</section>
</div>