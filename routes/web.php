<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//ABRE CADASTRAMENTO DE CLIENTES
Route::get('cadastramento/clientes','ClientesController@index');
//SALVA OS DADOS DE CLIENTE NO BANCO
Route::resource('/clientes/slv',"ClientesController",['names'=> ['store'=>'salvacliente']]);
//ABRE EDITAR DE CLIENTES
Route::get('/clientes/edt/{id}','ClientesController@edit');
//SALVA OS DADOS DE CLIENTE NO BANCO
Route::resource('/clientes/edrd',"EditaClientes",['names'=> ['store'=>'salvaclienteeditado']]);
//ABRE CADASTRAMENTO DE CLIENTES
Route::get('/aposeditar','EditaClientes@index');
//ABRE CADASTRAR CLIENTES
Route::get('/clientes/cad','ClientesController@cadastrar');
//ABRE EDITAR DE CLIENTES
Route::get('/clientes/vwe/{id}','ClientesController@visualiza');







//ABRE CADASTRAMENTO DE PRODUTOS/TIPO DE PRODUTO
Route::get('cadastramento/produtos/tipo','ItemTipoController@index');







//ABRE CADASTRAMENTO DE PRODUTOS/COR DE PRODUTO
Route::get('cadastramento/produtos/cor','ItemCorController@index');







//ABRE CADASTRAMENTO DE PRODUTOS/MALHA DE PRODUTO
Route::get('cadastramento/produtos/malha','ItemMalhaController@index');






//ABRE CADASTRAMENTO DE PRODUTOS/ACABAMENTO EXTRA DO PRODUTO
Route::get('cadastramento/produtos/acabamentoextra','ItemAcabamentoExtraController@index');





//ABRE CADASTRAMENTO DE TIPO DE PRODUTO
Route::get('cadastramento/produtos/tipoestampa','TipoEstampaController@index');







//ABRE CADASTRAMENTO DE TIPO DE PRODUTO
Route::get('cadastramento/agenda','AgendaController@index');






//ABRE CADASTRAMENTO DE SITUAÇÃO DO ORÇAMENTO
Route::get('cadastramento/situacao','SituacaoController@index');





//ABRE CADASTRAMENTO DE PRODUTOS/ PRODUTO
Route::get('orcamentos','OrcamentoController@index');
//ABRE CADASTRAMENTO DE PRODUTOS/ PRODUTO
Route::get('orcamentos/{id}','OrcamentoController@show');



//Route::apiResource('/api2','Api\AcessoExternoController');
