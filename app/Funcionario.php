<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Funcionario extends Model
{
    protected $fillable = [];




    static function Valido(Request $request){

        $request->validate([
            'nome'     => 'required', 
            'setor'    => 'required',
        ]);
        return $request;
        
    }

    static function selectAll(){

        $busca = DB::table('funcionarios')
                ->orderBy('created_at', 'DESC')
                ->get();

        return $busca;

    }

    
}
