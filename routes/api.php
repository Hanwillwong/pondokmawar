<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiwayathargaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SatuanController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/product', function () {
//     return view('pages.product');
// });

// Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
// Route::post('/register',[RegisterController::class,'store']);

// Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
// Route::post('/login',[LoginController::class,'authenticate']);
// Route::post('/logout',[LoginController::class,'logout']);

// Route::get('/',[ProductController::class,'index'])->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product/create', [ProductController::class, 'create'])->middleware('owneradmin');
Route::post('/product', [ProductController::class, 'store'])->middleware('owneradmin');

Route::get('/satuan', [SatuanController::class, 'index'])->middleware('auth');
Route::get('/satuan/create', [SatuanController::class, 'create'])->middleware('owneradmin');
Route::post('/satuan', [SatuanController::class, 'store'])->middleware('owneradmin');

Route::put('/satuan/{id}', [SatuanController::class, 'update'])->middleware('owneradmin');
Route::delete('/satuan/{id}', [SatuanController::class, 'destroy'])->middleware('owneradmin');

Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('owneradmin');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware('owneradmin');

Route::get('/riwayatharga/{id}', [ProductController::class, 'show'])->middleware('owner');
Route::delete('/riwayatharga/{id}', [RiwayathargaController::class, 'destroy'])->middleware('owner');

Route::get('/admin', [AdminController::class, 'index'])->middleware('owner');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->middleware('owner');
Route::put('/admin/{id}', [AdminController::class, 'update'])->middleware('owner');
