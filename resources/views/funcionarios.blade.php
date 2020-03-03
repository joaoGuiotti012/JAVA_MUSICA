@extends('layouts.app')

@section('content')

    @if (session('success'))
    <div id="alert" class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('fail'))
    <div id="alert" class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('primary'))
        <div id="alert" class="alert alert-primary">
            <p>{{ session('primary') }}  </p>
        </div>
    @endif

    @if (isset($busca))
      <?php $agendamento = $busca; ?>
      @if (session('search'))
        <div id="alert" class="alert alert-info alert-fixed" role="alert">
            {{ session('search') }}
        </div>
      @endif
    @endif
    <br>
    <div class="container">
    
            <button id="btn-novo" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#novo">
                <i class="fas fa-user-plus"></i>
            </button> 
            @include('layouts.modal.funcionarios.novo')
        
            <table id="table-view" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Setor</th>
                    <th scope="row">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($func as $ls)
                    
                    <tr>
                        <th scope="row">{{$ls->id}}  </th>
                        <td>  {{ $ls->nome}}  </td>
                        <td>  {{ $ls->setor}} </td>
                        <td class="text-center" >  
                            <button type="button" class="btn-danger " data-toggle="modal" data-target="#rem{{$ls->id}}">
                                <i class="fas fa-minus-circle"></i>
                            </button> 
                            @include('layouts.modal.funcionarios.rem')
                
                            <button type="button" class="btn-success" data-toggle="modal" data-target="#editar{{$ls->id}}">
                                <i class="fas fa-user-edit"></i> 
                            </button> 
                            @include('layouts.modal.funcionarios.editar') 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        <br>
    </div>
@endsection
