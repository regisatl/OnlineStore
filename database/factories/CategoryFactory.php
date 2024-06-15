<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Category>
 */
class CategoryFactory extends Factory
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
                  'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
                  'status' => $this->faker->randomElement([0, 1]),
            ];

      }
}
