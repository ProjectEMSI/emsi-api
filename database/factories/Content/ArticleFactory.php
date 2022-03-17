<?php

namespace Database\Factories\Content;

use App\Models\Content\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'published_at' => $this->faker->dateTime()
        ];
    }
}
