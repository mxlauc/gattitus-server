<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reactions')->insert([
            'id' => 1,
            'name' => 'haha',
            'display_name' => 'Haha',
            'display_name_es' => 'Jaja',
            'image_svg' => 'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e46918_a39c282d-1ff7-4640-9373-e66831f6f203.svg?alt=media&token=e1d60e6c-e2a3-4650-9a22-0ab913130141',
            'image_gif' => 'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2Fimgs%2F17d66e4860e_82c977da-702f-4993-83dd-1f5a4dc34225.gif?alt=media&token=f18e9ca0-7cb7-479f-893c-f4fe39a6e453',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
