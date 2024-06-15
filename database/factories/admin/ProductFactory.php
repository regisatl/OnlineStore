<?php

namespace Database\Factories\admin;

use App\Models\admin\Brand;
use App\Models\admin\Category;
use App\Models\admin\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Product>
 */
class ProductFactory extends Factory
{
      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array
      {
            $products = [
                  [
                        'title' => 'Nike Air Max 270',
                        'category' => 'Chaussures',
                        'sub_category' => 'Baskets',
                        'brand' => 'Nike',
                        'price' => 150.00,
                        'compare_price' => 200.00,
                        'sku' => 'NK-270-001',
                        'barcode' => '1234567890123',
                        'qty' => 100,
                        'is_featured' => 'Yes',
                  ],
                  [
                        'title' => 'Adidas Ultraboost 21',
                        'category' => 'Chaussures',
                        'sub_category' => 'Baskets',
                        'brand' => 'Adidas',
                        'price' => 180.00,
                        'compare_price' => 220.00,
                        'sku' => 'AD-UB21-001',
                        'barcode' => '1234567890124',
                        'qty' => 50,
                        'is_featured' => 'No',
                  ],
                  [
                        'title' => 'Sac GG Marmont Gucci',
                        'category' => 'Accessoires',
                        'sub_category' => 'Sacs',
                        'brand' => 'Gucci',
                        'price' => 1200.00,
                        'compare_price' => 1500.00,
                        'sku' => 'GC-GGM-001',
                        'barcode' => '1234567890125',
                        'qty' => 20,
                        'is_featured' => 'Yes',
                  ],
                  [
                        'title' => 'Montre Medusa Versace',
                        'category' => 'Accessoires',
                        'sub_category' => 'Montres',
                        'brand' => 'Versace',
                        'price' => 800.00,
                        'compare_price' => 1000.00,
                        'sku' => 'VS-MW-001',
                        'barcode' => '1234567890126',
                        'qty' => 10,
                        'is_featured' => 'No',
                  ],
                  [
                        'title' => 'Puma Suede Classic',
                        'category' => 'Chaussures',
                        'sub_category' => 'Baskets',
                        'brand' => 'Puma',
                        'price' => 70.00,
                        'compare_price' => 90.00,
                        'sku' => 'PM-SC-001',
                        'barcode' => '1234567890127',
                        'qty' => 200,
                        'is_featured' => 'Yes',
                  ],
                  [
                        'title' => 'iPhone 13 Pro',
                        'category' => 'Électronique',
                        'sub_category' => 'Smartphones',
                        'brand' => 'Apple',
                        'price' => 1099.00,
                        'compare_price' => 1199.00,
                        'sku' => 'APL-IP13P-001',
                        'barcode' => '1234567890128',
                        'qty' => 30,
                        'is_featured' => 'Yes',
                  ],
                  [
                        'title' => 'MacBook Pro 16',
                        'category' => 'Électronique',
                        'sub_category' => 'Ordinateurs portables',
                        'brand' => 'Apple',
                        'price' => 2499.00,
                        'compare_price' => 2699.00,
                        'sku' => 'APL-MBP16-001',
                        'barcode' => '1234567890129',
                        'qty' => 15,
                        'is_featured' => 'No',
                  ],
                  [
                        'title' => 'TV OLED LG 65"',
                        'category' => 'Électronique',
                        'sub_category' => 'Télévisions',
                        'brand' => 'LG',
                        'price' => 1999.00,
                        'compare_price' => 2299.00,
                        'sku' => 'LG-OLED65-001',
                        'barcode' => '1234567890130',
                        'qty' => 25,
                        'is_featured' => 'Yes',
                  ],
                  [
                        'title' => 'Canon EOS R5',
                        'category' => 'Électronique',
                        'sub_category' => 'Appareils photo',
                        'brand' => 'Canon',
                        'price' => 3899.00,
                        'compare_price' => 4099.00,
                        'sku' => 'CN-EOSR5-001',
                        'barcode' => '1234567890131',
                        'qty' => 12,
                        'is_featured' => 'No',
                  ],
                  [
                        'title' => 'Parfum Chanel N°5',
                        'category' => 'Beauté',
                        'sub_category' => 'Parfums',
                        'brand' => 'Chanel',
                        'price' => 120.00,
                        'compare_price' => 150.00,
                        'sku' => 'CH-N5-001',
                        'barcode' => '1234567890132',
                        'qty' => 80,
                        'is_featured' => 'Yes',
                  ],
            ];

            $product = $this->faker->randomElement($products);

            return [
                  'title' => $product['title'],
                  'slug' => Str::slug($product['title']),
                  'description' => $this->faker->sentence(),
                  'image' => $this->faker->imageUrl(640, 480, 'product', true, $product['title']),
                  'price' => $product['price'],
                  'compare_price' => $product['compare_price'],
                  'category_id' => Category::where('name', $product['category'])->first()->id ?? Category::factory(),
                  'sub_category_id' => SubCategory::where('name', $product['sub_category'])->first()->id ?? SubCategory::factory(),
                  'brand_id' => Brand::where('name', $product['brand'])->first()->id ?? Brand::factory(),
                  'is_featured' => $product['is_featured'],
                  'sku' => $product['sku'],
                  'barcode' => $product['barcode'],
                  'track_qty' => 'Yes',
                  'qty' => $product['qty'],
                  'status' => $this->faker->randomElement([0, 1]),
            ];
      }

}
