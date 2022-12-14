<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bootcampController;
use App\Http\Controllers\CoursesController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('bootcamps', bootcampController::class);
Route::apiResource('courses', CoursesController::class);

//RUTA ESPECIFICA PARA CREARLE UN CURSO A UN BOOTCAMP
Route::post("courses/{idbootcamp}/create",
                [ CoursesController::class, "store" ]
           );



