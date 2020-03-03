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

                    <div class="form-group col-md-8">
                        <div class="container" id="camera"><b>Câmera:</b>
                            <div id="minha_camera" ></div><form><input type="button" value="Tirar Foto" onClick="bater_foto()"></form>
                        </div>
                        <div class="container" id="previa">
                            <b>Prévia:</b><div id="results"></div>
                            </div>
                            <div class="container" id="salva">
                            <span id="carregando"></span><img id="completado" src=""/>
                        <input type="file" class="text-center center-block file-upload" name="foto">
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
<script src="{{ asset('js/webcam.min.js') }}"></script>
<script src="{{ asset('js/foto.js') }}"></script>