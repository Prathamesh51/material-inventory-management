<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InwardQuantitiesController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CategoryController::class, 'getMaterials']);

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::group(['prefix' => 'materials'], function () {
    Route::get('/{category_id}', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::get('/create/{category_id}', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/store', [MaterialController::class, 'store'])->name('materials.store');
    Route::put('/{id}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');
});

Route::group(['prefix' => 'inward-quantities'], function () {
    Route::get('/', [InwardQuantitiesController::class, 'index'])->name('inward_quantities.index');
    Route::get('/create', [InwardQuantitiesController::class, 'create'])->name('inward_quantities.create');
    Route::post('/', [InwardQuantitiesController::class, 'store'])->name('inward_quantities.store');
    Route::delete('/{id}', [InwardQuantitiesController::class, 'destroy'])->name('inward_quantities.destroy');
});