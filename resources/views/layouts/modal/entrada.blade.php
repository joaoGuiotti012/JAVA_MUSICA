<!-- Modal -->
<div class="modal fade" id="entrada{{$ls->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmação de Entrada</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Deseja realmente confirmar a entrada de <b> {{ $ls->nome }}</b>  , cracha: <b> {{$ls->codigo}}</b> ?
          </p>
        </div>
        <div class="modal-footer">
          <form action="{{ route('agendamento.entrada' , $ls->id ) }}"  method="GET">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Sim</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Não</button>
          </form>
        </div>
      </div>
    </div>
  </div>
