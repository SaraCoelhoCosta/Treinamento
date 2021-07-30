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
    return view('auth.login');
});

Route::get('logout', ['uses' => 'Auth\LoginController@logout']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('cliente/list', ['uses' => 'ClienteController@list']);
    Route::resource('cliente', 'ClienteController');
    Route::get('produto/list', ['uses' => 'ProdutoController@list']);
    Route::resource('produto', 'ProdutoController');
    Route::get('venda/list', ['uses' => 'VendaController@list']);
    Route::resource('venda', 'VendaController');
});
