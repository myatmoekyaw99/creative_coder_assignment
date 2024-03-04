<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
// use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(AuthMiddleware::class)->group(function(){
    Route::get('/',[BlogController::class,'index']);
    Route::get('/contact',[ContactController::class,'contact']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/blogs/{blog}',[BlogController::class,'show']);
    Route::post('/blogs/{blog}/comments',[CommentController::class,'store']);
    Route::post('/blogs/{blog:slug}/subscription',[SubscriptionController::class,'toggleSubscribe']);
});


Route::middleware(GuestMiddleware::class)->group(function(){
    Route::get('/register',[AuthController::class,'index']);
    Route::post('/register',[AuthController::class,'storeUser']);
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'checkUser']);
});

// Route::middleware('can:admin')->group(function(){
    Route::get('/admin/blogs/create',[BlogController::class,'create']);
    Route::get('/admin',[BlogController::class,'dashboard']);
    Route::post('/admin/blogs/store',[BlogController::class,'store']);
    Route::post('/admin/blogs/{blog:id}/edit',[BlogController::class,'edit']);
    Route::delete('/admin/blogs/{blog:id}/delete',[BlogController::class,'destroy']);
    Route::put('/admin/blogs/{blog:id}/update',[BlogController::class,'update']);
// });


// Route::get('/login',[AuthController::class,'login'])->middleware(GuestMiddleware::class);

// Route::get('/users/{user}',function(User $user){
//     return view('blogs',[
//         'blogs' => $user->blogs,
//         // ->load('category','author')
//         'categories' => Category::all()
//     ]);
// });

// Route::get('/videos',[VideoController::class,'index']);
// Route::get('/videos/{video}',[VideoController::class,'show']);




// route model binding
// Route::get('/blogs/{blog:slug}',function(Blog $blog){
//     // $blog = Blog::where('slug',$slug)->first(); 
//     return view('blog',[
//         'blog' => $blog
//     ]);
// });

// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('blogs',[
//         'blogs' => $category->blogs,
//         // ->load('category','author')
//         'categories' => Category::all(),
//         'currentCategory' => $category
//     ]);
// });

