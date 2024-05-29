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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        if ($validator->passes()) {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->save();

            $request->session()->flash('success', 'Catégorie ajoutée avec succès');

            return redirect()->route('categories.index')->with('success', "Catégorie ajoutée avec succès");

        } else {
            return redirect()->route('categories.index')->with('error', "Erreur lors de l'ajout de la catégorie");
        }

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
