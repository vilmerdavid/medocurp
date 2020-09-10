@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <form action="{{ route('actualizarContantes') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header text-center">
                J. CONSTANTES VITALES Y ANTROPOMETRÍA
                <button class="btn btn-sm btn-primary float-right" type="button" onclick="verConstantresVitales(this);">(REVISAR ANTERIORES)</button>
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
        <div class="card mt-2">
            <div class="card-header text-center">
                K. EXAMEN FÍSICO REGIONAL
                <br>
                REGIONES
            </div>
            <div class="card-body">
               
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="">1. Piel</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="cicatrices" class="custom-control-input" id="cicatrices" name="cicatrices" {{ $ex->cicatrices=='cicatrices'?'checked':'' }}>
                            <label for="cicatrices" class="custom-control-label">a. Cicatrices</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="tatuajes" class="custom-control-input" id="tatuajes" name="tatuajes" {{ $ex->tatuajes=='tatuajes'?'checked':'' }}>
                            <label for="tatuajes" class="custom-control-label">
                                b. Tatuajes
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="piel_faneras" class="custom-control-input" id="piel_faneras" name="piel_faneras" {{ $ex->piel_faneras=='piel_faneras'?'checked':'' }}>
                            <label for="piel_faneras" class="custom-control-label">
                                c. Piel  y Faneras
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">2. Ojos</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="parpados" class="custom-control-input" id="parpados" name="parpados" {{ $ex->parpados=='parpados'?'checked':'' }}>
                            <label for="parpados" class="custom-control-label">a. Párpados</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="conjuntivas" class="custom-control-input" id="conjuntivas" name="conjuntivas" {{ $ex->conjuntivas=='conjuntivas'?'checked':'' }}>
                            <label for="conjuntivas" class="custom-control-label">
                                b. Conjuntivas
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="pupilas" class="custom-control-input" id="pupilas" name="pupilas" {{ $ex->pupilas=='pupilas'?'checked':'' }}>
                            <label for="pupilas" class="custom-control-label">
                                c. Pupilas
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="cornea" class="custom-control-input" id="cornea" name="cornea" {{ $ex->cornea=='cornea'?'checked':'' }}>
                            <label for="cornea" class="custom-control-label">
                                d. Córnea
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="motilidad" class="custom-control-input" id="motilidad" name="motilidad" {{ $ex->motilidad=='motilidad'?'checked':'' }}>
                            <label for="motilidad" class="custom-control-label">
                                e. Motilidad
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for=""> 3. Oidos</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="c_auditivo_ext" class="custom-control-input" id="c_auditivo_ext" name="c_auditivo_ext" {{ $ex->c_auditivo_ext=='c_auditivo_ext'?'checked':'' }}>
                            <label for="c_auditivo_ext" class="custom-control-label">a. C. auditivo ext</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="pabellon" class="custom-control-input" id="pabellon" name="pabellon" {{ $ex->pabellon=='pabellon'?'checked':'' }}>
                            <label for="pabellon" class="custom-control-label">
                                b. Pabellón
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="timpanos" class="custom-control-input" id="timpanos" name="timpanos" {{ $ex->timpanos=='timpanos'?'checked':'' }}>
                            <label for="timpanos" class="custom-control-label">
                                c. Tímpanos
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">4. Oro faringe</label>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="labios" class="custom-control-input" id="labios" name="labios" {{ $ex->labios=='labios'?'checked':'' }}>
                            <label for="labios" class="custom-control-label">
                                a. Labios
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="lengua" class="custom-control-input" id="lengua" name="lengua" {{ $ex->lengua=='lengua'?'checked':'' }}>
                            <label for="lengua" class="custom-control-label">
                                b. Lengua
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="faringe" class="custom-control-input" id="faringe" name="faringe" {{ $ex->faringe=='faringe'?'checked':'' }}>
                            <label for="faringe" class="custom-control-label">
                                c. Faringe
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="amigdalas" class="custom-control-input" id="amigdalas" name="amigdalas" {{ $ex->amigdalas=='amigdalas'?'checked':'' }}>
                            <label for="amigdalas" class="custom-control-label">
                                d. Amígdalas
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="dentadura" class="custom-control-input" id="dentadura" name="dentadura" {{ $ex->dentadura=='dentadura'?'checked':'' }}>
                            <label for="dentadura" class="custom-control-label">
                                e. Dentadura
                            </label>
                        </div>

                    </div>

                    <div class="form-group col-md-2">
                        <label for="">
                            5.Nariz
                        </label>
                    
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="tabique" class="custom-control-input" id="tabique" name="tabique" {{ $ex->tabique=='tabique'?'checked':'' }}>
                            <label for="tabique" class="custom-control-label">
                                a. Tabique
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="cornetes" class="custom-control-input" id="cornetes" name="cornetes" {{ $ex->cornetes=='cornetes'?'checked':'' }}>
                            <label for="cornetes" class="custom-control-label">
                                b. Cornetes
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="mucosas" class="custom-control-input" id="mucosas" name="mucosas" {{ $ex->mucosas=='mucosas'?'checked':'' }}>
                            <label for="mucosas" class="custom-control-label">
                                c. Mucosas
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="senos_paranasales" class="custom-control-input" id="senos_paranasales" name="senos_paranasales" {{ $ex->senos_paranasales=='senos_paranasales'?'checked':'' }}>
                            <label for="senos_paranasales" class="custom-control-label">
                                d. Senos paranasales
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">
                            6. Cuello
                        </label>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="tiroides_masas" class="custom-control-input" id="tiroides_masas" name="tiroides_masas" {{ $ex->tiroides_masas=='tiroides_masas'?'checked':'' }}>
                            <label for="tiroides_masas" class="custom-control-label">
                                a. Tiroides / masas
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="movilidad" class="custom-control-input" id="movilidad" name="movilidad" {{ $ex->movilidad=='movilidad'?'checked':'' }}>
                            <label for="movilidad" class="custom-control-label">
                                b. Movilidad
                            </label>
                        </div>

                    </div>


                </div>


                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for=""> 7. Tórax</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="mamas" class="custom-control-input" id="mamas" name="mamas" {{ $ex->mamas=='mamas'?'checked':'' }}>
                            <label for="mamas" class="custom-control-label">
                                a. Mamas
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="corazon" class="custom-control-input" id="corazon" name="corazon" {{ $ex->corazon=='corazon'?'checked':'' }}>
                            <label for="corazon" class="custom-control-label">
                                b. Corazón
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for=""> 8. Tórax</label>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="pulmones" class="custom-control-input" id="pulmones" name="pulmones" {{ $ex->pulmones=='pulmones'?'checked':'' }}>
                            <label for="pulmones" class="custom-control-label">
                                a. Pulmones
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="parrilla_costal" class="custom-control-input" id="parrilla_costal" name="parrilla_costal" {{ $ex->parrilla_costal=='parrilla_costal'?'checked':'' }}>
                            <label for="parrilla_costal" class="custom-control-label">
                                b. Parrilla Costal
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">  9. Abdomen</label>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="visceras" class="custom-control-input" id="visceras" name="visceras" {{ $ex->visceras=='visceras'?'checked':'' }}>
                            <label for="visceras" class="custom-control-label">a. Vísceras</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="p_abdominal" class="custom-control-input" id="p_abdominal" name="p_abdominal" {{ $ex->p_abdominal=='p_abdominal'?'checked':'' }}>
                            <label for="p_abdominal" class="custom-control-label">
                                b. P. abdominal
                            </label>
                        </div>
                    </div>


                    <div class="form-group col-md-2">
                        <label for="">  10. Columna </label>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="flexibilidad" class="custom-control-input" id="flexibilidad" name="flexibilidad" {{ $ex->flexibilidad=='flexibilidad'?'checked':'' }}>
                            <label for="flexibilidad" class="custom-control-label">a. Flexibilidad</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="desviacin" class="custom-control-input" id="desviacin" name="desviacin" {{ $ex->desviacin=='desviacin'?'checked':'' }}>
                            <label for="desviacin" class="custom-control-label">
                                b. Desviación
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="dolor" class="custom-control-input" id="dolor" name="dolor" {{ $ex->dolor=='dolor'?'checked':'' }}>
                            <label for="dolor" class="custom-control-label">
                                c. Dolor
                            </label>
                        </div>

                    </div>

                    <div class="form-group col-md-2">
                        <label for="">11. Pelvis</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="pelvis" class="custom-control-input" id="pelvis" name="pelvis" {{ $ex->pelvis=='pelvis'?'checked':'' }}>
                            <label for="pelvis" class="custom-control-label">a. Pelvis</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="genitales" class="custom-control-input" id="genitales" name="genitales" {{ $ex->genitales=='genitales'?'checked':'' }}>
                            <label for="genitales" class="custom-control-label">
                                b. Genitales
                            </label>
                        </div>
                    </div>


                    <div class="form-group col-md-2">
                        <label for="">12. Extremidades</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="vascular" class="custom-control-input" id="vascular" name="vascular" {{ $ex->vascular=='vascular'?'checked':'' }}>
                            <label for="vascular" class="custom-control-label">
                                a. Vascular
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="m_superiores" class="custom-control-input" id="m_superiores" name="m_superiores" {{ $ex->m_superiores=='m_superiores'?'checked':'' }}>
                            <label for="m_superiores" class="custom-control-label">
                                b. M. superiores
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="m_inferiores" class="custom-control-input" id="m_inferiores" name="m_inferiores" {{ $ex->m_inferiores=='m_inferiores'?'checked':'' }}>
                            <label for="m_inferiores" class="custom-control-label">
                                c. M inferiores
                            </label>
                        </div>
                    </div>


                </div>


                
                
                
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">13.Neurológico</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="fuerza" class="custom-control-input" id="fuerza" name="fuerza" {{ $ex->fuerza=='fuerza'?'checked':'' }}>
                            <label for="fuerza" class="custom-control-label">
                                a. Fuerza 
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="sensibilidad" class="custom-control-input" id="sensibilidad" name="sensibilidad" {{ $ex->sensibilidad=='sensibilidad'?'checked':'' }}>
                            <label for="sensibilidad" class="custom-control-label">
                                b. Sensibilidad
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="marcha" class="custom-control-input" id="marcha" name="marcha" {{ $ex->marcha=='marcha'?'checked':'' }}>
                            <label for="marcha" class="custom-control-label">
                                c. Marcha
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="reflejos" class="custom-control-input" id="reflejos" name="reflejos" {{ $ex->reflejos=='reflejos'?'checked':'' }}>
                            <label for="reflejos" class="custom-control-label">
                                d. Reflejos
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="md-form md-outline my-0">
                    <textarea class="form-control @error('actividades_relevantes') is-invalid @enderror" name="actividades_relevantes" id="actividades_relevantes" required>{{ old('actividades_relevantes',$ex->evidencia??'Ninguna') }}</textarea>
                    <label for="actividades_relevantes">
                        SI EXISTE EVIDENCIA DE PATOLOGÍA MARCAR CON "SELECIONE" Y DESCRIBIR EN LA SIGUIENTE SECCIÓN COLOCANDO EL NUMERAL
                    </label>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>


<div class="modal fade" id="modalRevisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelRes" aria-hidden="true">
    <div class="modal-dialog modal-fluid" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelRes"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalbodyRes">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
@prepend('scriptsHeader')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_constantes').addClass('active')

        
        function verConstantresVitales(arg){
            var hc="{{ $ficha->user_m->historia_clinica_ci??'' }}";           
            var idFicha="{{ $ficha->id }}";
            $('#modalRevisar').modal('show');
            $('#exampleModalLabelRes').html('CONSTANTES VITALES Y ANTROPOMETRÍA')
            $('#modalbodyRes').load("{{ route('verConstantresVitales') }}",{hc: hc,ficha:idFicha},function(){
            })
            
        }
     
    </script>

@endpush

@endsection
