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
    <form class="container" method="POST" action="{{  route('agendamento.novo') }}"  enctype="multipart/form-data">
        @csrf  
            <div class="card">
                <div class="card-header text-white bg-dark"><h5>Dados Visitantes</h5></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="ID">Cod Cracha</label>
                            <input type="number" class="form-control" id="codigo" name="codigo"> 
                            
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="ID">ID</label>
                            <input type="number" class="form-control"  id="id-select" name="visitante_id" >
                        </div>

                        <div class="form-group " >
                            <label for="a"> .</label>
                            <button type="button" class="bnt btn-primary form-control" data-toggle="modal" data-target="#buscaVisitantes" > 
                                Buscar <i class="fas fa-search"></i> 
                            </button>
                        </div>
                    </div>
                    @include('layouts.modal.buscaVisitantes')

                    
                </div>
            <br>
                <div class="card-header text-white bg-dark"><h5>Dados Visitado </h5></div>
                <div class="card-body">
                    <div class="form-row">
                        
                        <div class="form-group col-md-2" >
                            <label for="ID">ID</label>
                            <input type="number" class="form-control"  id="id-visitado" name="visitado_id" >
                        </div>

                        <div class="form-group " >
                            <label for="a"> .</label>
                            <button type="button" class="bnt btn-primary form-control" data-toggle="modal" data-target="#visitados" > 
                                Buscar <i class="fas fa-search"></i> </button>
                        </div>
                        @include('layouts.modal.buscaVisitados')

                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Confirmar</button>
            <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar</button>
            <br><br>
    </form>
@endsection

