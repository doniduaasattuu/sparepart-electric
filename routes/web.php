<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'returnProducts'])->name('home');

Route::get('/add-product-qty', [ProductController::class, 'addProductQuantity']);

Route::get('/scanner', function () {
    return response()->view('utility.scanner', [
        'title' => 'Scan Product',
    ]);
});

Route::get('/product-detail/{id}', [ProductController::class, 'productDetail']);

Route::post('/update-product', [ProductController::class, 'updateProduct']);
// Route::post('/update-or-create-product', [ProductController::class, 'updateOrCreateProduct']);

Route::get('/registry-product', [ProductController::class, 'registryProduct']);
Route::post('/registry-product', [ProductController::class, 'registerProduct']);

Route::post('/delete-product', [ProductController::class, 'deleteProduct']);

Route::post('/search-product', [ProductController::class, 'searchProduct']);
