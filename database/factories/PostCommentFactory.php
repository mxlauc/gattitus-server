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
        'https://media.tenor.com/images/c192a4851eee5e1088004e2398e75c3f/tenor.gif',
        'https://media.tenor.com/images/58b03174b07cafcbe3e2db7744031830/tenor.gif',
        'https://media.tenor.com/images/ca1606fc790de00557ef829a9812a7e4/tenor.gif',
        'https://media.tenor.com/images/29a96b5cbca521f7ceb1651d56ebb6d5/tenor.gif',
        null,
        null,
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
