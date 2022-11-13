<?php

use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
use Tabuna\Breadcrumbs\Breadcrumbs;
use App\Debc\BusinessActivity\Http\Controllers\BusinessActivityController;
use App\Debc\Pages\Http\Controllers\PageController;
use App\Debc\News\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([
    'prefix' => 'admin', 
    'as' => 'admin.', 
    'middleware' => ['auth']
], function () {
    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group([
        'prefix' => 'activities',
        'as' => 'activity.'
    ], function() {
        Route::get('/', [BusinessActivityController::class, 'index'])->name('index');
        Route::get('create', [BusinessActivityController::class, 'create'])
            ->name('create');
            // ->breadcrumbs(function(Trail $trail) {
            //     $trail->parent('admin.activity.index')
            //     ->push(__('Create Activity'), route('admin.activity.create'));
            // });
        Route::post('/', [BusinessActivityController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BusinessActivityController::class, 'edit'])->name('edit');
        Route::get('/import', [BusinessActivityController::class, 'gimport']);
        Route::post('/import', [BusinessActivityController::class, 'import'])->name('import');
    });

    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::group([
        'prefix' => 'pages',
        'as' => 'page.'
    ], function() {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('create', [PageController::class, 'create'])->name('create');
    });
    Route::group([
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('create', [NewsController::class, 'create'])->name('create');
        Route::post('/', [NewsController::class, 'store'])->name('store');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [NewsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [NewsController::class, 'update'])->name('update');
    });
});

