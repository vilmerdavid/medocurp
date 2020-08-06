@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('empresas'))
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Listado de empresas
            <a href="{{ route('crearEmmpresa') }}" class="float-right">Crear</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {!! $dataTable->table()  !!}
            </div>
        </div>
    </div>
</div>


@prepend('scriptsHeader')
    <link rel="stylesheet" href="{{ asset('js/DataTables/datatables.min.css') }}">
    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{-- confirm --}}
    <link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')
    <script>
        $('#menuEmpresas').addClass('active')
    </script>
     {!! $dataTable->scripts() !!}
@endpush


@endsection
