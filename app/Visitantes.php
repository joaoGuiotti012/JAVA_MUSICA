<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use DB;

class Visitantes extends Model
{

    protected $fillable = [];

    static function valido(Request $request){
        $request->validate([
            'foto'           => 'file|max:600',  
            'nome'           => 'required',
            'rg'             => 'required|string|min:11',
            'empresa'        => 'required',
        ]);

        return $request;
    }


    static function selectAll( ){

        $busca = DB::table('visitantes')
                ->orderBy('id', 'DESC')
                ->take(250)
                ->get();
                
        return $busca;


    }


}
