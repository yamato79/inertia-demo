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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('resources/{resourceType}', [\App\Http\Controllers\ResourceController::class, 'index'])
    ->name('resources.index');

Route::get('resources/{resource}/download', [\App\Http\Controllers\ResourceController::class, 'download'])
    ->name('resources.download');    

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin specific routes.
|
*/

Route::group(['prefix' => 'admin', 'name' => 'admin.'], function() {
    Route::resource('resources', \App\Http\Controllers\Admin\ResourceController::class)
        ->only(['index', 'create', 'edit']);
});
