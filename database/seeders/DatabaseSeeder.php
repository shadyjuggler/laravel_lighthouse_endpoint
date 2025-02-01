<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();

        $user_ids = User::pluck('id')->toArray();

        foreach($user_ids as $user_id) {

            for($i = 0; $i < rand(2, 10); $i++) {
                Post::create([
                    'author_id' => $user_id,
                    'title' => fake()->jobTitle,
                    'content' => fake()->text(100)
                ]);
            }
        }

        $post_ids = Post::pluck('id')->toArray();

        foreach($post_ids as $post_id) {

            for($i = 0; $i < rand(1, 5); $i++) {
                Comment::create([
                    'post_id' => $post_id,
                    'reply' => fake()->text(100),
                ]);
            }
        }
    }
}
