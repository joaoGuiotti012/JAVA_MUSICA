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
        <div class="modal-body">
          <nav style="max-height: 450px; overflow: scroll; ">
            <table class="table table-sm table-hover table-striped">
                <thead>
                <tr class="text-center" href="#">
                    <th scope="col">Código</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">RG</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($visitantes as $ls)
                <tr>
                        <th scope="row"># {{$ls->id}}  </th>
                        <td> 
                            <a href="{{url("storage/visitantes/" . $ls->foto )}}">
                            @if ($ls->foto != null )
                                <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " style="border-radius: 100%;" width="30" height="30">
                            @else
                                <img src="{{ asset("img/topo.png") }}" style="border-radius: 100%;" width="30" height="30">
                            @endif
                            </a> 
                        </td>
                        <td> {{ $ls->nome}}       </td>
                        <td> {{ $ls->rg}}         </td>
                        <td> {{ $ls->empresa}}    </td>
                        <td class="text-center" >  
                        </td>
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
        </nav>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">Sim</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Não</button>
      
        </div>
      </div>
    </div>
  </div>
