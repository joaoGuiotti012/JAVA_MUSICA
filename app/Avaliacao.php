<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Avaliacao extends Model
{
    protected $connection = 'db3';


    static function search(Array $data, Avaliacao $lancamentos){
        return $lancamentos->join('pessoas', 'pessoas.id', '=' , 'avaliacaos.pessoa_id')
        ->select(
            'avaliacaos.id',
            'pessoas.nome',
            'pessoas.rg',
            'pessoas.cargo_concorrido',
            'pessoas.setor',
            'pessoas.data_contato',
            'pessoas.data_retorno',
            'avaliacaos.tp',
            'avaliacaos.date_tp',
            'avaliacaos.iac',
            'avaliacaos.date_iac',
            'avaliacaos.rs',
            'avaliacaos.date_rs',
            'avaliacaos.ptj',
            'avaliacaos.date_ptj',
            'avaliacaos.rp',
            'avaliacaos.date_rp',
            'avaliacaos.if',
            'avaliacaos.date_if',
            'avaliacaos.ic',
            'avaliacaos.date_ic',
            'avaliacaos.ep',
            'avaliacaos.date_ep',
            'avaliacaos.et',
            'avaliacaos.date_et',
            'avaliacaos.ex',
            'avaliacaos.date_ex' )->where(function ($query) use ($data) {
                if( isset($data['campo']) AND isset($data['descricao']) ){
                    $query->where( 'pessoas.'.$data['campo'] , 'LIKE' ,  '%'.$data['descricao'].'%'  );
                }
                if( isset($data['tp'])){
                    $query->where('tp' ,  '=' , null);
                }
                if( isset($data['iac'])){
                    $query->where('iac' ,  '=' , null);
                }
                if( isset($data['rs'])){
                    $query->where('rs' ,  '=' , null);
                }
                if( isset($data['ptj'])){
                    $query->where('ptj' ,  '=' , null);
                }
                if( isset($data['rp'])){
                    $query->where('rp' ,  '=' , null);
                }
                if( isset($data['if'])){
                    $query->where('if' ,  '=' , null);
                }
                if( isset($data['ic'])){
                    $query->where('ic' ,  '=' , null);
                }
                if( isset($data['ep'])){
                    $query->where('ep' ,  '=' , null);
                }
                if( isset($data['et'])){
                    $query->where('et' ,  '=' , null);
                }
                if( isset($data['ex'])){
                    $query->where('ex' ,  '=' , null);
                }
        })->get();

    }



    static function selectLancamentos(){
        $query = DB::connection('db3')->table('avaliacaos')
        ->join('pessoas', 'pessoas.id', '=' , 'avaliacaos.pessoa_id')
        ->select(
            'avaliacaos.id',
            'pessoas.nome',
            'pessoas.rg',
            'pessoas.cargo_concorrido',
            'pessoas.setor',
            'pessoas.data_contato',
            'pessoas.data_retorno',
            'avaliacaos.tp',
            'avaliacaos.date_tp',
            'avaliacaos.iac',
            'avaliacaos.date_iac',
            'avaliacaos.rs',
            'avaliacaos.date_rs',
            'avaliacaos.ptj',
            'avaliacaos.date_ptj',
            'avaliacaos.rp',
            'avaliacaos.date_rp',
            'avaliacaos.if',
            'avaliacaos.date_if',
            'avaliacaos.ic',
            'avaliacaos.date_ic',
            'avaliacaos.ep',
            'avaliacaos.date_ep',
            'avaliacaos.et',
            'avaliacaos.date_et',
            'avaliacaos.ex',
            'avaliacaos.date_ex'
        )->get();
        return $query;
    }

}
