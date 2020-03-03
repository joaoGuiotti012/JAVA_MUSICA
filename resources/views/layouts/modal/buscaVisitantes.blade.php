<!-- Modal -->

<div class="modal fade" id="buscaVisitantes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Busca Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container">
            <table id="table-view" class="table table-sm table-hover table-striped">
                <thead>
                <tr class="text-center" href="#">
                    <th scope="col">Código</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">RG</th>
                    <th scope="col">Empresa</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($visitantes as $ls)
                <tr class="table-row">
                        <th scope="row" id="{{$ls->id}}"># {{$ls->id}}  </th>
                        <td> 
                            @if ($ls->foto != null )
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " style="border-radius: 100%;" width="30" height="30">
                            @else
                                <img src="{{ asset("img/topo.png") }}" style="border-radius: 100%;" width="30" height="30">
                            @endif
                        </td>
                        <td> {{ $ls->nome}}       </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                    
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" id="btn-ok" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
