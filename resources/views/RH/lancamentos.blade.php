@extends('layouts.appRh')


@section('content')
<br>

    <br>
    <h2 class="text-center" id="historico"><i class="fas fa-list-alt"></i> Lançamentos </h2>
    
        <button class=" btn-sm btn-primary" id="btn-filtros">
            Filtros <i class="fas fa-filter"></i>
        </button>
        <form action=" {{route('avaliacao.search') }}" method="GET">
        @csrf
        <button class=" btn-sm btn-primary" type="submit" style="display:none" id="btn-ocultar">
            Buscar <i class="fas fa-search"></i>
        </button>
        <div class="card" id="div-filtros" style="display:none">
            <h6 class="card-header list-inline">
                Filtros <i class="fas fa-filter"></i>
            </h6>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-sm-group col-md-2">
                                <select id="select" class="form-control" name="campo">
                                    <option value="responsavel">Responsável</option>
                                    <option value="indicacao">Indicação</option>
                                    <option value="nome" >Nome</option>
                                    <option value="cargo_concorrido" >Cargo Concorrido</option>
                                    <option value="setor" >Setor</option>
                                    <option value="obs_" >Observação</option>
                                    <option value="obs_geral" >Observação Geral</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                            </div>
                        </div>
                        <hr>
                        <!--div class="form-group">
                            <label for="inputAddress2"> <b> Tipo Cadastro: </b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="curriculo">
                                <label class="form-check-label" for="inlineCheckbox1">Curricúlo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="ficha">
                                <label class="form-check-label" for="inlineCheckbox2">Ficha</label>
                            </div>
                        </div>   
                        <hr-->
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tp" >
                                <label class="form-check-label" for="inlineCheckbox1">Teste Psico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="iac" >
                                <label class="form-check-label" for="inlineCheckbox2">Informações. Criminais</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rs" >
                                <label class="form-check-label" for="inlineCheckbox3">Redes Socias</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="ptj"  >
                                <label class="form-check-label" for="inlineCheckbox3">Tribunal Just.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rp"  >
                                <label class="form-check-label" for="inlineCheckbox3">Ref. Profi.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="if"  >
                                <label class="form-check-label" for="inlineCheckbox3">Info. Financeira</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="ic"  >
                                <label class="form-check-label" for="inlineCheckbox3">Info. CNH</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="ep"  >
                                <label class="form-check-label" for="inlineCheckbox3">E. Psicologica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="et"  >
                                <label class="form-check-label" for="inlineCheckbox3">Ex. Tecnica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="ex"  >
                                <label class="form-check-label" for="inlineCheckbox3">Ex. Médico</label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="inputAddress2"> <b> Deficiencia: </b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_aud" value="auditiva">
                                <label class="form-check-label" for="inlineCheckbox1">Auditiva</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_vis" value="visual">
                                <label class="form-check-label" for="inlineCheckbox2">Visual</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_men" value="mental" >
                                <label class="form-check-label" for="inlineCheckbox3">Mental</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="def_fis" value="fisica" >
                                <label class="form-check-label" for="inlineCheckbox3">Física</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <br>
</div>
    <div class="table-responsive ">
        <table class="table-sm table-hover table-bordered table-striped ">
            <thead>
                <tr class="text-center" style="font-size:12px">
                    <th scope="col"><i class="fas fa-user"></i></th>
                    <th width="20%"> Nome </th>
                    <th width="20%"> Carg. Concorrido</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Deficiencia</th>
                    <th scope="col">Indicação</th>
                    <th scope="row">Teste Psicologicos</th>
                    <th scope="row">Info. Criminais</th>
                    <th scope="row">Redes Socias</th>
                    <th scope="row">Trib. Just.</th>
                    <th scope="row">Ref. Profi. </th>
                    <th scope="row">Info. Financeira </th>
                    <th scope="row">Info. CNH </th>
                    <th scope="row">E. Psicologica </th>
                    <th scope="row">E. Tecnica </th>
                    <th scope="row">Ex. Médico </th>
                    <!--th scope="row">Responsavel</th-->
                    <th scope="row">Data Modificação</th>
                    <th colspan="3" > AÇÕES </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lancamentos as $ls)
                <tr class="text-center">
                    <td >{{ $ls->id }}</td> 
                    <td >{{ $ls->nome }}</td> 
                    <td>{{ $ls->cargo_concorrido }}</td> 
                    <td>{{ $ls->setor }}</td> 
                    <td> @if( $ls->deficiencia) {{ $ls->deficiencia}} @else -- @endif</td>
                    <td> @if( $ls->indicacao) {{ $ls->indicacao}} @else -- @endif</td>
                    <td> 
                        @if($ls->tp == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->tp == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->iac == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->iac == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td> 
                        @if($ls->rs == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->rs == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->ptj == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ptj == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->rp == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->rp == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->if == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->if == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->ic == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ic == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->ep == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ep == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->et == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->et == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <td>
                        @if($ls->ex == 'S') <i class="fas fa-check text-success"></i> @elseif( $ls->ex == 'N') <i class="fas fa-times text-danger"></i> @else -- @endif  
                    </td> 
                    <!--td>{{ $ls->responsavel }}</td-->
                    <td>{{ $ls->updated_at }}</td>
                    <td class="text-center" > 
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="text-primary" onclick="location.href='{{ route('avaliacao.editar' , $ls->id  ) }}'" >
                                <i class="fas fa-edit"></i>
                            </button> 
                
                            <button type="submit" class="text-danger"  title="deletar"   
                            data-toggle="modal" data-target="#rem{{$ls->id}}">
                                <i class="fas fa-trash-alt"></i>
                            </button> 
                            @include('layouts.modal.RH.rem')
                    
                            <button type="submit" class="text-info"  title="deletar"   
                            data-toggle="modal" data-target="#view{{$ls->id}}">
                                <i class="fas fa-eye"></i>
                            </button>
                            @include('layouts.modal.RH.view')
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <br><br>
</div>

@endsection