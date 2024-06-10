<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

      public function index(Request $request)
      {
            $brands = Brand::latest();

            if (!empty($request->get('keyword'))) {
                  $brands = $brands->where('name', 'like', '%' . $request->get('keyword') . '%');
            }

            $brands = $brands->paginate(10);
            return view("admin.brands.index", compact('brands'));
      }

      public function create()
      {
            return view("admin.brands.create");
      }

      public function store(Request $request)
      {
            try {
                  // Validation des données
                  $request->validate([
                        'name' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:brands',
                        'status' => 'required|boolean',
                  ]);

                  // Création de la marque
                  $brand = new Brand();
                  $brand->name = $request->input('name');
                  $brand->slug = $request->input('slug');
                  $brand->status = $request->input('status');

                  // Sauvegarder la marque dans la base de données
                  $brand->save();

                  $request->session()->flash('success', 'Marque ajoutée avec succès');

                  return redirect()->route('brands.index')->with('success', "Marque ajoutée avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function edit(Request $request, $brandId)
      {
            $brand = Brand::find($brandId);
            if (empty($brand)) {
                  return redirect()->route('brands.index')->with("error", "Marque non trouvée");
            }
            $data['brand'] = $brand;
            return view("admin.brands.edit", $data);
      }

      public function update(Request $request, $brandId)
      {
            try {
                  // Validation des données
                  $request->validate([
                        'name' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:brands,slug,' . $brandId,
                        'status' => 'required|boolean',
                  ]);

                  // Trouver la marque
                  $brand = Brand::find($brandId);

                  // Mise à jour de la marque
                  $brand->name = $request->input('name');
                  $brand->slug = $request->input('slug');
                  $brand->status = $request->input('status');

                  // Sauvegarder la marque dans la base de données
                  $brand->save();

                  $request->session()->flash('success', 'Marque mise à jour avec succès');

                  return redirect()->route('brands.index')->with('success', "Marque mise à jour avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }

      }

      public function destroy($brandId)
      {
            try {
                  // Trouver la marque
                  $brand = Brand::find($brandId);

                  // Supprimer la marque
                  $brand->delete();

                  // Rediriger vers l'index des marques avec un message de succès
                  return redirect()->route('brands.index')->with('success', 'Marque supprimée avec succès');
            } catch (\Exception $e) {
                  // Rediriger vers la page précédente avec un message d'erreur
                  return redirect()->back()->with('error', $e->getMessage());
            }

      }


}
