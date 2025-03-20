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

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts/create', [PostController::class, 'store']);
Route::get('posts/{id}/edit', [PostController::class, 'edit']);
Route::put('posts/{id}/edit', [PostController::class, 'update']);
Route::get('posts/{id}/delete', [PostController::class, 'destroy']);
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');


Route::get('/about', function(){
    return view('blogs.about');
});


require __DIR__.'/auth.php';
