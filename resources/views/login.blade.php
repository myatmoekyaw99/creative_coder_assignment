<x-layout>
<div class="container" style="min-height:100vh;">
    <div class="row">
        <div class="col-md-5 mx-auto">
        <h2 class="text-primary my-4 text-center">Login Form</h2>
            <div class="card p-4 mt-2 mb-4">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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