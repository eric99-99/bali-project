<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExperienceController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'employee'], function ($router) {
//     Route::get('all', [EmployeeController::class, 'getAll'] );
// });

Route::get('employee', [EmployeeController::class, 'getAll'] );
Route::post('employee', [EmployeeController::class, 'store'] );
Route::post('employee/{id}/delete', [EmployeeController::class, 'destroy'] );
Route::get('employee/{id}', [EmployeeController::class, 'show'] );

Route::post('experience', [ExperienceController::class, 'store'] );
Route::get('experience/{id}', [ExperienceController::class, 'show'] );
