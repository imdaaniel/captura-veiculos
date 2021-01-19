<?php

use App\Http\Controllers\{LoginController, ArtigoController, CapturaController};
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

Route::get('/', [LoginController::class, 'index']);
Route::post('/autenticar', [LoginController::class, 'autenticar']);
Route::get('/sair', [LoginController::class, 'sair']);

Route::get('/artigos', [ArtigoController::class, 'index']);
Route::post('/artigos/buscar', [ArtigoController::class, 'buscar']);
Route::delete('/artigos/{id}', [ArtigoController::class, 'deletar']);

Route::get('/artigos/capturar', [CapturaController::class, 'index']);
Route::post('/artigos/capturar', [CapturaController::class, 'capturar']);
