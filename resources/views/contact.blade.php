<x-layout>
    <div class="container-fluid bg-dark">
        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="card my-3">
                    <img src="/images/a.jpeg" class="card-img-top" width="50%" height="auto" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-center">Contact Info</h4>
                        <p class="card-text text-center">Name : {{$name}}</p>
                        <p class="card-text text-center">Email : {{$email}}</p>
                        <p class="card-text text-center">Phone : {{$phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="/js/app.js"></script> -->
</x-layout>
    