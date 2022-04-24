<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'category_id' => rand(1,3),
            'title' => 'Prod-'.$this->faker->sentence(rand(3,6)),
            'slug' => Str::slug($this->faker->sentence(rand(3,6))),
            'description' => $this->faker->sentence(),
            'image' => "public/images/default.png",
            'price' => rand(50,2000),
            'stock' => rand(1,11),
            'is_active' => true,
         ];
    }
}
