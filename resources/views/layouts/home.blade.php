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
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/datatables.min.js') }}"></script>

    <!-- styles -->
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  
</head>
<style>
    .alert{
        position: absolute;
        width: 100%;
        z-index : 1;
    }

    .alert-danger{
        background: #b10a0a;
        color: white;
    }

    .alert-success{
        background: #049c65f0;
        color: white;
    }

    .alert-primary{
        background: #0d58a2fa;
        color: white;
    }

    tr{
        font-size: 14px;
    }
    button{ border-radius: 4px; }

    .table-row{cursor:pointer;}

    td .td-row{
        padding: 0 auto ;
        display: inline-table;
    }

    .jumbotron{
        background-color: #292778;
    }
</style>
<body>
    
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
        <div id="alert" class="alert alert-success">
            <p>{{ session('success') }} </p>
        </div>
        @endif
        @if (session('danger'))
        <div id="alert" class="alert alert-danger">
            <p> <i class="fas fa-bomb"></i> {{ session('danger') }} </p>
        </div>
        @endif
        @if (session('saida'))
        <div id="alert" class="alert alert-danger">
            <p> <i class="fas fa-sign-out-alt"></i> {{ session('saida') }} </p>
        </div>
        @endif
        @if (session('primary'))
            <div id="alert" class="alert alert-primary">
                <p>{{ session('primary') }}  </p>
            </div>
        @endif
   
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="{{ url('home') }}">
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
  
  $().ready(function() {
        setTimeout(function () {
            $('.alert').hide(1000); // "foo" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });

   

</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e82d6530bc.js" crossorigin="anonymous"></script>


</html>
