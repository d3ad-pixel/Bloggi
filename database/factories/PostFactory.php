<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);
        $description = $this->faker->paragraph();
        $imagePath = $this->faker->imageUrl();
        $category = $this->faker->word();
        $userId = $this->faker->numberBetween(1, 10);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'image_path' => $imagePath,
            'category' => $category,
            'user_id' => $userId,
        ];
    }
}
