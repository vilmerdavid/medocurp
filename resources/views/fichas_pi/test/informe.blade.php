

<div class="table-responsive">
@php
    $empresa=$ficha->areaTrabajo_m->empresa_m??null;
@endphp

    <table class="table table-bordered table-sm">
        <thead>

            <tr>
                @if (Storage::exists($empresa->logo??''))
                    @php
                        $url=base_path().'/storage/app/'.$empresa->logo;
                    @endphp
                @else
                    @php
                        $url=public_path('img/logo-na.jpg');
                    @endphp
                @endif
                <td class="np-logo noBorder" colspan="2" style=" background-image:url('{{$url}}'); width: 50%">
                    
                </td>
    
                @php
                    $url_lg=public_path('img/logo-richar.png');
                @endphp
                <td colspan="2" class="np-logo noBorder" style=" background-image:url('{{$url_lg}}'); width: 25%">
                    
                </td>
                <th>
                    <strong>VERSIÓN:</strong>
                    {{ $empresa->version??'' }}
                    <hr>
                    <strong>CÓDIGO:</strong>
                    {{ $empresa->codigo??'' }}
                </th>
            </tr>

            <tr>
           
                <th colspan="6" class="text-center bg-dark text-white">
                    INFORME DEL ASSIST
                </th>
            </tr>
            <tr>
                <th>
                    Nombre completo:
                </th>
                <td colspan="4">
                    {{ $ficha->user_m->apellidos_nombres??'' }}
                </td>
            </tr>
            <tr>
                <th>
                    Edad:
                </th>
                <td colspan="4">
                    {{ $ficha->user_m->edad??'' }}
                </td>
            </tr>
            <tr>
                <th>
                    Puesto de trabajo:
                </th>
                <td colspan="4">
                    {{ $ficha->areaTrabajo_m->nombre??'' }}
                </td>
            </tr>
            <tr>
                <th>
                    Fecha de aplicación:
                </th>
                <td colspan="4">
                    {{ $ficha->user_m->fecha_ingreso_trabajo??'' }}
                </td>
            </tr>
            
            <tr>
                <th>Sustancia</th>
                <th>Su puntaje</th>
                <th>Tipo de Intervención</th>
                <th>Tipo de riesgo</th>
                <th>Significado</th>
            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Tabaco</td>
                <td>
                    {{ $ficha->informeTabaco->sum('valor') }}
                </td>
                <td>

                    @switch(true)
                        @case($ficha->informeTabaco->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeTabaco->sum('valor')<=26)
                            Intervención breve        
                            @break
                        
                        @case($ficha->informeTabaco->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch

                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeTabaco->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeTabaco->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeTabaco->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeTabaco->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeTabaco->sum('valor')<=1)
                            @break
                        @case($ficha->informeTabaco->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        
                        @case($ficha->informeTabaco->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeTabaco->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                            
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Alcohol
                </td>
                <td>
                    {{ $ficha->informeAlcohol->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAlcohol->sum('valor')<=10)
                            Sin intervención
                            @break
                        @case($ficha->informeAlcohol->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeAlcohol->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAlcohol->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeAlcohol->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeAlcohol->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeAlcohol->sum('valor')>26)
                        <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAlcohol->sum('valor')<=1)
                            @break
                        @case($ficha->informeAlcohol->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        
                        @case($ficha->informeAlcohol->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeAlcohol->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                            
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Cannabis
                </td>
                <td>
                    {{ $ficha->informeCannabis->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeCannabis->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeCannabis->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeCannabis->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    
                    @switch(true)
                        @case($ficha->informeCannabis->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeCannabis->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeCannabis->sum('valor')<=26)
                        <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeCannabis->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeCannabis->sum('valor')<=1)
                            @break
                        @case($ficha->informeCannabis->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        
                        @case($ficha->informeCannabis->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeCannabis->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Cocaína
                </td>
                <td>
                    {{ $ficha->informeCocaina->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeCocaina->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeCocaina->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeCocaina->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeCocaina->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeCocaina->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeCocaina->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeCocaina->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeCocaina->sum('valor')<=1)
                            @break
                        @case($ficha->informeCocaina->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeCocaina->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeCocaina->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Anfetaminas
                </td>
                <td>
                    {{ $ficha->informeAnfetaminas->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAnfetaminas->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAnfetaminas->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeAnfetaminas->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAnfetaminas->sum('valor')<=1)
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeAnfetaminas->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Inhalantes
                </td>
                <td>
                    {{ $ficha->informeInhalantes->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeInhalantes->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeInhalantes->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeInhalantes->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeInhalantes->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeInhalantes->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeInhalantes->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeInhalantes->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeInhalantes->sum('valor')<=1)
                            @break
                        @case($ficha->informeInhalantes->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeInhalantes->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeInhalantes->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Tranquilizantes
                </td>
                <td>
                    {{ $ficha->informeTranquilizantes->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeTranquilizantes->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeTranquilizantes->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeTranquilizantes->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeTranquilizantes->sum('valor')<=1)
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeTranquilizantes->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Alucinógenos
                </td>
                <td>
                    {{ $ficha->informeAlucinogenos->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAlucinogenos->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAlucinogenos->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeAlucinogenos->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeAlucinogenos->sum('valor')<=1)
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeAlucinogenos->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Opiáceos
                </td>
                <td>
                    {{ $ficha->informeOpiaceos->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeOpiaceos->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeOpiaceos->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeOpiaceos->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeOpiaceos->sum('valor')<=1)
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeOpiaceos->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
            <tr>
                <td>Otras drogas
                </td>
                <td>
                    {{ $ficha->informeOtrasDrogas->sum('valor') }}
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeOtrasDrogas->sum('valor')<=3)
                            Sin intervención
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')<=26)
                            Intervención breve
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')>26)
                            Tratamiento intensivo
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeOtrasDrogas->sum('valor')<=1)
                            No existe
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')<=3)
                            Riesgo bajo
                            @break
                        
                        @case($ficha->informeOtrasDrogas->sum('valor')<=26)
                            <span class="badge badge-warning">Riesgo moderado</span>
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')>26)
                            <span class="badge badge-danger">Riesgo alto</span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td>
                    @switch(true)
                        @case($ficha->informeOtrasDrogas->sum('valor')<=1)
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')<=3)
                            Su actual forma de consumo de sustancias, representa un riesgo bajo para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')<=26)
                            Su actual forma de consumo de sustancias, representa un riesgo considerable para su salud o para ocasionarle otro tipo de problemas.
                            @break
                        @case($ficha->informeOtrasDrogas->sum('valor')>26)
                            Su actual forma de consumo de sustancias, representa un riesgo elevado para ocasionarle problemas graves de salud, sociales, económicos, legales, de pareja, entre otros. Probablemente sea dependiente
                            @break
                        @default
                    @endswitch
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    <a href="{{ route('descargarPdfInformeAsis',$ficha->id) }}" class="btn btn-info">Descargar PDF</a>
                </td>
            </tr>
        </tfoot>
    </table>

</div>