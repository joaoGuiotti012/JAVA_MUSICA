<?php

namespace App\Http\Controllers;

use App\Guarda;
use Illuminate\Http\Request;

class ControladorGuarda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Guarda  $guarda
     * @return \Illuminate\Http\Response
     */
    public function show(Guarda $guarda)
    {
        $guarda = Guarda::all();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guarda  $guarda
     * @return \Illuminate\Http\Response
     */
    public function edit(Guarda $guarda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guarda  $guarda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guarda $guarda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guarda  $guarda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guarda $guarda)
    {
        //
    }
}
