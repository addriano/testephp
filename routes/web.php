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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/empresas', 'HomeController@index')->name('home');

Route::prefix('empresas')->group(function () {
    Route::get('/novo', 'app\EmpresasController@new');
    Route::post('/', 'app\EmpresasController@create');
    Route::get('/editar/{id}', 'app\EmpresasController@edit');
    Route::post('/editar/{id}', 'app\EmpresasController@update');
    Route::get('/excluir/{id}', 'app\EmpresasController@excluir');
});

Route::prefix('fornecedores')->group(function () {
    Route::get('/empresa/{id}', 'app\FornecedoresController@index');
    Route::get('/empresa/{id}/novo', 'app\FornecedoresController@new');
    Route::post('/empresa/{id}', 'app\FornecedoresController@create');
    Route::get('/{fid}/empresa/{id}/editar', 'app\FornecedoresController@edit');
    Route::post('/{fid}/empresa/{id}/editar', 'app\FornecedoresController@update');
});
