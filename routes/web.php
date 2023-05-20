<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\DatosPruebaController;
use App\Http\Controllers\DummysController;
use App\Http\Controllers\TransbankController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

// Route::get('/muero', function () {
//     return DB::select('SELECT TOP (10) [id_categoria],[nombre_categoria] FROM [MUSICPRO].[dbo].[categoria]');
// });

Route::get('/', [Categorias::class, 'index']);
Route::get('/carrito', [TransbankController::class, 'iniciar_compra']);
Route::get('/prueba', [DatosPruebaController::class, 'index']);
Route::get('/login', [AutenticacionController::class, 'login']);
Route::get('/registro', [AutenticacionController::class, 'registro'])->name('registro');
Route::post('/registro-usuario', [AutenticacionController::class, 'registroUsuario'])->name('registro-usuario');
