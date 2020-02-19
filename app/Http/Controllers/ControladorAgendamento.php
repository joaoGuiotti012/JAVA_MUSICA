<?php

namespace App\Http\Controllers;


use App\agendamentoVisita as Agendamento;
use App\Funcionario;
use Carbon\Traits\Timestamp;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ControladorAgendamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response
     */


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
    public function store(Agendamento $agendamento)
    {
        
        $agendamento= request()->validate([
            'nome'           => 'required',
            'empresa'        => 'required',
            'rg'             => 'required',
            'codigo'         => 'required', 
            'visitado_id'    => 'required',
            'dataEntrada'    => 'required'   
        ]);
        
        var_dump($agendamento);
                        
       
        DB::table('agendamento_visitas')->insert($agendamento);
        
        return redirect('saidaAgendamento')->with('success', 'Agendamento Confirmado !! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        /*$agendamento = agendamentoVisita::all();*/
        $agendamento = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select('agendamento_visitas.codigo', 'funcionarios.nome as nome_func','funcionarios.setor', 'agendamento_visitas.codigo',
                'agendamento_visitas.nome','agendamento_visitas.rg','agendamento_visitas.empresa','agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida','agendamento_visitas.dataEntrada')
                ->get();
            
        return view('saidaAgendamento', compact('agendamento'));

        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return view('saidaAgendamento');
        
    }
}
