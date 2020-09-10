@extends('layouts.app')
{{-- @section('breadcrumbs', Breadcrumbs::render('welcome')) --}}
@section('content')


    <div class="container mt-2 border border-white bg-white">
        <div class="mt-2 z-depth-3">
            <!--Carousel Wrapper-->
            <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                    <img class="d-block w-100" src="https://lh3.googleusercontent.com/proxy/fPICfC6hNqJULEcRSDGSH-SxfdLzMCHJLrBsRHCS9ov3YaIJCKPvKWJyG3E8HiDcDE0BHu8tYgGQp3DHQ5iJkniIfAZ-UCnhriZAHM16dBauQRcCeBUI91YuUjE3WV82"
                        alt="First slide">
                    <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                    <h3 class="h3-responsive">EMPRESAS Y USUARIOS</h3>
                    <p>
                        Gestión de todas las empresas <br>
                        
                        Gestión de usuarios</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                    <img class="d-block w-100" src="https://cutewallpaper.org/21/doctors-wallpapers/58-Medical-Doctor-Wallpapers-on-WallpaperPlay.jpg"
                        alt="Second slide">
                    <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                    <h3 class="h3-responsive">
                        TEST'S
                    </h3>
                    <p>
                        Alcohol <br>
                        Tabaco <br>
                        Otras drogas <br>
                    </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                    <img class="d-block w-100" src="https://lh3.googleusercontent.com/proxy/UzfqfG3XfZOn8NUYQ2cdfBOJZVLHkfLv2EtRzGfLV-FRE09Y67Zn2AiLoI8iVKY_d0UT6SnaEguRYKljTWhl0B-My23lxYf-o4cB_xVdcKwWpgVO8WuaWsdDIMglHg"
                        alt="Third slide">
                    <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                    <h3 class="h3-responsive">
                        ACTIVIDADES DEL DEPARTAMENTO MÉDICO OCUPACIONAL
                    </h3>
                    <p>
                        Vigilancia de la Salud de los trabajadores <br>
                        Reportes en PDF
                    </p>
                    </div>
                </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>

@prepend('scriptsHeader')

@endprepend

@push('scriptsFooter')

<script>
  $('#menuInicio').addClass('bg-danger');
</script>

@endpush
@endsection
