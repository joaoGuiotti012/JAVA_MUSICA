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
            'foto'           => 'required|image|mimes:jpeg,png,jpg|max:5000',  
            'nome'           => 'required',
            'rg'             => 'required|string',
            'empresa'        => 'required',
        ]);

        return $request;
    }

    static function selectAll( ){

        $busca = DB::table('visitantes')
                ->orderBy('id', 'DESC')
                ->take(100)
                ->get();
                
        return $busca;

    }

    static function search( Request $request ){

        $busca = DB::table('visitantes')
                    ->select(
                        'visitantes.id',
                        'visitantes.foto',
                        'visitantes.nome',
                        'visitantes.rg',
                        'visitantes.empresa'
                    )
                    ->where('visitantes.nome','LIKE' , '%'.$request->nome.'%' )
                    ->where('visitantes.rg','LIKE' , '%'.$request->rg.'%' )
                    ->where('visitantes.empresa','LIKE' , '%'.$request->empresa.'%' )
                    ->orderBy('id', 'DESC')
                    ->take(50)
                    ->get();
        return $busca;

    }


}
