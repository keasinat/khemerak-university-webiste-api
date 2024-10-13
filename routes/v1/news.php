<?php

use App\Debc\News\Http\Controllers\API\NewsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'news'
], function() {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('category', [NewsController::class, 'categories']);
    Route::get('{id}', [NewsController::class, 'show']);
    Route::get('category/{id}', [NewsController::class, 'categoryById']);

});
