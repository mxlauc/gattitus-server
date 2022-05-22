<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Image;
use App\Models\PetType;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\ReactionType;
use App\Models\SimplePost;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_count = 50;
        $users = User::factory()->count($users_count)->create();

        $images = Image::factory()->count($users_count)->is_photo()->create();

        for($i = 0 ; $i < $users_count; $i++){
            $u = $users[$i];
            $img = $images[$i];

            $u->image_id = $img->id;
            $img->user_id = $u->id;

            $u->save();
            $img->save();

            //creando gatos
            $cats_count = random_int(0, 6);

            for($k = 0 ; $k < $cats_count; $k++){
                Pet::factory()
                    ->for($u)
                    ->for(PetType::first())
                    ->for(Image::factory()
                            ->is_photo_pet()
                            ->for($u)
                    )
                    ->create();
            }

            // creando los posts
            $posts_users_count = 3;
            $image_posts = Image::factory()->count($posts_users_count)->for($u)->create();
            for($j = 0; $j < $posts_users_count; $j++){
                $post = Post::factory()
                        ->for($u)
                        ->create();
                SimplePost::factory()->for($post)->for($image_posts[$j])->create();
                PostComment::factory()->count(3)->for($post)->for(User::all()->random())->create();
                
                //etiquetando gatos
                $cat_ids = Pet::inRandomOrder()->limit(random_int(0, 4))->get();
                $post->pets()->attach($cat_ids);

                //reactions
                for($l = 0 ; $l < $users_count ; $l++){
                    $post->reactions()->create([
                        'user_id' => $users[$l]->id,
                        'reaction_type_id' => ReactionType::first()->id,
                    ]);
                }
            }

            

            //followers

            for($l = 0 ; $l < $users_count ; $l++){
                if($i != $l){
                    $u->followers()->attach($users[$l]);
                    
                }
            }
            $u->save();
        }

    }
}
