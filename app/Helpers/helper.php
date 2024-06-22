<?php
use App\Models\admin\Category;

function getCategories()
{
      return Category::orderBy('name', 'asc')->with('subcategories')->where('show_home', 'Yes')->get();
}

