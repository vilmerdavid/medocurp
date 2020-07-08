@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <div class="table-responsive">


        {{-- este valor es para obtener  el TDT total --}}
        @php($valor_tdt=0)

        @php($nea=$ficha->nea_m->valor??'1')


        <table class="table table-bordered table-sm">
            
            <thead>
                
                <tr>
                    <th>
                        EMPRESA
                    </th>
                    <th>
                        PUESTO DE TRABAJO
                    </th>
                    <th>
                        ACTIVIDADES QUE DESEMPEÑABA
                    </th>
                    <th style="width: 8%;">
                        TDT (m)
                    </th>
                    <th style="width: 5%;">
                        SSO
                    </th>
                    <th class="text-center">
                        RIESGO
                        <table class="table my-0">
                            
                            <tr>
                                <td data-toggle="tooltip" data-placement="top" title="Físico">F</td>
                                <td data-toggle="tooltip" data-placement="top" title="Mecánico">M</td>
                                <td data-toggle="tooltip" data-placement="top" title="Químico">Q</td>
                                <td data-toggle="tooltip" data-placement="top" title="Biólogico">B</td>
                                <td data-toggle="tooltip" data-placement="top" title="Ergonómico">E</td>
                                <td data-toggle="tooltip" data-placement="top" title="Psicosocial">P</td>
                            </tr>
                        </table>
                    </th>
                    <th>
                        OBSERVACIONES
                    </th>
                    <th style="width: 5%;">

                    </th>
                </tr>

                
            </thead>

            
            <tbody>

                <form action="{{ route('guardarAntecedenteTrabajo') }}" method="POST">
                    
                    <tr>
                        <td>
                            @csrf
                            <input type="hidden" name="ficha" id="ficha" value="{{ $ficha->id }}">
                            <div class="md-form md-outline my-0">
                                <input type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" class="form-control @error('empresa') is-invalid @enderror" required>
                                <label for="empresa">Empresa</label>
                                @error('empresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="md-form md-outline my-0">
                                <input type="text" id="puesto" name="puesto" value="{{ old('puesto') }}" class="form-control @error('puesto') is-invalid @enderror" required>
                                <label for="puesto">Puesto</label>
                                @error('puesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="md-form md-outline my-0">
                                <input type="text" id="actividad" name="actividad" value="{{ old('actividad') }}" class="form-control @error('actividad') is-invalid @enderror" required>
                                <label for="actividad">Actividad</label>
                                @error('actividad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="md-form md-outline my-0">
                                <input type="number" id="tdt" name="tdt" value="{{ old('tdt') }}" class="form-control @error('tdt') is-invalid @enderror" required>
                                <label for="tdt">TDT(m)</label>
                                @error('tdt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            
                            <select name="sso" id="sso">
                                <option></option>
                                <option value="1">SI</option>
                                <option value="2">NO</option>
                            </select>
                            
                        </td>
                        <td>
                            <table class="table">
                                <tr>
                                    <td>
                                        <select name="f" id="f" class="">
                                            <option></option>
                                            <option value="1">L</option>
                                            <option value="2.5">M</option>
                                            <option value="10">A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="m" id="m" class="">
                                            <option></option>
                                            <option value="1">L</option>
                                            <option value="2.5">M</option>
                                            <option value="10">A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="q" id="q" class="">
                                            <option></option>
                                            <option value="1">L</option>
                                            <option value="2.5">M</option>
                                            <option value="10">A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="b" id="b" class="">
                                            <option></option>
                                            <option value="1">L</option>
                                            <option value="2.5">M</option>
                                            <option value="10">A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="e" id="e" class="">
                                            <option></option>
                                            <option value="1">L</option>
                                            <option value="2.5">M</option>
                                            <option value="10">A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="p" id="p" class="">
                                            <option></option>
                                            <option value="1">L</option>
                                            <option value="2.5">M</option>
                                            <option value="10">A</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <div class="md-form md-outline my-0">
                                <textarea class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones" required>{{ old('observaciones') }}</textarea>
                                <label for="observaciones">Observaciones</label>
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Guardar">
                                <i class="fas fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                </form>

                @foreach ($antecedentes as $a)
                    <form action="{{ route('actualizarAntecedenteTrabajo') }}" method="POST">
                        
                        <tr>
                            <td>
                                @csrf
                                <input type="hidden" name="antecedente" value="{{ $a->id }}">
                                <div class="md-form md-outline my-0">
                                    <input type="text" id="empresa_{{ $a->id }}" name="empresa" value="{{ old('empresa',$a->empresa) }}" class="form-control @error('empresa') is-invalid @enderror" required>
                                    <label for="empresa_{{ $a->id }}">Empresa</label>
                                    @error('empresa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="md-form md-outline my-0">
                                    <input type="text" id="puesto_{{ $a->id }}" name="puesto" value="{{ old('puesto',$a->puesto) }}" class="form-control @error('puesto') is-invalid @enderror" required>
                                    <label for="puesto_{{ $a->id }}">Puesto</label>
                                    @error('puesto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="md-form md-outline my-0">
                                    <input type="text" id="actividad_{{ $a->id }}" name="actividad" value="{{ old('actividad',$a->actividad) }}" class="form-control @error('actividad') is-invalid @enderror" required>
                                    <label for="actividad_{{ $a->id }}">Actividad</label>
                                    @error('actividad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="md-form md-outline my-0">
                                    <input type="number" id="tdt_{{ $a->id }}" name="tdt" value="{{ old('tdt',$a->tdt) }}" class="form-control @error('tdt') is-invalid @enderror" required>
                                    <label for="tdt_{{ $a->id }}">TDT(m)</label>
                                    @error('tdt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                @switch(true)
                                    @case($a->tdt<1)
                                        @php($valor_tdt+=0)
                                        @break
                                    @case($a->tdt<37)
                                        @php($valor_tdt+=1)
                                        @break
                                    @case($a->tdt>36)
                                        @php($valor_tdt+=2)
                                        @break
                                    @default
                                        
                                @endswitch

                            </td>
                            <td>
                                <select name="sso" id="sso_{{ $a->id }}">
                                    <option></option>
                                    <option value="1" {{ $a->sso=='1'?'selected':'' }}>SI</option>
                                    <option value="2" {{ $a->sso=='2'?'selected':'' }}>NO</option>
                                </select>
                            </td>
                            <td>
                                <table class="table my-0">
                                    <tr>
                                        <td>
                                            <select name="f" id="f_{{ $a->id }}" class="">
                                                <option></option>
                                                <option value="1" {{ $a->f=='1'?'selected':'' }}>L</option>
                                                <option value="2.5" {{ $a->f=='2.5'?'selected':'' }}>M</option>
                                                <option value="10" {{ $a->f=='10'?'selected':'' }}>A</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="m" id="m_{{ $a->id }}" class="">
                                                <option></option>
                                                <option value="1" {{ $a->m=='1'?'selected':'' }}>L</option>
                                                <option value="2.5" {{ $a->m=='2.5'?'selected':'' }}>M</option>
                                                <option value="10" {{ $a->m=='10'?'selected':'' }}>A</option>
                                            </select>
                                        </td>
                                        <td>
                                            
                                            <select name="q" id="q_{{ $a->id }}" class="">
                                                <option></option>
                                                <option value="1" {{ $a->q=='1'?'selected':'' }}>L</option>
                                                <option value="2.5" {{ $a->q=='2.5'?'selected':'' }}>M</option>
                                                <option value="10" {{ $a->q=='10'?'selected':'' }}>A</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="b" id="b_{{ $a->id }}" class="">
                                                <option></option>
                                                <option value="1" {{ $a->b=='1'?'selected':'' }}>L</option>
                                                <option value="2.5" {{ $a->b=='2.5'?'selected':'' }}>M</option>
                                                <option value="10" {{ $a->b=='10'?'selected':'' }}>A</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="e" id="e_{{ $a->id }}" class="">
                                                <option></option>
                                                <option value="1" {{ $a->e=='1'?'selected':'' }}>L</option>
                                                <option value="2.5" {{ $a->e=='2.5'?'selected':'' }}>M</option>
                                                <option value="10" {{ $a->e=='10'?'selected':'' }}>A</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="p" id="p_{{ $a->id }}" class="">
                                                <option></option>
                                                <option value="1" {{ $a->p=='1'?'selected':'' }}>L</option>
                                                <option value="2.5" {{ $a->p=='2.5'?'selected':'' }}>M</option>
                                                <option value="10" {{ $a->p=='10'?'selected':'' }}>A</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="md-form md-outline my-0">
                                    <textarea  class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones_{{ $a->id }}" required>{{ old('observaciones',$a->observaciones) }}</textarea>
                                    <label for="observaciones_{{ $a->id }}">Observaciones</label>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Actualizar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button type="button" onclick="eliminar(this);" data-msg="{{ $a->empresa }}" data-url="{{ route('eliminarAntecedenteLaboral',$a->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                    </form>
                @endforeach

            </tbody>
            <tfoot>
                <tr class="table-info">
                    <th>
                        N° EA: 
                    </th>
                    <td class="">

                        <form action="{{ route('actualizarNea') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('nea') is-invalid @enderror" placeholder="Ingrese.." aria-label="Recipient's username"
                                  aria-describedby="button-addon2" name="nea" value="{{ old('nea',$nea) }}" >
                                <div class="input-group-append">
                                  <button class="btn btn-md btn-dark m-0 px-3 py-2 z-depth-0 waves-effect" type="submit" id="button-addon2">Actualizar</button>
                                </div>
                                @error('nea')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>

                    </td>
                    <th>
                        TIEMPO TOTAL DE TRABAJO
                    </th>
                    <td>
                        <strong>TDT={{ $valor_tdt }}</strong>
                        <br>
                        {{ $antecedentes->sum('tdt') }} meses
                        
                    </td>
                    <td>
                        SSO={{ $antecedentes->sum('sso') }}
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                                <td>
                                    {{ $antecedentes->sum('f') }}
                                </td>
                                <td>
                                    {{ $antecedentes->sum('m') }}
                                </td>
                                <td>
                                    {{ $antecedentes->sum('q') }}
                                </td>
                                <td>
                                    {{ $antecedentes->sum('b') }}
                                </td>
                                <td>
                                    {{ $antecedentes->sum('e') }}
                                </td>
                                <td>
                                    {{ $antecedentes->sum('p') }}
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="2">

                    </td>
                </tr>

                <tr class="table-info text-center">
                    <th colspan="8">
                        RIESGO LABORAL ACUMULADO
                    </th>
                </tr>
                <tr class="table-info text-center">
                    <th>FÍSICO</th>
                    <td colspan="3">
                        @php(
                            
                            $fisico=($antecedentes->sum('f')+$valor_tdt+$antecedentes->sum('sso'))/$nea

                        )

                        @switch(true)
                            @case($fisico==2.1)
                                No existe
                                @break
                            @case($fisico<=5)
                                Leve
                                @break
                            @case($fisico<=7.5)
                                <span class="badge badge-warning">Moderado</span>
                                @break
                            @case($fisico<=20)
                            <span class="badge badge-danger">Alto</span>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $fisico }}

                    </td>
                    
                    <th>BIOLÓGICO</th>
                    <td colspan="3">
                        @php(
                            
                            $biologico=($antecedentes->sum('b')+$valor_tdt+$antecedentes->sum('sso'))/$nea

                        )

                        @switch(true)
                            @case($biologico==2.1)
                                No existe
                                @break
                            @case($biologico<=5)
                                Leve
                                @break
                            @case($biologico<=7.5)
                                <span class="badge badge-warning">Moderado</span>
                                @break
                            @case($biologico<=20)
                            <span class="badge badge-danger">Alto</span>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $biologico }}
                    </td>
                </tr>
                <tr class="table-info text-center">
                    <th>MECÁNICO</th>
                    <td colspan="3">
                        

                        @php(
                            
                            $mecanico=($antecedentes->sum('m')+$valor_tdt+$antecedentes->sum('sso'))/$nea

                        )

                        @switch(true)
                            @case($mecanico==2.1)
                                No existe
                                @break
                            @case($mecanico<=5)
                                Leve
                                @break
                            @case($mecanico<=7.5)
                                <span class="badge badge-warning">Moderado</span>
                                @break
                            @case($mecanico<=20)
                            <span class="badge badge-danger">Alto</span>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $mecanico }}


                    </td>
                    <th>ERGONÓMICO</th>
                    <td colspan="3">

                        @php(
                            
                            $ergonomico=($antecedentes->sum('e')+$valor_tdt+$antecedentes->sum('sso'))/$nea

                        )

                        @switch(true)
                            @case($ergonomico==2.1)
                                No existe
                                @break
                            @case($ergonomico<=5)
                                Leve
                                @break
                            @case($ergonomico<=7.5)
                                <span class="badge badge-warning">Moderado</span>
                                @break
                            @case($ergonomico<=20)
                            <span class="badge badge-danger">Alto</span>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $ergonomico }}


                    </td>
                </tr>
                <tr class="table-info text-center">
                    <th>QUÍMICO</th>
                    <td colspan="3">

                        @php(
                            
                            $quimico=($antecedentes->sum('q')+$valor_tdt+$antecedentes->sum('sso'))/$nea

                        )

                        @switch(true)
                            @case($quimico==2.1)
                                No existe
                                @break
                            @case($quimico<=5)
                                Leve
                                @break
                            @case($quimico<=7.5)
                                <span class="badge badge-warning">Moderado</span>
                                @break
                            @case($quimico<=20)
                            <span class="badge badge-danger">Alto</span>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $quimico }}

                    </td>
                    <th>PSICOSOCIAL</th>
                    <td colspan="3">

                        @php(
                            
                            $psicosocial=($antecedentes->sum('p')+$valor_tdt+$antecedentes->sum('sso'))/$nea

                        )

                        @switch(true)
                            @case($psicosocial==2.1)
                                No existe
                                @break
                            @case($psicosocial<=5)
                                Leve
                                @break
                            @case($psicosocial<=7.5)
                                <span class="badge badge-warning">Moderado</span>
                                @break
                            @case($psicosocial<=20)
                            <span class="badge badge-danger">Alto</span>
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $psicosocial }}

                    </td>
                </tr>
                
            </tfoot>
        </table>


    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="table-primary text-center">
                    <th colspan="3">ACCIDENTES DE TRABAJO (DESCRIPCIÓN)</th>
                </tr>
            </thead>
            <tfoot>
                <form action="{{ route('actualizarAccidenteEnfermedad') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                    
                    <tr>
                        <td style="width: 20%;">
                            @php($accidente_trabajo=$ficha->nea_m->accidente_trabajo??'')
                            <div class="form-group">
                                <label for="accidente_trabajo">FUE CALIFICADO POR EL INSTITUTO DE SEGURIDAD SOCIAL CORRESPONIENTE:</label>
                                <select class="form-control" id="accidente_trabajo" name="accidente_trabajo">
                                    <option></option>
                                    <option value="SI" {{ $accidente_trabajo=='SI'?'selected':'' }}>SI</option>
                                    <option value="NO" {{ $accidente_trabajo=='NO'?'selected':'' }}>NO</option>
                                </select>
                            </div>
                        </td>
                        <td style="width: 50%">
                            <div class="md-form md-outline">
                                <input type="text" id="especificar_accidente" name="especificar_accidente" value="{{ old('especificar_accidente',$ficha->nea_m->especificar_accidente??'') }}" class="form-control @error('especificar_accidente') is-invalid @enderror">
                                <label for="especificar_accidente" class="active">Especificar</label>
                                @error('especificar_accidente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="md-form md-outline">
                                <input type="date" id="fecha_accidente" name="fecha_accidente" value="{{ old('fecha_accidente',$ficha->nea_m->fecha_accidente??'') }}" class="form-control @error('fecha_accidente') is-invalid @enderror">
                                <label for="fecha_accidente">Fecha</label>
                                @error('fecha_accidente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div class="md-form md-outline my-0">
                                <textarea class="form-control @error('observaciones_accidente') is-invalid @enderror" name="observaciones_accidente" id="observaciones_accidente" >{{ old('observaciones_accidente',$ficha->nea_m->observaciones_accidente??'') }}</textarea>
                                <label for="observaciones_accidente">Observaciones</label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="3" class="table-primary text-center">
                            ENFERMEDADES PROFESIONALES
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                @php($enfermedad_profesional=$ficha->nea_m->enfermedad_profesional??'')
                                <label for="enfermedad_profesional">FUE CALIFICADO POR EL INSTITUTO DE SEGURIDAD SOCIAL CORRESPONIENTE:</label>
                                <select class="form-control" id="enfermedad_profesional" name="enfermedad_profesional">
                                    <option></option>
                                    <option value="SI" {{ $enfermedad_profesional=='SI'?'selected':'' }}>SI</option>
                                    <option value="NO" {{ $enfermedad_profesional=='NO'?'selected':'' }}>NO</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="md-form md-outline">
                                <input type="text" id="especificar_enfermedad" name="especificar_enfermedad" value="{{ old('especificar_enfermedad',$ficha->nea_m->especificar_enfermedad??'') }}" class="form-control @error('especificar_enfermedad') is-invalid @enderror">
                                <label for="especificar_enfermedad" class="active">Especificar</label>
                                @error('especificar_enfermedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="md-form md-outline">
                                <input type="date" id="fecha_enfermedad" name="fecha_enfermedad" value="{{ old('fecha_enfermedad',$ficha->nea_m->fecha_enfermedad??'') }}" class="form-control @error('fecha_enfermedad') is-invalid @enderror">
                                <label for="fecha_enfermedad">Fecha</label>
                                @error('fecha_enfermedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div class="md-form md-outline my-0">
                                <textarea class="form-control @error('observaciones_enfermedad') is-invalid @enderror" name="observaciones_enfermedad" id="observaciones_enfermedad" >{{ old('observaciones_enfermedad',$ficha->nea_m->observaciones_enfermedad??'') }}</textarea>
                                <label for="observaciones_enfermedad">Observaciones</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar Accidentes de trabajo, enfermedades profesionales</button>
                        </td>
                    </tr>
                </form>

            </tfoot>
        </table>
    </div>
</div>

@prepend('scriptsHeader')
    {{-- confirm --}}
    <link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_antecedente_trabajo').addClass('active')
    </script>

@endpush

@endsection
