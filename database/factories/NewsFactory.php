<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

use Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->realText($this->faker->numberBetween(170,200)),
            'image' => "newstest.jpg",
        ];
    }
}
