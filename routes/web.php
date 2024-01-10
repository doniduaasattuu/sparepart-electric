<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'showAllParts'])->name('home');
Route::get('/part-detail/{id}', [HomeController::class, 'partDetail']);
Route::post('/upsert-part', [PartController::class, 'upsertPart']);
Route::get('/registry-part', [HomeController::class, 'registryPart']);
Route::get('/delete-part/{id}', [HomeController::class, 'deletePart']);
Route::post('/search-part', [PartController::class, 'searchPart']);
Route::get('/id-check/{id}', [PartController::class, 'idCheck']);
