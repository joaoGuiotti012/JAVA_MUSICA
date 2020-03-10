

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
            
        <form action="{{ route('agendamento.update' , $ls->id)  }}" method="POST" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
                <br>
                <h4 class="text-left"> Dados Visitante 
                    <p><hr class="text-primary" ></p>
                </h4>
                <div class="text-center">
                @if ($ls->foto != null )
                    <img src="" id ="new-img"  style="display:none" class="avatar img-thumbnail"  width="150" height="150">   
                    <img src="{{ asset("storage/visitantes/" . $ls->foto )}} " id ="old-img"  class="avatar img-thumbnail"  width="150" height="150">
                @else
                    <img src="" id ="new-img-null"  style="display:none" class="avatar img-thumbnail"  width="150" height="150">   
                    <img src="{{ asset("img/topo.png") }}" id ="null-img" class="avatar img-thumbnail" alt="avatar"  width="150" height="150">
                @endif
                <br><br>
                <div class="input-group" id="change-img">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-photo-video"></i></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="new_foto" style="display:block"  class="custom-file-input change-img" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">
                          selecione ou tire uma foto...
                      </label>
                      <input type="hidden" value="{{$ls->foto}}" name="old_foto">
                    </div>
                </div>
                <!--input type="file" id="change-img" style="display:none"--><br><br>
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

<script>

    
   
$().ready(function (){
    

    /*var teste = false;
    $("#old-img").click(function (){
        if(teste == false){
            $("#change-img").show(100);
            teste = true;
      
        }else{
            $("#change-img").hide(100);
            teste = false;
        }
    });*/

    function enviar_imagem(input) {
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function (e) {
                    $("#old-img").hide(200);
                    $("#new-img").show(300);
                    $("#null-img").hide(200);
                    $("#new-img-null").show(300);
                    $("#new-img").attr('src', e.target.result);
                    $("#new-img-null").attr('src', e.target.result);
                }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.change-img').change(function(){
        enviar_imagem(this);
    });
    
    

});



</script>