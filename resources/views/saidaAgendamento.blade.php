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
                <th scope="row">{{$ls->id}}</th>
                    <td> {{ $ls->codigo}}    </td>
                    <td> {{ $ls->nome}}       </td>
                    <td> {{ $ls->rg}}         </td>
                    <td> {{ $ls->empresa}}    </td>
                    <td> {{ $ls->nome_func }} </td> 
                    <td> {{ $ls->setor }}     </td>
                    <td> {{ $ls->dataEntrada}}</td>
                    <td> {{ $ls->dataSaida}}  </td>
                    <td class="text-center inline" >  
                        <form  action="{{ route('agendamento.destroy' , $ls->id ) }}" method="POST"  class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger ">
                                <i class="fas fa-minus-circle"></i>
                            </button> 
                        </form>
                        <form action="" class="d-inline">
                            <button type="button" class="btn btn-success btn-sm d-inline" style="margin-left:5px;">
                                <i class="fas fa-user-edit"></i> 
                            </button> 
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


