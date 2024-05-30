<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\ImageControler;
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

            Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

            Route::post('/uploadImage', [ImageControler::class, 'upload'])->name('categories.upload');

            Route::get('/getslug', function (Request $request) {
                  $slug = '';
                  if (!empty(($request->title))) {
                        $slug = Str::slug($request->title);
                  }
                  return response()->json([
                        'status' => true,
                        'slug' => $slug
                  ]);
            })->name('getslug');
      });

});
