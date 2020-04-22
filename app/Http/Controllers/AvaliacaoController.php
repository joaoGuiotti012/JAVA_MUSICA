<?php

namespace App\Http\Controllers;

use App\agendamentoVisita;
use App\Avaliacao;
use App\HistAvaliacao;
use App\ItensAvaliacao as Itens;
use App\Pessoa;
use Carbon\Carbon;
use App\User;
use DB;
use Illuminate\Http\Request;

date_default_timezone_set('America/Sao_Paulo');
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class AvaliacaoController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $itens = Itens::all();
        $pessoas = Pessoa::SelectPessoasCad();
        $users = User::all();
        return view('RH.avaliacao', compact('itens' , 'pessoas' , 'users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $av = new Avaliacao();

        //dd($request->responsavel);
        $av->pessoa_id = $request->cad_num;
        $av->tp = $request->chk_tp;
        $av->date_tp =  $request->date_tp;
        $av->obs_tp =  mb_strtoupper($request->obs_tp);
        $av->iac = $request->chk_iac;
        $av->date_iac =  $request->date_iac;
        $av->obs_iac =  mb_strtoupper($request->obs_iac);
        $av->rs = $request->chk_rs;
        $av->date_rs =  $request->date_rs;
        $av->obs_rs =  mb_strtoupper($request->obs_rs);
        $av->ptj = $request->chk_ptj;
        $av->date_ptj =  $request->date_ptj;
        $av->obs_ptj =  mb_strtoupper($request->obs_ptj);
        $av->rp = $request->chk_rp;
        $av->date_rp =  $request->date_rp;
        $av->obs_rp =  mb_strtoupper($request->obs_rp);
        $av->if = $request->chk_if;
        $av->date_if =  $request->date_if;
        $av->obs_if =  mb_strtoupper($request->obs_if);
        $av->ic = $request->chk_ic;
        $av->date_ic =  $request->date_ic;
        $av->obs_ic =  mb_strtoupper($request->obs_ic);
        $av->ep = $request->chk_ep;
        $av->date_ep =  $request->date_ep;
        $av->obs_ep =  mb_strtoupper($request->obs_ep);
        $av->et = $request->chk_et;
        $av->date_et =  $request->date_et;
        $av->obs_et =  mb_strtoupper($request->obs_et);
        $av->ex = $request->chk_ex;
        $av->date_ex =  $request->date_ex;
        $av->obs_ex =  mb_strtoupper($request->obs_ex);
        $av->obs_geral = mb_strtoupper($request->obs_geral);
        $av->responsavel =  $request->responsavel;
        //dd($av->save());
        try{
            if($av->save()){
                return redirect('rh/avaliacao')->with("success" , "Sucesso: Avaliações aplicadas com exito ! ");
            }

        }catch( Exception $e){
            return redirect('rh/lancamentos')->with('danger' , $e->getMessage());
        }
    }


    public function show()
    {
        //$lancamento = DB::connection('db3')->table('avaliacaos')->where('id' , '2')->get();
        //$itens = Itens::all();
        if( auth()->user()->status == 'RH'){
            $lancamentos = Avaliacao::selectLancamentos();
            return view('RH.lancamentos' , compact('lancamentos'));
        }else
            return redirect('/home')->with("danger" , "Sem permissão de acesso a esta Pagina !" );
    }


    public function search(Request $request, Avaliacao $lancamentos){
        $data = $request->all();
        //dd($data);
        $lancamentos = $lancamentos->search($data, $lancamentos);
        //dd($lancamentos);
        return view('RH.lancamentos', compact('lancamentos'));
        //return view()
    }


    public function edit($id)
    {
        $ls = DB::connection('db3')->table('avaliacaos')->where('id', $id)->get();
        $user =  DB::connection('mysql')->table('users')
            ->select(
                'id',
                'name'
            )->where('id', $ls[0]->responsavel )->get();
        $users = User::all();
        return view('RH.avaliacaoEditar' , compact('ls' , 'users' , 'user'));

    }


    public function update(Request $request, $id)
    {
        $av = Avaliacao::find($id);

        $av->tp = $request->chk_tp;
        $av->date_tp =  $request->date_tp;
        $av->obs_tp =  mb_strtoupper($request->obs_tp);
        $av->iac = $request->chk_iac;
        $av->date_iac =  $request->date_iac;
        $av->obs_iac =  mb_strtoupper($request->obs_iac);
        $av->rs = $request->chk_rs;
        $av->date_rs =  $request->date_rs;
        $av->obs_rs =  mb_strtoupper($request->obs_rs);
        $av->ptj = $request->chk_ptj;
        $av->date_ptj =  $request->date_ptj;
        $av->obs_ptj =  mb_strtoupper($request->obs_ptj);
        $av->rp = $request->chk_rp;
        $av->date_rp =  $request->date_rp;
        $av->obs_rp =  mb_strtoupper($request->obs_rp);
        $av->if = $request->chk_if;
        $av->date_if =  $request->date_if;
        $av->obs_if =  mb_strtoupper($request->obs_if);
        $av->ic = $request->chk_ic;
        $av->date_ic =  $request->date_ic;
        $av->obs_ic =  mb_strtoupper($request->obs_ic);
        $av->ep = $request->chk_ep;
        $av->date_ep =  $request->date_ep;
        $av->obs_ep =  mb_strtoupper($request->obs_ep);
        $av->et = $request->chk_et;
        $av->date_et =  $request->date_et;
        $av->obs_et =  mb_strtoupper($request->obs_et);
        $av->ex = $request->chk_ex;
        $av->date_ex =  $request->date_ex;
        $av->obs_ex =  mb_strtoupper($request->obs_ex);
        $av->obs_geral = mb_strtoupper($request->obs_geral);
        $av->responsavel =  $request->responsavel;
        $av->updated_at = Carbon::now();
        $update  = $av->save();

        if($update ){
            $hist = new HistAvaliacao;
            $hist->avaliacao_id = $id;
            $hist->responsavel = auth()->user()->name;
            $hist->updated_at = Carbon::now();
            $hist->save();
            return redirect('rh/lancamentos')->with("success" , "Sucesso: Avaliações alteradas com exito ! ");
        }else{
            return redirect('rh/lancamentos')->with("danger" , "Falha ao aplicar atualizações ! ");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $av = Avaliacao::find($id);

            if($av->delete()){
                return redirect('rh/lancamentos')->with('success' , 'Deletar: Lançamento deletado com sucesso !') ;
            }else{
                return redirect('rh/lancamentos')->with('danger' , 'Deletar: Falha ao deletar este lançamento !') ;
            }


    }
}
