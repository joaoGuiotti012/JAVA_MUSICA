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
        $re = $request->validate([
            'nome'           => 'required',
            'empresa'        => 'required',
            'rg'             => 'required',
            'codigo'         => 'required', 
            'visitado_id'    => 'required',
            'dataEntrada'    => 'required'
        ]);
        return $re;
    }

    static function search($search){

        $busca = DB::table('agendamento_visitas')->join('funcionarios', 'funcionarios.id', '=' , 'agendamento_visitas.visitado_id')
                ->select('agendamento_visitas.id','agendamento_visitas.visitado_id' , 'agendamento_visitas.codigo', 'funcionarios.nome as nome_func','funcionarios.setor', 'agendamento_visitas.codigo',
                'agendamento_visitas.nome','agendamento_visitas.rg','agendamento_visitas.empresa','agendamento_visitas.guardaResp',
                'agendamento_visitas.dataSaida','agendamento_visitas.dataEntrada')
                ->where('agendamento_visitas.nome','LIKE' , '%'.$search.'%' )
                ->orwhere('agendamento_visitas.codigo','LIKE' , '%'.$search.'%' )
                ->orWhere('agendamento_visitas.rg','LIKE' , '%'.$search.'%' )
                 ->orWhere('agendamento_visitas.empresa','LIKE' , '%'.$search.'%' )
                 ->orWhere('funcionarios.setor','LIKE' , '%'.$search.'%' )
                 ->orWhere('funcionarios.nome','LIKE' , '%'.$search.'%' )
                 ->get();
        return $busca;
    }
}
