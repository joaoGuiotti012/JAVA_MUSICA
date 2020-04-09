@extends('layouts.appRh')


@section('content')
<br><br>
<div class="container">
    <div class="card ">
        <div class="card-header">
            <h5> Ficha de Cadastro </h5>
        </div>
        <form >
            <div class="container">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4" >Nome</label>
                        <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Data Nascimento</label>
                        <input type="date" class="form-control" id="inputPassword4">
                    </div>
                </div>
                    <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputState">Cidade</label>
                        <select id="inputState" class="form-control">
                        <option selected>Escolha...</option>
                            @foreach ($cidades as $ls)
                            <option value="{{$ls->id}}">{{$ls->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control">
                        <option selected>Escolha...</option>
                            @foreach ($estados as $ls)
                            <option value="{{$ls->id}}">{{$ls->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Escolaridade</label>
                            <select id="inputState" class="form-control">
                                <option selected>Escolha...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" >CPF</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">RG</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4" >Nome do Pai</label>
                    <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Nome do Mãe</label>
                    <input type="text" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4" >Telefone</label>
                        <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Telefone 2</label>
                        <input type="text" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAddress2">E-mail</label>
                        <input type="email" class="form-control" id="inputAddress2" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputAddress2">Deficiencia: </label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="auditivo">
                        <label class="form-check-label" for="inlineCheckbox1">Auditivo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="visual">
                        <label class="form-check-label" for="inlineCheckbox2">Visual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="mental" >
                        <label class="form-check-label" for="inlineCheckbox3">Mental</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="fisica" >
                        <label class="form-check-label" for="inlineCheckbox3">Física</label>
                    </div>
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Anexo</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header">
                    <b> INFORMAÇÕES PARA LANÇAMENTO</b>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> </h5>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="inputEmail4" >Cargo concorrido</label>
                                <input type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Setor</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4" >Data Contrato</label>
                                <input type="date" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Data Retorno </label>
                                <input type="date" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>  
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Salvar <i class="fas fa-check"></i> </button>
                <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar <i class="fas fa-window-close"></i></button>
            </div>
        </form>
    </div>
    <br><br>
</div>


@endsection