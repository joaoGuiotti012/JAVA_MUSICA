
  
<div class="modal fade" id="editar{{$ls->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-calendar-alt"></i>  editar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach 
                </ul>
            </div>
            @endif
            
        <form action="{{ route('funcionarios.update' , $ls->id  ) }}" method="POST">
            @method('PATCH') 
            @csrf
                <br>
                <div class="form-row text-left">
                    <div class="form-group col-md-12">

                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" value="{{$ls->nome}}" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="empresa">Setor</label>
                        <select class="custom-select" id="inputGroupSelect01" name="setor" required>
                                <option selected>{{$ls->setor}}</option>
                                <option value="Salas Reuniao" > Salas Reuinião </option>
                                <option value="T.I" > T.I </option>
                                <option value="Infra" > Infra </option>
                                <option value="Controladoria" > Controladoria </option>
                                <option value="Comercial" > Comercial </option>
                                <option value="Diretoria Comercial" > Diretoria Comercial </option>
                                <option value="Financeiro" > Financeiro </option>
                                <option value="Compras" > Compras </option>
                                <option value="Trade Marketing" > Trade Marketing </option>
                                <option value="Marketing" > Marketing </option>
                                <option value="Cervejaria " > Cervejaria  </option>
                                <option value="PPCP" > PPCP  </option>
                                <option value="Fiscal" > Fiscal  </option>
                                <option value="Contabilidade " >  Contabilidade </option>
                        </select>
                    </div>
            
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Confirmar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                    </div>
            </form>
        </div>
      </div>
    </div>
  </div>