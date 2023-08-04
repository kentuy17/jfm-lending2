<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CollectionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'client'], function() {
        Route::get('/loan-status', [ClientController::class, 'index'])->name('clients');
        Route::get('/loans', [ClientController::class, 'getLoans'])->name('loans');
    });

    Route::get('/collection', [CollectionController::class, 'index'])->name('collection');
    Route::get('/collection/fetch', [CollectionController::class, 'getCollections']);
    Route::get('/collection/ktdata', [CollectionController::class, 'ktCollections']);
    Route::post('/collection/posting', [CollectionController::class, 'posting']);
    Route::post('/collection/excel', [CollectionController::class, 'getExcelCollection']);
    Route::post('/collection/paid', [CollectionController::class, 'updateCollectionItem']);
});

require __DIR__.'/auth.php';
