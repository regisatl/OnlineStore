<?php

namespace Database\Factories\admin;

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
            $categories = [
                  'Vêtements',
                  'Chaussures',
                  'Accessoires',
                  'Électronique',
                  'Appareils ménagers',
                  'Beauté',
                  'Sport',
                  'Jouets',
                  'Meubles',
                  'Livres',
                  'Automobile'
            ];
            $name = $this->faker->randomElement($categories);
            return [
                  'name' => $name,
                  'slug' => Str::slug($name),
                  // 'image' => $this->faker->imageUrl(640, 480, 'category', true, $name),
                  'status' => $this->faker->randomElement([0, 1]),
            ];
      }

}
