<?php

namespace Database\Factories;

use App\Models\PostComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostComment::class;

    protected $gif_urls = [
        'https://media.tenor.com/videos/27c647b4f56ea1d9222755a5ddd28929/mp4',
        'https://media.tenor.com/videos/d4324f4e383a07ed1a15043c7af13422/mp4',
        'https://media.tenor.com/videos/27c647b4f56ea1d9222755a5ddd28929/mp4',
        'https://media.tenor.com/videos/d4324f4e383a07ed1a15043c7af13422/mp4',
        null,
        null,
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(),
            'gif_url' => $this->faker->randomElement($this->gif_urls),
            'user_id' => 1,
            'post_id' => 1,
            'created_at' => $this->faker->dateTimeInInterval('-5 weeks', '-2 minutes'),
        ];
    }
}
