<?php

namespace App\Http\Controllers;

use App\agendamentoVisita;
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

    public function show( Visitantes $visitantes)
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

    public function search(Request $request){
       
        $visitantes = Visitantes::search($request);
        $cont = count($visitantes);
        return view('saidaVisitantes' , compact('visitantes' , 'cont'));
      
    }

    public function update(Request $request, $id){

        $request = Visitantes::valido($request);

        $visitantes = Visitantes::find($id);
        $visitantes->nome = $request->get('nome');
        $visitantes->empresa = $request->get('empresa');
        $visitantes->rg = $request->get('rg');
        $update = $visitantes->save();

        if($update){
            return redirect('visitantes')->with('success', 'Agendamento alterado com sucesso ! ');
        }

    }

    public function destroy($id)
    {
     
        $visitantes = Visitantes::find($id);
        $visitantes->delete();
        return redirect('visitantes')->with('success', 'Agendamento deletado com sucesso !! ');
        
    }


}
