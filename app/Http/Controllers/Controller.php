<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Visitantes;
use App\agendamentoVisita;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function ajusteSelect(){

        $visitantes = Visitantes::all();
    
        foreach($visitantes as $vi){
            $duplicados = Visitantes::findDuplicados($vi->rg);
        
            foreach($duplicados as $du){
                $cont = 1;

                if($cont > 1){

                    $del = Visitantes::find($du->id);
                    $del->delete();


                }

                $cont = $cont + 1;
            }
        }
            
    }

}
