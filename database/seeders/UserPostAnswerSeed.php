<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Answer;

class UserPostAnswerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1000)->create()->each(function($user) {
            Post::factory(10)->create(['user_id' => $user->id])->each(function($post) use($user) {
                Answer::factory(5)->create([
                    'user_id' => $user->id,
                    'post_id' => $post->id
                ]);
            });
        });
    }
}
