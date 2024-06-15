<?php

namespace Database\Seeders;

use App\Models\admin\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
      /**
       * Run the database seeds.
       */
      public function run(): void
      {
           SubCategory::factory()->count(30)->create();
      }
}
