<!-- Modal -->
<div class="modal fade" id="view{{$ls->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Visualização</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if ( $ls->foto != null)
            <img src="{{asset("storage/visitantes/" . $ls->foto)}}" class="avatar img-thumbnail rounded mx-auto d-block"  width="150" height="150" >
          @else
          <img src="{{ asset("img/topo.png") }}" class="avatar img-thumbnail rounded mx-auto d-block"  width="150" height="150" >

          @endif
          <br>
          <div class="container">
            <hr>
            <p><b> ID: </b>{{$ls->id}}</p>
            <p><b> Visitante: </b>{{$ls->nome}}</p>
            <p><b> RG: </b>{{$ls->rg}}</p>
            <p><b> Empresa: </b>{{$ls->empresa}}</p>
         </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
