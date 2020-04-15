@extends('layouts.appRh')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <h5 class="card-header">
                Formulário de Avaliações
            </h5>
            <div class="card-body">
                <form action="{{ route('avaliacao.novo') }}" method="POST"> 
                @csrf
                    <div class="col-md-4">
                        <div class="form-group mx-sm-2 mb-2">
                            <input type="text" class="form-control"  placeholder="N° Cadastro" id="cad_num" name="cad_num" pattern=".{1,}" required title="clique em buscar !">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                            <button type="button" class=" btn-primary mb-2" data-toggle="modal" data-target="#cadPessoas">
                                Buscar <i class="fas fa-search"></i>
                            </button>
                            @include('layouts.modal.RH.buscaCadastro')
                        </div>
                    </div>
                    <div class="container">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Itens</th>
                                <th scope="col">Apto</th>
                                <th scope="col">Inapto</th>
                                <th scope="row">Data</th>
                                <th scope="row">Obs</th>
                            </tr>
                            @foreach ($itens as $item)
                            <tr class="text-center"> 
                                <th>{{$item->descricao}}</th>
                                <td> <input type="checkbox" class="form-check-input" name="{{$item->chk_name}}" value="S"></td>
                                <td > <input type="checkbox" class="form-check-input" name="{{$item->chk_name}}" value="N"></td>
                                <td ><input type="date" class="form-control-sm" name="{{$item->date_name}}" ></td>
                                <td ><textarea type="text" class="form-control-sm" name="{{$item->obs_name}}"></textarea>
                            </tr>
                            @endforeach
                        </table>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observações Gerais:</label>
                            <textarea class="form-control" name="obs_geral" rows="4">  Indicação: </textarea>
                        </div>
                        <br>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4" hidden>Responsável Cadastro </label>
                            <input type="text" class="form-control" name="responsavel" value="{{ Auth::user()->name }}" hidden >
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Salvar <i class="fas fa-check"></i> </button>
                    <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar <i class="fas fa-window-close"></i></button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
@endsection