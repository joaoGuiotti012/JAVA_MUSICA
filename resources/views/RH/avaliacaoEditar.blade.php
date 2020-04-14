@extends('layouts.appRh')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <h5 class="card-header">
                Editar Avaliação
            </h5>
           
            <div class="card-body">
                    
                    <div class="col-md-2">
                      <br>

                    </div>
                    <div class="container table-responsive">
                        <form action="{{ route('avaliacao.update' , $ls[0]->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH') 
                            @csrf
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Itens</th>
                                <th scope="col">Apto</th>
                                <th scope="col">Inapto</th>
                                <th scope="row">Data</th>
                                <th scope="row">Obs</th>
                            </tr>
                            
                            <tr class="text-center"> 
                                <th>TESTES PSICOLOGICOS</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_tp" value="S" @if($ls[0]->tp == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_tp" value="N" @if($ls[0]->tp == 'N') checked @endif ></td>
                                <td><input type="date" class="form-control-sm" name="date_tp" value="{{ $ls[0]->date_tp }}"></td>
                            <td><textarea type="text" class="form-control-sm" name="obs_tp" value="{{ $ls[0]->obs_tp }}"></textarea></td>
                            </tr>
                            <tr class="text-center"> 
                                <th>INFORMAÇAO ANT. CRIM.</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_iac" value="S" @if($ls[0]->iac == 'S') checked @endif ></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_iac" value="N" @if($ls[0]->iac == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_iac" value="{{ $ls[0]->date_iac }}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_iac" value="{{ $ls[0]->obs_iac }}"></textarea></td>
                            </tr>
                            <tr class="text-center"> 
                                <th>REDES SOCIAIS</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_rs" value="S" @if($ls[0]->rs == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_rs" value="N" @if($ls[0]->rs == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_rs" value="{{$ls[0]->date_rs}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_rs" value="{{$ls[0]->obs_rs}}"> </textarea>
                            </td></tr>
                            <tr class="text-center"> 
                                <th>PESQUISA TRIBUNAL JUSTIÇA</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ptj" value="S" @if($ls[0]->ptj == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ptj" value="N" @if($ls[0]->ptj == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_ptj" value="{{$ls[0]->date_ptj}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_ptj" value="{{$ls[0]->obs_ptj}}"></textarea>
                            </td></tr>
                            <tr class="text-center"> 
                                <th>REFERÊNCIA PROFISSIONAL</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_rp" value="S" @if($ls[0]->rp == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_rp" value="N" @if($ls[0]->rp == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_rp" value="{{$ls[0]->date_rp}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_rp" value="{{$ls[0]->obs_rp}}"></textarea>
                            </td></tr>
                            <tr class="text-center"> 
                                <th>INFORMAÇAO FINANCEIRA</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_if" value="S" @if($ls[0]->if == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_if" value="N" @if($ls[0]->if == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_if" value="{{$ls[0]->date_if}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_if" value="{{$ls[0]->obs_if}}"></textarea>
                            </td></tr>
                            <tr class="text-center"> 
                                <th>INFORMAÇAO DE CNH</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ic" value="S" @if($ls[0]->ic == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ic" value="N" @if($ls[0]->ic == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_ic" value="{{$ls[0]->date_ic}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_ic" value="{{$ls[0]->obs_ic}}"></textarea>
                            </td></tr>
                            <tr class="text-center"> 
                                <th>ENTREVISTA PSICOLOGICA	</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ep" value="S" @if($ls[0]->ep == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ep" value="N" @if($ls[0]->ep == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_ep" value="{{$ls[0]->date_ep}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_ep" value="{{$ls[0]->obs_ep}}"></textarea>
                            </td></tr>
                            <tr class="text-center"> 
                                <th>ENTREVISTA TECNICA</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_et" value="S" @if($ls[0]->et == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_et" value="N" @if($ls[0]->et == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_et" value="{{$ls[0]->date_et}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_et" value="{{$ls[0]->obs_et}}" ></textarea></td>
                            </tr>
                            <tr class="text-center"> 
                                <th>EXAME MEDICO</th>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ex" value="S" @if($ls[0]->ex == 'S') checked @endif></td>
                                <td> <input type="checkbox" class="form-check-input" name="chk_ex" value="N" @if($ls[0]->ex == 'N') checked @endif></td>
                                <td><input type="date" class="form-control-sm" name="date_ex" value="{{$ls[0]->date_ex}}"></td>
                                <td><textarea type="text" class="form-control-sm" name="obs_ex" value="{{$ls[0]->obs_ex}}"></textarea></td>
                            </tr>
                           
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Salvar <i class="fas fa-check"></i> </button>
                    <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar <i class="fas fa-window-close"></i></button>
                </div>
            </form>
            
        </div>
    </div>
    <br><br>
@endsection