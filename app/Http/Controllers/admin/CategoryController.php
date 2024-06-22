<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

      public function index(Request $request)
      {
            $categories = Category::latest('id');

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

            try {
                  // Validation des données
                  $request->validate([
                        'name' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:categories',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        'status' => 'required|boolean',
                        'show_home' => 'required|in:Yes,No',
                  ]);

                  // Gestion du téléchargement de l'image
                  if ($request->hasFile('image')) {
                        $imageName = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('images/categories'), $imageName);
                  } else {
                        $imageName = null;
                  }

                  // Création de la catégorie
                  $category = new Category();
                  $category->name = $request->input('name');
                  $category->slug = $request->input('slug');
                  $category->image = $imageName;
                  $category->status = $request->input('status');
                  $category->show_home = $request->input('show_home');

                  // Sauvegarder la catégorie dans la base de données
                  $category->save();

                  $request->session()->flash('success', 'Catégorie ajoutée avec succès');

                  return redirect()->route('categories.index')->with('success', "Catégorie ajoutée avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function show()
      {
      }

      public function edit(Request $request, $categoryId)
      {
            $category = Category::find($categoryId);
            if (empty($category)) {
                  return redirect()->route('categories.index')->with("error", "Catégorie non trouvée");
            }
            return view("admin.category.edit", compact('category'));
      }

      public function update(Request $request, $categoryId)
      {
            try {
                  // Validation des données
                  $request->validate([
                        'name' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:categories,slug,' . $categoryId,
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        'show_home' => 'required|in:Yes,No',
                        'status' => 'required|boolean',
                  ]);

                  // Trouver la catégorie
                  $category = Category::find($categoryId);

                  // Gestion du téléchargement de l'image
                  if ($request->hasFile('image')) {
                        $imageName = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('images/categories'), $imageName);
                  } else {
                        $imageName = $category->image;
                  }

                  // Mise à jour de la catégorie
                  $category->name = $request->input('name');
                  $category->slug = $request->input('slug');
                  $category->image = $imageName;
                  $category->show_home = $request->input('show_home');
                  $category->status = $request->input('status');

                  // Sauvegarder la catégorie dans la base de données
                  $category->save();

                  $request->session()->flash('success', 'Catégorie mise à jour avec succès');

                  return redirect()->route('categories.index')->with('success', "Catégorie mise à jour avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function destroy($categoryId)
      {
            try {
                  // Trouver la catégorie
                  $category = Category::find($categoryId);

                  // Supprimer la catégorie
                  $category->delete();

                  // Rediriger vers l'index des catégories avec un message de succès
                  return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
            } catch (\Exception $e) {
                  // Rediriger vers la page précédente avec un message d'erreur
                  return redirect()->back()->with('error', $e->getMessage());
            }
      }

}
