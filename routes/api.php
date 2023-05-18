<?php

use App\Http\Controllers\TransbankController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/iniciar_compra', [TransbankController::class, 'iniciar_compra'])->name('getCompra');
Route::post('/iniciar_compra', [TransbankController::class, 'iniciar_compra'])->name('postCompra');
Route::get('/confirmar_pago', [TransbankController::class, 'confirmar_pago'])->name('confirmar_pago');
Route::post('/confirmar_pago', [TransbankController::class, 'confirmar_pago'])->name('confirmar_pago');

//Route::middleware('auth:api')->post('/iniciar_compra', [TransbankController::class, 'iniciar_compra']);