<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|use Illuminate\Routing\Route;
*/



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('agendamento/saida', 'ControladorAgendamento@show')->name('agendamento.saida'); 

Route::get('agendamento', 'ControladorAgendamento@index')->name('agendamento'); 

Route::get('agendamento/search', 'ControladorAgendamento@search')->name('agendamento.search'); 

Route::post('agendamento/novo', 'ControladorAgendamento@store')->name('agendamento.novo'); 

Route::delete('agendamento/deletar{id}', 'ControladorAgendamento@destroy')->name('agendamento.destroy'); 

Route::patch('agendamento/editar{id}', 'ControladorAgendamento@update')->name('agendamento.update'); 

Route::patch('agendamento/saida{id}', 'ControladorAgendamento@saida')->name('agendamento.saida'); 



Route::get('visitantes', 'ControladorVisitantes@index')->name('visitantes');









