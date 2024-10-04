<?php

use App\Debc\News\Http\Controllers\NcategoryController;
use App\Debc\News\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'news',
    'as' => 'news.',
    'middleware' => 'permission:news-create|news-list|news-edit|news-delete',
    ], function () {
        Route::get('/', [NewsController::class, 'index'])
            ->name('index')
            ->middleware('permission:news-list');
        Route::get('create', [NewsController::class, 'create'])
            ->name('create')
            ->middleware('permission:news-create');
        Route::post('/', [NewsController::class, 'store'])
            ->name('store');
        Route::delete('/{id}', [NewsController::class, 'destroy'])
            ->name('destroy')
            ->middleware('permission:news-delete');
        Route::get('edit/{news}', [NewsController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:news-edit');
        Route::patch('/{news}', [NewsController::class, 'update'])->name('update');
        Route::get('/check_slug', [NewsController::class, 'check_slug'])->name('check_slug');
        Route::delete('{news}', [NewsController::class, 'destroy'])
            ->name('destroy')
            ->middleware('permission:news-delete');
        Route::group([
            'prefix' => 'categories',
            'as' => 'category.'
        ], function() {
            Route::get('/', [NcategoryController::class, 'index'])->name('index');
            Route::get('create', [NcategoryController::class, 'create'])->name('create');
            Route::post('/', [NcategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [NcategoryController::class, 'edit'])->name('edit');
            Route::patch('/{ncategory}', [NcategoryController::class, 'update'])->name('update');
            Route::delete('{id}', [NcategoryController::class, 'destroy'])->name('destroy');

        });
});
