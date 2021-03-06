@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('fichas'))
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Listado de fichas
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
        $('#menuFichas').addClass('bg-danger')
    </script>
     {!! $dataTable->scripts() !!}
@endpush


@endsection
