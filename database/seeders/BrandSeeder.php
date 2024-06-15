<?php

namespace Database\Seeders;

use App\Models\admin\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
      /**
       * Run the database seeds.
       */
      public function run(): void
      {
            Brand::factory()->count(30)->create();
      }
}
