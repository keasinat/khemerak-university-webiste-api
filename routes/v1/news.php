<?php

use App\Http\Controllers\API\NewsController;

Route::group([
    'prefix' => 'news'
], function() {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('{id}', [NewsController::class, 'show'])->name('news.show');
});