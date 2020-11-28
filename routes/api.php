<?php

use App\Http\Controllers\API\DepartmentsController;
use App\Http\Controllers\API\DepartmentsUsersController;
use App\Http\Controllers\API\UsersVacationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\UsersController;
use \App\Http\Controllers\API\SkillsController;
use \App\Http\Controllers\API\UsersSkillsController;

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

Route::apiResource('/users', UsersController::class);
Route::apiResource('/skills', SkillsController::class);
Route::apiResource('/departments', DepartmentsController::class);
Route::apiResource('/users/{user}/skills', UsersSkillsController::class);
Route::apiResource('/users/{user}/vacations', UsersVacationsController::class);
Route::apiResource('departments.users', DepartmentsUsersController::class);
Route::post('/departments/{department}/assignManager/{user}', [DepartmentsController::class, 'assignManager']);
