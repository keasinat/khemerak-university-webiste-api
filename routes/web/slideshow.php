<?php

use App\Debc\Slideshow\Http\Controllers\SlideshowController;

Route::group([
    'prefix' => 'slideshows',
    'as' => 'slideshow.',
    'middleware' => 'permission:slideshow-list|slideshow-create|slideshow-edit|slideshow-delete'
], function() {
    Route::get('/', [SlideshowController::class, 'index'])
        ->name('index')
        ->middleware('permission:slideshow-list');
    Route::get('create', [SlideshowController::class, 'create'])
        ->name('create')
        ->middleware('permission:slideshow-create');
    Route::post('/', [SlideshowController::class, 'store'])
        ->name('store');
    Route::get('edit/{slideshow}', [SlideshowController::class, 'edit'])
        ->name('edit')
        ->middleware('permission:slideshow-edit');
    Route::patch('update/{slideshow}', [SlideshowController::class, 'update'])
        ->name('update');
    Route::delete('{slideshow}', [SlideshowController::class, 'destroy'])
        ->name('destroy')
        ->middleware('permission:slideshow-delete');
});