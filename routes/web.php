
<?php

use App\Domains\Auth\Http\Controllers\AdminController;
use App\Domains\Auth\Http\Controllers\AuthenController;
use App\Domains\Auth\Http\Middleware\IsAdmin;
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
Route::prefix('v1')

    ->group(function () {
        Route::get('/', function () {
            return view('auth.login');
        });

        Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('admin.app');
            Route::prefix('products')
                ->group(function () {
                    Route::get('list', [ProductController::class, 'index'])->name('listPro');
                    Route::get('create', [ProductController::class, 'create'])->name('createPro');
                    Route::post('store', [ProductController::class, 'store'])->name('storePro');
                    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('editPro');
                    Route::put('update/{id}', [ProductController::class, 'update'])->name('updatePro');
                    Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('deletePro');
                });
            Route::prefix('categories')
                ->group(function () {
                    Route::get('list', [CategoryController::class, 'index'])->name('listCate');
                    Route::get('create', [CategoryController::class, 'create'])->name('createCate');
                    Route::post('store', [CategoryController::class, 'store'])->name('storeCate');
                    Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('deleteCate');
                    Route::get('edit/{id}', [CategoryController::class, 'editCate'])->name('editCate');
                    Route::put('update/{id}', [CategoryController::class, 'updateCate'])->name('updateCate');
                    // Route::delete('admin/products/delete/{id}', [ProductController::class, 'delete'])->name('deletePro');
                });
        });




        Route::get('login', [AuthenController::class, 'showFormLogin'])->name('login');
        Route::post('login', [AuthenController::class, 'handleLogin'])->name('login');;
        Route::get('register', [AuthenController::class, 'showFormRegister'])->name('register');
        Route::post('register', [AuthenController::class, 'handleRegister']);
        Route::post('logout', [AuthenController::class, 'logout'])->name('logout');
        //error
        Route::get('403', [AuthenController::class, 'handleLogin'])->name('403');

        Route::get('/403', function () {
            return response()->view('error.403', [], 403);
        })->name('error.403');
        
    });
