<?php

namespace Database\Factories;

use App\Models\Cat;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nickname' => $this->faker->sentence(4),
            'image_id' => null,
            'user_id' => null,
            'created_at' => $this->faker->dateTimeInInterval('-5 weeks', '-2 minutes'),
        ];
    }
}
