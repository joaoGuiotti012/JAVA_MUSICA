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
                        'codigo'         => 'required|numeric', 
                        'visitado_id'    => 'required|numeric',
                        'visitante_id'   => 'required|numeric',  
                        'descricao'      => 'string|max:255',
                    ]);
                    return $request;
    }
    static function selectAll(){

        $busca = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->join('visitantes', 'visitantes.id', '=' , 'agendamento_visitas.visitante_id')
                ->select(
                'agendamento_visitas.id',
                'agendamento_visitas.visitado_id' , 
                'funcionarios.nome as nome_func',
                'funcionarios.setor', 
                'agendamento_visitas.codigo',
                'visitantes.foto',  
                'visitantes.nome',
                'visitantes.rg',
                'visitantes.empresa',
                'agendamento_visitas.guardaResp',
                'agendamento_visitas.descricao',
                'agendamento_visitas.dataSaida',
                'agendamento_visitas.dataEntrada'
                )->orderBy('agendamento_visitas.id' , 'desc')
                ->get();

                return $busca;

    }

    static function search($search){

        $busca = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->join('visitantes', 'visitantes.id', '=' , 'agendamento_visitas.visitante_id')
                ->select(
                'agendamento_visitas.id',
                'agendamento_visitas.visitado_id' , 
                'funcionarios.nome as nome_func',
                'funcionarios.setor', 
                'agendamento_visitas.codigo',
                'visitantes.foto',  
                'visitantes.nome',
                'visitantes.rg',
                'visitantes.empresa',
                'agendamento_visitas.guardaResp',
                'agendamento_visitas.descricao',
                'agendamento_visitas.dataSaida',
                'agendamento_visitas.dataEntrada'
                )->where('visitantes.nome','LIKE' , '%'.$search.'%' )
                ->orwhere('agendamento_visitas.codigo','LIKE' , '%'.$search.'%' )
                ->orWhere('visitantes.rg','LIKE' , '%'.$search.'%' )
                 ->orWhere('visitantes.empresa','LIKE' , '%'.$search.'%' )
                 ->orWhere('funcionarios.setor','LIKE' , '%'.$search.'%' )
                 ->orWhere('funcionarios.nome','LIKE' , '%'.$search.'%' )
                 ->orderBy('agendamento_visitas.id' , 'desc')
                 ->get();
        return $busca;
    }



    static function histSearch(Request $request){
        $busca = DB::table('agendamento_visitas')
                ->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->join('visitantes', 'visitantes.id', '=' , 'agendamento_visitas.visitante_id')
                ->select(
                    'agendamento_visitas.id',
                    'agendamento_visitas.visitado_id' , 
                    'funcionarios.nome as nome_func',
                    'funcionarios.setor', 
                    'agendamento_visitas.codigo',
                    'visitantes.foto',  
                    'visitantes.nome',
                    'visitantes.rg',
                    'visitantes.empresa',
                    'agendamento_visitas.guardaResp',
                    'agendamento_visitas.descricao',
                    'agendamento_visitas.dataSaida',
                    'agendamento_visitas.dataEntrada'
                )->where('visitantes.nome','LIKE' , $request->nome_visitante.'%' )
                ->where('visitantes.rg','LIKE' , $request->rg.'%' )
                ->where('visitantes.empresa','LIKE' , $request->empresa.'%' )
                ->where('funcionarios.setor','LIKE' , $request->setor.'%' )
                ->where('funcionarios.nome','LIKE' , $request->nome_visitado.'%' )
                ->where('agendamento_visitas.dataEntrada','LIKE' , $request->dataEntrada.'%' )
                ->where('agendamento_visitas.dataSaida','LIKE', $request->dataSaida.'%' )
                 ->orderBy('dataEntrada', 'desc')
                 ->get();
        return $busca;
    }
}
