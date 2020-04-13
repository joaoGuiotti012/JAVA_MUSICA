<?php

namespace App\Http\Controllers;

use App\agendamentoVisita;
use App\Avaliacao;
use App\ItensAvaliacao as Itens;
use App\Pessoa;
use DB;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Itens::all();
        $pessoas = Pessoa::SelectPessoas();
        return view('RH.avaliacao', compact('itens' , 'pessoas'));
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
        $av = new Avaliacao();
        
        $av->pessoa_id = $request->cad_num;
        $av->tp = $request->chk_tp;
        $av->date_tp =  $request->date_tp;
        $av->obs_tp =  $request->dobs_tp;
        $av->iac = $request->chk_iac;
        $av->date_iac =  $request->date_iac;
        $av->obs_iac =  $request->dobs_iac;
        $av->rs = $request->chk_rs;
        $av->date_rs =  $request->date_rs;
        $av->obs_rs =  $request->dobs_rs;
        $av->ptj = $request->chk_ptj;
        $av->date_ptj =  $request->date_ptj;
        $av->obs_ptj =  $request->dobs_ptj;
        $av->rp = $request->chk_rp;
        $av->date_rp =  $request->date_rp;
        $av->obs_rp =  $request->dobs_rp;
        $av->if = $request->chk_if;
        $av->date_if =  $request->date_if;
        $av->obs_if =  $request->dobs_if;
        $av->ic = $request->chk_ic;
        $av->date_ic =  $request->date_ic;
        $av->obs_ic =  $request->dobs_ic;
        $av->ep = $request->chk_ep;
        $av->date_ep =  $request->date_ep;
        $av->obs_ep =  $request->dobs_ep;
        $av->et = $request->chk_et;
        $av->date_et =  $request->date_et;
        $av->obs_et =  $request->dobs_et;
        $av->ex = $request->chk_ex;
        $av->date_ex =  $request->date_ex;
        $av->obs_ex =  $request->dobs_ex;

        if($av->save() ){
            return redirect('rh/avaliacao')->with("success" , "Sucesso: Avaliações aplicadas com exito ! ");
        }else{
            return redirect('rh/avaliacao')->with("danger" , "Falha ao aplicar as avaliações ! ");
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$lancamento = DB::connection('db3')->table('avaliacaos')->where('id' , '2')->get();
        
        //$itens = Itens::all();
        $lancamentos = Avaliacao::selectLancamentos();
        return view('RH.lancamentos' , compact('lancamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $ls = DB::connection('db3')->table('avaliacaos')->where('id', $id)->get();
        return view('RH.avaliacaoEditar' , compact('ls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $av = Avaliacao::find($id);
        

        $av->tp = $request->chk_tp;
        $av->date_tp =  $request->date_tp;
        $av->obs_tp =  $request->dobs_tp;
        $av->iac = $request->chk_iac;
        $av->date_iac =  $request->date_iac;
        $av->obs_iac =  $request->dobs_iac;
        $av->rs = $request->chk_rs;
        $av->date_rs =  $request->date_rs;
        $av->obs_rs =  $request->dobs_rs;
        $av->ptj = $request->chk_ptj;
        $av->date_ptj =  $request->date_ptj;
        $av->obs_ptj =  $request->dobs_ptj;
        $av->rp = $request->chk_rp;
        $av->date_rp =  $request->date_rp;
        $av->obs_rp =  $request->dobs_rp;
        $av->if = $request->chk_if;
        $av->date_if =  $request->date_if;
        $av->obs_if =  $request->dobs_if;
        $av->ic = $request->chk_ic;
        $av->date_ic =  $request->date_ic;
        $av->obs_ic =  $request->dobs_ic;
        $av->ep = $request->chk_ep;
        $av->date_ep =  $request->date_ep;
        $av->obs_ep =  $request->dobs_ep;
        $av->et = $request->chk_et;
        $av->date_et =  $request->date_et;
        $av->obs_et =  $request->dobs_et;
        $av->ex = $request->chk_ex;
        $av->date_ex =  $request->date_ex;
        $av->obs_ex =  $request->dobs_ex;

        if($av->save() ){
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
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }
}
