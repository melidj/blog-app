<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('posts', [App\Http\Controllers\PostController::class, 'index']);
Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('posts/create', [App\Http\Controllers\PostController::class, 'store']);
Route::get('posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit']);
Route::put('posts/{id}/edit', [App\Http\Controllers\PostController::class, 'update']);
Route::get('posts/{id}/delete', [App\Http\Controllers\PostController::class, 'destroy']);

Route::get('/about', function(){
    return view('blogs.about');
});


require __DIR__.'/auth.php';
