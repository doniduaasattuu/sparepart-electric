<?php

use App\Http\Controllers\PartController;
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

Route::get('/', [PartController::class, 'showAllParts'])->name('home');

Route::get('/add-product-qty', [PartController::class, 'addProductQuantity']);

Route::get('/scanner', function () {
    return response()->view('utility.scanner', [
        'title' => 'Scan Product',
    ]);
});

Route::get('/product-detail/{id}', [PartController::class, 'productDetail']);

Route::post('/update-product', [PartController::class, 'updateProduct']);
// Route::post('/update-or-create-product', [PartController::class, 'updateOrCreateProduct']);

Route::get('/registry-product', [PartController::class, 'registryProduct']);
Route::post('/registry-product', [PartController::class, 'registerProduct']);

Route::post('/delete-product', [PartController::class, 'deleteProduct']);

Route::post('/search-product', [PartController::class, 'searchProduct']);
