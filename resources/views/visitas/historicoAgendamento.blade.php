@extends('layouts.app')

@section('content')

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
        <br>
        <h2 class="text-center" id="historico"><i class="far fa-calendar-alt"></i>  Histórico de Agendamentos </h2>
        <br>
        
        <button id="btn-filtrar" class="text-primary btn-sm mb-2" >
            <i class="fas fa-filter"></i>
        </button> 
        <button  class="text-success  btn-sm mb-2" onclick="location.href='{{ url('agendamento/historico/export') }}'">
            <i class="fas fa-file-excel"></i>
        </button> 
        
         <div class=" table-responsive" style="max-height: 450px">
            <table class="table table-sm table-hover table-bordered table-striped ">
                <thead id="div-search" class="bg-secondary" style="display:none">
                    <tr>
                    <form id="div-search" action="{{ route('agendamento.histSearch') }}" method="GET" style="display:none">
                        @csrf
                        
                        <th colspan="3"><button class="container btn btn-sm btn-success" type=" submit"><i class="fas fa-search-plus"></i></button></th>
                        <th><input type="text" class="form-sm" placeholder="Nome Visitante" name="nome_visitante"></th>
                        <th><input type="text" class="form-sm" placeholder="RG" id="rg" name="rg" ></th>
                        <th><input type="text" class="form-sm" placeholder="Empressa" name="empresa"></th>
                        <th><input type="text" class="form-sm" placeholder="Visitado" name="nome_visitado"></th>
                        <th><input type="text" class="form-sm" placeholder="Setor" name="setor" ></th>
                        <th><input type="date" class="form-sm" name="dataEntrada" ></th>
                        <th colspan="2"><input type="date" class="form-sm" name="dataSaida" ></th>
                        
                    </form>
                    </tr>
                </thead>
                <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
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
                    <?php $i =0 ?>
                    @foreach ($agendamento as $ls) 
                    @if( $ls->dataSaida != null)             
                <tr class="text-center">
                    <th scope="row">{{$ls->id}}  </th>
                        <td> {{ $ls->codigo}}    </td>
                        <td> {{ substr($ls->descricao,0,10) }}..    </td>
                        <td> {{ $ls->nome}}       </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                        <td> {{ $ls->nome_func }} </td> 
                        <td> {{ $ls->setor }}     </td>
                        <td> {{ $ls->dataEntrada}} {{ $ls->hrEntrada }}</td>
                        <td> {{ $ls->dataSaida}} {{$ls->hrSaida}}  </td>
                        <td class="text-center" >  
                            <button type="button" class="text-primary" data-toggle="modal" title="Visualizar !" data-target="#view{{$ls->id}}">
                                <i class="fas fa-eye"></i>
                            </button> 
                            @include('layouts.modal.modalView')
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endif
                    @endforeach
                </tbody>
            </table> 
        </div><hr>
        <p class="text-monospace text-small" style="margin-left:8px;">   N° Total: <b>{{$i}} </b> </p>
        <br>
    </div>

    
@endsection


@section('javascript')
<script>
    $(document).ready(function(){
        $('#rg').mask('000.000.000-0' , {reverse: false });
    });


</script>
