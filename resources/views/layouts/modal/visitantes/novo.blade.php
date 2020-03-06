<div class="modal fade" id="novo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-user-plus"></i> Novo Visitante</h5>
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
            
            <form class="container" method="POST" action="{{  route('visitantes.novo') }}"  enctype="multipart/form-data">
                @csrf
                <br>
                <h4 class="text-left"> Dados Visitante 
                    <p><hr class="text-primary" ></p>
                </h4>
                <div class="form-row text-left">
                    <div class="form-group col-md-10">

                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" >

                    </div>
                    <div class="form-group col-md-6">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" name="empresa">
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" placeholder="123.432.123-4" name="rg" id="rg" >

                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-photo-video"></i></span>
                        </div>
                        <div class="custom-file">
                          <input type="file" name="foto" id="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">
                              selecione ou tire uma foto...
                          </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center" style="display:none;" id="preview">
                    <img id ="Tela" Name ="Tela"  class="avatar img-thumbnail"  width="150" height="150" >
                </div><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm" id="confirmar">Confirmar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script>
function enviar_imagem(input) {
  if (input.files && input.files[0]) {
     var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').show(600);
            $('#Tela').attr('src', e.target.result);
        }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#foto").change(function(){
  enviar_imagem(this);
});
  </script>