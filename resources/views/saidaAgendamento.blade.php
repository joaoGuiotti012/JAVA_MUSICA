@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-sm table-hover table-bordered table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Visitante</th>
                <th scope="col">RG</th>
                <th scope="col">Empresa</th>
                <th scope="col">Visitado</th>
                <th scope="col">Setor</th>
                <th scope="col">Entrda</th>
                <th scope="col">Saida</th>
                <th scope="row">Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($agendamento as $ls)
                <tr>
                    <th scope="row">1</th>
                    <td> {{ $ls->codigo}} </td>
                    <td> {{ $ls->nome}} </td>
                    <td> {{ $ls->rg}} </td>
                    <td> {{ $ls->empresa}} </td>
                    <td> </td> 
                    <td> </td>
                    <td> {{ $ls->dataEntrada}} </td>
                    <td> {{ $ls->dataSaida}} </td>
                    <td class="text-center">  
                        <button type="button" class="btn btn-success btn-sm">
                            <i class="fas fa-user-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" style="margin-left:5px;">
                            <i class="fas fa-minus-circle"></i>    
                        </button>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


