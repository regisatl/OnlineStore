<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      use HasFactory;

      protected $fillable = [
            'title',
            'slug',
            'description',
            'image',
            'price',
            'compare_price',
            'category_id',
            'sub_category_id',
            'brand_id',
            'is_featured',
            'sku',
            'barcode',
            'track_qty',
            'qty',
            'status',
      ];

      public function category()
      {
            return $this->belongsTo(Category::class);
      }

      public function subCategory()
      {
            return $this->belongsTo(SubCategory::class);
      }

      public function brand()
      {
            return $this->belongsTo(Brand::class);
      }

}
