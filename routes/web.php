<?php

use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\RotacionController;
use App\Http\Controllers\SeccionController;
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


Route::controller(EntrenadorController::class)->group(function () {
    Route::get('/entrenadores', 'index');
    /* create */
    Route::get('/entrenadores/create', 'create');
    Route::post('/entrenadores/add', 'add');

    /* Route::get('/entrenadores/editView{id?}', 'editView');
    Route::post('/entrenadores/editView', 'editView'); */
    /* delete  */
    Route::post('/entrenadores/delete', 'destroy');
});

Route::controller(SeccionController::class)->group(function () {
    Route::get('/seccion', 'index');
    Route::post('/seccion/create', 'store');
    /* Route::put('/seccion/edit', 'edit'); */
    Route::delete('/seccion/delete', 'delete');
});


Route::controller(RotacionController::class)->group(function () {
    Route::get('/rotacion', 'index');
    Route::post('/rotacion/create', 'create');
    Route::put('/rotacion/edit', 'edit');
    Route::delete('/rotacion/delete', 'delete');
});
