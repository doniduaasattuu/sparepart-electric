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

Route::get('/part-detail/{id}', [PartController::class, 'partDetail']);

Route::post('/upsert-part', [PartController::class, 'upsertPart']);
// Route::post('/update-or-create-product', [PartController::class, 'updateOrCreateProduct']);

Route::get('/registry-part', [PartController::class, 'registryPart']);
Route::post('/registry-part', [PartController::class, 'registerPart']);

Route::post('/delete-part', [PartController::class, 'deletePart']);

Route::post('/search-part', [PartController::class, 'searchPart']);
Route::get('/id-check/{id}', [PartController::class, 'idCheck']);

// Route::get('/images/{part_id}', [PartController::class, 'getImage']);
