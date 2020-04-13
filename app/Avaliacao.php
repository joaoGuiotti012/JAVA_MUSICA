<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Avaliacao extends Model
{
    protected $connection = 'db3';



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
