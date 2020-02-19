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

<form class="container" method="POST" action="{{  route('agendamento.store') }}" >
    @csrf   
        <br>
        <h1 class="text-left"><i class="far fa-calendar-alt"></i>  Agendamento de Visitas </h1>
        <br>
        <div class="jumbotron">
            <h3 class="text-left"> Dados Visitante 
                <p><hr class="text-primary" ></p>
            </h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-group col-md-6">
                    <label for="empresa">Empresa</label>
                    <input type="text" class="form-control" name="empresa">
                </div>
            
                <div class="form-group col-md-4">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" placeholder="123.432.123-4" name="rg">
                    <input type="hidden"  name="dataEntrada" value="{{Carbon\Carbon::now()->toDateTimeString()}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="codigo">Cod Cracha</label>
                    <input type="number" class="form-control" placeholder="1234 Main St" name="codigo">
                </div>
            </div>
        </div>

        <div class="jumbotron">
            <h3 class="text-left"> Dados Visitado 
                <p><hr class="text-primary" ></p>
            </h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="visitado_id">Nome  /  Setor </label>
                    <select class="custom-select" id="inputGroupSelect01" name="visitado_id">
                        <option selected>Choose...</option>
                        @foreach ($func as $f)
                            <option value="{{$f->id}}" >{{ $f->nome }} / {{ $f->setor }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Confirmar</button>
        <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar</button>
    </form>
@endsection