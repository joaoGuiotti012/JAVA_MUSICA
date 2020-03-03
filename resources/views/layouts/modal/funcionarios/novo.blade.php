<div class="modal fade" id="novo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-user-plus"></i> Novo Colaborador</h5>
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
            
            <form class="container" method="POST" action="{{  route('funcionarios.novo') }}" >
                @csrf
                <br>
                <h4 class="text-left"> Dados Visitante 
                    <p><hr class="text-primary" ></p>
                </h4>
                <div class="form-row text-left">
                    <div class="form-group col-md-12">

                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" >

                    </div>
                    <div class="form-group col-md-6">
                            <label for="visitado_id">Nome  /  Setor </label>
                            <select class="custom-select" id="inputGroupSelect01" name="setor">
                                <option selected>Choose...</option>
                                    <option value="T.I" > T.I </option>
                                    <option value="T.I" > Controladoria </option>
                                    <option value="T.I" > Comercial </option>
                                    <option value="T.I" > Infra </option>
                                    <option value="T.I" > Financeiro </option>
                                    <option value="T.I" > Compras </option>
                                    <option value="T.I" > Marketing </option>
                                   
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