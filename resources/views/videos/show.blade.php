<x-layout>
    <h3><a href="/videos/{{$video->id}}">{{$video->title}}</a></h3>
    @foreach ($video->comments as $comment)
        <x-single-comment :comment="$comment"/>
    @endforeach
</x-layout>