<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#4b6584;">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link border-bottom mt-3" href="/admin" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                    <a class="nav-link border-bottom mt-1" href="/admin/blogs/create">Create Blog</a>
                </div>
            </div>
            <div class="col-md-9 mx-auto mb-4">
                    {{$slot}}
            </div>
        </div>
    </div>
</x-layout>