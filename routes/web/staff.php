<?php

use App\Debc\Staff\Http\Controllers\StaffController;

Route::group([
    'prefix' => 'staffs',
    'as' => 'staff.',
    'middleware' => 'permission:staff-list|staff-create|staff-edit|staff-delete'
], function() {
    Route::get('/', [StaffController::class, 'index'])
        ->name('index')
        ->middleware('permission:staff-list');
    Route::get('create', [StaffController::class, 'create'])
        ->name('create')
        ->middleware('permission:staff-create');
    Route::post('/', [StaffController::class, 'store'])
        ->name('store');
    Route::get('edit/{staff}', [StaffController::class, 'edit'])
        ->name('edit')
        ->middleware('permission:staff-edit');
    Route::patch('update/{staff}', [StaffController::class, 'update'])
        ->name('update');
    Route::delete('{staff}', [StaffController::class, 'destroy'])
        ->name('destroy')
        ->middleware('permission:staff-delete');
});