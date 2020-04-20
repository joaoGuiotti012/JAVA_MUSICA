<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Estado;
use App\Cidade;
use App\Escolaridade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
date_default_timezone_set('America/Sao_Paulo');
class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->status == 'RH'){
            $cidades = Cidade::all();
            $estados = Estado::all();
            $escolaridades = Escolaridade::all();
            $pessoas = Pessoa::SelectPessoas();
            return view( "RH.pessoas", compact( 'cidades', 'escolaridades', 'estados' , 'pessoas') );
        }else
            return redirect('/home')->with("danger" , "Sem permissão de acesso a esta Pagina !" );  
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
    public function search( Request $request, Pessoa $pessoas )
    {
        $data = $request->all();
        $pessoas = Pessoa::Search( $data , $pessoas ); 
        $cidades = Cidade::all();
        $estados = Estado::all();
        $escolaridades = Escolaridade::all();
        return view('/rh/pessoas' , compact('pessoas' , 'cidades' , 'estados', 'escolaridades'));

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
        //dd($request->ficha , $request->curriculo);

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
        $pessoa->ficha = $request->ficha;
        $pessoa->curriculo = $request->curriculo;

        //dd($pessoa->ficha , $pessoa->curriculo);

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
            if( $request->ficha ){
                return redirect('rh/avaliacao')->with("success" , "Sucesso: Cadastro realizado exito ! ");
            }
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
    public function edit(Request $request, $id)
    {
        $request = Pessoa::valido($request); // valida os dados da request 
        //dd($request->pdf != null);
        $pessoa = Pessoa::find($id);

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
        $pessoa->curriculo = $request->curriculo;
        $pessoa->ficha = $request->ficha;
        //dd($pessoa->ficha ,$pessoa->curriculo);
        //dd();
        if( $request->pdf != null && $pessoa->pdf != null ){
           // dd('teste');
            if( Storage::disk('public')->delete('appRH/cadastros/pdf/'.$pessoa->pdf)  ){
                $nameFile = hash('sha512',uniqid(time() + rand(-900,900))).'.'.$request->pdf->extension() ;
                $diretorio = public_path('storage/appRH/cadastros/pdf/');
                if( isset($_FILES['pdf'] ) && $request->pdf->extension() == 'pdf'  ){
                    if(move_uploaded_file( $_FILES['pdf']['tmp_name'] , $diretorio.$nameFile ) ){
                        $pessoa->pdf = $nameFile;
                        
                    }
                }
            }
        }
        if( $pessoa->pdf == null && $request->pdf != null ){
           // dd('aqui');
            $nameFile = hash('sha512',uniqid(time() + rand(-900,900))).'.'.$request->pdf->extension() ;
            $diretorio = public_path('storage/appRH/cadastros/pdf/');
            if( isset($_FILES['pdf'] ) && $request->pdf->extension() == 'pdf'  ){
                if(move_uploaded_file( $_FILES['pdf']['tmp_name'] , $diretorio.$nameFile ) ){
                    $pessoa->pdf = $nameFile;
                }
            }
        }
        if ($pessoa->save()){
            
            return redirect('rh/pessoas')->with("success" , "Sucesso: Cadastro realizado exito ! ");
        }else{
            return redirect('rh/pessoas')->with("danger" , "Falha: Erro ao editar Cadastro ! ");
        }
       //return redirect('rh/pessoas')->with("danger" , "Falha ao gerar o cadastro! ");
        
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
       
        if($pessoa->pdf != null){
            Storage::disk('public')->delete('appRH/cadastros/pdf/'.$pessoa->pdf);
        }
        $pessoa->delete();
        return redirect('rh/pessoas')->with('success' , 'Deletar: Cadastro deletado com exito !');
        
            //return redirect('rh/pessoas')->with('danger' , 'Deletar: Erro ao deletar cadastro !');

    }
}
