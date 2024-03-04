<x-admin-layout>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <h1 class="mt-3">Dashboard</h1>
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
        <!-- <div class="card-header">Blog</div> -->
        <div class="card-body">
            <p class="card-text">Total Blog - {{$blogs->count()}}</p>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Blog Title</th>
            <th scope="col">Blog Intro</th>
            <th scope="col">Blog Published date</th>
            <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{$blog->title}}</td>
            <td>{{$blog->intro}}</td>
            <td>{{$blog->created_at->format('D-M-Y')}}</td>
            <td>
                <form action="/admin/blogs/{{$blog->id}}/edit" method="POST">
                    @csrf
                    <button class="btn btn-warning">Edit</button>
                </form>
            </td>
            <td>
                <form action="/admin/blogs/{{$blog->id}}/delete" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-admin-layout>