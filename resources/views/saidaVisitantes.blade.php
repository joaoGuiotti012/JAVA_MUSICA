@extends('layouts.app')

@section('content')

    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }} </p>
    </div>
    @endif
    @if (session('primary'))
        <div class="alert alert-primary">
            <p>{{ session('primary') }}  </p>
        </div>
    @endif

    <br>
    <div class="container">
        <div class="d-inline ">
            @csrf
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#novo" > 
                <i class="fas fa-user-plus"></i>
                Novo
            </button>
            <br>
            @include('layouts.modal.visitantes.novo')
        </div>
     <br>
        <nav style="max-height: 450px; overflow: scroll; ">
            <table class="table table-sm table-hover table-bordered table-striped">
                <thead>
                <tr class="text-center">
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
                            <button type="button" class="btn-danger " data-toggle="modal" data-target="#rem{{$ls->id}}">
                                <i class="fas fa-minus-circle"></i>
                            </button> 
                            @include('layouts.modal.visitantes.rem')
                            <button type="button" class="btn-success" data-toggle="modal" data-target="#{{$ls->id}}">
                                <i class="fas fa-user-edit"></i> 
                            </button> 
                           

                        </td>
                    </tr>
                  
                    @endforeach
                </tbody>
            </table>
        </nav>
        <p class="text-monospace text-small" style="margin-left:8px;">   N° ultimos: <b>{{$cont}} </b> </p>
        <br>
    </div>

@endsection