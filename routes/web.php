<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\SubCategoryController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
      return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

      Route::group(['middleware' => 'admin.guest'], function () {

            Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
            Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

      });

      Route::group(['middleware' => 'admin.auth'], function () {

            Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
            Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

            // Category routes
            Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


            // Sub Category routes
            Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
            Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
            Route::post('/subcategories/store', [SubCategoryController::class, 'store'])->name('subcategories.store');
            Route::get('/subcategories/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
            Route::put('/subcategories/update/{id}', [SubCategoryController::class, 'update'])->name('subcategories.update');
            Route::delete('/subcategories/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');

            // Brands routes
            Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
            Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
            Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
            Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
            Route::put('/brands/update/{id}', [BrandController::class, 'update'])->name('brands.update');
            Route::delete('/brands/delete/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

            // Products routes
      });

});
