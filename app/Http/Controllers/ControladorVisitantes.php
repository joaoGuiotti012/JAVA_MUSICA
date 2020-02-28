<?php

namespace App\Http\Controllers;
use App\Visitantes;

use Illuminate\Http\Request;
use Carbon\Carbon;
class ControladorVisitantes extends Controller
{
    public function __construct()
    {

    }

    public function index( Visitantes $visitantes)
    {
        $visitantes = Visitantes::selectAll();
        $cont = count($visitantes);
        return view('saidaVisitantes' , compact('visitantes') , compact('cont'));

    }

    public function store( Request $request){

        $visitantes = new Visitantes();
        $request = Visitantes::valido($request);
        
   
        if($request->file('foto')->isValid()){
            $nameFile = Carbon::now() . '.' . $request->foto->extension();
            $request->file('foto')->storeAs('visitantes' , $nameFile);
        }

        $visitantes->foto = $nameFile;
        $visitantes->nome = $request->nome;
        $visitantes->rg = $request->rg;
        $visitantes->empresa = $request->empresa;
        $add = $visitantes->save();
        if($add > 0){
            return redirect('visitantes')->with('success' , 'visitante cadastro com sucesso !');
        }
       
    }

    public function destroy($id)
    {
     
        $visitantes = Visitantes::find($id);
        $visitantes->delete();
        
        return redirect('visitantes')->with('success', 'Agendamento deletado com sucesso !! ');
        
    }

}
