@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            G. ACTIVIDADES EXTRALABORALES
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>
                                ACTIVIDAD
                            </th>
                            <th>
                                Tiempo de dedicación
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('guardaractividadesExtralaborales') }}" method="POST">
                        <tr>
                            <td>
                                @csrf
                                <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                                <div class="md-form md-outline my-0">
                                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror"  required>
                                    <label for="nombre">Actividad</label>
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <select name="tiempo" class="form-control" id="">
                                    <option></option>
                                    <option value="< 1/3">< 1/3</option>
                                    <option value="1/3 a 2/3">1/3 a 2/3</option>
                                    <option value=">2/3">>2/3</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Guardar">
                                    <i class="fas fa-save"></i>
                                </button>
                            </td>
                        </tr>
                    </form>

                    @foreach ($actividades as $ac)
                        <form action="{{ route('actualizaractividadesExtralaborales') }}" method="POST">
                            <tr>
                                <td>
                                    @csrf
                                    <input type="hidden" name="actividad" value="{{ $ac->id }}">
                                    <div class="md-form md-outline my-0">
                                        <input type="text" id="nombre_{{ $ac->id }}" name="nombre" value="{{ $ac->nombre }}" class="form-control"  required>
                                        <label for="nombre_{{ $ac->id }}">Actividad</label>
                                    </div>
                                </td>
                                <td>
                                    <select name="tiempo" class="form-control" id="">
                                        <option></option>
                                        <option value="< 1/3" {{ $ac->tiempo=='< 1/3'?'selected':'' }}> < 1/3 </option>
                                        <option value="1/3 a 2/3" {{ $ac->tiempo=='1/3 a 2/3'?'selected':'' }}> 1/3 a 2/3 </option>
                                        <option value=">2/3" {{ $ac->tiempo=='>2/3'?'selected':'' }}> >2/3 </option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarActividadExtralaboral',$ac->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <form action="{{ route('ActualizarEnfermedadActual') }}" method="POST">
        @csrf
        <div class="card mt-2">
            <div class="card-header">
                H. ENFERMEDAD ACTUAL
            </div>
            <div class="card-body">
                <div class="md-form md-outline my-0">
                    <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                    <textarea name="enfermedad_actual" id="enfermedad_actual" class="form-control @error('enfermedad_actual') is-invalid @enderror">{{ old('enfermedad_actual',$ficha->enfermedad_actual) }}</textarea>
                    <label for="enfermedad_actual">Enfermedad</label>
                    @error('enfermedad_actual')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </form>
</div>

@prepend('scriptsHeader')
    
    {{-- confirm --}}
    <link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_actividades').addClass('active')

    </script>

@endpush

@endsection
