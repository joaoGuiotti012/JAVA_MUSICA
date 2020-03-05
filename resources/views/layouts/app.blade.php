<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="icon/x-icon" href="{{ asset('img/topo.png') }}"  sizes="16x16">
    <title>Casa Di Conti - Visitantes</title>

    <!-- Scripts -->
     <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/datatables.min.js') }}"></script>
     

    <!-- styles -->
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  
</head>
<style>
    tr{
        font-size: 14px;
    }
    button{ border-radius: 4px; }

    .table-row{cursor:pointer;}

    td .td-row{
        padding: 0 auto ;
        display: inline-table;
    }
</style>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('img/topo.png')}}" width="50" height="50" alt="">
                    Casa Di Conti
                </a>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a href="{{ url('/agendamento') }}" class="nav-link"> Agendamento</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/agendamento/saida') }}" class="nav-link"> Saida</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('agendamento/saida/historico') }}" class="nav-link"> Histórico</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/funcionarios') }}" class="nav-link"> Colaboradores</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/visitantes') }}" class="nav-link"> Visitantes</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset('img/topo.png')}}" width="25" height="25" style="border-radius:100%;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        @yield('content')
    </main>
</body>


<script>
  
   $(document).ready(function() {
        $('#table-view').DataTable({ 
            "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Linhas _MENU_ ",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "_START_ até _END_ ",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Proximo",
                        "sLast":     "Último"
                    }
                }
        });
    });


    // <+================ click table row ================+>
    $(document).ready(function($) {
        $(".table-row").click(function() {
            var id = $(this).find("th").attr("id");
            if(id){
                document.getElementById("id-select").value = id;
                $('#btn-ok').trigger('click');
            }
        });
        $(".table-row-visitado").click(function() {
            var id = $(this).find("th").attr("id");
            if(id){
                document.getElementById("id-visitado").value = id;
                $('#btn-okk').trigger('click');
            }
        });

    });

    // <+================ ANIMAÇÔES ================+>
    $(document).ready(function (){
        $("#btn-filtrar").click(function (){
            $("#btn-ocultar").show(1000);
            $("#btn-filtrar").hide(1000);
            $("#div-search").show(1000);
        });

        $("#btn-ocultar").click(function (){
            $("#btn-ocultar").hide(1000);
            $("#btn-filtrar").show(1000);
            $("#div-search").hide(1000);
        });

        $("#btn-filtrar").click(function (){
            $("#success").hide(1500);
            $("#primary").hide(1500);
            $("#danger").hide(1500);
        });

        // <+============= MASK ===================+>
        $('#rg').mask('000.000.000-0' , {reverse: false });
    });

    // <+================ SET TIME ALERT ================+>
    $().ready(function() {
        setTimeout(function () {
            $('#alert').hide(1000); // "foo" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });

        
    


</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e82d6530bc.js" crossorigin="anonymous"></script>


</html>
