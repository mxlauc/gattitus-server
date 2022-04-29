<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

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
            'slug' => Str::lower(Str::random(13)),
            'created_at' => $this->faker->dateTimeInInterval('-5 weeks', '-2 minutes'),
        ];
    }
}
