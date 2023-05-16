<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TovaryController;
use App\Models\Tovary;
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
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tovars', function () {
        $content = Tovary::latest()->paginate(10);

        return view('tovars', compact('content'));
    })->name('tovars');

    Route::get('/tovars/{slug}', function ($path) {
        $path = explode('/', ltrim($path, '/'));
        $content = DB::select('select * from tovaries where slug = ?', [$path[0]]);
        return view('tovar-element', compact('content'));
    });

    Route::get('/panel', function () {
        return view('panel');
    })->name('panel');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('admin', function () { return view('panel'); })->name('admin');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('tovary', TovaryController::class);
});
