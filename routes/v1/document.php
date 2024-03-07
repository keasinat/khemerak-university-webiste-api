<?php

use App\Debc\Document\Http\Controllers\API\DocumentController;


Route::group([
        'prefix' => 'documents',
    ], function() {
        Route::get('/', [DocumentController::class, 'index']);
        Route::get('category', [DocumentController::class, 'category']);
        Route::get('category/{slug}', [DocumentController::class, 'categorySlug']);

    });