<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RiwayathargaController;

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

// Route::resource('/product', ProductController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create'])->middleware('owneradmin');
Route::get('/product', [ProductController::class, 'viewindex'])->middleware('auth');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->middleware('owneradmin');

Route::get('/riwayatharga/{id}', [ProductController::class, 'show'])->middleware('owneradmin');

Route::get('/admin', [AdminController::class, 'viewindex'])->middleware('owner');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->middleware('owner');
