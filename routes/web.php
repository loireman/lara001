<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Timetable;
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

    Route::get('/news', function () {
        $content = Post::latest()->paginate(10);

        return view('news', compact('content'));
    })->name('news');

    Route::get('/timetable', function () {
        $content = Timetable::latest()->get();
        return view('timetable', compact('content'));
    })->name('timetable');

    Route::get('/news/{slug}', function ($path) {
        $path = explode('/', ltrim($path, '/'));
        $content = DB::select('select * from posts where slug = ?', [$path[0]]);
        return view('news-element', compact('content'));
    });

    Route::get('/about', function () {
        return view('about');
    })->name('about');

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
    Route::resource('posts', PostController::class);
    Route::resource('timetables', TimetableController::class);
});
