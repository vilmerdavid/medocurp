@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('puestos',$emp))
@section('content')
<div class="container">
    <form action="{{ route('guardarPuesto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                Crear nuevo Puesto De trabajo
            </div>
            <div class="card-body">
                <input type="hidden" name="empresa" value="{{ $emp->id }}">
                <div class="md-form md-outline">
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror"  required>
                    <label for="nombre">Nombre</label>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    <div class="card mt-2">
        <div class="card-header">
            Listado de Puestos de Trabajo
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
        $('#menuEmpresas').addClass('bg-danger')
    </script>
     {!! $dataTable->scripts() !!}
@endpush


@endsection
