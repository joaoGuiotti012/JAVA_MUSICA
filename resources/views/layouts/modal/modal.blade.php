<div class="modal fade" id="staticBackdrop{{$ls->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-calendar-alt"></i>  Alterar Agendamento</h5>
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
            
            <form class="container" method="POST" action="{{  route('agendamento.update' , $ls->id ) }}">
                @method('PATCH') 
                @csrf
                <br>
                <h4 class="text-left"> Dados Visitante 
                    <p><hr class="text-primary" ></p>
                </h4>
                <div class="form-row text-left">
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$ls->id}}">
                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" value=" {{$ls->nome}}">
                        <input type="hidden" name="dataEntrada" value="{{$ls->dataEntrada}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" name="empresa" value=" {{$ls->empresa}}">
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" placeholder="123.432.123-4" name="rg" id="rg" value="{{$ls->rg}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ID">Cod Cracha</label>
                        <input type="number" class="form-control" value="{{$ls->codigo}}" placeholder="1234 Main St" name="codigo" value="$ls->">
                    </div>
                    </div>
            
                    <h4 class="text-left"> Dados Visitado 
                        <p><hr class="text-primary" ></p>
                    </h4>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <label for="visitado_id">Nome  /  Setor </label>
                            <select class="custom-select" id="inputGroupSelect01" name="visitado_id">
                                <option selected value="{{ $ls->visitado_id }}"> {{$ls->nome_func}} / {{$ls->setor}}</option>
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
