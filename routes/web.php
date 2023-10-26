<?php

use App\Http\Controllers\MultasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('prestamos', App\Http\Controllers\PrestamoController::class)->middleware('auth');
Route::resource('equipos', App\Http\Controllers\EquipoController::class)->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/multas', [MultasController::class, 'index'])->name('multas.index'); //cuando utilizo get solicito un recurso de la vista index
Route::post('/multas', [MultasController::class, 'filtrar'])->name('multas.filtrar'); //cuando hago post para hacer un envio de datos con la función filtrar

