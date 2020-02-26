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
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\VarDumper\VarDumper;

class ControladorAgendamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Funcionario $func)
    {
            $func = Funcionario::all();
            return view('agendamento', compact('func'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $agendamento = Agendamento::valido($request);
        DB::table('agendamento_visitas')->insert($agendamento);
        return redirect('agendamento/saida' )->with('success', 'Agendamento Confirmado !! ');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        $agendamento = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select('agendamento_visitas.id','agendamento_visitas.visitado_id' , 'agendamento_visitas.codigo', 'funcionarios.nome as nome_func','funcionarios.setor', 'agendamento_visitas.codigo',
                'agendamento_visitas.nome','agendamento_visitas.rg','agendamento_visitas.empresa','agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida','agendamento_visitas.dataEntrada')
                ->get();
        $cont = count($agendamento);
        return view('saidaAgendamento', compact('agendamento'), compact('cont'));
        
    }

    public function search(Request $request){
        $busca = Agendamento::search($request->get('search'));
        $cont = count($busca);
        return view('saidaAgendamento', compact('busca') ,compact('cont'));
    }

    public function saida($id){
        $agendamento = Agendamento::find($id);
        $agendamento->dataSaida = Carbon::now();
        if( $agendamento->save() ){
            return redirect('agendamento/saida')->with('primary' , 'Confirmação de saida realizada com sucesso! ');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id'             => 'required',
            'nome'           => 'required',
            'empresa'        => 'required',
            'rg'             => 'required',
            'codigo'         => 'required', 
            'visitado_id'    => 'required',
            'dataEntrada'    => 'required'
        ]);
       
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
        }else{
            return redirect('agendamento/saida')->with('fail', 'Falha ao editar este agendamento :(');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $agendamento = Agendamento::find($id);
        $agendamento->delete();
        
        return redirect('agendamento/saida')->with('success', 'Agendamento deletado com sucesso !! ');
        
    }
}
