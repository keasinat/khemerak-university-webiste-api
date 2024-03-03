<?php

use App\Debc\Event\Http\Controller\API\EventController;


Route::group([
    'prefix' => 'events'
], function() {
    Route::get('/', [EventController::class, 'index']);
    Route::get('{id}', [EventController::class, 'show']);
});