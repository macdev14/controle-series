<?php

use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\{EpisodiosController, EntrarController, RegistroController, SeriesController, TemporadasController};
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

    Route::get('/series/criar', [SeriesController::class, 'create'] )->name('series.criar')->middleware('autenticador');

    Route::post('/series/criar', [SeriesController::class, 'store'] )->name('series.store')->middleware('autenticador');

    Route::get('/series/{serie}/atualizar', [SeriesController::class, 'edit'] )->name('series.editar')->middleware('autenticador');

    Route::put('/series/{serie}/atualizar', [SeriesController::class, 'update'] )->name('series.atualizar')->middleware('autenticador');

    Route::post('/series/{serie}/editaNome',  [SeriesController::class, 'editaNome']  )->middleware('autenticador');

    Route::delete('/series/{serie}/remover', [SeriesController::class, 'delete'] )->name('series.remover')->middleware('autenticador');

    Route::get('/series/{serie}/temporadas', [TemporadasController::class, 'index'] )->name('temporadas.listar');

// Temporadas

    Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'index'])->name('temporadas.episodios');

    Route::post('/temporadas/{temporada}/episodios/assistir', [EpisodiosController::class, 'assistir'])->name('temporadas.assistir')->middleware('autenticador');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entrar', [EntrarController::class, 'index'])->name('usuario.login');
Route::post('/entrar', [EntrarController::class, 'entrar'])->name('usuario.entrar');

Route::get('/registrar', [RegistroController::class, 'create'])->name('usuario.cadastro');
Route::post('/registrar', [RegistroController::class, 'store'])->name('usuario.registrar');

Route::get('/sair', function(){
    Auth::logout();
    return redirect()->route('usuario.login');

} )->name('usuario.logout');


Auth::routes();


