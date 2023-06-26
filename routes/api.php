<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\PageController;


use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\VideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('throttle:60,1')->group( function () {


    Route::group([
        'prefix' => 'activities'
    ], function () {
        Route::get('/', [ActivityController::class, 'getList']);
    });

    Route::group([
        'prefix' => 'pages',
        'as' => 'page.'
    ], function () {
        Route::get('/', [PageController::class, 'index']);
        Route::get('{param}', [PageController::class, 'show'])->name('show');
    });


    Route::group([
        'prefix' => 'search'
    ], function() {
        Route::get('/', [SearchController::class, 'search']);
    });
});

Route::group(['prefix' => 'v1','middleware' => 'throttle:60,1'], function () {
    includeRouteFiles(__DIR__ . '/v1/');
});
