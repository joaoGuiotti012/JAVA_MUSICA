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
        <br>
        <h2 class="text-center" id="historico"><i class="far fa-calendar-alt"></i>  Histórico de Agendamentos </h2>
        <br>
        <form class="form-inline" action="{{ route('agendamento.histSearch') }}" method="GET">
            @csrf
              <div class="form-group mx-sm-1 mb-2">
                <label for="dataentrada" class="sr-only">Entrada</label>
                <input type="date" class="form-control form-control-sm" name="dataEntrada" >
              </div>
              <div class="form-group mx-sm-1 mb-2">
                <label for="dataSaida" class="sr-only">Saida</label>
                <input type="date" class="form-control form-control-sm" name="dataSaida" >
              </div>
              <button type="submit" class="btn btn-primary btn-sm mb-2">Buscar</button> 
        </form>

        <nav style="max-height: 350px; overflow: scroll; ">
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
                
                <tbody >
                    
                    @foreach ($agendamento as $ls) 
                    @if( $ls->dataSaida != null)             
                <tr>
                    <th scope="row">{{$ls->id}}  </th>
                        <td> {{ $ls->codigo}}    </td>
                        <td> {{ $ls->nome}}       </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                        <td> {{ $ls->nome_func }} </td> 
                        <td> {{ $ls->setor }}     </td>
                        <td> {{ $ls->dataEntrada}}</td>
                        <td> {{ $ls->dataSaida}}  </td>
                        <td class="text-center" >  
                            <a type="button" class="text-primary" data-toggle="modal" data-target="#view{{$ls->id}}">
                                <i class="fas fa-eye"></i>
                            </a> 
                            @include('layouts.modal.modalView')
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table> 
        </nav>
        <p class="text-monospace text-small" style="margin-left:8px;">   N° Total: <b>{{$cont}} </b> </p>
        <br>
    </div>

    
@endsection


@section('javascript')
<script>
    $(document).ready(function(){
        $('#rg').mask('000.000.000-0' , {reverse: false });
    });


</script>
