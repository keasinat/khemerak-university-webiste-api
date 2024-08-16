<?php

use App\Debc\Menu\Http\Controllers\API\MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('menus')->group(function () {
    Route::get('/', [MenuController::class, 'index']);

    Route::prefix('academics')->group(function () {
        Route::get('/', [MenuController::class, 'academics']);
        Route::get('top', [MenuController::class, 'topAcademics']);
        Route::get('{id}', [MenuController::class, 'academicDetail']);
    });

    Route::prefix('subjects')->group(function () {
        Route::get('/', [MenuController::class, 'subjects']);
        Route::get('list', [MenuController::class, 'subjectList']);
        Route::get('top', [MenuController::class, 'topSubjects']);
        Route::get('{id}', [MenuController::class, 'subjectDetail']);
    });
});
