<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(50)->create()->each(function ($post) {
            $category = Category::all()->random()->id;
            $tag = Tag::all()->random()->id;
            $post->categories()->sync($category);
            $post->tags()->sync($tag);
        });
    }
}
