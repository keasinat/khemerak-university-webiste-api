<?php



use App\Http\Controllers\{DashboardController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/admin', [DashboardController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'web']
], function () {

    Route::get('file-manager', function () {
        return view('file-manager');
    })->name('filemanager');

    includeRouteFiles(__DIR__.'/web/');
});

