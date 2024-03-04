<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();
        Comment::truncate();

        // User::factory()->create();

        $frontend = Category::factory()->create([
            'name' => 'frontend'
        ]);

        $backend = Category::factory()->create([
            'name' => 'backend'
        ]);

        Role::factory()->create(['keyword' => 'admin']);
        Role::factory()->create(['keyword' => 'customer']);


        Blog::factory(2)->create([
            'category_id' =>$frontend->id,
            'photo' => 'images/berlin.jpg',
    ]);
        Blog::factory(2)->create(['category_id' =>$backend->id, 'photo' => 'images/lisbon-3.jpg']);

        // Comment::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
