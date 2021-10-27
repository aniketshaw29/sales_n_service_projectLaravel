<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\ProductController;
use App\Http\controllers\UnitController;
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
Route::group(array('prefix' => 'dev'), function() {
    Route::get('products',[ProductController::class, 'index']);
    Route::get('products/{id}',[ProductController::class, 'getProductById']);
    Route::post('products',[ProductController::class, 'saveProduct']);
    Route::patch('products',[ProductController::class, 'updateProduct']);
    Route::delete('products/{id}',[ProductController::class, 'deleteProductById']);
} );
Route::group(array('prefix' => 'devunits'), function() {
    Route::get('units',[UnitController::class, 'index']);
    Route::get('units/{id}',[UnitController::class, 'getUnitById']);
    Route::post('units',[UnitController::class, 'saveUnits']);
    Route::patch('units',[UnitController::class, 'updateUnit']);
    Route::delete('units/{id}',[UnitController::class, 'deleteUnitById']);
} );