<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Brand>
 */
class BrandFactory extends Factory
{
      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array
      {
            $name = $this->faker->company;
            return [
                  'name' => $name,
                  'slug' => Str::slug($name),
                  'status' => $this->faker->randomElement([0, 1]), 
            ];
      }
}
