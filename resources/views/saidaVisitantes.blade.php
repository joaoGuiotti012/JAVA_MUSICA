@extends('layouts.app')

@section('content')

    @if (session('success'))
    <div id="alert" class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('primary'))
        <div id="alert" class="alert alert-primary">
            <p>{{ session('primary') }}  </p>
        </div>
    @endif

    <br>
    <div class="container">
        <div class="td-row">
            <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#novo" > 
                <i class="fas fa-user-plus"></i>
            </button>
            <button id="btn-filtrar" class="btn btn-primary btn-sm mb-2">
                <i class="fas fa-filter"></i>
            </button> 
         
            @include('layouts.modal.visitantes.novo')
        </div>
    
     <div class="table-responsive" style="max-height: 450px">
            <table class="table table-sm table-hover table-bordered table-striped ">
                <thead id="div-search" class="bg-secondary" style="display:none">
                    <tr>
                    <form id="div-search" action="{{ route('visitantes.search') }}" method="GET" style="display:none">
                        @csrf
                        <th></th>
                        <th><button class="btn btn-sm btn-success" type=" submit"><i class="fas fa-search-plus"></i></button></th>
                        <th><input type="text" class="form-sm" placeholder="Nome Visitante" name="nome" id="nome"></th>
                        <th><input type="text" class="form-sm" placeholder="RG" id="rg" name="rg" ></th>
                        <th><input type="text" class="form-sm" placeholder="Empressa" name="empresa"></th>
                        <th></th>
                    </form>
                    </tr>
                </thead>
                <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">RG</th>
                    <th scope="col">Empresa</th>
                    <th >Ações</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($visitantes as $ls)
                    <tr class="table-row" >
                        <th scope="text-center" ># {{$ls->id}}  </th>
                        <td> 
                            <div class="text-center" >
                            @if ($ls->foto != null )
                                <a href="{{url("storage/visitantes/" . $ls->foto )}}">
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} "  width="35" height="35">
                            @else
                                <a href="{{url("img/topo.png") }}">
                                <img src="{{ asset("img/topo.png") }}" width="35" height="35">
                            @endif
                            </a> 
                        </div>
                        </td>
                        <td> {{ $ls->nome}}       </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
    
                        <td class="text-center">  
                            <div class="row td-row">
                                <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#rem{{$ls->id}}">
                                    <i class="fas fa-minus-circle"></i>
                                </button> 
                                @include('layouts.modal.visitantes.rem')
                    
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editar{{$ls->id}}">
                                    <i class="fas fa-user-edit"></i> 
                                </button> 
                            @include('layouts.modal.visitantes.editar')
                            </div>
                        </td>
                        
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="text-monospace text-small" style="margin-left:8px;">   N° ultimos: <b>{{$cont}} </b> </p>
        <br>
    </div>

@endsection