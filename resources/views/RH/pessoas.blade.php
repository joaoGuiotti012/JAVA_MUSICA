@extends('layouts.appRh')

@section('content')

    <br><br>
    <div class="container">
        <h2 class="text-center" id="historico"><i class="fas fa-list-alt"></i> Cadastros </h2>
        <form action=" {{route('pessoa.search') }}" method="GET">
        @csrf
        <button type="button" class="text-primary"  title="deletar"   
        data-toggle="modal" data-target="#addPessoa">
            <i class="fas fa-user-plus"></i>
        </button> 
        <button type="button" class="text-primary" id="btn-filtros" title="pesquisar" >
            <i class="fas fa-filter"></i>
        </button> 
        
        <button class=" btn-sm btn-primary" type="submit" style="display:none" id="btn-ocultar">
            Buscar <i class="fas fa-search"></i>
        </button>
        <div class="card" id="div-filtros" style="display:none">
            <h6 class="card-header list-inline">
                Filtros <i class="fas fa-filter"></i>
            </h6>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-sm-group col-md-2">
                            <select id="select" class="form-control" name="campo">
                                <option value="indicacao" >Indicação</option>
                                <option value="nome" >Nome</option>
                                <option value="cargo_concorrido" >Cargo Concorrido</option>
                                <option value="setor" >Setor</option>
                                <option value="cidade" >Cidade</option>
                                <option value="estado" >Estado</option>
                                <option value="rg" >RG</option>
                                <option value="cpf" >CPF</option>
                                <option value="fone1" >Fone 1</option>
                                <option value="fone2" >Fone 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                        </div>
                        
                    </div>
                    <hr> 
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputState">Cidade</label>
                            <select id="inputState" class="form-control" name="cidade" >
                            <option selected></option>
                                @foreach ($cidades as $ls)
                                <option value="{{$ls->id}}">{{$ls->descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputState">Estado</label>
                            <select id="inputState" class="form-control" name="estado" >
                            <option selected></option>
                                @foreach ($estados as $es)
                                <option value="{{$ls->es}}">{{$es->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-group">
                        <label><b>Tipo Cadastro: </b></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="curriculo" >
                            <label class="form-check-label" for="inlineCheckbox1">Curricúlo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ficha" checked >
                            <label class="form-check-label" for="inlineCheckbox2">Ficha</label>
                        </div>
                    </div>
                    <hr>
                        <div class="form-group">
                            <label for="inputAddress2"> <b> Deficiencia: </b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_aud" value="auditiva">
                                <label class="form-check-label" for="inlineCheckbox1">Auditiva</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_vis" value="visual">
                                <label class="form-check-label" for="inlineCheckbox2">Visual</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_men" value="mental" >
                                <label class="form-check-label" for="inlineCheckbox3">Mental</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_fis" value="fisica" >
                                <label class="form-check-label" for="inlineCheckbox3">Física</label>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
        <br>
        @include('layouts.modal.RH.addPessoa')
        
        <div class="table-responsive" style="max-height: 450px">
            <table id="table-vew" class="table table-sm table-hover table-bordered table-striped ">
                <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Cidade </th>
                    <th scope="col">Estado</th>
                    <th scope="col">endereço</th>
                    <th scope="col">Escolaridade</th>  
                    <th scope="col">CPF</th>
                    <th scope="col">RG</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Deficiencia</th>
                    <th scope="col">Cargo conc.</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Indicação</th>
                    <th >Ações</th>
                </thead>
                <tbody>
                    @foreach ($pessoas as $ls)
                    <tr class="text-center" style="font-size:12px;">
                        <th scope="text-center" >{{$ls->id}}  </th>
                        <td> {{$ls->nome }} </td>
                        <td> {{ $ls->data_nasc}}         </td>
                        <td> {{ $ls->cidade}}    </td>
                        <td> {{ $ls->estado}}    </td>
                        <td> {{ $ls->endereco}}    </td>
                        <td> {{ $ls->escolaridade}}    </td>
                        <td> {{ $ls->cpf}}    </td>
                        <td> {{ $ls->rg}}    </td>
                        <td> {{ $ls->fone1}}    </td>
                        <td> {{ $ls->email}}    </td>
                        <td> @if( $ls->deficiencia) {{ $ls->deficiencia}} @else -- @endif</td>
                        <td> {{ $ls->cargo_concorrido}}    </td>
                        <td> {{ $ls->setor}}    </td>
                        <td> @if( $ls->indicacao) {{ $ls->indicacao}} @else -- @endif</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="text-danger" data-toggle="modal" data-target="#rem{{$ls->id}}"><i class="fas fa-minus-circle"></i></button>
                                <button type="button" class="text-primary" data-toggle="modal" data-target="#editPessoa{{$ls->id}}"><i class="fas fa-user-edit"></i> </button>
                            </div>
                        </td>
                    </tr>
                    @include('layouts.modal.RH.remCadastro')
                    @include('layouts.modal.RH.editPessoa')
                    @endforeach
                </tbody>
            </table>


    </div>




    <br><br>
</div>


@endsection