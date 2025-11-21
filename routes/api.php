<?php

use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\CatalogDetailController;
use App\Http\Controllers\Api\CatalogDettailController;
use App\Http\Controllers\Api\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('get-titles', [NewsController::class, 'getTitles']);
    Route::get('/{new_id}', [NewsController::class, 'show']);
    Route::post('/', [NewsController::class, 'store']);
    Route::put('/{new_id}', [NewsController::class, 'update']);
    Route::delete('/{new_id}', [NewsController::class, 'destroy']);
});


Route::prefix('catalogs')->group(function () {
    Route::get('/', [CatalogController::class, 'index']);
    
    Route::get('/{id}', [CatalogController::class, 'show']);
    Route::post('/', [CatalogController::class, 'store']);
    Route::put('/{id}', [CatalogController::class, 'update']);
    Route::delete('/{id}', [CatalogController::class, 'destroy']);
});

Route::prefix('catalog-details')->group(function () {
    Route::get('/', [CatalogDetailController::class, 'index']);
    Route::get('get-news/{catalog_detail_id}', [CatalogDetailController::class, 'getNews']);
    Route::get('/{id}', [CatalogDetailController::class, 'show']);
    Route::post('/', [CatalogDetailController::class, 'store']);
    Route::put('/{id}', [CatalogDetailController::class, 'update']);
    Route::delete('/{id}', [CatalogDetailController::class, 'destroy']);
});