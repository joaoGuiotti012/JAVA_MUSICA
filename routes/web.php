<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/



Route::get('/', function () {
    return view('home');
});


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    /* agendamento visitas */
    Route::get('agendamento', 'ControladorAgendamento@index')->name('agendamento'); 
    Route::post('agendamento/novo', 'ControladorAgendamento@store')->name('agendamento.novo'); 

    /* visitantes*/


});

/*======================== ROUTES AGENDAMENTO VISITAS ===================================*/ 

Route::get('agendamento/saida', 'ControladorAgendamento@show')->name('agendamento.saida'); 

Route::get('agendamento/saida/historico', 'ControladorAgendamento@showHistorico');

Route::get('agendamento/search', 'ControladorAgendamento@search')->name('agendamento.search'); 

Route::get('agendamento/historico', 'ControladorAgendamento@histSearch')->name('agendamento.histSearch'); 

Route::delete('agendamento/deletar{id}', 'ControladorAgendamento@destroy')->name('agendamento.destroy'); 

Route::patch('agendamento/editar{id}', 'ControladorAgendamento@update')->name('agendamento.update'); 

Route::patch('agendamento/saida{id}', 'ControladorAgendamento@saida')->name('agendamento.saida'); 




/*============================== ROUTES VISITANTES ======================================*/ 


Route::get('visitantes', 'ControladorVisitantes@index')->name('visitantes');

Route::post('visitantes/novo', 'ControladorVisitantes@store')->name('visitantes.novo'); 

Route::get('visitantes/saida', 'ControladorVisitantes@show'); 

Route::get('visitantes/search' , 'ControladorVisitantes@search')->name('visitantes.search'); 

Route::delete('visitantes/delete{id}', 'ControladorVisitantes@destroy')->name('visitantes.destroy'); ; 










