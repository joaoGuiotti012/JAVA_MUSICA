<!-- Modal -->

<div class="modal fade" id="cadPessoas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Busca Cadastros</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container table-responsive">
            <table id="table-view02" class="table table-sm table-hover table-striped">
                <thead>
                <tr >
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Setor</th>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                @foreach ($pessoas as $ls)
                    <tr class="table-row-pessoas">
                        <th  id="{{$ls->id}}">{{$ls->id}}  </th>
                        <td> {{ $ls->nome}}      </td>
                        <td> {{ $ls->rg}}      </td>
                        <td> {{ $ls->cpf}}      </td>
                        <td> {{ $ls->cidade}}      </td>
                        <td> {{ $ls->estado}}      </td>
                        <td> {{ $ls->cargo_concorrido}}  </td>
                        <td> {{ $ls->setor}}      </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm btn-ok" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
  <script> 
    $(document).ready(function($){ 
      $(".table-row-pessoas:has(th)").click(function(e) {
        var clickedCell= $(e.target).closest("th");
        document.getElementById("cad_num").value = clickedCell.text();
        $('.btn-ok').trigger('click');
      });
    });
  </script>