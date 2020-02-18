@extends('layouts.app')


@section('content')

    <form class="container" >
        <br>
        <h1 class="text-left"><i class="far fa-calendar-alt"></i>  Agendamento de Visitas </h1>
        <br>
        <div class="jumbotron">
            <h3 class="text-left"> Dados Visitante 
                <p><hr class="text-primary" ></p>
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
            
                <div class="form-group col-md-4">
                    <label for="inputAddress">RG</label>
                    <input type="text" class="form-control" placeholder="123.432.123-4">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputAddress">Cod Cracha</label>
                    <input type="number" class="form-control" placeholder="1234 Main St">
                </div>
            </div>
        </div>

        <div class="jumbotron">
            <h3 class="text-left"> Dados Visitado 
                <p><hr class="text-primary" ></p>
            </h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome </label>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Setor </label>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar</button>
    </form>
@endsection