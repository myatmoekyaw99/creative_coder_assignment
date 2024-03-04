<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{isset($currentCategory)? $currentCategory->name:'Filter By Category'}}
    </button>

    <ul class="dropdown-menu">
        @foreach($categories as $category)
        <li><a class="dropdown-item" href="/?category={{$category->slug}}">
        {{$category->name}}</a></li>
        @endforeach
    </ul>
</div>