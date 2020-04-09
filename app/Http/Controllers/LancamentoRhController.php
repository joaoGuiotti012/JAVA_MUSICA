<?php

namespace App\Http\Controllers;

use App\lancamentoRh;
use Illuminate\Http\Request;

class LancamentoRhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('RH.lancamentos');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lancamentoRh  $lancamentoRh
     * @return \Illuminate\Http\Response
     */
    public function show(lancamentoRh $lancamentoRh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lancamentoRh  $lancamentoRh
     * @return \Illuminate\Http\Response
     */
    public function edit(lancamentoRh $lancamentoRh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lancamentoRh  $lancamentoRh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lancamentoRh $lancamentoRh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lancamentoRh  $lancamentoRh
     * @return \Illuminate\Http\Response
     */
    public function destroy(lancamentoRh $lancamentoRh)
    {
        //
    }
}
