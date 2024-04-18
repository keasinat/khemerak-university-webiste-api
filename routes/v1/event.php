<?php

use App\Debc\Event\Http\Controllers\API\EventController;

Route::group([
    'prefix' => 'events'
], function() {
    Route::get('/', [EventController::class, 'index']);
    Route::get('{id}', [EventController::class, 'show']);
});