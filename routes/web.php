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
Route::get('showPelicula/{pelicula}', [App\Http\Controllers\HomeController::class, 'showPelicula'])->name('showPelicula');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('auth');
Route::post('/addFavorito', [App\Http\Controllers\HomeController::class, 'addFavorito'])->name('addFavorito')->middleware('auth');
Route::post('/removeFavorito', [App\Http\Controllers\HomeController::class, 'removeFavorito'])->name('removeFavorito')->middleware('auth');
Route::get('/favoritos/{user}', [App\Http\Controllers\HomeController::class, 'favoritos'])->name('favoritos')->middleware('auth');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');
Route::resource('peliculas', App\Http\Controllers\PeliculaController::class)->middleware('auth');
