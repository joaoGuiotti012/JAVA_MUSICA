@extends('layouts.appRh')


@section('content')
    <br>
    <div class="container">

        <div class="card">
            <h5 class="card-header">
                formulário de Avaliações
            </h5>
            <div class="card-body">

                <div class="col-md-4">
                    <div class="form-group mx-sm-2 mb-2">
                        
                        <input type="text" class="form-control"  placeholder="N° Cadastro" id="id-select" name="visitante_id" pattern=".{1,}" required title="clique em buscar !">
                    </div>
                    <div class="form-group mx-sm-2 mb-2">
                        <button type="button" class=" btn-primary mb-2" data-toggle="modal" data-target="#buscaVisitantes">
                            Buscar <i class="fas fa-search"></i>
                        </button>
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

                </div>
                    
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Salvar <i class="fas fa-check"></i> </button>
                <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar <i class="fas fa-window-close"></i></button>
            </div>


        </div>


    </div>
    <br><br>

@endsection