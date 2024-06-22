<?php

namespace Database\Factories\admin;

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
      public function definition()
      {
            $subCategories = [
                  'T-shirts',
                  'Baskets',
                  'Sacs',
                  'Montres',
                  'Vestes',
                  'Ordinateurs portables',
                  'Smartphones',
                  'Casques',
                  'Ustensiles de cuisine',
                  'Maquillage',
                  'Parfums',
                  'Vêtements de sport',
                  'Figurines',
                  'Bibliothèques',
                  'Accessoires de voiture'
            ];

            $name = $this->faker->randomElement($subCategories);

            return [
                  'name' => $name,
                  'slug' => Str::slug($name),
                  'status' => $this->faker->randomElement([0, 1]),
                  'show_home' => $this->faker->randomElement(['Yes', 'No']),
                  'category_id' => Category::factory(),
            ];
      }

}
