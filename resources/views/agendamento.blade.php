@extends('layouts.app')


@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <br>
    <form class="container" method="POST" action="{{  route('agendamento.novo') }}"  enctype="multipart/form-data">
        @csrf  
            <div class="card">
                <div class="card-header text-white bg-dark"><h5>Dados Visitantes</h5></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="ID">Cod Cracha</label>
                            <input type="number" class="form-control" placeholder="1234 Main St" name="codigo"> 
                            
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="ID">ID</label>
                            <input type="number" class="form-control"  id="id-select" name="visitante_id" >
                        </div>

                        <div class="form-group col-md-2" >
                            <label for="a"> .</label>
                            <button type="reset" class="bnt btn-primary form-control" data-toggle="modal" data-target="#buscaVisitantes" > Buscar </button>
                        </div>
                    </div>
                    @include('layouts.modal.buscaVisitantes')

                    
                </div>
            <br>
                <div class="card-header text-white bg-dark"><h5>Dados Visitado </h5></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="visitado_id">Nome  /  Setor </label>
                            <select class="custom-select" id="inputGroupSelect01" name="visitado_id">
                                <option selected>Choose...</option>
                                @foreach ($func as $f)
                                    <option value="{{$f->id}}" >{{ $f->nome }} / {{ $f->setor }} </option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Confirmar</button>
            <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Cancelar</button>
            <br><br>
    </form>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('#rg').mask('000.000.000-0' , {reverse: false });
    });
</script>
@endsection

