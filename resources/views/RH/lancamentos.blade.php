@extends('layouts.appRh')
@section('content')
<br>
<div class="container">
    <br>
    <div class="container table-responsive">
        <table id="table-view" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col"> Carg. Concorrido</th>
                    <th scope="col">Setor</th>
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
                    <th colspan="2" > AÇÕES </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lancamentos as $ls)
                <tr class="text-center">
                    <td>{{ $ls->id }}</td> 
                    <td>{{ $ls->nome }}</td> 
                    <td>{{ $ls->cargo_concorrido }}</td> 
                    <td>{{ $ls->setor }}</td> 
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
                    <td class="text-center" > 
                        <button type="submit" class="text-primary" onclick="location.href='{{ route('avaliacao.editar' , $ls->id) }}'" >
                            <i class="fas fa-edit"></i>
                        </button> 
                    </td>
                    <td class="text-center">
                        <button type="submit" class="text-danger"  title="deletar"   
                        data-toggle="modal" data-target="#rem{{$ls->id}}">
                            <i class="fas fa-trash-alt"></i>
                        </button> 
                        @include('layouts.modal.RH.rem')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection