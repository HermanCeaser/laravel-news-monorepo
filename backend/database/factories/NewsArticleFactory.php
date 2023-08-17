<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsArticle>
 */
class NewsArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => $this->faker->name,
            'category_id' => random_int(1, 8), // Assuming you have 5 categories
            'country' => $this->faker->randomElement(config('constants.countries')),
            'description' => $this->faker->paragraph,
            'image' => json_encode([
                'url' => $this->faker->imageUrl(),
                'alt' => $this->faker->sentence,
            ]),
            'language' => $this->faker->languageCode,
            'published_at' => $this->faker->dateTimeThisYear,
            'source' => $this->faker->company,
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'feed' => $this->faker->randomElement(config('constants.feed')),
        ];
    }
}
