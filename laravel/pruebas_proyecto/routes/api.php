<?php

use App\Http\Controllers\API\ComplementosController;
use App\Http\Controllers\API\Detalles_pedidoController;
use App\Http\Controllers\API\PrendasController;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\Productos_pedidoController;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\ZapatosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('productos' , ProductoController::class);
Route::apiResource('usuarios' , UsuarioController::class);
Route::apiResource('detalles_pedido' , Detalles_pedidoController::class);
Route::apiResource('productos_pedido' , Productos_pedidoController::class);
Route::apiResource('zapatos' , ZapatosController::class);
Route::apiResource('complementos' , ComplementosController::class);

// -------------------
// -------------------

// ---PRENDAS---
Route::get('prendas', [PrendasController::class, 'index']);
Route::post('prendas', [PrendasController::class, 'store']);
Route::get('prendas/{prendas}', [PrendasController::class, 'show']);
Route::put('prendas/{prendas}', [PrendasController::class, 'update']);
Route::delete('prendas', [PrendasController::class, 'destroy']);


// ---ZAPATOS---
Route::get('zapatos', [ZapatosController::class, 'index']);
Route::post('zapatos', [ZapatosController::class, 'store']);
Route::get('zapatos/{zapatos}', [ZapatosController::class, 'show']);
Route::put('zapatos/{zapatos}', [ZapatosController::class, 'update']);
Route::delete('zapatos', [ZapatosController::class, 'destroy']);
