<?php

use Illuminate\Support\Facades\{Route, Auth};

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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/',                         [App\Http\Controllers\HomeController::class,    'index'])->name('home');
    Route::get('/about',                    [App\Http\Controllers\HomeController::class,    'about'])->name('about');
    Route::post('/builder/build',           [App\Http\Controllers\BuilderController::class, 'build'])->name('builder.build');
    Route::get('/builder/import',           [App\Http\Controllers\BuilderController::class, 'import'])->name('builder.import');
    Route::post('/builder/import',          [App\Http\Controllers\BuilderController::class, 'build_import'])->name('builder.import');
    Route::get('/builder/download/{id}',    [App\Http\Controllers\BuilderController::class, 'download'])->name('builder.download');

    Route::resource('builder',  App\Http\Controllers\BuilderController::class)->except(['show']);
    Route::resource('user',     App\Http\Controllers\UserController::class)->except(['show']);

    Route::get('locale/change/{locale}', [App\Http\Controllers\LangController::class, 'change'])->name('changeLocale');
});
