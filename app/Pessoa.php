<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Pessoa extends Model
{
    protected $connection = 'db3';

    static function valido(Request $request){
        $request->validate([
            'nome'          => 'required', 
            'data_nasc'     => 'required',
            'cidade'        => 'required',
            'estado'        => 'required',
            'escolaridade'  => 'required',
            'cpf'           => 'required',
            'rg'            => 'required',  
            'fone1'         => 'required',
            'email'         => 'required',
        ]);
        return $request;
    }

    static function SelectPessoas(){
        $busca = DB::connection('db3')->table('pessoas')
                ->join('cidades', 'cidades.id', '=' , 'pessoas.cidade')
                ->join('estados', 'estados.id', '=' , 'pessoas.estado')
                ->select( 
                    'pessoas.id',
                    'pessoas.nome',           
                    'pessoas.cpf',                
                    'pessoas.rg',                
                    'cidades.descricao as cidade',                
                    'estados.descricao as estado',                
                    'pessoas.cargo_concorrido',                
                    'pessoas.setor'              
                )->get();

        return $busca;
    }       
}
