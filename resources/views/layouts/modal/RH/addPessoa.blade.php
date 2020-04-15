<!-- Modal -->
<div class="modal fade" id="addPessoa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ficha de Cadastro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('pessoas.novo' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="inputEmail4" >Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputPassword4">Data Nascimento</label>
                        <input type="date" class="form-control" name="data_nasc">
                    </div>
                </div>
                    <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputState">Cidade</label>
                        <select id="inputState" class="form-control" name="cidade">
                        <option selected>Escolha...</option>
                            @foreach ($cidades as $ls)
                            <option value="{{$ls->id}}">{{$ls->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" name="estado">
                        <option selected>Escolha...</option>
                            @foreach ($estados as $ls)
                            <option value="{{$ls->id}}">{{$ls->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" name="endereco" placeholder="1234 Main St">
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputState">Escolaridade</label>
                            <select id="inputState" class="form-control" name="escolaridade">
                            <option selected>Escolha...</option>
                                @foreach ($escolaridades as $en)
                                <option value="{{$en->id}}">{{$en->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" >CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4" >Nome do Pai</label>
                    <input type="text" class="form-control" name="nome_pai">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Nome do Mãe</label>
                    <input type="text" class="form-control" name="nome_mae">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4" >Telefone</label>
                        <input type="text" class="form-control" name="fone1" id="fone1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Telefone 2</label>
                        <input type="text" class="form-control" id="fone2" name="fone2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAddress2">E-mail</label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputAddress2">Deficiencia: </label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="AUDITIVA">
                        <label class="form-check-label" for="inlineCheckbox1">Auditiva</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="VISUAL">
                        <label class="form-check-label" for="inlineCheckbox2">Visual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="MENTAL" >
                        <label class="form-check-label" for="inlineCheckbox3">Mental</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="FISICA" >
                        <label class="form-check-label" for="inlineCheckbox3">Física</label>
                    </div>
                </div>
                <br>
                <div class="input-group mb-3" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Anexo</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pdf" aria-describedby="inputGroupFileAddon01" > 
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
                                <input type="text" class="form-control" name="cargo_concorrido">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Setor</label>
                                <input type="text" class="form-control" name="setor">
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" >Data Contrato</label>
                                <input type="date" class="form-control" name="data_contato">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Data Retorno </label>
                                <input type="date" class="form-control" name="data_retorno">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Indicação </label>
                                <input type="text" class="form-control" name="indicacao">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <br>
            </div>  
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Salvar <i class="fas fa-check"></i> </button>
            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="margin-left: 10px;">Cancelar <i class="fas fa-window-close"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>