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

Route::get('/', 'LoginController@loginForm')->name('loginForm');

Route::post('/login', 'LoginController@login')->name('login');

Route::get('/aluno', 'AlunoController@indexAluno')->name('indexAluno');

Route::post('/testeAluno', 'AlunoController@salvar')->name('salvar');

Route::get('/sair', 'LoginController@sair')->name('sair');