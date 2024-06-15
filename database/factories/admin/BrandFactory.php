<?php

namespace Database\Factories\admin;

use App\Models\admin\Brand;
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
            $brands = [
                  'Nike',
                  'Adidas',
                  'Puma',
                  'Gucci',
                  'Versace',
                  'Apple',
                  'Samsung',
                  'Sony',
                  'LG',
                  'Dell',
                  'HP',
                  'Chanel',
                  'Dior',
                  'L\'Oréal',
                  'Reebok'
            ];
            $name = $this->faker->randomElement($brands);

            // Vérifier si le nom existe déjà
            $count = Brand::where('name', $name)->count();

            // Si le nom existe, générer un autre nom jusqu'à en trouver un unique
            while ($count > 0) {
                  $name = $this->faker->randomElement($brands);
                  $count = Brand::where('name', $name)->count();
            }
            return [
                  'name' => $name,
                  'slug' => Str::slug($name),
                  'status' => $this->faker->randomElement([0, 1]),
            ];

      }
}
