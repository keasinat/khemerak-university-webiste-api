<?php

use App\Debc\Partner\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'partners',
    'as' => 'partner.',
    'middleware' => 'permission:partner-create|partner-list|partner-edit|partner-delete'
], function() {
    Route::get('/', [PartnerController::class, 'index'])
            ->name('index')
            ->middleware('permission:partner-list');
        Route::get('create', [PartnerController::class, 'create'])
            ->name('create')
            ->middleware('permission:partner-create');
        Route::post('/', [PartnerController::class, 'store'])
            ->name('store');
        Route::get('edit/{partner}', [PartnerController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:partner-edit');
        Route::patch('/{partner}', [PartnerController::class, 'update'])->name('update');
       Route::delete('{partner}', [PartnerController::class, 'destroy'])
            ->name('destroy')
            ->middleware('permission:partner-delete');
});
