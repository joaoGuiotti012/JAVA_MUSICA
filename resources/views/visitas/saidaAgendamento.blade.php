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
    <h4 id="date" class="container" ></h4>

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
                                <button type="submit" title="Confirma a Entrada!" class=" btn-primary" title="Confirmar Entrada !" onclick="location.href='{{route('agendamento.entrada' , $ls->id ) }}'" method="PATCH" >
                                    <i class="fas fa-check-circle"></i> 
                                </button>
                                <!--button type="button"  class="btn-primary" data-toggle="modal" data-target="#saida{{$ls->id}}">
                                    <i class="fas fa-check-circle"></i>
                                </button-->
                                @include('layouts.modal.modalSaida')  
                                <button type="button" class="btn-danger"  title="deletar"  data-toggle="modal" data-target="#rem{{$ls->id}}">
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
                
                                <button type="submit" title="Confirma a saida!" class="btn-danger btn-table" title="Confirmar Saida !" onclick="location.href='{{route('agendamento.confSaida' , $ls->id ) }}'" method="PATCH" > 
                                    <i class="fas fa-check-circle"></i> 
                                </button>
                                
                                <!--button type="button"  class="btn-primary" data-toggle="modal" data-target="#saida{{$ls->id}}">
                                    <i class="fas fa-check-circle"></i>
                                </button-->
                                @include('layouts.modal.modalSaida')               
                              
                                <button type="button" class="btn-danger btn-table" title="deletar"   data-toggle="modal" data-target="#rem{{$ls->id}}">
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


