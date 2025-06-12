<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/market', [MarketController::class, 'index'])->name('market');

Route::get('/tambahData', [MarketController::class, 'tambahData'])->name('tambahData');
Route::post('/insertData', [MarketController::class, 'insertData'])->name('insertData');

Route::get('/tampilData/{id}', [MarketController::class, 'tampilData'])->name('tampilData');
Route::post('/updateData/{id}', [MarketController::class, 'updateData'])->name('updateData');

Route::get('/delete/{id}', [MarketController::class, 'delete'])->name('delete');

Route::get('/beli/{id}', [MarketController::class, 'beli'])->name('beli');
Route::post('/prosesBeli/{id}', [MarketController::class, 'prosesBeli'])->name('prosesBeli');