<!-- Modal -->

<div class="modal fade" id="editLanc{{$ls->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Editar Lançamentos </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container table-responsive">
           

            <div class="col-md-4">
                <div class="form-group mx-sm-2 mb-2">
                    <input type="text" class="form-control" value="{{ $ls->id }}">
                </div>
            </div>
            <div class="container">
                <table class="table table-sm table-hover table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">Itens</th>
                        <th scope="col">Apto</th>
                        <th scope="col">Inapto</th>
                        <th scope="row">Data</th>
                        <th scope="row">Obs</th>
                    </tr>
                    <tr>
                      @foreach ($itens as $item)
                        
                        <tr class="text-center"> 
                            <th>{{$item->descricao}}</th>
                            <td> <input type="checkbox" class="form-check-input" name="{{$item->chk_name}}" value="S"></td>
                            <td > <input type="checkbox" class="form-check-input" name="{{$item->chk_name}}" value="N"></td>
                            <td ><input type="date" class="form-control-sm" name="{{$item->date_name}}" ></td>
                            <td ><textarea type="text" class="form-control-sm" name="{{$item->obs_name}}" value=""></textarea>
                        </tr>
                        
                      @endforeach
                    </tr>
                  
                </table>
            </div>
        




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