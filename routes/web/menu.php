<?php

use App\Debc\Menu\Http\Controllers\AcademicController;
use App\Debc\Menu\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


Route::group([
        'prefix' => 'menus',
        'as' => 'menu.',
        'middleware' => 'permission:menu-list|menu-create|menu-edit|menu-destroy',
        ], function() {
            Route::group([
                'prefix' => 'academics',
                'as' => 'academic.'
            ], function() {
                Route::get('/', [AcademicController::class, 'index'])->name('index');
                Route::get('create', [AcademicController::class, 'create'])->name('create');
                Route::post('/', [AcademicController::class, 'store'])->name('store');
                Route::get('edit/{id}', [AcademicController::class, 'edit'])->name('edit');
                Route::patch('/{academic}', [AcademicController::class, 'update'])->name('update');
                Route::delete('{id}', [AcademicController::class, 'destroy'])->name('destroy');

            });

            Route::group([
                'prefix' => 'subjects',
                'as' => 'subject.'
            ], function() {
                Route::get('/', [SubjectController::class, 'index'])->name('index');
                Route::get('create', [SubjectController::class, 'create'])->name('create');
                Route::post('/', [SubjectController::class, 'store'])->name('store');
                Route::get('{subject}/edit', [SubjectController::class, 'edit'])->name('edit');
                Route::patch('/{subject}', [SubjectController::class, 'update'])->name('update');
                Route::delete('{subject}', [SubjectController::class, 'destroy'])->name('destroy');

            });

    });
