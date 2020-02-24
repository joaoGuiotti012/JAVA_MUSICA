<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="icon/x-icon" href="{{asset('img/topo.png')}}"  sizes="16x16">
    <title>Casa Di Conti - Visitantes</title>

    <!-- Scripts -->
     <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- styles -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>

        button.btn-search {
            border-radius: 100%;
        }

    </style>
  
</head>
<body>
    <body>
        <div id="app">
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
                                <a href="#" class="nav-link"> Histórico</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Colaboradores</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Visitantes</a>
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
    
            <main class="py-4">
                @yield('content')
            </main>
        </div>
</body>
@yield('javascript')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e82d6530bc.js" crossorigin="anonymous"></script>


</html>
