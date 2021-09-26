<?php

use GuzzleHttp\Middleware;
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

Route::get('/deslogar', 'LoginController@deslogar')->name('deslogar');
Route::get('/entrar', 'LoginController@index')->name('login');
Route::post('/entrar', 'LoginController@login');

Route::prefix('/user')->group(function () {
    Route::get('cadastrar', 'UserController@create')->name('form_cadastra_user');
    Route::post('cadastrar', 'UserController@store')->name('form_cadastra_user');

    Route::get('editar', 'UserController@editar')->name('form_editar_user')->middleware('auth');
    Route::post('editar', 'UserController@editarsave')->name('form_editar_user')->middleware('auth');
});

Route::prefix('/categorias')->group(function () {
    Route::get('', 'CategoriaController@index')->name('categorias')->middleware('auth');
    Route::get('cadastrar', 'CategoriaController@create')->name('form_cadastra_categoria')->middleware('auth');
    Route::post('cadastrar', 'CategoriaController@store')->name('form_cadastra_categoria')->middleware('auth');
    Route::get('{id}/editar', 'CategoriaController@editar')->middleware('auth');
    Route::post('editar', 'CategoriaController@editarsave')->name('form_editar_categoria')->middleware('auth');
    Route::delete('/delete/{id}', 'CategoriaController@destroy')->middleware('auth');
});

Route::prefix('/produtos')->group(function () {
    Route::get('', 'ProdutoController@index')->name('produtos')->middleware('auth');
    Route::get('cadastrar', 'ProdutoController@create')->name('form_cadastra_produto')->middleware('auth');
    Route::post('cadastrar', 'ProdutoController@store')->name('form_cadastra_produto')->middleware('auth');
    Route::get('{id}/editar', 'ProdutoController@editar')->middleware('auth');
    Route::post('editar', 'ProdutoController@editarsave')->name('form_editar_produto')->middleware('auth');
    Route::delete('/delete/{id}', 'ProdutoController@destroy')->middleware('auth');
});

Route::prefix('/dashboard')->group(function () {
    Route::get('', 'DashboardController@index')->name('dashboard');
});

