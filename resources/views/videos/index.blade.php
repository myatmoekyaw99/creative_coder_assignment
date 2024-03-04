<x-layout>
    <h1>Video Lists</h1>
    @foreach($videos as $video)
        <h3><a href="/videos/{{$video->id}}">{{$video->title}}</a></h3>
    @endforeach
</x-layout>