<?php

use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\CapturaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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
Route::delete('/artigos/{id}', [ArtigoController::class, 'deletar']);

Route::get('/capturar', [CapturaController::class, 'index']);
Route::post('/capturar', [CapturaController::class, 'capturar']);
