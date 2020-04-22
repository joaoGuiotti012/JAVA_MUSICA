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
    static function Search($data , Pessoa $pessoas){
        return $pessoas
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
                    'pessoas.setor',
                    'pessoas.ficha',
                    'pessoas.curriculo'
                )->where( function ($query) use ($data) {
                    if( isset($data['ficha']) ){
                        $query->where( 'ficha' , '!=' , null  );
                    }
                    if( isset($data['curriculo']) ){
                        //dd($data['curriculo']);
                        $query->where( 'curriculo' , '!=' , null );
                    }
                    if( isset($data['def_aud']) ){
                        $query->where( 'deficiencia' , $data['def_aud'] );
                    }
                    if( isset($data['def_vis']) ){
                        $query->orWhere( 'deficiencia' , $data['def_vis'] );
                    }
                    if( isset($data['def_men']) ){
                        $query->orWhere( 'deficiencia' , $data['def_men'] );
                    }
                    if( isset($data['def_fis']) ){
                        $query->orWhere( 'deficiencia' , $data['def_fis'] );
                    }
                    if( isset($data['cidade']) ){
                        $query->orWhere( 'cidade' , $data['cidade'] );
                    }
                    if( isset($data['estado']) ){
                        $query->orWhere( 'estado' , $data['estado'] );
                    }

                    if( isset($data['campo']) && isset($data['descricao']) ){
                        $query->where( $data['campo'] , 'LIKE' , '%'.$data['descricao'].'%' );
                    }
                })->take(30)->get();
        return $pessoas;
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
                    'pessoas.setor',
                    'pessoas.ficha',
                    'pessoas.curriculo'
                )->get();// dd($busca);

        return $busca;
    }

    static function SelectPessoasCad(){
        $av = DB::connection('db3')->table('avaliacaos')->select('id');
        //dd($av);
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
                )->whereNotIn( 'pessoas.id' , $av )->get();// dd($busca);

        return $busca;
    }
}
