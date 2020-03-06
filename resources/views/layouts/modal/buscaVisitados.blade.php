<!-- Modal -->

<div class="modal fade" id="visitados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Busca Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container">
            <table id="table-view02" class="table table-sm table-hover table-striped">
                <thead>
                <tr >
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Setor</th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                @foreach ($func as $ls)
                    <tr class="table-row-visitado">
                        <th scope="row" id="{{$ls->id}}"># {{$ls->id}}  </th>
                        <td> {{ $ls->nome}}      </td>
                        <td> {{ $ls->setor}}      </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" id="btn-okk" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>