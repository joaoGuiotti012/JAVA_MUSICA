@extends('layouts.appRh')

@section('content')
    
<br>
<div class="container">
    <br>
    <div class="container">
        
        <table id="table-view" class="table table-sm table-hover table-bordered table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col"> Carg. Concorrido</th>
                <th scope="col">Setor</th>
                <th scope="row">Teste Psicologicos</th>
                <th scope="row">Info. Criminais</th>
                <th scope="row">Redes Socias</th>
                <th scope="row">Trib. Just.</th>
                <th scope="row">Ref. Profi. </th>
                <th scope="row">Info. Financeira </th>
                <th scope="row">Info. CNH </th>
                <th scope="row">E. Psicologica </th>
                <th scope="row">E. Tecnica </th>
                <th scope="row">Ex. Médico </th>
                <th scope="row"> AÇÕES </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($lancamentos as $ls)
                <tr class="text-center">
                    <td>{{ $ls->id }}</td> 
                    <td>{{ $ls->nome }}</td> 
                    <td>{{ $ls->cargo_concorrido }}</td> 
                    <td>{{ $ls->setor }}</td> 
                    <td>{{ $ls->tp != null ? $ls->tp : "--" }}</td> 
                    <td>{{ $ls->iac != null ? $ls->iac : "--" }}</td> 
                    <td>{{ $ls->rs != null ? $ls->rs : "--"}}</td> 
                    <td>{{ $ls->ptj != null ? $ls->ptj : "--"}}</td> 
                    <td>{{ $ls->rp != null ? $ls->rp : "--"}}</td> 
                    <td>{{ $ls->if != null ? $ls->if : "--"}}</td> 
                    <td>{{ $ls->ic != null ? $ls->tp : "--"}}</td> 
                    <td>{{ $ls->ep != null ? $ls->ep : "--"}}</td> 
                    <td>{{ $ls->et != null ? $ls->et : "--"}}</td> 
                    <td>{{ $ls->ex != null ? $ls->ex : "--"}}</td> 
                    <td class="text-center" > 
                        <form action="{{ route('avaliacao.editar' , $ls->id ) }} ">
                        <button type="submit" class="text-primary" >
                            <i class="fas fa-eye"></i>
                        </button> 
                        </form> 
                    </td>
                
                </tr>
                @endforeach
            </tbody>
        </table>

</div>


@endsection