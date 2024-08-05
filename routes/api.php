<?php

use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Employe\EmployeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/catalog/category/unique/{id}', [CategoryController::class,'getById'])->name('get.category');
Route::get('/catalog/category', [CategoryController::class,'index'])->name('categories');
Route::post('/catalog/category/store', [CategoryController::class,'store'])->name('store.category');
Route::put('/catalog/category/update/{id}', [CategoryController::class,'update'])->name('update.category');
Route::delete('/catalog/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');

Route::get('/catalog/brand/unique/{id}', [BrandController::class,'getById'])->name('get.brand');
Route::get('/catalog/brand', [BrandController::class,'index'])->name('brands');
Route::post('/catalog/brand/store', [BrandController::class,'store'])->name('store.brand');
Route::put('/catalog/brand/update/{id}', [BrandController::class,'update'])->name('update.brand');


Route::get('/employe/all', [EmployeController::class,'index'])->name('get.employe');
Route::post('/employe/store' , [EmployeController::class, 'store'])->name('store.employe');
