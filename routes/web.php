<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/search', 'search')->name('search');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{post:slug}/edit', 'edit')->name('edit');
    Route::patch('/{post:slug}/update', 'update')->name('update');
    Route::delete('/{post:slug}/destroy', 'destroy')->name('destroy');

    Route::get('/{post:slug}', 'show')->where([
        'post' => '[a-z0-9\-]+',
    ])->name('show');
});
