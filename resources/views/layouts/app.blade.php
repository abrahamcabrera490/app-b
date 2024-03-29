<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @laravelPWA
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GB</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/datatables-demo.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="{{ asset('js/donutchart.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  GB - Admin
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Indicadores</a>
                            <div class="dropdown-menu">
                             @if (auth()->user()->hasRoles(['admin', '1','2']) )
                                <a class="dropdown-item" href="{{route('sistemas')}}">Sistemas</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['Administracion', '4']) )
                                <a class="dropdown-item" href="{{route('admon')}}">Administracion</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['Almacen', '5']) )
                                <a class="dropdown-item" href="{{route('almacen')}}">Almacen</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['cobranza', '6']) )
                                <a class="dropdown-item" href="{{route('cobranza')}}">cobranza</a>
                                @endif
                        
                        
                             @if (auth()->user()->hasRoles(['calidad', '12']) )
                                <a class="dropdown-item" href="{{route('calidad')}}">calidad</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['compras', '3']) )
                                <a class="dropdown-item" href="{{route('compras')}}">compras</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['contabilidad', '7']) )
                                <a class="dropdown-item" href="{{route('conta')}}">Contabilidad</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['logistica', '8']) )
                                <a class="dropdown-item" href="{{route('logistica')}}">logistica</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['Mantenimiento', '9']) )
                                <a class="dropdown-item" href="{{route('mtto')}}">Mantenimiento</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['Produccion', '10']) )
                                <a class="dropdown-item" href="{{route('produc')}}">Produccion</a>
                                @endif
                        
                             @if (auth()->user()->hasRoles(['Pedidos', '15']) )
                                <a class="dropdown-item" href="{{route('pedidos')}}">Pedidos</a>
                                @endif
                        
                          
                        
                             @if (auth()->user()->hasRoles(['RH', '11']) )
                                <a class="dropdown-item" href="{{route('rh')}}">Recursos Humanos</a>
                                @endif
                        
                        
                             @if (auth()->user()->hasRoles(['seguridad', '13']) )
                                <a class="dropdown-item" href="{{route('seguridad')}}">Seguridad</a>
                                @endif
                        
                            </div>
                          </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  
                                    <a class="dropdown-item" href="{{ route('ticket') }}">Crear Orden sistemas </a>
                                    @if (auth()->user()->hasRoles(['sistemas']) )
                                   <a class="dropdown-item" href="{{ route('orders_show') }}">Mirar Ordenes</a>   
                                   @endif
                                    @if (auth()->user()->hasRoles(['sistemas']) )
                                   <a class="dropdown-item" href="{{ route('Usr') }}">Alta de Usuarios</a>   
                                   @endif
                                    
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>

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
</html>
