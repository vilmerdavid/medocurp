@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered">
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
                    <th>
                        TDT (m)
                    </th>
                    <th>
                        SSO
                    </th>
                    <th class="text-center">
                        RIESGO
                        <table class="table my-0">
                            
                            <tr>
                                <td>F</td>
                                <td>M</td>
                                <td>Q</td>
                                <td>B</td>
                                <td>E</td>
                                <td>P</td>
                            </tr>
                        </table>
                    </th>
                    <th>
                        OBSERVACIONES
                    </th>
                    <th>

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
                        <div class="md-form md-outline my-0 table-light">
                            <input type="text" id="nea" name="nea" value="" class="form-control @error('nea') is-invalid @enderror" required>
                            <label for="nea">NEA</label>
                            @error('nea')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>
                    <th>
                        TIEMPO TOTAL DE TRABAJO
                    </th>
                    <td>
                        {{ $antecedentes->sum('tdt') }} meses
                    </td>
                    <td>

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
                            
                            $fisico=($antecedentes->sum('f')+$antecedentes->sum('tdt')+$antecedentes->sum('sso'))/2

                        )

                        @switch(true)
                            @case($fisico==2.1)
                                No existe
                                @break
                            @case($fisico<=5)
                                Leve
                                @break
                            @case($fisico<=7.5)
                                Moderado
                                @break
                            @case($fisico<=20)
                                Alto
                                @break
                            @default
                                
                        @endswitch
                        
                        {{ $fisico }}

                    </td>
                    <th>BIOLÓGICO</th>
                    <td colspan="3"></td>
                </tr>
                <tr class="table-info text-center">
                    <th>MECÁNICO</th>
                    <td colspan="3"></td>
                    <th>ERGONÓMICO</th>
                    <td colspan="3"></td>
                </tr>
                <tr class="table-info text-center">
                    <th>QUÍMICO</th>
                    <td colspan="3"></td>
                    <th>PSICOSOCIAL</th>
                    <td colspan="3"></td>
                </tr>
                
            </tfoot>
        </table>
    </div>



@prepend('scriptsHeader')

@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_antecedente_trabajo').addClass('active')
    </script>

@endpush

@endsection
