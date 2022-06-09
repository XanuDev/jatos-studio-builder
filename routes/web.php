<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/builder', [App\Http\Controllers\BuilderController::class, 'index'])->name('builder.index');
Route::get('/builder/show/{build}', [App\Http\Controllers\BuilderController::class, 'show'])->name('builder.show');
Route::get('/builder/new', [App\Http\Controllers\BuilderController::class, 'new'])->name('builder.new');
Route::post('/builder/store', [App\Http\Controllers\BuilderController::class, 'store'])->name('builder.store');

Route::get('/builder/build/{build_id}', [App\Http\Controllers\BuilderController::class, 'build'])->name('builder.build');