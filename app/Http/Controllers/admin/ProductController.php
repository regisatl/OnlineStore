<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Brand;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

      public function index(Request $request)
      {
            $products = Product::latest('id');

            if (!empty($request->get('keyword'))) {
                  $products = $products->where('title', 'like', '%' . $request->get('keyword') . '%');
            }

            $products = $products->paginate(10);
            return view("admin.products.index", compact("products"));
      }

      public function create()
      {
            $categories = Category::orderBy('name', 'asc')->get();
            $subCategories = SubCategory::orderBy('name', 'asc')->get();
            $brands = Brand::orderBy('name', 'asc')->get();

            $data['categories'] = $categories;
            $data['subCategories'] = $subCategories;
            $data['brands'] = $brands;

            return view("admin.products.create", $data);
      }

      public function store(Request $request)
      {

            try {
                  // Validation des données
                  $request->validate([
                        'title' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:products',
                        'description' => 'nullable|string',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'price' => 'required|numeric',
                        'compare_price' => 'nullable|numeric',
                        'category_id' => 'required|integer',
                        'sub_category_id' => 'nullable|integer',
                        'brand_id' => 'nullable|integer',
                        'is_featured' => 'required|in:Yes,No',
                        'sku' => 'required|string|max:255',
                        'barcode' => 'nullable|string|max:255',
                        'track_qty' => 'required|in:Yes,No',
                        'qty' => 'nullable|integer',
                        'status' => 'required|integer',
                  ]);

                  // Gestion du téléchargement de l'image
                  if ($request->hasFile('image')) {
                        $imageName = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('images/produits'), $imageName);
                  } else {
                        $imageName = null;
                  }

                  // Création du produit
                  $product = new Product();
                  $product->title = $request->input('title');
                  $product->slug = $request->input('slug');
                  $product->description = $request->input('description');
                  $product->image = $imageName;
                  $product->price = $request->input('price');
                  $product->compare_price = $request->input('compare_price');
                  $product->category_id = $request->input('category_id');
                  $product->sub_category_id = $request->input('sub_category_id');
                  $product->brand_id = $request->input('brand_id');
                  $product->is_featured = $request->input('is_featured');
                  $product->sku = $request->input('sku');
                  $product->barcode = $request->input('barcode');
                  $product->track_qty = $request->input('track_qty');
                  $product->qty = $request->input('qty');
                  $product->status = $request->input('status');

                  // Sauvegarder le produit dans la base de données
                  $product->save();
                  $request->session()->flash('success', 'Produit ajouté avec succès');

                  return redirect()->route('products.index')->with('success', "Produit ajouté avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function edit(Request $request, $productId)
      {
            $product = Product::find($productId);
            if (empty($product)) {
                  return redirect()->route('products.index')->with("error", "Produit non trouvé");
            }
            $categories = Category::orderBy('name', 'asc')->get();
            $brands = Brand::orderBy('name', 'asc')->get();
            $data['categories'] = $categories;
            $data['brands'] = $brands;
            $data['product'] = $product;
            return view("admin.products.edit", $data);
      }

      public function update(Request $request, $productId)
      {
            try {
                  // Validation des données
                  $request->validate([
                        'title' => 'required|string|max:255',
                        'slug' => 'required|string|max:255|unique:products,slug,' . $productId,
                        'description' => 'nullable|string',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'price' => 'required|numeric',
                        'compare_price' => 'nullable|numeric',
                        'category_id' => 'required|integer',
                        'sub_category_id' => 'nullable|integer',
                        'brand_id' => 'nullable|integer',
                        'is_featured' => 'required|in:Yes,No',
                        'sku' => 'required|string|max:255',
                        'barcode' => 'nullable|string|max:255',
                        'track_qty' => 'required|in:Yes,No',
                        'qty' => 'nullable|integer',
                        'status' => 'required|integer',
                  ]);

                  $product = Product::find($productId);

                  // Gestion du téléchargement de l'image
                  if ($request->hasFile('image')) {
                        $imageName = time() . '.' . $request->image->extension();
                        $request->image->move(public_path('images/products'), $imageName);
                        $product->image = $imageName;
                  }

                  // Mise à jour du produit
                  $product->title = $request->input('title');
                  $product->slug = $request->input('slug');
                  $product->description = $request->input('description');
                  $product->price = $request->input('price');
                  $product->compare_price = $request->input('compare_price');
                  $product->category_id = $request->input('category_id');
                  $product->sub_category_id = $request->input('sub_category_id');
                  $product->brand_id = $request->input('brand_id');
                  $product->is_featured = $request->input('is_featured');
                  $product->sku = $request->input('sku');
                  $product->barcode = $request->input('barcode');
                  $product->track_qty = $request->input('track_qty');
                  $product->qty = $request->input('qty');
                  $product->status = $request->input('status');

                  // Sauvegarder le produit dans la base de données
                  $product->save();
                  $request->session()->flash('success', 'Produit mis à jour avec succès');

                  return redirect()->route('products.index')->with('success', "Produit mis à jour avec succès");
            } catch (\Exception $e) {
                  \DB::rollBack();
                  return redirect()->back()->with("error", $e->getMessage());
            }
      }

      public function destroy($productId)
      {
            try {
                  $product = Product::find($productId);
                  $product->delete();

                  return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès');
            } catch (\Exception $e) {
                  return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du produit : ' . $e->getMessage());
            }
      }


}
