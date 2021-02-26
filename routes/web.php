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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/new', [App\Http\Controllers\BoxController::class, 'new'])->name('new');
Route::get('/all', [App\Http\Controllers\BoxController::class, 'all'])->name('all');
Route::post('/store', [App\Http\Controllers\BoxController::class, 'store'])->name('store');
Route::post('/store/{id}', [App\Http\Controllers\BoxController::class, 'delete'])->name('delete');
