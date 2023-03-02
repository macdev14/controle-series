<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
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

Route::get('/ola', function () {
    echo "Olá Mundo!";
});

Route::get('/series', [SeriesController::class, 'listarSeries'] )->name('series.listar');

Route::get('/series/criar', [SeriesController::class, 'create'] )->name('series.criar');

Route::post('/series/criar', [SeriesController::class, 'store'] )->name('series.store');

Route::get('/series/{serie}/atualizar', [SeriesController::class, 'edit'] )->name('series.editar');

Route::put('/series/{serie}/atualizar', [SeriesController::class, 'update'] )->name('series.atualizar');

Route::delete('/series/{serie}/remover', [SeriesController::class, 'delete'] )->name('series.remover');