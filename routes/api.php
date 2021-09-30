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

//? Rota de Teste retornando um array.
Route::get('/message', 'APIController@showMessage')->middleware('iphone');

//? Rota de teste action.
Route::post('/action', 'APIController@showAction');

//? Rotas para o controller Pessoas.

Route::get('listagem-pessoa', 'APIPessoasController@listagemDePessoas')->middleware('authenticate-api');

//? Rota para listagem de pessoa por id.
Route::get('listagem-pessoa/{id}', 'APIPessoasController@listagemDePessoasById')->middleware('authenticate-api');

//? Rota para cadastrar.
Route::post('cadastro-pessoa','APIPessoasController@cadastraPessoa');

//? Rota para atualizar.
Route::put('atualizar-pessoa/{id}', 'APIPessoasController@atualizarPessoa');

//? Rota para deletar.
Route::delete('deletar-pessoa/{id}', 'APIPessoasController@deletePessoa');

//Route::get('product-list-add', 'ServicesAPIVtexController@addAllProduct');

//? Rota service para listar atributos: productId, productName e brand de todos os produtos da URL --> FUNCIONANDO
Route::get('listagem-search', 'ServicesAPIVtexController@listagemSearchVtex');

//? Busca o produto na URL pelo ID e adiciona o produto na minha migrate --> FUNCIONANDO
Route::post('product-add/{productId}', 'ServicesAPIVtexController@addProductVtex');

//? Rota para listagem de produtos da minha migrate --> FUNCIONANDO
Route::get('product-list', 'ServicesAPIVtexController@listProductVtex');

//! Rota para testar 
Route::get('test', 'APIPessoasController@test');