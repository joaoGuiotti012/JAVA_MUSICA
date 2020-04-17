<!-- Modal -->
<div class="modal fade" id="editPessoa{{$ls->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ficha de Cadastro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('pessoa.editar', $ls->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="inputEmail4" >Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{$ls->nome }}" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputPassword4">Data Nascimento</label>
                        <input type="date" class="form-control" name="data_nasc" value="{{$ls->data_nasc }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputState">Cidade</label>
                        <select id="inputState" class="form-control" name="cidade" required >
                            <option selected value="{{$ls->cidade_id}}">{{$ls->cidade}}</option>
                            @foreach ($cidades as $cd)
                            <option value="{{$cd->id}}">{{ $cd->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" name="estado" required>
                            <option selected value="{{$ls->estado_id}}">{{$ls->estado}}</option>
                            @foreach ($estados as $es)
                            <option value="{{$es->id}}">{{$es->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" name="endereco" placeholder="1234 Main St" value="{{ $ls->endereco }}" required > 
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputState">Escolaridade</label>
                        <select class="form-control" name="escolaridade" value="{{$ls->escolaridade }}" required>
                        <option selected value="{{$ls->escolaridade_id}}">{{$ls->escolaridade}}</option>
                            @foreach ($escolaridades as $en)
                            <option value="{{$en->id}}">{{$en->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputEmail4" >CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{$ls->cpf}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" value="{{$ls->rg}}"required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4" >Nome do Pai</label>
                    <input type="text" class="form-control" name="nome_pai" value="{{$ls->nome_pai}}" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Nome do Mãe</label>
                    <input type="text" class="form-control" name="nome_mae" value="{{$ls->nome_mae}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4" >Telefone</label>
                        <input type="text" class="form-control" name="fone1" id="fone1" value="{{$ls->fone1}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Telefone 2</label>
                        <input type="text" class="form-control" id="fone2" name="fone2" value="{{$ls->fone2}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAddress2">E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{$ls->email}}" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputAddress2">Deficiencia: </label><br>
                    <div class="form-check form-check-inline">
                       
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="AUDITIVA" @if( $ls->deficiencia == 'AUDITIVA') checked @endif>
                        
                        <label class="form-check-label" for="inlineCheckbox1">Auditiva</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="VISUAL"  @if( $ls->deficiencia == 'VISUAL') checked @endif>
                        <label class="form-check-label" for="inlineCheckbox2">Visual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="MENTAL"  @if( $ls->deficiencia == 'MENTAL') checked @endif>
                        <label class="form-check-label" for="inlineCheckbox3">Mental</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="deficiencia" value="FISICA"  @if( $ls->deficiencia == 'FISICA') checked @endif>
                        <label class="form-check-label" for="inlineCheckbox3">Física</label>
                    </div>
                </div>
                <br>
                <div class="input-group mb-3" >
                    <div class="input-group">
                        <span class="input-group-text" ><i style="font-size: 20px;" class="fas fa-file-pdf text-danger"></i></a></span>
                        <div class="custom-file">
                            <input id="pdf" type="file" class="" name="pdf" aria-describedby="inputGroupFileAddon01" > 
                        </div>
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
                                <input type="text" class="form-control" name="cargo_concorrido" value="{{$ls->cargo_concorrido}}" >
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Setor</label>
                                <input type="text" class="form-control" name="setor" value="{{$ls->setor}}" >
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" >Data Contrato</label>
                                <input type="date" class="form-control" name="data_contato" value="{{$ls->data_contato}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Data Retorno </label>
                                <input type="date" class="form-control" name="data_retorno" value="{{$ls->data_retorno}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Indicação </label>
                                <input type="text" class="form-control" name="indicacao" value="{{$ls->indicacao}}">
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
