<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(13),
            'content' => $this->faker->paragraph(125),
            'admin' => 'rrez2002@gmail.com',
        ];
    }
}
