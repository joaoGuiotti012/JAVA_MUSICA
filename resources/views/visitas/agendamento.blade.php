@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <br> <br>

    <form class="jumbotron container" method="POST" action="{{  route('agendamento.novo') }}"  enctype="multipart/form-data">
    @csrf  
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Visitante</h5>
                    <div class="card-body">
                        <div class="form-inline">
                            <div class="form-group mx-sm-2 mb-2">
                                <label for="inputPassword2" class="sr-only"></label>
                                <input type="text" class="form-control" placeholder="Cracha" id="codigo" name="codigo" 
                                pattern=".{6,}"  required required title="minimo de 6 numeros !" value="<?php echo mt_rand(1,999999)?>">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">ID Visitante</label>
                                <input type="text" class="form-control"  placeholder="ID Visitante" id="id-select" name="visitante_id" pattern=".{1,}" required title="clique em buscar !">
                            </div>
                            <div class="form-group mx-sm-2 mb-2">
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#buscaVisitantes">
                                    Buscar <i class="fas fa-search"></i>
                                </button>
                            </div>
                            @include('layouts.modal.buscaVisitantes') <!-- MODAL Visitantes -->
                        </div>
                    </div>
                  </div>
            </div>
            
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Colaborador</h5>
                    <div class="card-body">
                        <div class="form-inline">
                    
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">ID Visitante</label>
                                <input type="text" class="form-control"  placeholder="ID Visitante" id="id-visitado" name="visitado_id" required >
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#visitados">
                                    Buscar <i class="fas fa-search"></i>
                                </button>
                            </div>
                        @include('layouts.modal.buscaVisitados')  <!-- MODAL Visitados -->
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <h5 class="card-header">Previsão de Chegada</h5>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Data: <input type="date" class="form-sm" name="dataPrevisao"  ></li>
                      <li class="list-group-item">Horário:  <input type="time" class="form-sm" name="horarioPrevisao" > </li>
                    </ul>
                  </div>
            </div>
            <div class="col">
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-header">Descrição Agendamento</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observações:</label>
                            <textarea class="form-control" name="descricao" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Confirmar <i class="fas fa-check"></i> </button>
                        <button type="reset" class="btn btn-danger" style="margin-left: 10px;"><i class="fas fa-window-close"></i></button>
                    </div>
                  </div>
            </div>
        </div>
    </div>          
    
</form>

@endsection

