<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ProjectController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('clients', [ClientController::class, 'index'])->name('clients');
// Route::get('clients/{client}', [ClientController::class, 'show'])->name('client');
// Route::post('clients', [ClientController::class, 'store'])->name('client');

Route::group(['namespace' => 'Api'], function () {
    Route::apiResource('clients', 'ClientController');

    Route::get('projects', [ProjectController::class, 'index'])->name('projects');
});
