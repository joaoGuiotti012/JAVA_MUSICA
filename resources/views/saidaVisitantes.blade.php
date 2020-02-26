@extends('layouts.app')

@section('content')

    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('primary'))
        <div class="alert alert-primary">
            <p>{{ session('primary') }}  </p>
        </div>
    @endif

    <br>
    <div class="container">
        <table class="table table-sm table-hover table-bordered table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">RG</th>
                <th scope="col">Empresa</th>
                <th scope="col">Ações</th>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($visitantes as $ls)
               <tr>
                    <th scope="row"># {{$ls->codigo}}  </th>
                    <td> {{ $ls->nome}}       </td>
                    <td> {{ $ls->rg}}         </td>
                    <td> {{ $ls->empresa}}    </td>
                    <td class="text-center" >  
                        <a type="button" class="text-danger " data-toggle="modal" data-target="#exampleModal{{$ls->id}}">
                            <i class="fas fa-minus-circle"> X </i>
                        </a> 
                       
            
                        <a type="button" class="text-success" data-toggle="modal" data-target="#staticBackdrop{{$ls->id}}">
                            <i class="fas fa-user-edit">editar</i> 
                        </a> 
                        

                        <a type="button"  class="text-primary" data-toggle="modal" data-target="#saida{{$ls->id}}">
                            <i class="fas fa-check-circle">saida</i>
                        </a>
                        
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        <p class="text-monospace text-small" style="margin-left:8px;">   N° Total: <b>{{$i}} </b> </p>
        <br>

    </div>

@endsection