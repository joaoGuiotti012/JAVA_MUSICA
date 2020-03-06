@extends('layouts.app')


@section('content')

@if (session('success'))
<div id="alert" class="alert alert-success">
    <p>{{ session('success') }} </p>
</div>
@endif
@if (session('primary'))
    <div id="alert" class="alert alert-primary">
        <p>{{ session('primary') }}  </p>
    </div>
@endif

    <br>
    <div class="table-responsive container">

        <table class="table table-sm table-borderless table-spriped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ramal</th>
                <th scope="col">Grupo</th>
                <th scope="col">Comercial</th>
                <th scope="col">Usuário</th>
                <th scope="col">Senha </th>
                <th scope="col">Custo</th>
                <th scope="col">Ativo</th>
                <th scope="col">Celular</th>
                <th scope="col">Observação</th>
                <th scope="col">N° Conta</th>
                <th scope="col">Pin</th>
                <th scope="col">Mac</th>
                <th scope="col">Chip</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($ramais as $ls)
              <tr>
                <td>{{$ls->id}}</td>
                <td>{{$ls->ramal}}</td>
                <td scope="col">{{$ls->grupo}}</td>
                <td scope="col">{{$ls->des_grupo}}</td>
                <td scope="col">{{$ls->usuario}}</td>
                <td scope="col">{{$ls->senha}} </td>
                <td scope="col">{{$ls->custo}}</td>
                <td scope="col">{{$ls->ativo}}</td>
                <td scope="col">{{$ls->celular}}</td>
                <td scope="col">{{$ls->observacao}}</td>
                <td scope="col">{{$ls->num_conta}}</td>
                <td scope="col">{{$ls->pin}}</td>
                <td scope="col">{{$ls->macaddress}}</td>
                <td scope="col">{{$ls->chip}}</td>
            
              </tr>
            @endforeach
             
            </tbody>
          </table>


    </div>



@endsection