<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('mdb/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('mdb/css/style.min.css') }}" rel="stylesheet">



<!-- JQuery -->
<script type="text/javascript" src="{{ asset('mdb/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('mdb/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>


@stack('scriptsHeader')
</head>

<body>

  <header>

    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg white">
      <div class="container">

        <!-- Brand -->
        
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>{{ config('app.name', 'Laravel') }}</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item" id="menuEmpresas">
              <a class="nav-link" href="{{ route('empresas') }}">Empresas</a>
            </li>
            @endauth

          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            
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
    <!-- Navbar -->

    @yield('carausel')

  </header>

  <!--Main layout-->
  <main>
    @yield('breadcrumbs')

    @if ($errors->any())
      <div class="container">

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

      </div>  
    @endif
  </div>
      @foreach (['success', 'warn', 'info', 'error'] as $msg)
          @if(Session::has($msg))
          <div class="container">
            <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
              <strong>{{ Session::get($msg) }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
					@endif
			@endforeach


    @yield('content')
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer font-small special-color-dark pt-4 mt-3">

    <!-- Footer Elements -->
    <div class="container">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a class="btn-floating btn-fb mx-1">
            <i class="fab fa-facebook-f"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-tw mx-1">
            <i class="fab fa-twitter"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-gplus mx-1">
            <i class="fab fa-google-plus-g"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-li mx-1">
            <i class="fab fa-linkedin-in"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-dribbble mx-1">
            <i class="fab fa-dribbble"> </i>
          </a>
        </li>
      </ul>
      <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <!-- SCRIPTS -->
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('mdb/js/mdb.min.js') }}"></script>
  <!-- Initializations -->
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
