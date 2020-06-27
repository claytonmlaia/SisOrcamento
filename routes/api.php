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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('auth/login', 'Api\AuthController@login');

//ENDEREÇO DA API http://127.0.0.1:8000/api/clientescadastrados
Route::group(['middleware' => ['apiJwt']], function(){
    Route::get('/clientescadastrados','Api\AcessoExternoController@index');
});
