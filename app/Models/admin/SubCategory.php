<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
      use HasFactory;
      protected $fillable = ['name', 'slug', 'status', 'show_home', 'category_id'];

      public function category()
      {
            return $this->belongsTo(Category::class, 'category_id', 'id');
      }
}
