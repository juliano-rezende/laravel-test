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

/**
 *############################################################### ROTAS GET
 * tela inicial com a grid dos produtos
 */


Route::get('/','ControllerProducts@index')->name('product.index');
Route::get('/cadastro','ControllerProducts@create')->name('product.form.new');
Route::get('/editar/{id}', 'ControllerProducts@edit')->name('product.edit');
Route::get('/deletar/{id}', 'ControllerProducts@destroy')->name('product.delete');

Route::post('/create','ControllerProducts@store')->name('new.product');
Route::post('/alterar/{id}','ControllerProducts@update')->name('update.product');




Route::post('/importar','ControllerProducts@import')->name('import.product');



