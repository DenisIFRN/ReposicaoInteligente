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

Route::get('/auth', 'LoginController@auth')->name('auth');

Route::get('/sair', 'LoginController@sair')->name('sair');

Route::get('/download{anexo}', 'DownloadController@download')->name('download');

Route::resource('aluno', 'AlunoController');

Route::resource('secretario', 'SecretarioController');

Route::resource('professor', 'ProfessorController');