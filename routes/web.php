<?php

use App\Domains\Category\Http\Controllers\CategoryController;
use App\Domains\Product\http\Controllers\ProductController;
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

// Route::get('/admin', function(){
//     return view('layouts.app');
// });
Route::prefix('admin')->group(function(){
    Route::get('/', function(){
        return view('layouts.app');
    });
    Route::get('products/list', [ProductController::class, 'index'])->name('listPro');
    Route::get('products/create', [ProductController::class, 'create']) ->name('createPro');
    Route::post('products/store', [ProductController::class, 'store'])->name('storePro');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('editPro');
    Route::put('products/update/{id}', [ProductController::class, 'update'])->name('updatePro');
    Route::delete('products/delete/{id}', [ProductController::class, 'delete'])->name('deletePro');

    //Category
    Route::get('categories/list', [CategoryController::class, 'index'])->name('listCate');
    Route::get('categories/create', [CategoryController::class, 'create']) ->name('createCate');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('storeCate');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCate');
    Route::get('categories/edit/{id}', [CategoryController::class, 'editCate'])->name('editCate');
    Route::put('categories/update/{id}', [CategoryController::class, 'updateCate'])->name('updateCate');
    // Route::delete('admin/products/delete/{id}', [ProductController::class, 'delete'])->name('deletePro');

});

