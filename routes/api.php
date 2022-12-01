<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\DocumentController;
use App\Http\Controllers\API\NewsController;
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

Route::group([
    'prefix' => 'activities'
], function () {
    Route::get('/', [ActivityController::class, 'getList']);
});

Route::group([
    'prefix' => 'pages'
], function () {
    Route::get('/', [PageController::class, 'index']);
    Route::get('{param}', [PageController::class, 'show']);
});


Route::group([
    'prefix' => 'documents',
], function() {
    Route::get('/', [DocumentController::class, 'index']);
    Route::get('category', [DocumentController::class, 'category']);
    Route::get('category/{slug}', [DocumentController::class, 'categorySlug']);
});

Route::group([
    'prefix' => 'news'
], function() {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('{id}', [NewsController::class, 'show']);
});