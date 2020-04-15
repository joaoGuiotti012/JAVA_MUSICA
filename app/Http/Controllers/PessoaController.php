<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Estado;
use App\Cidade;
use App\Escolaridade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::all();
        $estados = Estado::all();
        $escolaridades = Escolaridade::all();
        $pessoas = Pessoa::SelectPessoas();
        return view( "RH.pessoas", compact( 'cidades', 'escolaridades', 'estados' , 'pessoas') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = Pessoa::valido($request); // valida os dados da request 
        $pessoa = new Pessoa();

        $pessoa->nome = mb_strtoupper($request->nome);
        $pessoa->data_nasc = $request->data_nasc;
        $pessoa->cidade = $request->cidade;
        $pessoa->estado = $request->estado;
        $pessoa->endereco = mb_strtoupper($request->endereco);
        $pessoa->escolaridade = $request->escolaridade;
        $pessoa->cpf = $request->cpf;
        $pessoa->rg = $request->rg;
        $pessoa->nome_pai = mb_strtoupper($request->nome_pai);
        $pessoa->nome_mae = mb_strtoupper($request->nome_mae);
        $pessoa->fone1 = $request->fone1;
        $pessoa->fone2 = $request->fone2;
        $pessoa->email = mb_strtoupper($request->email);
        $pessoa->deficiencia = mb_strtoupper($request->deficiencia);
        $pessoa->cargo_concorrido = mb_strtoupper($request->cargo_concorrido);
        $pessoa->setor = mb_strtoupper($request->setor);
        $pessoa->data_contato = $request->data_contato;
        $pessoa->data_retorno = $request->data_retorno;
        $pessoa->indicacao = mb_strtoupper($request->indicacao);
        if( isset($request->pdf) ){
            $nameFile = hash('sha512',uniqid(time() + rand(-900,900))).'.'.$request->pdf->extension() ;
            $diretorio = public_path('storage/appRH/cadastros/pdf/');
            if( isset($_FILES['pdf'] ) && $request->pdf->extension() == 'pdf'  ){
                if(move_uploaded_file( $_FILES['pdf']['tmp_name'] , $diretorio.$nameFile ) ){
                    $pessoa->pdf = $nameFile;
                }
            }
        }
        if( $pessoa->save() ){
            return redirect('rh/pessoas')->with("success" , "Sucesso: Cadastro realizado exito ! ");
        }else{
            return redirect('rh/pessoas')->with("danger" , "Falha ao gerar o cadastro! ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $pessoa = Pessoa::find($id);
        $pdf = 'appRH/cadastros/pdf/'.$pessoa->pdf;
        
        if( $pessoa->pdf )
            if(!Storage::disk('public')->delete($pdf) )
                return redirect('rh/pessoas')->with('danger' , 'Deletar: Erro ao deletar PDF !');
        
        if($pessoa->delete())
            return redirect('rh/pessoas')->with('success' , 'Deletar: Cadastro deletado com exito !');
        else
            return redirect('rh/pessoas')->with('danger' , 'Deletar: Erro ao deletar cadastro !');

  

    }
}
