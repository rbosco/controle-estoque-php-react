<?php

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
// Route::get('/',function(){
//     return view('welcome');
// });

Route::view('/{path?}', 'welcome');
// Route::get('/', ['as' => 'produto', 'uses' => 'ProdutoController@index']);
// Route::post('/manter-produto', ['as' => 'manter-produto', 'uses' => 'ProdutoController@manterProduto']);
Route::get('/api/v1/listar-produto', ['as' => 'listar-produto', 'uses' => 'ProdutoController@index']);
// Route::get('/remover-produto/{id}', ['as' => 'remover-produto', 'uses' => 'ProdutoController@removerProduto']);
// Route::get('/editar-produto/{id}', ['as' => 'editar-produto', 'uses' => 'ProdutoController@editarProduto']);

// Route::get('/categoria', ['as' => 'categoria', 'uses' => 'CategoriaController@index']);
// Route::post('/categoria/manter-categoria', ['as' => 'manter-categoria', 'uses' => 'CategoriaController@manterCategoria']);
// Route::get('/categoria/listar-categoria', ['as' => 'listar-categoria', 'uses' => 'CategoriaController@listarCategoria']);
// Route::get('/categoria/remover-categoria/{id}', ['as' => 'remover-categoria', 'uses' => 'CategoriaController@removerCategoria']);
// Route::get('/categoria/editar-categoria/{id}', ['as' => 'editar-categoria', 'uses' => 'CategoriaController@editarCategoria']);
