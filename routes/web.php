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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home'); //->name('home') es para ser llamado desde el código desde route{{}}, route()

//Logout
Route::get('logout', "Auth\LoginController@logout")->name('logout');

//Evento
Route::resource('evento','EventoController');
Route::post('eventoVisible', 'EventoController@visible')->name('visible');

//Lugar
Route::resource('lugar', 'LugarController');

//User
Route::resource('user', 'UserController');

//Persona
Route::resource('persona', 'PersonaController');

//Asistencia
Route::post('newAsistencia/{idEvento}', 'AsistenciaController@nueva')->name('nuevaAsis');
Route::resource('asistencia', 'AsistenciaController');
Route::get('buscarDni', 'AsistenciaController@buscarDni')->name('asistencia.buscarDni');
Route::put('regPago', 'AsistenciaController@regPago')->name('asistencia.regPago');

//Reporte
Route::get('reportes', 'ReporteController@index')->name('reportes');

Route::post('generateGenRep', 'ReporteController@generateGenRep')->name('genRep');
Route::post('downloadRepGen', 'ReporteController@downloadRepGen')->name('descRepGen');

Route::post('generateCatRep', 'ReporteController@generateCatRep')->name('catRep');
Route::post('downloadCatRep', 'ReporteController@downloadCatRep')->name('descCatRep');

Route::post('generateDateRep', 'ReporteController@generateDateRep')->name('dateRep');


