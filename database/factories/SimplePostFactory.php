<?php

namespace Database\Factories;

use App\Models\SimplePost;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimplePostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SimplePost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(),
            'post_id' => null,
            'image_id' => null,
        ];
    }
}
