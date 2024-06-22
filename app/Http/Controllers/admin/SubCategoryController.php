<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\SubCategory;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

      public function index(Request $request)
      {
            $subCategories = SubCategory::with('category')->latest('id');

            if (!empty($request->get('keyword'))) {
                  $subCategories = $subCategories->where('name', 'like', '%' . $request->get('keyword') . '%');
            }

            $subCategories = $subCategories->paginate(10);
            return view("admin.sub-category.index", compact('subCategories'));
      }

      public function create()
      {
            $categories = Category::orderBy('name', 'asc')->get();
            $data['categories'] = $categories;

            return view("admin.sub-category.create", $data);
      }

      public function store(Request $request)
      {
            try {
                  // Validation des données
                  $request->validate([
                        'name' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:sub_categories',
                        'status' => 'required|boolean',
                        'show_home' => 'required|in:Yes,No',
                        'category_id' => 'required',
                  ]);

                  // Création de la sous catégorie
                  $subcategory = new SubCategory();
                  $subcategory->name = $request->input('name');
                  $subcategory->slug = $request->input('slug');
                  $subcategory->status = $request->input('status');
                  $subcategory->show_home = $request->input('show_home');
                  $subcategory->category_id = $request->input('category_id');

                  // Sauvegarder la sous catégorie dans la base de données
                  $subcategory->save();

                  $request->session()->flash('success', 'Sous catégorie ajoutée avec succès');

                  return redirect()->route('subcategories.index')->with('success', "Sous catégorie ajoutée avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function edit(Request $request, $subCategoryId)
      {
            $subCategory = SubCategory::find($subCategoryId);
            if (empty($subCategory)) {
                  return redirect()->route('subcategories.index')->with("error", "Sous catégorie non trouvée");
            }
            $categories = Category::orderBy('name', 'asc')->get();
            $data['categories'] = $categories;
            $data['subCategory'] = $subCategory;
            return view("admin.sub-category.edit", $data);
      }

      public function update(Request $request, $subCategoryId)
      {
            try {
                  // Validation des données
                  $request->validate([
                        'name' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:sub_categories,slug,' . $subCategoryId,
                        'status' => 'required|boolean',
                        'show_home' => 'required|in:Yes,No',
                        'category_id' => 'required'
                  ]);

                  // Trouver la catégorie
                  $subCategory = SubCategory::find($subCategoryId);

                  // Mise à jour de la catégorie
                  $subCategory->name = $request->input('name');
                  $subCategory->slug = $request->input('slug');
                  $subCategory->status = $request->input('status');
                  $subCategory->show_home = $request->input('show_home');
                  $subCategory->category_id = $request->input('category_id');

                  // Sauvegarder la catégorie dans la base de données
                  $subCategory->save();

                  $request->session()->flash('success', 'Sous catégorie mise à jour avec succès');

                  return redirect()->route('subcategories.index')->with('success', "Sous catégorie mise à jour avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function destroy($subCategoryId)
      {
            try {
                  // Trouver la catégorie
                  $subCategory = SubCategory::find($subCategoryId);

                  // Supprimer la catégorie
                  $subCategory->delete();

                  // Rediriger vers l'index des catégories avec un message de succès
                  return redirect()->route('subcategories.index')->with('success', 'Sous catégorie supprimée avec succès');
            } catch (\Exception $e) {
                  // Rediriger vers la page précédente avec un message d'erreur
                  return redirect()->back()->with('error', $e->getMessage());
            }
      }

}
