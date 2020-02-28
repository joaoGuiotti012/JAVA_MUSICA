@extends('layouts.app')

@section('content')

    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('fail'))
    <div class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('primary'))
        <div class="alert alert-primary">
            <p>{{ session('primary') }}  </p>
        </div>
    @endif

    @if (isset($busca))
      <?php $agendamento = $busca; ?>
      @if (session('search'))
        <div class="alert alert-info alert-fixed" role="alert">
            {{ session('search') }}
        </div>
      @endif
    @endif
    <br>
    <div class="container">
        <form class="form-inline " action="{{ route('agendamento.search') }}" method="GET">
        @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="cod, nome, rg ..." aria-label="Buscar.." name="search" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="subimit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    
        <nav style="max-height: 350px; overflow: scroll; ">
            <table class="table table-sm table-hover table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Foto</th>
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
                    <?php $i = 0; ?>
                    @foreach ($agendamento as $ls)
                    @if ( $ls->dataSaida == null )
                    
                <tr>
                    <th scope="row">{{$ls->id}}  </th>
                        <td> {{ $ls->codigo}}    </td>
                        <td> 
                            <a href="{{url("storage/visitantes/" . $ls->foto )}}">
                            @if ($ls->foto != null )
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " style="border-radius: 100%;" width="30" height="30">
                            @else
                                <img src="{{ asset("img/topo.png") }}" style="border-radius: 100%;" width="30" height="30">
                            @endif
                            </a> 
                        </td>
                        <td> {{ $ls->nome}}       </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                        <td> {{ $ls->nome_func }} </td> 
                        <td> {{ $ls->setor }}     </td>
                        <td> {{ $ls->dataEntrada}}</td>
                        <td> {{ $ls->dataSaida}}  </td>
                        <td class="text-center" >  
                            <button type="button" class="btn-danger " data-toggle="modal" data-target="#exampleModal{{$ls->id}}">
                                <i class="fas fa-minus-circle"></i>
                            </button> 
                            @include('layouts.modal.modalrem')
                
                            <button type="button" class="btn-success" data-toggle="modal" data-target="#staticBackdrop{{$ls->id}}">
                                <i class="fas fa-user-edit"></i> 
                            </button> 
                            @include('layouts.modal.modal')

                            <button type="button"  class="btn-primary" data-toggle="modal" data-target="#saida{{$ls->id}}">
                                <i class="fas fa-check-circle"></i>
                            </button>
                            @include('layouts.modal.modalSaida')  
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </nav>
        <p class="text-monospace text-small" style="margin-left:8px;">   N° Total: <b>{{$i}} </b> </p>
        <br>
    </div>
    
@endsection
