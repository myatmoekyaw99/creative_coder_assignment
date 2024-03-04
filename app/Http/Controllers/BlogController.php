<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isEmpty;

class BlogController extends Controller
{
    // public function __construct(){
    //     $this->middleware('can:admin')->only('dashboard');
    //     $this->middleware('can:admin')->except('dashboard');
    // }

    public function index() {
        // DB::listen(function($query){
        //     logger($query->sql);
        // });
        return view('blogs',[
            // 'blogs' => Blog::with('category','author')->get()
            'blogs' => Blog::latest()->filter(request(['search','category','author']))->paginate(3),
            'categories' => Category::all()
        ]);
    }

     // function getBlogs(){
    //     $blogs=Blog::latest();
    //     if($search=request('search')){
    //        $blogs->where('title','LIKE','%'.$search."%");
    //     }
    //     return $blogs->get();
    // }

    public function show(Blog $blog){
        // $blog = Blog::findOrFail($id); 
        return view('blog',[
            'blog' => $blog->load('comments'),
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),
            // 'comments' => Comment::all(),
        ]);
    }

    public function dashboard(){
        // dd(request('auth'));
        $this->authorize('admin');
        // dd(FacadesGate::allows('admin'));
        return view('dashboard',[
            'blogs' => Blog::all(),
        ]);
    }

    public function create(){
        return view('blogs.create',[
            'categories' => Category::all(),
        ]);
    }

    public function store(){
        
        $cleanData = request()->validate([
            "title" => ['required'],
            "slug" => ['required'],
            "intro" => ['required'],
            "category_id" => ['required', Rule::exists('categories','id')],
            "description" => ['required'],
        ]);

        $path = request()->file('photo')->store('/images');
        $cleanData['photo'] = $path;
        $cleanData['user_id'] = auth()->user()->id;
        // dd($cleanData);
        Blog::create($cleanData);
        return back();
    }

    public function destroy(Blog $blog){
        // dd('hit');
        $blog->delete();
        return back();
    }

    public function edit(Blog $blog){
        // dd('hit');
        return view('blogs.edit',[
            'blog' => $blog,
            'categories' => Category::all(),
        ]);
    }

    public function update(Blog $blog){
        // dd(request()->all());
        $cleanData = request()->validate([
            "title" => ['required'],
            "slug" => ['required'],
            "intro" => ['required'],
            "photo" => ['nullable'],
            "category_id" => ['required', Rule::exists('categories','id')],
            "description" => ['required'],
        ]);

        if(!isEmpty('photo')){
            $cleanData['photo'] = request()->file('photo')->store('/images');
        }else{
            $cleanData['photo'] = request('old');
        }
        $cleanData['user_id'] = auth()->user()->id;

        $resource = Blog::findOrFail($blog->id);
        $resource['title'] = $cleanData['title'];
        $resource['slug'] = $cleanData['slug'];
        $resource['intro'] = $cleanData['intro'];
        $resource['description'] = $cleanData['description'];
        $resource['photo'] = $cleanData['photo'];
        $resource['category_id'] = $cleanData['category_id'];
        $resource['user_id'] = $cleanData['user_id'];
        
        // dd($resource);
        $resource->save();

        return redirect('/admin')->with('success', 'Blog updated successfully.');
    }
}
