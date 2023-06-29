<?php

use App\Http\Controllers\AdministradorDashboardController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\BuscarPorEmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\ClienteHomeController;
use App\Http\Controllers\DatosPruebaController;
use App\Http\Controllers\DummysController;
use App\Http\Controllers\HighchartController;
use App\Http\Controllers\TransbankController;
use App\Http\Controllers\TransbankUsuarioController;
use App\Http\Controllers\UsuarioHomeController;
use App\Http\Controllers\UsuariosController;
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

Route::get('/prueba', function () {return view('prueba');});
Route::get('/prueba2', function () {return view('prueba2');});

//Autentificacion 
Route::get('/login', [AutenticacionController::class, 'login'])->name ('login')->middleware('alreadyLoggedIn');
Route::post('login-user', [AutenticacionController::class, 'loginUsuario'])->name('login-user');
Route::get('/registro', [AutenticacionController::class, 'registro'])->name('registro')->middleware('alreadyLoggedIn');
Route::post('/registro-usuario', [AutenticacionController::class, 'registroUsuario'])->name('registro-usuario');
Route::get('/cerrarSesion', [AutenticacionController::class, 'cerrarSesion'])->name('cerrar-sesion');


//Interfaz cliente
Route::get('/', [ClienteHomeController::class, 'home'])->name ('home');
//CarritoCliente
Route::get('/productos_', [TransbankController::class, 'shop'])->name('shop_');
Route::get('/carrito_', [TransbankController::class, 'iniciar_compra'])->name('cart.index_');
Route::post('/add_', [TransbankController::class, 'add'])->name('cart.store_');
Route::post('/update_', [TransbankController::class, 'update'])->name('cart.update_');
Route::post('/remove_', [TransbankController::class, 'remove'])->name('cart.remove_');
Route::post('/clear_', [TransbankController::class, 'clear'])->name('cart.clear_');

//Interfaz usuario
Route::get('/home', [UsuarioHomeController::class, 'home'])->name ('home_');
Route::get('/usuario', [AutenticacionController::class, 'dashboard'])->name('dashboard-usuario')->middleware('isLoggedIn');
Route::get('/filter-products/{categoryId}', [TransbankUsuarioController::class, 'filterProducts'])->name('filterProducts');
//CarritoUsuario
Route::get('/productos', [TransbankUsuarioController::class, 'shop'])->name('shop')->middleware('isLoggedIn');
Route::get('/carrito', [TransbankUsuarioController::class, 'iniciar_compra'])->name('cart.index')->middleware('isLoggedIn');
Route::post('/add', [TransbankUsuarioController::class, 'add'])->name('cart.store')->middleware('isLoggedIn');
Route::post('/update', [TransbankUsuarioController::class, 'update'])->name('cart.update')->middleware('isLoggedIn');
Route::post('/remove', [TransbankUsuarioController::class, 'remove'])->name('cart.remove')->middleware('isLoggedIn');
Route::post('/clear', [TransbankUsuarioController::class, 'clear'])->name('cart.clear')->middleware('isLoggedIn');


//Interfaz administrador
Route::get('/dashboard', [AdministradorDashboardController::class, 'index'])->name ('dashboard');
Route::get('/email', [AdministradorDashboardController::class, 'email'])->name ('email');
Route::get('/usuarios', [UsuariosController::class, 'index'])->name ('usuarios');
Route::post('/dashboard/email', [AdministradorDashboardController::class, 'email'])->name ('email-dashboard');
Route::get('/buscar', function () {return view('admi.email');})->name('buscar');
Route::post('/buscar', [BuscarPorEmailController::class, 'buscar']);





