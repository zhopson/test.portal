<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CatController;
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

    Route::namespace('Api')->group(function () {// server/api/
        Route::get('/get_cats/{id}', [CatController::class,'index']);
        Route::get('/get_cats_tree/{id}', [CatController::class,'getCatTree']);
//        Route::get('/users_all', 'UsersController@index_all')->middleware('isAdmin');
//        Route::post('/users', 'UsersController@store')->middleware('isAdmin');
//        Route::get('/users/{user}', 'UsersController@show')->middleware('isAdminOrSelf');
//        Route::put('/users/{user}', 'UsersController@update')->middleware('isAdminOrSelf');
//        Route::delete('/users/{user}', 'UsersController@destroy')->middleware('isAdminOrSelf');
//        Route::get('/filldb', 'UsersController@fill_db')->middleware('isAdmin');
        });