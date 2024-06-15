<?php

namespace Database\Factories;

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
                        'category' => 'Footwear',
                        'sub_category' => 'Sneakers',
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
                        'category' => 'Footwear',
                        'sub_category' => 'Sneakers',
                        'brand' => 'Adidas',
                        'price' => 180.00,
                        'compare_price' => 220.00,
                        'sku' => 'AD-UB21-001',
                        'barcode' => '1234567890124',
                        'qty' => 50,
                        'is_featured' => 'No',
                  ],
                  [
                        'title' => 'Gucci GG Marmont Bag',
                        'category' => 'Accessories',
                        'sub_category' => 'Bags',
                        'brand' => 'Gucci',
                        'price' => 1200.00,
                        'compare_price' => 1500.00,
                        'sku' => 'GC-GGM-001',
                        'barcode' => '1234567890125',
                        'qty' => 20,
                        'is_featured' => 'Yes',
                  ],
                  [
                        'title' => 'Versace Medusa Watch',
                        'category' => 'Accessories',
                        'sub_category' => 'Watches',
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
                        'category' => 'Footwear',
                        'sub_category' => 'Sneakers',
                        'brand' => 'Puma',
                        'price' => 70.00,
                        'compare_price' => 90.00,
                        'sku' => 'PM-SC-001',
                        'barcode' => '1234567890127',
                        'qty' => 200,
                        'is_featured' => 'Yes',
                  ],
            ];

            $product = $this->faker->randomElement($products);

            return [
                  'title' => $product['title'],
                  'slug' => Str::slug($product['title']),
                  'description' => $this->faker->paragraph,
                  'image' => $this->faker->imageUrl(640, 480, 'fashion', true, $product['title']),
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
                  'status' => 1,
            ];
      }
}
