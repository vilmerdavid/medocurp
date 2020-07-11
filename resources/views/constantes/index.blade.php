@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <form action="{{ route('actualizarContantes') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header">
                J. CONSTANTES VITALES Y ANTROPOMETRÍA
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-sm">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    PRESIÓN ARTERIAL
                                </th>
                                <th colspan="2">
                                    TEMP
                                </th>
                                <th colspan="2">
                                    F.C
                                </th>
                                <th colspan="2">
                                    SO2
                                </th>
                                <th colspan="2">
                                    F.R
                                </th>
                                <th colspan="2">
                                    PESO
                                </th>
                                <th colspan="2">
                                    TALLA
                                </th>
                                <th colspan="2">
                                    INDICE DE MASA CORP
                                </th>
                                <th colspan="2">
                                    P.ABDOM
                                </th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td style="width: 10%">
                                    <input type="text" name="presion_arterial_uno" class="form-control" value="{{ $constante->presion_arterial_uno??'' }}" >
                                </td>
                                <td style="width: 10%">
                                    <input type="text" name="presion_arterial_dos" class="form-control" value="{{ $constante->presion_arterial_dos??'' }}" >
                                </td>
                                <td>
                                    @php
                                        $p1=$constante->presion_arterial_uno??0;
                                        $p2=$constante->presion_arterial_dos??0;
                                    @endphp

                                    @switch(true)
                                        
                                        @case($p1<120 && $p2<80)
                                            Tensión arterial normal
                                            @break
                                        @case($p1 && $p1<=129 && $p2<80)
                                            Tensión arterial elevada
                                            @break
                                        @case($p2>=80 && $p2<=89)
                                            HTA grado I
                                            @break
                                        @case($p2>=90 && $p2<=120)
                                            HTA grado II
                                            @break
                                        @case($p2>120)
                                            Crisis hipertensiva
                                            @break
                                        @case($p1>=130 && $p1<=139)
                                            HTA grado I
                                            @break
                                        @case($p1>=140 && $p1<=180)
                                            HTA grado II
                                            @break
                                        @case($p1>180)
                                            Crisis hipertensiva
                                            @break
                                        
                                        @default
                                            
                                    @endswitch
                                </td>
                                <td style="width: 10%"> 
                                    <input type="text" name="temp" class="form-control" value="{{ $constante->temp??'' }}" >
                                </td>
                                <td>°C</td>
                                <td style="width: 10%">
                                    <input type="text" name="f_c" class="form-control" value="{{ $constante->f_c??'' }}" >
                                </td>
                                <td>°X'</td>
                                <td style="width: 10%">
                                    <input type="text" name="so" class="form-control" value="{{ $constante->so??'' }}" >
                                </td>
                                <td>%</td>
                                <td style="width: 10%">
                                    <input type="text" name="f_r" class="form-control" value="{{ $constante->f_r??'' }}" >
                                </td>
                                <td>X'</td>
                                <td style="width: 10%">
                                    <input type="text" name="peso" class="form-control" value="{{ $constante->peso??'' }}" >
                                </td>
                                <td>°.KG</td>
                                <td style="width: 10%">
                                    <input type="text" name="talla" class="form-control" value="{{ $constante->talla??'' }}" >
                                </td>
                                <td>MT</td>
                                <td>
                                    @php
                                                                                
                                        $c_p=$constante->peso??'1';
                                        $c_t=$constante->talla??'1';
                                        $r_i_m_c=($c_p/($c_t*$c_t));
                                    @endphp
                                    {{ $r_i_m_c }}
                                </td>
                                <td>
                                    @switch(true)

                                        @case($r_i_m_c<18.5)
                                            Delgadez aceptable
                                            @break
                                        @case($r_i_m_c<25)
                                            Normal
                                            @break
                                        @case($r_i_m_c<27.5)
                                            Sobrepeso GI
                                            @break
                                        @case($r_i_m_c<30)
                                            Sobrepeso GII
                                            @break
                                        @case($r_i_m_c<35)
                                            Obesidad CI
                                            @break
                                        @case($r_i_m_c<40)
                                            Obesidad CII
                                            @break
                                        @case($r_i_m_c>=40)
                                            Obesidad Mórbida
                                            @break
                                        @default
                                            
                                    @endswitch
                                </td>
                                <td style="width: 10%">
                                    <input type="text" name="p_abdom" class="form-control" value="{{ $constante->p_abdom??'' }}" >
                                </td>
                                <td>CM</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

    <form action="{{ route('actualizarExamenFisico') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header">
                K. EXAMEN FÍSICO REGIONAL
                <br>
                REGIONES
            </div>
            <div class="card-body">
               
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="cicatrices" class="custom-control-input" id="cicatrices" name="cicatrices" {{ $ex->cicatrices=='cicatrices'?'checked':'' }}>
                    <label for="cicatrices" class="custom-control-label">cicatrices</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="tatuajes" class="custom-control-input" id="tatuajes" name="tatuajes" {{ $ex->tatuajes=='tatuajes'?'checked':'' }}>
                    <label for="tatuajes" class="custom-control-label">tatuajes</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="piel_faneras" class="custom-control-input" id="piel_faneras" name="piel_faneras" {{ $ex->piel_faneras=='piel_faneras'?'checked':'' }}>
                    <label for="piel_faneras" class="custom-control-label">piel_faneras</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="parpados" class="custom-control-input" id="parpados" name="parpados" {{ $ex->parpados=='parpados'?'checked':'' }}>
                    <label for="parpados" class="custom-control-label">parpados</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="conjuntivas" class="custom-control-input" id="conjuntivas" name="conjuntivas" {{ $ex->conjuntivas=='conjuntivas'?'checked':'' }}>
                    <label for="conjuntivas" class="custom-control-label">conjuntivas</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="pupilas" class="custom-control-input" id="pupilas" name="pupilas" {{ $ex->pupilas=='pupilas'?'checked':'' }}>
                    <label for="pupilas" class="custom-control-label">pupilas</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="cornea" class="custom-control-input" id="cornea" name="cornea" {{ $ex->cornea=='cornea'?'checked':'' }}>
                    <label for="cornea" class="custom-control-label">cornea</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="motilidad" class="custom-control-input" id="motilidad" name="motilidad" {{ $ex->motilidad=='motilidad'?'checked':'' }}>
                    <label for="motilidad" class="custom-control-label">motilidad</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="c_auditivo_ext" class="custom-control-input" id="c_auditivo_ext" name="c_auditivo_ext" {{ $ex->c_auditivo_ext=='c_auditivo_ext'?'checked':'' }}>
                    <label for="c_auditivo_ext" class="custom-control-label">c_auditivo_ext</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="pabellon" class="custom-control-input" id="pabellon" name="pabellon" {{ $ex->pabellon=='pabellon'?'checked':'' }}>
                    <label for="pabellon" class="custom-control-label">pabellon</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="timpanos" class="custom-control-input" id="timpanos" name="timpanos" {{ $ex->timpanos=='timpanos'?'checked':'' }}>
                    <label for="timpanos" class="custom-control-label">timpanos</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="labios" class="custom-control-input" id="labios" name="labios" {{ $ex->labios=='labios'?'checked':'' }}>
                    <label for="labios" class="custom-control-label">labios</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="lengua" class="custom-control-input" id="lengua" name="lengua" {{ $ex->lengua=='lengua'?'checked':'' }}>
                    <label for="lengua" class="custom-control-label">lengua</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="faringe" class="custom-control-input" id="faringe" name="faringe" {{ $ex->faringe=='faringe'?'checked':'' }}>
                    <label for="faringe" class="custom-control-label">faringe</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="amigdalas" class="custom-control-input" id="amigdalas" name="amigdalas" {{ $ex->amigdalas=='amigdalas'?'checked':'' }}>
                    <label for="amigdalas" class="custom-control-label">amigdalas</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="dentadura" class="custom-control-input" id="dentadura" name="dentadura" {{ $ex->dentadura=='dentadura'?'checked':'' }}>
                    <label for="dentadura" class="custom-control-label">dentadura</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="tabique" class="custom-control-input" id="tabique" name="tabique" {{ $ex->tabique=='tabique'?'checked':'' }}>
                    <label for="tabique" class="custom-control-label">tabique</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="cornetes" class="custom-control-input" id="cornetes" name="cornetes" {{ $ex->cornetes=='cornetes'?'checked':'' }}>
                    <label for="cornetes" class="custom-control-label">cornetes</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="mucosas" class="custom-control-input" id="mucosas" name="mucosas" {{ $ex->mucosas=='mucosas'?'checked':'' }}>
                    <label for="mucosas" class="custom-control-label">mucosas</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="senos_paranasales" class="custom-control-input" id="senos_paranasales" name="senos_paranasales" {{ $ex->senos_paranasales=='senos_paranasales'?'checked':'' }}>
                    <label for="senos_paranasales" class="custom-control-label">senos_paranasales</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="tiroides_masas" class="custom-control-input" id="tiroides_masas" name="tiroides_masas" {{ $ex->tiroides_masas=='tiroides_masas'?'checked':'' }}>
                    <label for="tiroides_masas" class="custom-control-label">tiroides_masas</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="movilidad" class="custom-control-input" id="movilidad" name="movilidad" {{ $ex->movilidad=='movilidad'?'checked':'' }}>
                    <label for="movilidad" class="custom-control-label">movilidad</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="mamas" class="custom-control-input" id="mamas" name="mamas" {{ $ex->mamas=='mamas'?'checked':'' }}>
                    <label for="mamas" class="custom-control-label">mamas</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="corazon" class="custom-control-input" id="corazon" name="corazon" {{ $ex->corazon=='corazon'?'checked':'' }}>
                    <label for="corazon" class="custom-control-label">corazon</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="pulmones" class="custom-control-input" id="pulmones" name="pulmones" {{ $ex->pulmones=='pulmones'?'checked':'' }}>
                    <label for="pulmones" class="custom-control-label">pulmones</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="parrilla_costal" class="custom-control-input" id="parrilla_costal" name="parrilla_costal" {{ $ex->parrilla_costal=='parrilla_costal'?'checked':'' }}>
                    <label for="parrilla_costal" class="custom-control-label">parrilla_costal</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="visceras" class="custom-control-input" id="visceras" name="visceras" {{ $ex->visceras=='visceras'?'checked':'' }}>
                    <label for="visceras" class="custom-control-label">visceras</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="p_abdominal" class="custom-control-input" id="p_abdominal" name="p_abdominal" {{ $ex->p_abdominal=='p_abdominal'?'checked':'' }}>
                    <label for="p_abdominal" class="custom-control-label">p_abdominal</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="flexibilidad" class="custom-control-input" id="flexibilidad" name="flexibilidad" {{ $ex->flexibilidad=='flexibilidad'?'checked':'' }}>
                    <label for="flexibilidad" class="custom-control-label">flexibilidad</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="desviacin" class="custom-control-input" id="desviacin" name="desviacin" {{ $ex->desviacin=='desviacin'?'checked':'' }}>
                    <label for="desviacin" class="custom-control-label">desviacin</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="dolor" class="custom-control-input" id="dolor" name="dolor" {{ $ex->dolor=='dolor'?'checked':'' }}>
                    <label for="dolor" class="custom-control-label">dolor</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="pelvis" class="custom-control-input" id="pelvis" name="pelvis" {{ $ex->pelvis=='pelvis'?'checked':'' }}>
                    <label for="pelvis" class="custom-control-label">pelvis</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="genitales" class="custom-control-input" id="genitales" name="genitales" {{ $ex->genitales=='genitales'?'checked':'' }}>
                    <label for="genitales" class="custom-control-label">genitales</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="vascular" class="custom-control-input" id="vascular" name="vascular" {{ $ex->vascular=='vascular'?'checked':'' }}>
                    <label for="vascular" class="custom-control-label">vascular</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="m_superiores" class="custom-control-input" id="m_superiores" name="m_superiores" {{ $ex->m_superiores=='m_superiores'?'checked':'' }}>
                    <label for="m_superiores" class="custom-control-label">m_superiores</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="m_inferiores" class="custom-control-input" id="m_inferiores" name="m_inferiores" {{ $ex->m_inferiores=='m_inferiores'?'checked':'' }}>
                    <label for="m_inferiores" class="custom-control-label">m_inferiores</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="fuerza" class="custom-control-input" id="fuerza" name="fuerza" {{ $ex->fuerza=='fuerza'?'checked':'' }}>
                    <label for="fuerza" class="custom-control-label">fuerza</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="sensibilidad" class="custom-control-input" id="sensibilidad" name="sensibilidad" {{ $ex->sensibilidad=='sensibilidad'?'checked':'' }}>
                    <label for="sensibilidad" class="custom-control-label">sensibilidad</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="marcha" class="custom-control-input" id="marcha" name="marcha" {{ $ex->marcha=='marcha'?'checked':'' }}>
                    <label for="marcha" class="custom-control-label">marcha</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" value="reflejos" class="custom-control-input" id="reflejos" name="reflejos" {{ $ex->reflejos=='reflejos'?'checked':'' }}>
                    <label for="reflejos" class="custom-control-label">reflejos</label>
                </div>
                
                <div class="md-form md-outline my-0">
                    <textarea class="form-control @error('actividades_relevantes') is-invalid @enderror" name="actividades_relevantes" id="actividades_relevantes" required>{{ old('actividades_relevantes',$ex->evidencia??'Ninguna') }}</textarea>
                    <label for="actividades_relevantes">
                        SI EXISTE EVIDENCIA DE PATOLOGÍA MARCAR CON "X" Y DESCRIBIR EN LA SIGUIENTE SECCIÓN COLOCANDO EL NUMERAL
                    </label>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>

@prepend('scriptsHeader')

@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_constantes').addClass('active')

     
    </script>

@endpush

@endsection