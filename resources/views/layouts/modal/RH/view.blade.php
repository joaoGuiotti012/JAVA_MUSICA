<!-- Modal -->

<div class="modal fade" id="view{{$ls->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Visualizar Cadastro / Avaliações </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="view" style="font-size: 12px"> 
            <div class="row">
              <div class="col-md-5 text-left">
                <h6 class="text-center"> Cadastro </h6>
                <hr>
                <p> <b> Nome: </b> {{ $ls->nome }}</p>
                <p> <b> Data Nascimento: </b> {{ $ls->data_nasc }}</p>
                <p> <b> Cidade: </b> {{ $ls->cidade }}</p>
                <p> <b> Estado: </b> {{ $ls->estado }}</p>
                <p> <b> Endereco: </b> {{ $ls->endereco }}</p>
                <p> <b> Escolaridade: </b> {{ $ls->escolaridade }}</p>
                <p> <b> CPF: </b> {{ $ls->cpf }}</p>
                <p> <b> RG: </b> {{ $ls->rg }}</p>
                <p> <b> Fone 1: </b> {{ $ls->fone1 }}</p>
                <p> <b> Fone 2: </b> @if($ls->fone2) {{ $ls->fone2 }} @else -- @endif</p>
                <p> <b> email: </b> {{ $ls->email }}</p>
                <p> <b> Deficiencia: </b> @if($ls->deficiencia) {{ $ls->deficiencia }} @else -- @endif</p>
                <p> <b> Cargo Concorrido: </b> {{ $ls->cargo_concorrido }}</p>
                <p> <b> Setor: </b> {{ $ls->setor }}</p>
                <p> <b> Data Contato: </b> @if($ls->data_contato){{ $ls->data_contato }}@else -- @endif</p>
                <p> <b> Data Retorno: </b> @if($ls->data_retorno){{ $ls->data_retorno }}@else -- @endif</p>
                <p> <b> Indicação: </b> @if($ls->indicacao){{ $ls->indicacao }}@else -- @endif</p>
                <p><b>Anexo PDF: </b> 
                  <a href="{{url("storage/appRH/cadastros/pdf/" . $ls->pdf )}}">
                  <i style="font-size: 15px;"class="fas fa-file-pdf text-danger"></i> </a></p>
              </div>
              <div class="col-md-6 text-left">
                <h6 class="text-center"> Avaliações </h6>
                <hr>
                
                <p> 
                  <b> Teste Psico.: </b>
                  @if($ls->tp == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->tp == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_tp}} </p> 
                <p>
                    <b> Info. Criminais: </b>
                    @if($ls->iac == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->iac == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    <b> Data: </b> {{ $ls->date_iac}} </p> 
                  </p> 
                <p> 
                  <b> Redes Sociais: </b>
                  @if($ls->rs == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->rs == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_rs}} </p> 
                </p> 
                <p>
                  <b> Trib. Just.: </b>
                  @if($ls->ptj == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ptj == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_ptj}} </p> 
                </p> 
                <p>
                  <b> Ref. Profi.: </b>
                  @if($ls->rp == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->rp == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_rp}} </p> 
                </p> 
                <p>
                  <b> Info. Financeira: </b>
                  @if($ls->if == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->if == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_if }} </p> 
                </p> 
                <p>
                  <b> Info. CNH: </b>
                  @if($ls->ic == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ic == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_ic }} </p> 
                </p> 
                <p>
                  <b> EX. Psico.: </b>
                  @if($ls->ep == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ep == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_ep }} </p> 
                </p> 
                <p>
                  <b> EX. Tecnico: </b>
                  @if($ls->et == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->et == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_et }} </p> 
                </p> 
                <p>
                  <b> EX. Médico: </b>
                  @if($ls->ex == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ex == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                  <b> Data: </b> {{ $ls->date_ex }} </p> 
                </p> 
                <p> <b> Obs. Gerais: </b> {{ $ls->obs_geral }}  </p>
                <p> <b> Responsável: </b> {{ $ls->responsavel}}  </p>

              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>