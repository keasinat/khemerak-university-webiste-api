<?php

use App\Debc\Event\Http\Controllers\{EcategoryController,EventController};

Route::group([
    'prefix' => 'events',
    'as' => 'event.',
    'middleware' => 'permission:event-list|event-create|event-edit|event-destroy',
], function() {
    Route::get('/', [EventController::class, 'index'])
        ->name('index')
        ->middleware('permission:event-list');
    Route::get('create', [EventController::class, 'create'])
        ->name('create')
        ->middleware('permission:event-create');
    Route::post('/', [EventController::class, 'store'])->name('store');
    Route::get('edit/{event}', [EventController::class, 'edit'])->name('edit')
        ->middleware('permission:event-edit');
    Route::patch('/{event}', [EventController::class, 'update'])->name('update');
    Route::delete('/{event}', [EventController::class, 'destroy'])
        ->name('destroy')
        ->middleware('permission:event-delete');
    Route::group([
        'prefix' => 'categories',
        'as' => 'category.'
    ], function() {
        Route::get('/', [EcategoryController::class, 'index'])->name('index');
        Route::get('create', [EcategoryController::class, 'create'])->name('create');
        Route::post('/', [EcategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [EcategoryController::class, 'edit'])->name('edit');
        Route::patch('/{ecategory}', [EcategoryController::class, 'update'])->name('update');
        Route::delete('{id}', [EcategoryController::class, 'destroy'])->name('destroy');

    });
});
