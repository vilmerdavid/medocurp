@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/lista.svg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="{{ route('crearFichaPI') }}" class="btn btn-primary btn-block">Crear Ficha Prelaboral Inicial</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/hospital.svg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="{{ route('crearEmmpresa') }}" class="btn btn-primary btn-block">Crear Institución/Empresa</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
