<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SketchController;

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

//INICIO
Route::get('/', function () {
    return view('welcome');
})->name('home');

//AUTH
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/register', function () { return view('register'); })->name('register');

//USERS
Route::post('/user', [UserController::class,'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class,'update'])->name('user.update');
Route::get('/user/{id}', [UserController::class,'destroy'])->name('user.destroy');
/* Route::get('/user/{id}/delete', [UserController::class,'destroy'])->name('user.destroy'); */

//SKETCH
Route::get('/panel', [SketchController::class, 'index'])->name('panel');
Route::get('/sketch', [SketchController::class,'create'])->name('sketch.create');
Route::post('/sketch', [SketchController::class,'store'])->name('sketch.store');
Route::get('/sketch/{id}', [SketchController::class,'edit'])->name('sketch.edit');
Route::put('/sketch/{id}', [SketchController::class,'update'])->name('sketch.update');
Route::delete('/sketch/{id}', [SketchController::class,'destroy'])->name('sketch.delete');

//Route::get('/sketch/{id}/edit', [SketchController::class,'edit'])->name('sketch.edit');
