@extends('layouts.app')

@section('content')
    <body onload="startTime()">
    

    

    @if (isset($busca))
      <?php $agendamento = $busca; ?>
      @if (session('search'))
        <div id="alert" class="alert alert-info alert-fixed" role="alert">
            {{ session('search') }}
        </div>
      @endif
    @endif
    <br>
    <h4  id="date" class="container" ></h4>

    <div class="container table-responsive">
            <table id="table-view" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Visitante</th>
                    <th scope="col">RG</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Visitado</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Data Prev.</th>
                    <th scope="col">Hora Prev.</th>
                    <th scope="row">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($agendamento as $ls)
                    @if ( $ls->dataEntrada == null )   
                    <tr class="text-center table-info">
                        <th> {{ $ls->codigo}}    </th>
                        <td > {{ substr($ls->descricao, 0, 20 ) }}...  </td>
                        <td style="padding: 0px;"> 
                            @if ($ls->foto != null )
                                <a href="{{url("storage/visitantes/" . $ls->foto )}}">
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " width="40" height="30">
                            @else
                                <a href="{{url("img/topo.png") }}">
                                <img src="{{ asset("img/topo.png") }}" style="border-radius: 100%;" width="30" height="30">
                            @endif
                            </a> 
                        </td>
                        <td> {{ substr($ls->nome,0,10) }}..   </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                        <td> {{ substr($ls->nome_func ,0,10) }}.. </td> 
                        <td> {{ $ls->setor }}     </td>
                        <td> {{ $ls->dataPrevisao }}     </td>
                        <td> {{ $ls->horarioPrevisao }}     </td>
                        <td class="text-center"> 
                                <button type="submit" title="Confirma a Entrada!" class=" text-primary" title="Confirmar Entrada !" 
                                data-toggle="modal" data-target="#entrada{{$ls->id}}"> 
                                    <i class="fas fa-check-circle"></i> 
                                </button>
                                @include('layouts.modal.entrada')
                                <!--button type="button"  class="btn-primary" data-toggle="modal" data-target="#saida{{$ls->id}}">
                                    <i class="fas fa-check-circle"></i>
                                </button-->
                                @include('layouts.modal.modalSaida')  
                                <button type="button" class="text-danger"  title="deletar"  data-toggle="modal" data-target="#rem{{$ls->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button> 
                                @include('layouts.modal.modalrem')
                        </td>
                    </tr>
                      @endif              
                     @if( $ls->dataEntrada != null && $ls->dataSaida == null )
                     <tr class="text-center table-danger">
                        <th> {{ $ls->codigo}}    </th>
                        <td > {{ substr($ls->descricao, 0, 20 ) }}..  </td>
                        <td style="padding: 1.rem;"> 
                            @if ($ls->foto != null )
                                <a href="{{url("storage/visitantes/" . $ls->foto )}}">
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " width="40" height="30">
                            @else
                                <a href="{{url("img/topo.png") }}">
                                <img src="{{ asset("img/topo.png") }}" style="border-radius: 100%;" width="30" height="30">
                            @endif
                            </a> 
                        </td>
                        <td> {{ substr($ls->nome,0,10) }}..   </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                        <td> {{ substr($ls->nome_func ,0,10) }}.. </td> 
                        <td> {{ $ls->setor }}     </td>
                        <td> {{ $ls->dataPrevisao }}     </td>
                        <td> {{ $ls->horarioPrevisao }}     </td>
                        <td class="text-center"> 
                
                                <button type="submit" title="Confirma a saida!" 
                        class="text-danger btn-table" title="Confirmar Saida !" data-toggle="modal"  data-target="#saida{{$ls->id}}" > 
                                    <i class="fas fa-check-circle"></i> 
                                </button>
                                @include('layouts.modal.saida')
                                            
                              
                                <button type="button" class="text-danger btn-table" title="deletar"   data-toggle="modal" data-target="#rem{{$ls->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button > 
                                @include('layouts.modal.modalrem')
                        </td>
                        </tr>   
                    @else
                      
                     @endif
                    
                   
                    
                    @endforeach
                </tbody>
            </table>
        <br>
    </div>
    
@endsection


<script>
    function startTime(){
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    // adicione um zero na frente de números<10
    m=checkTime(m);
    s=checkTime(s);
    document.getElementById('date').innerHTML=h+":"+m+":"+s;
    t=setTimeout('startTime()',500);
}

function checkTime(i){
    if (i<10){
        i="0" + i;
    }
    return i;
}
</script>