<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LibroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\API\PracticantesController;
use App\Http\Controllers\API\CuadernoController;
use App\Http\Controllers\API\LibroGatController;
use App\Http\Controllers\RoleController;


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

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('login',  [ AuthController::class, 'login']);
    Route::post('signup', [ UserController::class, 'create']);
    Route::post('logout', [ AuthController::class, 'logout']);
    Route::post('refresh', [ AuthController::class, 'refresh']);
    Route::post('me', [ AuthController::class, 'me']);
    Route::post('sendPasswordReset', [ ResetPasswordController::class, 'sendEmail']);

});

Route::prefix('libro')->group(function () {
    Route::get('/',[ LibroController::class, 'getAll']);
    Route::post('/',[ LibroController::class, 'create']);
    Route::delete('/{id}',[ LibroController::class, 'delete']);
    Route::get('/{id}',[ LibroController::class, 'get']);
    Route::put('/{id}',[ LibroController::class, 'update']);
});

Route::prefix('practicantes')->group(function () {
    Route::get('/',[ PracticantesController::class, 'getAll']);
    Route::post('/',[ PracticantesController::class, 'create']);
    Route::delete('/{id}',[ PracticantesController::class, 'delete']);
    Route::get('/{id}',[ PracticantesController::class, 'get']);
    Route::put('/{id}',[ PracticantesController::class, 'update']);
});

Route::prefix('cuaderno')->group(function () {
    Route::get('/',[ CuadernoController::class, 'getAll']);
    Route::post('/',[ CuadernoController::class, 'create']);
    Route::delete('/{id}',[ CuadernoController::class, 'delete']);
    Route::get('/{id}',[ CuadernoController::class, 'get']);
    Route::put('/{id}',[ CuadernoController::class, 'update']);
});

Route::prefix('librogat')->group(function () {
    Route::get('/',[ LibroGatController::class, 'getAll']);
    Route::post('/',[ LibroGatController::class, 'create']);
    Route::delete('/{id}',[ LibroGatController::class, 'delete']);
    Route::get('/{id}',[ LibroGatController::class, 'get']);
    Route::put('/{id}',[ LibroGatController::class, 'update']);
});

Route::prefix('role')->group(function () {
    Route::get('/',[ RoleController::class, 'getAll']);
    Route::post('/',[ RoleController::class, 'create']);
    Route::delete('/{id}',[ RoleController::class, 'delete']);
    Route::get('/{id}',[ RoleController::class, 'get']);
    Route::put('/{id}',[ RoleController::class, 'update']);
    Route::post('/user',[ RoleController::class, 'roluser']);
    Route::get('/user/{id}',[ RoleController::class, 'roluserId']);
});

Route::prefix('user')->group(function () {
    Route::get('/',[ UserController::class, 'getAll']);
    Route::delete('/{id}',[ UserController::class, 'delete']);
    Route::get('/{id}',[ UserController::class, 'get']);
    Route::put('/{id}',[ UserController::class, 'update']);
});

