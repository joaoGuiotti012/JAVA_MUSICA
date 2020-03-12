<?php

namespace App\Http\Controllers;

use App\agendamentoVisita;
use App\Visitantes;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

date_default_timezone_set('America/Sao_Paulo');

class ControladorVisitantes extends Controller
{
    public function __construct()
    {

    }

    public function index( Visitantes $visitantes)
    {
        $visitantes = Visitantes::selectAll();
        $cont = count($visitantes);
        return view('visitas.saidaVisitantes' , compact('visitantes') , compact('cont'));

    }

    public function show( Visitantes $visitantes)
    {
        $visitantes = Visitantes::selectAll();
        $cont = count($visitantes);
        return view('visitas.saidaVisitantes' , compact('visitantes') , compact('cont'));

    }

    public function store( Request $request){
        
        $visitantes = new Visitantes();
        $request = Visitantes::valido($request);

        if($request->file('foto')->isValid()){
           
            $nameFile = Carbon::now() . '.' . $request->foto->extension(); // seta novo nome ao arquivo
            $request->file('foto')->storeAs('visitantes' , $nameFile);

            $visitantes->foto = $nameFile;
            $visitantes->nome = mb_strtoupper($request->nome , 'UTF-8');
            $visitantes->rg = $request->rg;
            $visitantes->empresa = mb_strtoupper($request->empresa, 'UTF-8');

            $add = $visitantes->save();
            if($add > 0){
                return redirect('visitantes')->with('success' , 'visitante cadastro com sucesso !');
            }

        }else{
            return redirect('visitantes')->with('faill' , 'imgagem não é valida, falha no upload olhe o tipo apenas: jpg, jpeg, png !');
        }
       
    }

    public function search(Request $request){
       
        $visitantes = Visitantes::search($request);
        $cont = count($visitantes);
        return view('visitas.saidaVisitantes' , compact('visitantes' , 'cont'));
      
    }

    public function update(Request $request, $id){

        $request = Visitantes::validoEdit($request);

        if($request->old_foto == null){
            $nameFile = Carbon::now() . '.' . $request->new_foto->extension(); // seta novo nome ao arquivo
            $request->file('new_foto')->storeAs('visitantes' , $nameFile);

            // atualiza registro com valores novos
            $visitantes = Visitantes::find($id);
            $visitantes->nome = mb_strtoupper($request->get('nome') , 'UTF-8'); 
            $visitantes->empresa = mb_strtoupper($request->get('empresa' , 'UTF-8'));
            $visitantes->rg = $request->get('rg');
            $visitantes->foto = $nameFile;
            $update = $visitantes->save();
        }
        if( $request->new_foto != null ){
            if($request->file('new_foto')->isValid()){
                $del = Storage::disk('public')->delete( 'visitantes/'.$request->old_foto);
                if($del > 0){
                    $nameFile = Carbon::now() . '.' . $request->new_foto->extension(); // seta novo nome ao arquivo
                    $request->file('new_foto')->storeAs('visitantes' , $nameFile);
                    // atualiza registro com valores novos
                    $visitantes = Visitantes::find($id);
                    $visitantes->nome = mb_strtoupper($request->get('nome') , 'UTF-8'); 
                    $visitantes->empresa = mb_strtoupper($request->get('empresa' , 'UTF-8'));
                    $visitantes->rg = $request->get('rg');
                    $visitantes->foto = $nameFile;
                    $update = $visitantes->save();
                }else{
                    return redirect('visitantes')->with('fail', 'Falha ao deletar a imagem ! ');
                }
            }
        }else{
            $visitantes = Visitantes::find($id);
            $visitantes->nome = mb_strtoupper($request->get('nome') , 'UTF-8'); 
            $visitantes->empresa = mb_strtoupper($request->get('empresa' , 'UTF-8'));
            $visitantes->rg = $request->get('rg');
            $update = $visitantes->save();
        }
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
