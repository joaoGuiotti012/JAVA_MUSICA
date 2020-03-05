
  
<div class="modal fade" id="editar{{$ls->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-calendar-alt"></i>  Editar Registro</h5>
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
            
        <form action="{{ route('agendamento.update' , $ls->id  ) }}" method="POST">
            @method('PATCH') 
            @csrf
                <br>
                <h4 class="text-left"> Dados Visitante 
                    <p><hr class="text-primary" ></p>
                </h4>
                <div class="text-center">
                @if ($ls->foto != null )
                    <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " class="avatar img-thumbnail" alt="avatar" width="150" height="150">
                @else
                    <img src="{{ asset("img/topo.png") }}" class="avatar img-thumbnail" alt="avatar"  width="150" height="150">
                @endif
        
                <div class="form-row text-left">
                    <div class="form-group col-md-6">

                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" value="{{$ls->nome}}">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" name="empresa" value="{{$ls->empresa}}">
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" placeholder="123.432.123-4" name="rg" id="rg" value="{{$ls->rg}}">
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