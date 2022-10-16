<?php

use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
use Tabuna\Breadcrumbs\Breadcrumbs;
use App\Debc\BusinessActivity\Http\Controllers\BusinessActivityController;

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

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin', 
    'as' => 'admin.', 
    // 'middleware' => 'admin'
], function () {
    // includeRouteFiles(__DIR__.'/backend/');
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
        Route::get('/import', [BusinessActivityController::class, 'gimport']);
        Route::post('/import', [BusinessActivityController::class, 'import'])->name('import');
    });
});
