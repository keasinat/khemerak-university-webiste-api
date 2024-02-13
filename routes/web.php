<?php

use Illuminate\Support\Facades\Route;

use App\Debc\BusinessActivity\Http\Controllers\BusinessActivityController;
use App\Debc\Pages\Http\Controllers\PageController;
use App\Debc\News\Http\Controllers\NewsController;
use App\Debc\Document\Http\Controllers\DocumentController;
use App\Debc\Document\Http\Controllers\VideoController;
use App\Debc\Document\Http\Controllers\DcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;

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

Auth::routes(['register' => false]);
Route::redirect('/', '/admin', 301);
Route::get('/admin', [DashboardController::class, 'index'])
    ->name('home');

Route::group([
    'prefix' => 'admin', 
    'as' => 'admin.', 
    'middleware' => ['auth', 'web']
], function () {


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
    });

    
    Route::group([
        'prefix' => 'documents',
        'as' => 'document.',
        'middleware' => 'permission:admin.access.document.list|admin.access.document.create|admin.access.document.edit|admin.access.document.destroy',
        ], function() {
            Route::get('/', [DocumentController::class, 'index'])
            ->name('index');
            Route::get('create', [DocumentController::class, 'create'])
                ->name('create')
                ->middleware();
            Route::post('/', [DocumentController::class, 'store'])->name('store');
            Route::get('{document}/edit', [DocumentController::class, 'edit'])->name('edit');
            Route::patch('/{document}', [DocumentController::class, 'update'])->name('update');
            Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('destroy');
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
            Route::group([
                'prefix' => 'videos',
                'as' => 'video.'
            ], function() {
                Route::get('/', [VideoController::class, 'index'])->name('index');
                Route::get('create', [VideoController::class,'create'])->name('create');
                Route::post('/', [VideoController::class, 'store'])->name('store');
                Route::get('edit/{video}', [VideoController::class, 'edit'])->name('edit');
                Route::patch('{video}', [VideoController::class, 'update'])->name('update');
                Route::delete('{video}',[VideoController::class, 'destroy'])->name('destroy');
            });
    });

    // Route::resource('users', UserController::class);
    // Route::resource('roles', RoleController::class);
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

    Route::get('file-manager', function () {
        return view('file-manager');
    })->name('filemanager');
});

