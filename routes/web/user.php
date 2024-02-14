<?php

use App\Http\Controllers\UserController;

/**
 * User Route
 */
Route::group([
    'prefix' => 'users',
    'as' => 'users.',
    'middleware' => 'permission:user-list|user-create|user-edit|user-delete'
], function() {
    Route::get('/', [UserController::class, 'index'])
        ->name('index')
        ->middleware('permission:user-list');
    Route::get('/create', [UserController::class, 'create'])
        ->name('create')
        ->middleware('permission:user-create');
    Route::post('/', [UserController::class, 'store'])
        ->name('store');
    Route::get('{user}/edit', [UserController::class, 'edit'])
        ->name('edit')
        ->middleware('permission:user-edit');
    Route::patch('{user}', [UserController::class, 'update'])->name('update');
    Route::delete('{user}', [UserController::class, 'destroy'])
        ->name('destroy')
        ->middleware('permission:user-delete');
});
