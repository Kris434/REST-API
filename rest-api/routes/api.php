<?php

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

Route::apiResource('/bicz/305344/people', \App\Http\Controllers\Api\PeopleController::class);

Route::get('/bicz/305344/people/{id}', [\App\Http\Controllers\Api\PeopleController::class, 'show']);

Route::post('/bicz/305344/people', [\App\Http\Controllers\Api\PeopleController::class, 'store']);

Route::delete('bicz/305344/people/{id}', [\App\Http\Controllers\Api\PeopleController::class, 'delete']);

Route::put('/bicz/305344/people/{id}/{name}', [\App\Http\Controllers\Api\PeopleController::class, 'update']);
