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
            'pdf'           => 'mimes:pdf|max:5000',  
        ]);
        return $request;
    }

    static function SelectPessoas(){
        $busca = DB::connection('db3')->table('pessoas')
                ->join('cidades', 'cidades.id', '=' , 'pessoas.cidade')
                ->join('estados', 'estados.id', '=' , 'pessoas.estado')
                ->join('escolaridades', 'escolaridades.id', '=' , 'pessoas.escolaridade')
                ->select( 
                    'pessoas.id',
                    'pessoas.nome',
                    'pessoas.data_nasc',
                    'pessoas.rg',
                    'pessoas.cpf',
                    'pessoas.nome_pai',
                    'pessoas.nome_mae',
                    'cidades.id as cidade_id',
                    'cidades.descricao as cidade',
                    'estados.id as estado_id',
                    'estados.descricao as estado',
                    'escolaridades.id as escolaridade_id',
                    'escolaridades.descricao as escolaridade',
                    'pessoas.endereco',
                    'pessoas.deficiencia',
                    'pessoas.cargo_concorrido',
                    'pessoas.setor',
                    'pessoas.fone1',
                    'pessoas.fone2',
                    'pessoas.email',
                    'pessoas.pdf',
                    'pessoas.indicacao',                
                    'pessoas.data_contato',                
                    'pessoas.data_retorno',                
                    'pessoas.cargo_concorrido',                
                    'pessoas.setor'            
                )->get();

        return $busca;
    }       
}
