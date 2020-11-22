<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', [UsersController::class, 'index']);

Route::get('/about', function(){
    return view('about');
});

Route::get('/users/{id}', function($id){
    return  "User id : {$id}";
});


Route::post('/users/{id}', function(Request $request, $id){
    $data = $request->only('email');
    
    return response()->json($data, 202);
});
