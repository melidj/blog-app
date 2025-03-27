<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/signup', [AuthController::class, 'showSignupForm']);
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/index', function(){
    return view('authentication.index');
})->name('index');


Route::middleware(['auth'])->group(function(){

    Route::get('/index', [PostController::class, 'index'])->name('index');

    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts/create', [PostController::class, 'store']);
    Route::get('posts/{id}/edit', [PostController::class, 'edit']);
    Route::put('posts/{id}/edit', [PostController::class, 'update']);
    Route::get('posts/{id}/delete', [PostController::class, 'destroy']);

});



Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/about', function(){
    return view('blogs.about');
});

