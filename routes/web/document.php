<?php

use Illuminate\Support\Facades\Route;

use App\Debc\Document\Http\Controllers\DcategoryController;
use App\Debc\Document\Http\Controllers\DocumentController;

Route::group([
        'prefix' => 'documents',
        'as' => 'document.',
        'middleware' => 'permission:document-list|document-create|document-edit|document-destroy',
        ], function() {
            Route::get('/', [DocumentController::class, 'index'])
            ->name('index')
            ->middleware('permission:document-list');
            Route::get('create', [DocumentController::class, 'create'])
                ->name('create')
                ->middleware('permission:document-create');
            Route::post('/', [DocumentController::class, 'store'])->name('store');
            Route::get('{document}/edit', [DocumentController::class, 'edit'])->name('edit')
            ->middleware('permission:document-edit');
            Route::patch('/{document}', [DocumentController::class, 'update'])->name('update');
            Route::delete('/{document}', [DocumentController::class, 'destroy'])
                ->name('destroy')
                ->middleware('permission:document-delete');
            Route::group([
                'prefix' => 'categories',
                'as' => 'category.'
            ], function() {
                Route::get('/', [DcategoryController::class, 'index'])->name('index');
                Route::get('create', [DcategoryController::class, 'create'])->name('create');
                Route::post('/', [DcategoryController::class, 'store'])->name('store');
                Route::get('edit/{id}', [DcategoryController::class, 'edit'])->name('edit');
                Route::patch('/{dcategory}', [DcategoryController::class, 'update'])->name('update');
                Route::delete('{id}', [DcategoryController::class, 'destroy'])->name('destroy');

            });

    });