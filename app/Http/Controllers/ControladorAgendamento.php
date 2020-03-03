<?php

namespace App\Http\Controllers;


use App\agendamentoVisita as Agendamento;
use App\Funcionario;
use App\Visitantes;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use DB;
use Dotenv\Validator;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\VarDumper\VarDumper;

class ControladorAgendamento extends Controller
{
    
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }


    public function index(Funcionario $func)
    {
            $func = Funcionario::all();
            $visitantes = Visitantes::all();
            return view('agendamento', compact('func' , 'visitantes'));
    }

    

  
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {   
        $agendamento = new Agendamento();
        $request = Agendamento::valido($request);

        $agendamento->codigo = $request->codigo;
        $agendamento->visitado_id = $request->visitado_id;
        $agendamento->visitante_id = $request->visitante_id;
        $agendamento->dataEntrada = Carbon::now();
    
        if ($agendamento->save()){
            return redirect('agendamento/saida' )->with('success', 'Agendamento Confirmado !! ');
        }
        
    }

    public function show( )
    {
        $agendamento = Agendamento::selectAll();
        $cont = count($agendamento);
        return view('saidaAgendamento', compact('agendamento'), compact('cont'));
        
    }

    public function showHistorico( )
    {
        $agendamento = Agendamento::selectAll();
                
        $cont = count($agendamento);
        return view('historicoAgendamento', compact('agendamento'), compact('cont'));
        
    }

    public function search(Request $request){
        $busca = Agendamento::search($request->get('search'));
        $cont = count($busca);
        return view('saidaAgendamento', compact('busca') ,compact('cont'));
    }

    public function histSearch(Request $request){
        $busca = Agendamento::histSearch($request);

        return view('historicoAgendamento',  compact('busca'));
    }

    public function saida($id){
        $agendamento = Agendamento::find($id);
        $agendamento->dataSaida = Carbon::now();
        if( $agendamento->save() ){
            return redirect('agendamento/saida')->with('primary' , 'Confirmação de saida realizada com sucesso! ');
        }
    }

    public function edit($id)
    {
        //
    }
  
    public function update(Request $request, $id)
    {
        $request = Agendamento::valido($request);
       
        $agendamento = Agendamento::find($id);
        $agendamento->nome = $request->get('nome');
        $agendamento->empresa = $request->get('empresa');
        $agendamento->rg = $request->get('rg');
        $agendamento->codigo = $request->get('codigo');
        $agendamento->visitado_id = $request->get('visitado_id');
        $agendamento->dataEntrada = $request->get('dataEntrada');
        $update = $agendamento->save();

        if($update){
            return redirect('agendamento/saida' )->with('success', 'Agendamento atualizado :) ');
        }
    }

  
    public function destroy( $id)
    {
        $agendamento = Agendamento::find($id);
        $agendamento->delete();
        
        return redirect('agendamento/saida')->with('success', 'Agendamento deletado com sucesso !! ');
        
    }
}
