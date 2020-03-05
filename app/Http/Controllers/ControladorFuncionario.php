<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class ControladorFuncionario extends Controller
{

    public function index()
    {

        $func = Funcionario::all();
        return view('funcionarios' , compact('func'));
        
    }


    public function store(Request $request)
    {
        $func = new Funcionario();
        $request = Funcionario::valido($request);

        $func->nome = mb_strtoupper($request->nome , 'UTF-8');
        $func->setor = mb_strtoupper($request->setor , 'UTF-8');
    
        if ($func->save()){
            return redirect('funcionarios' )->with('success', 'Funcionarios Confirmado !! ');
        }
    }

    
    public function update(Request $request, $id)
    {
        $request = Funcionario::valido($request);
       
        $func = Funcionario::find($id);
        $func->nome = mb_strtoupper($request->get('nome'), 'UTF-8' );
        $func->setor = mb_strtoupper($request->get('setor'), 'UTF-8' );

        $update = $func->save();

        if($update){
            return redirect('funcionarios' )->with('success', 'Colaborador editado :) ');
        }
    }

   
    public function destroy($id)
    {
        $func = Funcionario::find($id);
        $del = $func->delete();

        if($del){
            return redirect('funcionarios')->with('success', 'Agendamento deletado com sucesso !! ');
        }else{
            return redirect('funcionarios')->with('faill', '<b> Falha </b> ao deletar este Colaborador !');
        }

        
        
    }
}
