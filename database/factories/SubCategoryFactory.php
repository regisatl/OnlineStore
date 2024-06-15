<?php

namespace Database\Factories;

use App\Models\admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\SubCategory>
 */
class SubCategoryFactory extends Factory
{
      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array
      {
            $name = $this->faker->word;
            return [
                  'name' => $name,
                  'slug' => Str::slug($name),
                  'status' => $this->faker->randomElement(['active', 'inactive']),
                  'category_id' => Category::factory(),
            ];
      }
}
