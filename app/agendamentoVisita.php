<?php

namespace App;

use Carbon\Traits\Timestamp;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class agendamentoVisita extends Model
{
    protected $fillable = [];

    public function visitado()
    {
        return $this->belongsTo('App\funcionarios' , 'visitado_id'); 
    }
    
    static function valido(Request $request){
        $request->validate([
            'nome'           => 'required',
            'empresa'        => 'required',
            'rg'             => 'required|string|min:11',
            'codigo'         => 'required|numeric', 
            'visitado_id'    => 'required',
            'foto'           => 'file|max:600',  
        ]);
        return $request;
    }


    static function search($search){

        $busca = DB::table('agendamento_visitas')->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select(
                'agendamento_visitas.id',
                'agendamento_visitas.foto',
                'agendamento_visitas.visitado_id' , 
                'agendamento_visitas.codigo', 
                'funcionarios.nome as nome_func',
                'funcionarios.setor', 
                'agendamento_visitas.codigo',
                'agendamento_visitas.nome',
                'agendamento_visitas.rg',
                'agendamento_visitas.empresa',
                'agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida',
                'agendamento_visitas.dataEntrada')
                ->where('agendamento_visitas.nome','LIKE' , '%'.$search.'%' )
                ->orwhere('agendamento_visitas.codigo','LIKE' , '%'.$search.'%' )
                ->orWhere('agendamento_visitas.rg','LIKE' , '%'.$search.'%' )
                 ->orWhere('agendamento_visitas.empresa','LIKE' , '%'.$search.'%' )
                 ->orWhere('funcionarios.setor','LIKE' , '%'.$search.'%' )
                 ->orWhere('funcionarios.nome','LIKE' , '%'.$search.'%' )
                 ->orderBy('dataEntrada', 'desc')
                 ->get();
        return $busca;
    }



    static function histSearch(Request $request){
        $busca = DB::table('agendamento_visitas')->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select(
                'agendamento_visitas.id',
                'agendamento_visitas.foto',
                'agendamento_visitas.visitado_id' , 
                'agendamento_visitas.codigo', 
                'funcionarios.nome as nome_func',
                'funcionarios.setor', 
                'agendamento_visitas.codigo',
                'agendamento_visitas.nome',
                'agendamento_visitas.rg',
                'agendamento_visitas.empresa',
                'agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida',
                'agendamento_visitas.dataEntrada'
                )->where('agendamento_visitas.dataEntrada','LIKE' , $request->dataEntrada.'%' )
                 ->where('agendamento_visitas.dataSaida','LIKE', $request->dataSaida.'%' )
                 ->orderBy('dataEntrada', 'desc')
                 ->get();
        return $busca;
    }
}
