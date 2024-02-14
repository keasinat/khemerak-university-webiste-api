<?php

use App\Http\Controllers\RoleController;

/**
 * Role Route
 */
Route::group([
    'prefix' => 'roles',
    'as' => 'roles.',
    'middleware' => 'permission:role-list|role-create|role-edit|role-delete'
], function() {
    Route::get('/', [RoleController::class, 'index'])
        ->name('index')
        ->middleware('permission:role-list');
    Route::get('create', [RoleController::class, 'create'])
        ->name('create')
        ->middleware('permission:role-create');
    Route::post('/', [RoleController::class, 'store'])
        ->name('store');
    Route::get('{role}/edit', [RoleController::class, 'edit'])
        ->name('edit')
        ->middleware('permission:role-edit');
    Route::patch('{role}', [RoleController::class, 'update'])
        ->name('update');
    Route::delete('{role}', [RoleController::class, 'destroy'])
        ->name('destroy')
        ->middleware('permission:role-delete');
});
