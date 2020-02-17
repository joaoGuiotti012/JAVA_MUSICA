@extends('layouts.app')


@section('content')

    <form class="container" >
        <br>
        <h1 class="text-left"><i class="far fa-calendar-alt"></i>  Agendamento de Visitas </h1>
        <br>
        <h3 class="text-left"> Dados Visitante 
            <p><hr class="text-primary" ></p>
            <br>
        </h3>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome Completo</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Empresa</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-row form-group col-md-6">
            <label for="inputAddress">RG</label>
            <input type="text" class="form-control" placeholder="1234 Main St">
        </div>
        <div class="form-group">
        <label for="inputAddress2">Endereço 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Estado</label>
            <select id="inputState" class="form-control">
            <option selected>Escolha...</option>
            <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        </div>
        <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
            Check me out
            </label>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection