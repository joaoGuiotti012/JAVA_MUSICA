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
            <table id="table-view" class="table table-sm table-hover table-bordered table-striped">
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
                    @foreach ($agendamento as $ls)
                    @if ( $ls->dataSaida == null )
                    
                <tr>
                    <th scope="row">{{$ls->id}}  </th>
                        <td> {{ $ls->codigo}}    </td>
                        <td> 
                            
                            @if ($ls->foto != null )
                                <a href="{{url("storage/visitantes/" . $ls->foto )}}">
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " style="border-radius: 100%;" width="30" height="30">
                            @else
                                <a href="{{url("img/topo.png") }}">
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
                            <button type="button" class="btn-danger " data-toggle="modal" data-target="#rem{{$ls->id}}">
                                <i class="fas fa-minus-circle"></i>
                            </button> 
                            @include('layouts.modal.modalrem')
                
                            <!--button type="button" class="btn-success" data-toggle="modal" data-target="#staticBackdrop{{$ls->id}}">
                                <i class="fas fa-user-edit"></i> 
                            </button> 
                            @include('layouts.modal.modal') -->

                            <button type="button"  class="btn-primary" data-toggle="modal" data-target="#saida{{$ls->id}}">
                                <i class="fas fa-check-circle"></i>
                            </button>
                            @include('layouts.modal.modalSaida')  
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        <br>
    </div>
    
@endsection
