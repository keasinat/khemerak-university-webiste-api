<?php

use App\Debc\Slideshow\Http\Controllers\API\SlideshowController;

Route::group([
    'prefix' => 'slideshow',
    'as' => 'slideshow'
], function() {
    Route::get('/', [SlideshowController::class, 'index']);
});