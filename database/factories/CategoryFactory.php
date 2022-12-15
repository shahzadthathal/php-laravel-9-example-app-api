<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Traits\SlugTrait;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    use SlugTrait;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->title;
        $slug = $this->generateSlug($name);

        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
