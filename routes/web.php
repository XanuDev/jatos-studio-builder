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

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name(
    'home'
);
Route::get('/about', [
    App\Http\Controllers\HomeController::class,
    'about',
])->name('about');

Route::resource(
    'builder',
    App\Http\Controllers\BuilderController::class
)->except(['show']);
Route::post('/builder/build', [
    App\Http\Controllers\BuilderController::class,
    'build',
])->name('builder.build');
Route::post('/builder/download', [
    App\Http\Controllers\BuilderController::class,
    'download',
])->name('builder.download');

Route::resource('user', App\Http\Controllers\UserController::class);

Route::get('locale/change/{locale}', [
    App\Http\Controllers\LangController::class,
    'change',
])->name('changeLocale');