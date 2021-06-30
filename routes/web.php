<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::put('/users/pw/{user}', [UserController::class, 'updatePw'])->name('users.updatePw');
    Route::get('users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::resource('items', ItemController::class);
    Route::get('items/{item}/delete', [ItemController::class, 'delete'])->name('items.delete');
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
});

require __DIR__.'/auth.php';
