<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Estado;
use App\Cidade;
use App\Escolaridade;
use Illuminate\Http\Request;

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
        return view( "RH.pessoas", compact( 'cidades', 'escolaridades', 'estados') );
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
        
        $pessoa = new Pessoa();
        $request = Pessoa::valido($request);
        $pessoa->nome = $request->nome;
        $pessoa->data_nasc = $request->data_nasc;
        $pessoa->cidade = $request->cidade;
        $pessoa->estado = $request->estado;
        $pessoa->endereco = $request->endereco;
        $pessoa->escolaridade = $request->escolaridade;
        $pessoa->cpf = $request->cpf;
        $pessoa->rg = $request->rg;
        $pessoa->nome_pai = $request->nome_pai;
        $pessoa->nome_mae = $request->nome_mae;
        $pessoa->fone1 = $request->fone1;
        $pessoa->fone2 = $request->fone2;
        $pessoa->email = $request->email;
        $pessoa->deficiencia = $request->deficiencia;
        $pessoa->pdf = $request->pdf;
        $pessoa->cargo_concorrido = $request->cargo_concorrido;
        $pessoa->setor = $request->setor;
        $pessoa->data_contato = $request->data_contato;
        $pessoa->data_retorno = $request->data_retorno;
        $pessoa->responsavel = $request->responsavel;
       
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
    public function destroy(Pessoa $pessoa)
    {
        //
    }
}
