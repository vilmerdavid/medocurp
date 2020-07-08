@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <form action="{{ route('guardarEmpresa') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                Crear nueva empresa
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*" required>
                  </div>

                <div class="md-form md-outline">
                    <input type="text" id="version" name="version" value="{{ old('version') }}" class="form-control @error('version') is-invalid @enderror"  required autofocus>
                    <label for="version">Versión</label>
                    @error('version')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form md-outline">
                    <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}" class="form-control @error('codigo') is-invalid @enderror"  required>
                    <label for="codigo">Código</label>
                    @error('codigo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form md-outline">
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror"  required>
                    <label for="nombre">Nombre</label>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form md-outline">
                    <input type="text" id="ruc" name="ruc" value="{{ old('ruc') }}" class="form-control @error('ruc') is-invalid @enderror"  required>
                    <label for="ruc">R.U.C</label>
                    @error('ruc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form md-outline">
                    <input type="text" id="ciiu" name="ciiu" value="{{ old('ciiu') }}" class="form-control @error('ciiu') is-invalid @enderror"  required>
                    <label for="ciiu">C.I.I.U</label>
                    @error('ciiu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form md-outline">
                    <input type="text" id="establecimiento" name="establecimiento" value="{{ old('establecimiento') }}" class="form-control @error('establecimiento') is-invalid @enderror"  required>
                    <label for="establecimiento">Establecimiento de salud</label>
                    @error('establecimiento')
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
</div>


@push('scriptsFooter')
    <script>
        $('#menuEmpresas').addClass('active')
    </script>
     
@endpush
@endsection
