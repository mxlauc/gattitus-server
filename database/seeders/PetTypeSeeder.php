<?php

namespace Database\Seeders;

use App\Models\PetType;
use Illuminate\Database\Seeder;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PetType::create([
            'name' => 'cat',
        ]);
    }
}
