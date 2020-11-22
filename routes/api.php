<?php

use App\Http\Controllers\UsersController;
use GuzzleHttp\Middleware;
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


Route::get('/hello', function(){
    return 'Hello there!';
});


Route::get('/users', function(){
     return 'Users';
});

Route::get('/users/{id}/skills', [UsersSkillsController::class, 'index']);



