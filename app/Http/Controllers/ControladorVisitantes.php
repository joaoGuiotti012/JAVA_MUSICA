<?php

namespace App\Http\Controllers;
use App\Visitantes;
use Illuminate\Http\Request;

class ControladorVisitantes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index( Visitantes $visitantes)
    {
        $visitantes = Visitantes::all();
        return view('saidaVisitantes' , compact('visitantes'));

    }



    public function destroy( $id)
    {
        
    }

}
