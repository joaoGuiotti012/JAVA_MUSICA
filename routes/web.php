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
    return view('welcome');
});

Auth::routes();

Route::apiResource('agendamento', 'ControladorAgendamento'); 

Route::delete('agendamento/{agendamento}','ProductsController@destroy');

/*
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/agendamento' , 'ControladorAgendamento@index');

Route::get('/agendamento/saida' , 'ControladorAgendamento@show');

Route::post('/agendamento/novo' , 'ControladorAgendamento@store');


*/

