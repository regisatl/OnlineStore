<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
      //
      public function index(Request $request)
      {
            $categories = Category::latest();

            if (!empty($request->get('keyword'))) {
                  $categories = $categories->where('name', 'like', '%' . $request->get('keyword') . '%');
            }

            $categories = $categories->paginate(10);

            return view("admin.category.index", compact("categories"));
      }

      public function create()
      {
            return view("admin.category.create");
      }

      public function store(Request $request)
      {
            // dd($request->all(), $request->hasFile('image'));

            // Validation des données
            $request->validate([
                  'name' => 'required|string|max:255',
                  'slug' => 'required|string|max:255|unique:categories',
                  'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                  'status' => 'required|boolean',
            ]);

            // Gestion du téléchargement de l'image
            if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->image->extension();
                  $request->image->move(public_path('images'), $imageName);
            } else {
                  $imageName = null;
            }

            // Création de la catégorie
            $category = new Category();
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->image = $imageName;
            $category->status = $request->input('status');

            // Sauvegarder la catégorie dans la base de données
            $category->save();

            $request->session()->flash('success', 'Catégorie ajoutée avec succès');

            return redirect()->route('categories.index')->with('success', "Catégorie ajoutée avec succès");
      }


      public function show()
      {
      }

      public function edit()
      {
            return "Edit catégorie";
      }

      public function update()
      {
      }


      public function destroy()
      {
            return "Supprimer catégorie";
      }

}
