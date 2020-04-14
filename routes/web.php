<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    /* agendamento visitas */
    Route::get('agendamento', 'ControladorAgendamento@index')->name('agendamento'); 
    Route::post('agendamento/novo', 'ControladorAgendamento@store')->name('agendamento.novo'); 

    /* === RAMAIS === */

    Route::get('ramais', 'ControladorRamais@index')->name('ramais'); 

    /* === APP RH === */
    Route::get('rh/lancamentos', 'AvaliacaoController@show' )->name('lancamento');

});

Route::get('/resgistrar', function () {
    return view('auth.register');
});

/*======================== ROUTES AGENDAMENTO VISITAS ===================================*/ 

Route::get('agendamento/saida', 'ControladorAgendamento@show')->name('agendamento.saida'); 

Route::get('agendamento/saida/historico', 'ControladorAgendamento@showHistorico');

Route::get('agendamento/search', 'ControladorAgendamento@search')->name('agendamento.search'); 

Route::get('agendamento/historico', 'ControladorAgendamento@histSearch')->name('agendamento.histSearch'); 

Route::delete('agendamento/deletar{id}', 'ControladorAgendamento@destroy')->name('agendamento.destroy'); 

Route::patch('agendamento/editar{id}', 'ControladorAgendamento@update')->name('agendamento.update'); 

Route::patch('agendamento/saida{id}', 'ControladorAgendamento@saida')->name('agendamento.saida'); 

Route::get('agendamento/historico/export', 'ControladorAgendamento@exportExcel')->name('agendamento.export'); 

Route::get('agendamento/entrada{id}', 'ControladorAgendamento@entrada')->name('agendamento.entrada'); 
Route::get('agendamento/confSaida{id}', 'ControladorAgendamento@confSaida')->name('agendamento.confSaida'); 




/*============================== ROUTES VISITANTES ======================================*/ 


Route::get('visitantes', 'ControladorVisitantes@index')->name('visitantes');

Route::post('visitantes/novo', 'ControladorVisitantes@store')->name('visitantes.novo'); 

Route::patch('agendamento/editar{id}', 'ControladorVisitantes@update')->name('agendamento.update'); 

Route::get('visitantes/saida', 'ControladorVisitantes@show'); 

Route::get('visitantes/search' , 'ControladorVisitantes@search')->name('visitantes.search'); 

Route::delete('visitantes/delete{id}', 'ControladorVisitantes@destroy')->name('visitantes.destroy'); 

/*============================== ROUTES COLABORADORES ======================================*/ 



Route::get('funcionarios', 'ControladorFuncionario@index')->name('funcionarios');

Route::post('funcionarios/novo', 'ControladorFuncionario@store')->name('funcionarios.novo'); 

Route::patch('funcionarios/editar{id}', 'ControladorFuncionario@update')->name('funcionarios.update'); 

Route::delete('funcioanrios/delete{id}', 'ControladorFuncionario@destroy')->name('funcionarios.destroy'); 


Route::get('ajusteselect', 'Controller@ajusteSelect'); 





/*===================================== APP RH ===========================================*/ 


Route::get('rh/pessoas' , 'PessoaController@index')->name('pessoas.index');

Route::post('rh/pessoas/novo' , 'PessoaController@store')->name('pessoas.novo');


Route::get('rh/avaliacao' , 'AvaliacaoController@index')->name('avaliacao.index');

Route::post('rh/avaliacao/novo' , 'AvaliacaoController@store')->name('avaliacao.novo');

Route::any('rh/avaliacao/editar{id}' , 'AvaliacaoController@edit')->name('avaliacao.editar');

Route::delete('rh/avaliacao/delete{id}', 'AvaliacaoController@destroy')->name('avaliacao.delete'); 

Route::patch('rh/avaliacao/update{id}' , 'AvaliacaoController@update')->name('avaliacao.update');

Route::get('rh/avaliacao/search' , 'AvaliacaoController@search')->name('avaliacao.search');


//Route::get('avaliacao/novo' , 'AvaliacaoController@store')->name('avaliacao.novo');