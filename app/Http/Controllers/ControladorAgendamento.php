<?php

namespace App\Http\Controllers;


use App\agendamentoVisita as Agendamento;
use App\Funcionario;
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
            return view('agendamento', compact('func'));
    }

    

  
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {   
        $agendamento = new Agendamento();
        $request = Agendamento::valido($request);
       
        if($request->file('foto')->isValid()){
            $nameFile = Carbon::now() . '.' . $request->foto->extension();
            $request->file('foto')->storeAs('visitantes' , $nameFile);
        }

        $agendamento->nome = $request->nome;
        $agendamento->empresa = $request->empresa;
        $agendamento->foto = $nameFile;
        $agendamento->rg = $request->rg;
        $agendamento->codigo = $request->codigo;
        $agendamento->visitado_id = $request->visitado_id;
        $agendamento->dataEntrada = Carbon::now();
    
        if ($agendamento->save()){
            return redirect('agendamento/saida' )->with('success', 'Agendamento Confirmado !! ');
        }
        
    }

    public function show( )
    {
        $agendamento = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select(
                'agendamento_visitas.id',
                'agendamento_visitas.visitado_id' , 
                'agendamento_visitas.foto',  
                'agendamento_visitas.codigo', 
                'funcionarios.nome as nome_func',
                'funcionarios.setor', 
                'agendamento_visitas.codigo',
                'agendamento_visitas.nome',
                'agendamento_visitas.rg',
                'agendamento_visitas.empresa',
                'agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida','agendamento_visitas.dataEntrada'
                )->get();
                
        $cont = count($agendamento);
        return view('saidaAgendamento', compact('agendamento'), compact('cont'));
        
    }

    public function showHistorico( )
    {
        $agendamento = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select(
                'agendamento_visitas.id',
                'agendamento_visitas.visitado_id' , 
                'agendamento_visitas.foto',  
                'agendamento_visitas.codigo', 
                'funcionarios.nome as nome_func',
                'funcionarios.setor', 
                'agendamento_visitas.codigo',
                'agendamento_visitas.nome',
                'agendamento_visitas.rg',
                'agendamento_visitas.empresa',
                'agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida','agendamento_visitas.dataEntrada'
                )->get();
                
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
        $cont = count($busca);
        return view('historicoAgendamento',  compact('busca'), compact('cont'));
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
