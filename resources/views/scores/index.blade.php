@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    @include('scores.datos')
</div>

@prepend('scriptsHeader')
   
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_score').addClass('active')
    </script>

@endpush

@endsection
