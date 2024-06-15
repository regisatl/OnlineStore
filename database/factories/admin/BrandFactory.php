<?php

namespace Database\Factories\admin;

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
            return [
                  'name' => $name,
                  'slug' => Str::slug($name),
                  'status' => $this->faker->randomElement([0, 1]),
            ];

      }
}
