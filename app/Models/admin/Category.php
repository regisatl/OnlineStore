<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      use HasFactory;
      protected $fillable = ['name', 'slug', 'image', 'status', 'show_home'];

      public function subcategories()
      {
            return $this->hasMany(SubCategory::class);
      }
}
