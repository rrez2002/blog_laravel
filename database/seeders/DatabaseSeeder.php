<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        $user = new  User([
            'name' => 'reza',
            'email' => 'rrez2002@gmail.com',
            'password' => Hash::make(12345678),
        ]);
        $user->save();
        Post::factory(30)->create();
        Like::factory(30)->create();
//        Tag::factory(50)->create();
//        Comment::factory(80)->create();

    }
}
