<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plus/ui/fontawesome/css/all.min.css') }}">
   
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('mdb/css/mdb.min.css') }}" rel="stylesheet">


    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('mdb/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>

    @stack('scriptsHeader')

    <style>
           .fn {
        
           background: url("{{ asset('plus/img/fondo.jpg') }}") 0px 0px repeat rgb(242, 242, 242);
           
        }
        .fn {
            position: relative;
            background: url("{{ asset('plus/img/utc_fondo.png') }}") 0px -100px repeat-x;
            border-top: 1px solid rgb(204, 204, 204);
        }
    </style>

</head>

<body class="fixed-sn homepage-v3 fes">
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>


    <div class="fn">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/universidad_def.png') }}" class="img-responsive mt-5" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="pull-right text-right">
                        
                      


                        @guest
                            <a href="{{ route('login') }}" class="btn btn-light btn-sm pull-right">Ingresar</a>
                        @else
                            

                            <a href="{{ route('home') }}" class="text-dark">
                                <strong>
                                    {{ Auth::user()->email }} 
                                </strong>
                            </a>

                            <a class="btn btn-danger btn-sm pull-right" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            
                        @endguest

                    </div>
                    <br>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="fab fa-facebook-f fa-2x"></i>
                        </button>
                        <button type="button" class="btn btn-info ml-1 btn-sm">
                            <i class="fab fa-twitter fa-2x"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <header>

            <!--Navbar-->
            <div class="container mt-1">
                <nav class="navbar navbar-expand-lg navbar-dark stylish-color-dark">



                    <!-- Collapse button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">



                        <ul class="navbar-nav mr-auto">



                         

                            <li class="nav-item ml-4 mb-0 active" id="menuInicio">
                                @auth
                                    <a class="nav-link waves-effect waves-danger danger-grey-text font-weight-bold" href="{{ route('home') }}">
                                        INICIO
                                        <span class="sr-only">(current)</span>
                                    </a>
                                @else
                                    <a class="nav-link waves-effect waves-danger danger-grey-text font-weight-bold" href="{{ url('/') }}">
                                        INICIO
                                        <span class="sr-only">(current)</span>
                                    </a>
                                @endauth
                                
                            </li>

                            
                            <li class="nav-item ml-1 mb-0 active" id="menuEmpresas">
                                <a class="nav-link waves-effect  font-weight-bold" href="{{ route('empresas') }}">
                                    EMPRESAS
                                </a>
                            </li>





                            <li class="nav-item ml-1 mb-0 active" id="menuFichas">
                                <a class="nav-link waves-effect waves-danger danger-grey-text font-weight-bold" href="{{ route('fichas') }}">
                                    FICHAS
                                </a>
                            </li>
                            


                        </ul>
                        <!-- Links -->
                    </div>
                    <!-- Collapsible content -->

                </nav>
            </div>
            <!--/.Navbar-->

        </header>

        <div class="container mt-2">

            <!--Inicio de los flash data-->
            @if ($errors->any())
      
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
          @endif


            @foreach (['success', 'warn', 'info', 'error'] as $msg)
                @if(Session::has($msg))
                    
                    <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get($msg) }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                @endif
            @endforeach


        </div>

        <main>
          <div class="container">
            @yield('breadcrumbs')  
          </div>
          
        @yield('content')

        <!--/ Navigation -->
        </main>

        <!--/ Main layout -->
        <!-- Footer -->
        <footer class="page-footer stylish-color-dark mt-4 pt-4">

            <!--Footer Links-->
            <div class="container-fluid">

                <!-- Footer links -->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4">

                        <h6 class="text-uppercase mb-4 font-weight-bold">Acerca de nosotros</h6>

                        <p class="text-justify">
                            El mundo Académico es cambiante, evoluciona cada día. Es mucho más competitivo y exigente. En la Universidad Técnica de Cotopaxi nos distinguimos por la calidad de nuestros servicios, el profesionalismo de nuestra gente y la manera en que formamos estudiantes con conocimientos superlativos y competitivos. Hoy, consolidamos un compromiso en la forma de trabajar y de comportarnos; Creamos el valor que tú necesitas
                        </p>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/universidad_def.png') }}" alt="" class="img-responsive bg-white" width="250px;">
                        </a>

                    </div>
                    <!--/.Grid column-->
                    <!--Grid column-->
                   
                    <!--/.Grid column-->

                    <div class="col-md-8">

                        <div id="map-container" class="z-depth-1-half map-container" style="height: 450px">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.306307647513!2d-78.63508074956343!3d-0.917922635591152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d460483c1c1a3b%3A0x694a140aab02b1c!2sUniversidad+T%C3%A9cnica+de+Cotopaxi!5e0!3m2!1ses-419!2sec!4v1548099434555" allowfullscreen style="width:100%; height:100%;"></iframe>
                        </div>

                    </div>


                </div>
                <!-- Footer links -->

                <hr>

                <div class="row py-3 d-flex align-items-center">

                    <!--Grid column-->
                    <div class="col-md-7 col-lg-8">

                        <!--Copyright-->
                        <p class="text-center text-md-left grey-text">
                            © {{ date('Y') }} Copyright: <a href="http://www.utc.edu.ec/" target="_blank">
                                utc.edu.ec
                            </a>
                        </p>
                        <!--/.Copyright-->

                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-5 col-lg-4 ml-lg-0">

                        <!--Social buttons-->
                        <div class="social-section text-center mr-auto text-md-left">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-sm rgba-white-slight">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--/.Social buttons-->

                    </div>
                    <!--Grid column-->

                </div>

            </div>

        </footer>
    <!-- Footer -->
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/mdb.min.js') }}"></script>
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    
        $('[data-toggle="tooltip"]').tooltip()
            $('table').on('draw.dt', function() {
                $('[data-toggle="tooltip"]').tooltip();
        })

        
        
        function eliminar(arg){
                var url=$(arg).data('url');
                var msg=$(arg).data('msg');
                $.confirm({
                    title: 'Eliminar!',
                    content: msg,
                    type:'red',
                    closeIcon:true,
                    buttons: {
                        confirmar: {
                            btnClass: 'btn-blue',
                            action: function(){
                                location.replace(url);
                            }
                        },
                        cancelar: {
                btnClass: 'btn-red',
                            action: function(){
    
                            }
                }
                    }
                });
            }
    
      </script>
    
    @stack('scriptsFooter')



</body>

</html>
