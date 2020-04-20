<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use DB;

class Avaliacao extends Model
{
    protected $connection = 'db3';

   

    static function search(array $data, Avaliacao $lancamentos){
        

        return $lancamentos
        ->join('pessoas', 'pessoas.id', '=' , 'avaliacaos.pessoa_id')
        ->join('cidades', 'cidades.id', '=' , 'pessoas.cidade')
        ->join('estados', 'estados.id', '=' , 'pessoas.estado')
        ->join('escolaridades', 'escolaridades.id', '=' , 'pessoas.escolaridade')
        ->select(
            'avaliacaos.id',
            'pessoas.nome',
            'pessoas.data_nasc',
            'pessoas.rg',
            'pessoas.cpf',
            'cidades.descricao as cidade',
            'estados.descricao as estado',
            'escolaridades.descricao as escolaridade',
            'pessoas.endereco',
            'pessoas.deficiencia',
            'pessoas.cargo_concorrido',
            'pessoas.setor',
            'pessoas.fone1',
            'pessoas.fone2',
            'pessoas.email',
            'pessoas.pdf',
            'pessoas.data_contato',
            'pessoas.data_retorno',
            'pessoas.indicacao',
            'avaliacaos.tp',
            'avaliacaos.date_tp',
            'avaliacaos.obs_tp',
            'avaliacaos.iac',
            'avaliacaos.date_iac',
            'avaliacaos.obs_iac',
            'avaliacaos.rs',
            'avaliacaos.date_rs',
            'avaliacaos.obs_rs',
            'avaliacaos.ptj',
            'avaliacaos.date_ptj',
            'avaliacaos.obs_ptj',
            'avaliacaos.rp',
            'avaliacaos.date_rp',
            'avaliacaos.obs_rp',
            'avaliacaos.if',
            'avaliacaos.date_if',
            'avaliacaos.obs_if',
            'avaliacaos.ic',
            'avaliacaos.date_ic',
            'avaliacaos.obs_ic',
            'avaliacaos.ep',
            'avaliacaos.date_ep',
            'avaliacaos.obs_ep',
            'avaliacaos.et',
            'avaliacaos.date_et',
            'avaliacaos.obs_et',
            'avaliacaos.ex',
            'avaliacaos.date_ex',
            'avaliacaos.obs_ex',
            'avaliacaos.obs_geral',
            'avaliacaos.responsavel',
            'avaliacaos.updated_at'
            )->where(function ($query) use ($data) {
                
                if( isset($data['def_aud']) ){
                    $query->where( 'pessoas.deficiencia' , $data['def_aud'] );
                }
                if( isset($data['def_vis']) ){
                    $query->orWhere( 'pessoas.deficiencia' , $data['def_vis'] );
                }
                if( isset($data['def_men']) ){
                    $query->orWhere( 'pessoas.deficiencia' , $data['def_men'] );
                }
                if( isset($data['def_fis']) ){
                    $query->orWhere( 'pessoas.deficiencia' , $data['def_fis'] );
                }
                if( $data['campo'] == 'responsavel' || $data['campo'] == 'obs_geral' || $data['campo'] == 'indicacao' ){
                    $query->where( $data['campo'] , 'LIKE' , '%'.$data['descricao'].'%' );
                }
                
                if( $data['campo'] == 'obs_' AND isset($data['descricao'])){
                    
                    if(isset($data['tp']) )
                        $query->where( $data['campo'].'tp' , 'LIKE' , '%'.$data['descricao'].'%' );
                        
                    if(isset($data['iac']) )
                        $query->where( $data['campo'].'iac' , 'LIKE', '%'.$data['descricao'].'%' );
                    
                    if(isset($data['rs']) )
                        $query->where( $data['campo'].'rs' , 'LIKE', '%'.$data['descricao'].'%');
                    
                    if(isset($data['ptj']))
                        $query->where( $data['campo'].'ptj' , 'LIKE',  '%'.$data['descricao'].'%');
                    
                    if(isset($data['rp']))
                        $query->where( $data['campo'].'rp' , 'LIKE', '%'.$data['descricao'].'%');
                    
                    if(isset($data['if']))
                        $query->where( $data['campo'].'if' ,  'LIKE', '%'.$data['descricao'].'%');
                    
                    if(isset($data['ic']))
                        $query->where( $data['campo'].'ic' , 'LIKE',  '%'.$data['descricao'].'%');
                    
                    if(isset($data['ep']))
                        $query->where( $data['campo'].'ep' ,'LIKE', '%'.$data['descricao'].'%');
                    
                    if(isset($data['et']))
                        $query->where( $data['campo'].'et' , 'LIKE', '%'.$data['descricao'].'%');
                    
                    if(isset($data['ex']))
                        $query->where( $data['campo'].'ex' , 'LIKE',  '%'.$data['descricao'].'%');
                    

                }else{

                    if( isset($data['campo']) AND isset($data['descricao']) AND $data['campo'] != 'responsavel' 
                        AND $data['campo'] != 'obs_geral' AND $data['campo'] != 'indicacao')
                        $query->where( 'pessoas.'.$data['campo'] , 'LIKE' ,  '%'.$data['descricao'].'%'  );
                    
                    if( isset($data['tp']))
                        $query->where('tp' ,  '=' , null);
                    
                    if( isset($data['iac']))
                        $query->where('iac' ,  '=' , null);
                    
                    if( isset($data['rs']))
                        $query->where('rs' ,  '=' , null);
                    
                    if( isset($data['ptj']))
                        $query->where('ptj' ,  '=' , null);
                    
                    if( isset($data['rp']))
                        $query->where('rp' ,  '=' , null);
                    
                    if( isset($data['if']))
                        $query->where('if' ,  '=' , null);
                    
                    if( isset($data['ic']))
                        $query->where('ic' ,  '=' , null);
                    
                    if( isset($data['ep']))
                        $query->where('ep' ,  '=' , null);
                    
                    if( isset($data['et']))
                        $query->where('et' ,  '=' , null);
                    
                    if( isset($data['ex']))
                        $query->where('ex' ,  '=' , null);
                }
                
            })->take(25)->get();
    }

    

    static function selectLancamentos(){
        $query = DB::connection('db3')->table('avaliacaos')
        ->join('pessoas', 'pessoas.id', '=' , 'avaliacaos.pessoa_id')
        ->join('cidades', 'cidades.id', '=' , 'pessoas.cidade')
        ->join('estados', 'estados.id', '=' , 'pessoas.estado')
        ->join('escolaridades', 'escolaridades.id', '=' , 'pessoas.escolaridade')
        ->select(
            'avaliacaos.id',
            'pessoas.nome',
            'pessoas.data_nasc',
            'pessoas.rg',
            'pessoas.cpf',
            'cidades.descricao as cidade',
            'estados.descricao as estado',
            'escolaridades.descricao as escolaridade',
            'pessoas.endereco',
            'pessoas.deficiencia',
            'pessoas.cargo_concorrido',
            'pessoas.setor',
            'pessoas.fone1',
            'pessoas.fone2',
            'pessoas.email',
            'pessoas.pdf',
            'pessoas.data_contato',
            'pessoas.data_retorno',
            'pessoas.indicacao',
            'avaliacaos.tp',
            'avaliacaos.date_tp',
            'avaliacaos.obs_tp',
            'avaliacaos.iac',
            'avaliacaos.date_iac',
            'avaliacaos.obs_iac',
            'avaliacaos.rs',
            'avaliacaos.date_rs',
            'avaliacaos.obs_rs',
            'avaliacaos.ptj',
            'avaliacaos.date_ptj',
            'avaliacaos.obs_ptj',
            'avaliacaos.rp',
            'avaliacaos.date_rp',
            'avaliacaos.obs_rp',
            'avaliacaos.if',
            'avaliacaos.date_if',
            'avaliacaos.obs_if',
            'avaliacaos.ic',
            'avaliacaos.date_ic',
            'avaliacaos.obs_ic',
            'avaliacaos.ep',
            'avaliacaos.date_ep',
            'avaliacaos.obs_ep',
            'avaliacaos.et',
            'avaliacaos.date_et',
            'avaliacaos.obs_et',
            'avaliacaos.ex',
            'avaliacaos.date_ex',
            'avaliacaos.obs_ex',
            'avaliacaos.obs_geral',
            'avaliacaos.responsavel',
            'avaliacaos.updated_at'
        )->take(25)->get();
        return $query;
    }

}
