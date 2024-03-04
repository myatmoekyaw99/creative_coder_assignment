<x-layout>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
        <h2 class="text-primary my-4 text-center">Register Form</h2>
            <div class="card p-4 mt-2 mb-4">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nameInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameInputEmail1" aria-describedby="nameHelp" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="usernameInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="usernameInputEmail1" aria-describedby="usernameHelp" name="username" value="{{old('username')}}">
                    </div>
                    @error('username')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{old('password')}}">
                    </div>
                    @error('password')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-layout>