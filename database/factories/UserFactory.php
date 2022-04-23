<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'role_id' => Role::find(1),            
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->lexify('??????????'),
            'facebook_id' => Str::random(20),
            'image_id' => null,
            'remember_token' => Str::random(10),
        ];
    }

    public function is_admin(){
        return $this->state(function (array $attributes) {
            return [
                'role_id' => Role::find(2),
            ];
        });
    }

    public function is_fake(){
        return $this->state(function (array $attributes) {
            return [
                'role_id' => Role::find(3),
            ];
        });
    }
}
