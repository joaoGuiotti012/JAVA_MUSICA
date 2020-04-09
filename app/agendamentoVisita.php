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
                        'descricao'      => 'max:255',
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
                'agendamento_visitas.descricao',
                'agendamento_visitas.dataPrevisao',
                'agendamento_visitas.horarioPrevisao',
                'agendamento_visitas.dataSaida',
                'agendamento_visitas.dataEntrada',
                'agendamento_visitas.hrEntrada',
                'agendamento_visitas.hrSaida',
                )->orderBy('agendamento_visitas.id' , 'desc')
                ->get();

                return $busca;

    }

    static function seachCodVi($id_visitante){
        $visitas =  DB::table('agendamento_visitas')
        ->select(
            'agendamento_visitas.id',
            'agendamento_visitas.codigo',
            'agendamento_visitas.visitante_id'
        )->where('agendamento_visitas.visitante_id' ,'=' , $id_visitante )
        ->get();
        return $visitas;
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
                'agendamento_visitas.descricao',
                'agendamento_visitas.dataSaida',
                'agendamento_visitas.dataEntrada',
                'agendamento_visitas.hrEntrada',
                'agendamento_visitas.hrSaida',
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
        
        $start= date($request->dataEntrada); 
        $end = date($request->dataSaida); 
        if($start != null and $end != null){
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
                    'agendamento_visitas.descricao',
                    'agendamento_visitas.dataSaida',
                    'agendamento_visitas.dataEntrada',
                    'agendamento_visitas.hrEntrada',
                    'agendamento_visitas.hrSaida',
                )->whereBetween('agendamento_visitas.dataEntrada', array($start, $end))
                // ->orderBy('dataEntrada', 'desc')
                ->get();
        }else{
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
                    'agendamento_visitas.descricao',
                    'agendamento_visitas.dataSaida',
                    'agendamento_visitas.dataEntrada',
                    'agendamento_visitas.hrEntrada',
                'agendamento_visitas.hrSaida',
                )->where('visitantes.nome','LIKE' , $request->nome_visitante.'%' )
                ->where('visitantes.rg','LIKE' , $request->rg.'%' )
                ->where('visitantes.empresa','LIKE' , $request->empresa.'%' )
                ->where('funcionarios.setor','LIKE' , $request->setor.'%' )
                ->where('funcionarios.nome','LIKE' , $request->nome_visitado.'%' )
                ->get();
        }
                
        return $busca;
    }
}
