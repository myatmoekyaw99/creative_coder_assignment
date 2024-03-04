<x-admin-layout>
    <h1 class="mt-2">Edit Blog Form</h1>
        <form action="/admin/blogs/{{$blog->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group my-3">
                <label for="exampleFormControlInput1">Blog Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title', $blog->title)}}" id="exampleFormControlInput1" placeholder="Enter blog title">
            </div>
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            
            <div class="form-group my-3">
                <label for="exampleFormControlInput2">Blog Slug</label>
                <input type="text" name="slug" class="form-control" value="{{old('slug',$blog->slug)}}" id="exampleFormControlInput2" placeholder="Enter blog slug">
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group my-3">
                <label for="exampleFormControlInput3">Blog Intro</label>
                <input type="text" name="intro" class="form-control" value="{{old('intro', $blog->intro)}}" id="exampleFormControlInput3" placeholder="Enter blog intro">
            @error('intro')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            
            <div class="form-group my-3">
            <label for="select">Blog Category</label>
                <select name="category_id" class="form-select" id="select" >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="photo">Photo </label>
                <input type="file" name="photo" class="form-control" value="{{$blog->photo}}" id="photo">
                <input type="hidden" name="old" value="{{$blog->photo}}">
            @if($blog->photo)
            <p>{{$blog->photo}}</p>
            @endif
            @error('photo')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group my-3">
                <label for="editor">Blog Body</label>
                <textarea class="form-control" name="description" id="editor" rows="5">{{old('description', $blog->description)}}</textarea>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group my-3">
                <input type="submit" class="btn btn-primary" id="exampleFormControlInput5" value="Update">
            </div>
        </form>
</x-admin-layout>