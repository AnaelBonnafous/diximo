<?php

use Illuminate\Http\Request;
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
});

Route::prefix('/blog')->group(function() {
    Route::get('/', function() {

        return [
            'link' => route('blog.show', ['id' => '1', 'slug' => 'mon-premier-article']),
        ];
    })->name('blog.index');

    Route::get('/{slug}-{id}', function(Request $request, string $slug, string $id) {
        return [
            'id' => $id,
            'slug' => $slug,
            'name' => $request->input('name', 'John'),
        ];
    })->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+',
    ])->name('blog.show');
});
