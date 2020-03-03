<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    
}
