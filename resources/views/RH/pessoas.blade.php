@extends('layouts.appRh')

@section('content')

    <br><br>
    <div class="container">
        <h2 class="text-center" id="historico"><i class="fas fa-list-alt"></i> Cadastros </h2>

        <button type="submit" class="text-primary"  title="deletar"   
        data-toggle="modal" data-target="#addPessoa">
            <i class="fas fa-user-plus"></i>
        </button> 
        @include('layouts.modal.RH.addPessoa')
        <br><br>
        <div class="table-responsive" style="max-height: 450px">
            <table id="table-view" class="table table-sm table-hover table-bordered table-striped ">
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
                    <tr class="text-center" style="font-size:12px">
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
                            @include('layouts.modal.RH.remCadastro')
                            @include('layouts.modal.RH.editPessoa')
                        </td>
                        
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>


    </div>




    <br><br>
</div>


@endsection