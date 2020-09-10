@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    
    <form action="{{ route('actualizarAptitud') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" id="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header">
                N. APTITUD MÉDICA PARA EL TRABAJO
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Selecione</label>
                    @php
                        $op=$am->opcion??'';
                    @endphp
                    <select class="form-control" id="exampleFormControlSelect1" name="opcion">
                        <option value=""></option>
                        <option value="APTO" {{ $op=='APTO'?'selected':'' }}>APTO</option>
                        <option value="APTO EN OBSERVACIÓN" {{ $op=='APTO EN OBSERVACIÓN'?'selected':'' }}>APTO EN OBSERVACIÓN</option>
                        <option value="APTO CON LIMITACIONES" {{ $op=='APTO CON LIMITACIONES'?'selected':'' }}>APTO CON LIMITACIONES</option>
                        <option value="NO APTO" {{ $op=='NO APTO'?'selected':'' }}>NO APTO</option>
                    </select>
                  </div>

                <div class="md-form md-outline my-0">
                    <textarea name="observacion" id="observacion" class="form-control @error('observacion') is-invalid @enderror">{{ old('observacion',$am->observacion??'') }}</textarea>
                    <label for="observacion">Observaciones</label>
                    @error('observacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="md-form md-outline my-0">
                    <textarea name="limitacion" id="limitacion" class="form-control @error('limitacion') is-invalid @enderror">{{ old('limitaciones',$am->limitacion??'') }}</textarea>
                    <label for="limitacion">Limitaciones</label>
                    @error('limitacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit"> Guardar</button>
            </div>
        </div>
    </form>


    <div class="card mt-2">
        <div class="card-header">
            O. RECOMENDACIONES Y/O TRATAMIENTO (DESCRIPCIÓN)
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <form action="{{ route('guardarRecomendacion') }}" method="POST">
                        <tr>
                            <td>
                                @csrf
                                <div class="md-form md-outline my-0">
                                    <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                                    <textarea name="recomendacion" id="recomendacion" class="form-control @error('recomendacion') is-invalid @enderror">{{ old('recomendacion') }}</textarea>
                                    <label for="recomendacion">Recomendacion</label>
                                    @error('recomendacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td style="width: 10%;">
                                <button class="btn btn-dark btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar">
                                    <i class="fas fa-save"></i>
                                </button>
                            </td>
                        </tr>
                    </form>
                    </thead>

                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($recomendaciones as $re)
                        @php
                            $i++;
                        @endphp
                        <form action="{{ route('actualizarRecomendacion') }}" method="POST">
                            <tr>
                                <td>
                                    @csrf
                                    <div class="md-form md-outline my-0">
                                        <input type="hidden" name="id" value="{{ $re->id }}">
                                        <textarea name="recomendacion" id="recomendacion" class="form-control @error('recomendacion') is-invalid @enderror">{{ $re->recomendacion }}</textarea>
                                        <label for="recomendacion">Recomendacion {{ $i }}</label>
                                        @error('recomendacion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                                <td style="width: 10%;">
                                    <button class="btn btn-primary btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar(this);" data-url="{{ route('eliminarRecomendacion',$re->id) }}" data-msg="Recomendación {{ $i }}" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
        <div class="card-footer text-muted">
            <p class="text-justify">
                CERTIFICO QUE LO ANTERIORMENTE EXPRESADO EN RELACIÓN A MI ESTADO DE SALUD ES VERDAD Y SOY RESPONSABLE LEGAL DE CUALQUIER OMISIÓN INVOLUNTARIA O INTENCIONAL DE INFORMACIÓN. ADEMÁS SE ME HAN INFORMADO LAS MEDIDAS PREVENTIVAS A TOMAR PARA DISMINUIR O MITIGAR LOS RIESGOS RELACIONADOS CON MI ACTIVIDAD LABORAL.
            </p>
        </div>
    </div>
</div>

@prepend('scriptsHeader')
{{-- confirm --}}
<link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
<script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_aptitudes_medicas').addClass('active')

     
    </script>

@endpush

@endsection
