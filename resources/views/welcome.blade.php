@extends('layouts.app')

@section('carausel')
    @parent
    @include('layouts.carausel')
@endsection

@section('content')
    <div class="container ">

        <!--Section: Main info-->
        <section class="m-5 wow fadeIn">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-6 mb-4 my-4">

            <img src="https://blog.nimblr.ai/hs-fs/hubfs/experiencia%20pacientes.jpg?width=700&height=466&name=experiencia%20pacientes.jpg" class="img-fluid z-depth-1-half"
                alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4 my-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">
                {{ config('app.name') }}
            </h3>
            <p>
                Sistema médico ocupacional
            </p>
            <p>
                La salud es la riqueza real y no piezas de oro y plata
            </p>
            <!-- Main heading -->

            <hr>

            <p class="text-justify">
                La salud física no es solo una de las más importantes claves para un cuerpo saludable, es el fundamento de la actividad intelectual creativa y dinámica
            </p>

            

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        </section>
        <!--Section: Main info-->


    </div>
@endsection