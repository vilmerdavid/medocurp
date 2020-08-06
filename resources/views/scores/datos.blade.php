<div class="card mt-2">
    <div class="card-header">
        SCORE DE FARMINGHAM
        <br>
        Eventos cardiovasculares a 10 años
    </div>
    <div class="card-body">
        <form action="{{ route('actualizarScore') }}" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>
                                Mujer                                
                            </th>
                            <th>

                            </th>
                            <th>
                                Hombre
                            </th>
                            <th>
                                Valor
                            </th>
                            <th>

                            </th>
                            <th>
                                Valor final hombre
                            </th>
                            <th>
                                Valor final mujer
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                EDAD
                            </td>
                            <td>
                                @php
                                    $valor_mujer=2.32888;
                                @endphp
                                {{ $valor_mujer }}
                            </td>
                            <td>
                                Log of age
                            </td>
                            <td>
                                @php
                                    $valor_hombre_edad=3.06117;
                                @endphp

                                {{ $valor_hombre_edad }}
                            </td>
                            <td>
                                {{ $paciente->edad??'' }}
                                
                            </td>
                            <td>

                                {{ log($paciente->edad??'') }}
                            </td>
                            <td>
                                {{ $valor_hombre_edad*log($paciente->edad??'') }}
                            </td>
                            <td>
                                {{ $valor_mujer*log($paciente->edad??'') }}
                            </td>
                            <td class="text-center">
                                Tab <br>

                                @php
                                    $res_tab=0;
                                @endphp
                                @if ( $ficha->tabaco=='SI')
                                    @php
                                        $res_tab=1;
                                    @endphp
                                @else
                                    @php
                                        $res_tab=0;
                                    @endphp
                                @endif

                                <span class="badge badge-dark">
                                    {{ $res_tab }}
                                </span>
                            </td>
                            <td class="text-center">
                                @php
                                        $glucosa_valor=$rg->glucosa_valor??'';
                                @endphp

                                    
                                DM <br>

                                @php
                                    $res_dm=0;
                                @endphp
                                @if ($glucosa_valor<=115)
                                    @php
                                        $res_dm=1;
                                    @endphp
                                @else
                                    @php
                                        $res_dm=0;
                                    @endphp
                                @endif 
                                <span class="badge badge-dark">
                                    {{ $res_dm }}
                                </span>
                            </td>
                            <td class="text-center">
                                Sex <br>

                                @php
                                    $res_sex=0;
                                @endphp
                                @if ($paciente->sexo=='Hombre')
                                    @php
                                        $res_sex=1;
                                    @endphp
                                @else
                                @php
                                    $res_sex=2;
                                @endphp
                                @endif

                                <span class="badge badge-dark">
                                    
                                    {{ $res_sex }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Colesterol total
                            </td>
                            <td>
                                @php
                                    $colesterol_total_mujer=1.20904;
                                @endphp                    
                                {{ $colesterol_total_mujer }}            
                            </td>
                            <td>
                                Log of CT
                            </td>
                            <td>
                                @php
                                    $colesterol_total_hombre=1.1237;
                                @endphp

                                {{ $colesterol_total_hombre }}
                            </td>
                            <td>
                                @php
                                    $colesterol_total_valor=$rg->colesterol_valor??0;
                                @endphp
                                {{ $colesterol_total_valor }}
                            </td>
                            <td>
                                {{ log($colesterol_total_valor) }}
                            </td>
                            <td>
                                {{ $colesterol_total_hombre*log($colesterol_total_valor) }}
                            </td>
                            <td>
                                {{ $colesterol_total_mujer*log($colesterol_total_valor) }}
                            </td>
                        </tr>



                        <tr>

                            <td>
                                HDL (no cambiar)
                            </td>
                            <td>
                                @php
                                    $hdl_mujer=-0.70833;
                                @endphp

                                {{ $hdl_mujer }}
                            </td>
                            <td>
                                Log of hdl
                            </td>
                            <td>
                                @php
                                    $hdl_hombre=-0.93263;
                                @endphp

                                {{ $hdl_hombre }}
                            </td>
                            <td>
                                @php
                                    $hdl_valor=$ficha->valor_score??'0';
                                @endphp
                                
                                    
                                    <div class="input-group mb-3">
                                        @csrf
                                        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                                        <input type="text" name="valor" class="form-control" placeholder="Ingrese" aria-label="Ingrese" value="{{ $hdl_valor }}"
                                        aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                        <button class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect"  type="submit" id="button-addon2">Guardar</button>
                                        </div>
                                    </div>
                                
                            </td>
                            <td>
                                {{ log($hdl_valor) }}
                            </td>
                            <td>
                                {{ $hdl_hombre*log($hdl_valor) }}
                            </td>
                            <td>
                                {{ $hdl_mujer*log($hdl_valor) }}
                            </td>

                        </tr>


                        <tr>
                            <td>
                            Tensión sistólica
                            </td>
                            <td>
                                @php
                                    $tension_sistolica_mujer=2.76157;
                                @endphp
                                {{ $tension_sistolica_mujer }}
                            </td>
                            <td>
                                Log of SBP
                            </td>
                            <td>
                                @php
                                    $tension_sistolica_hombre=1.93303;
                                @endphp
                                {{ $tension_sistolica_hombre }}
                            </td>
                            <td>
                                @php
                                    $contante_valor=$constante->presion_arterial_uno??0;
                                @endphp

                                {{ $contante_valor }}

                            </td>
                            <td>
                                {{ log($contante_valor) }}
                            </td>
                            <td>
                                {{ $tension_sistolica_hombre*log($contante_valor) }}
                            </td>
                            <td>
                                {{ $tension_sistolica_mujer*log($contante_valor) }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tabaquismo (1 si, 0 no)
                            </td>
                            <td>
                                @php
                                    $tabaquismo_mujer=0.52873;
                                @endphp
                                {{ $tabaquismo_mujer }}
                            </td>
                            <td>
                                fumador
                            </td>
                            <td>
                                @php
                                    $tabaquismo_hombre=0.65451;
                                @endphp
                                {{ $tabaquismo_hombre }}
                            </td>
                            <td>
                                @php
                                    $tabaquismo_valor=$res_tab;
                                @endphp
                                {{ $tabaquismo_valor }}
                            </td>
                            <td>
                                {{ $tabaquismo_hombre*$tabaquismo_valor }}
                            </td>
                            <td>
                                {{ $tabaquismo_hombre*$tabaquismo_valor }}
                            </td>
                            <td>
                                {{ $tabaquismo_mujer*$tabaquismo_valor }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Diabetes (1 si, 0 no )
                            </td>
                            <td>
                                @php
                                    $diabetis_mujer=0.69154;
                                @endphp                     
                                
                                {{ $diabetis_mujer }}
                            </td>
                            <td>
                                diabetes
                            </td>
                            <td>
                                @php
                                    $diabetis_hombre=0.57367;
                                @endphp
                                {{ $diabetis_hombre }}
                            </td>
                            <td>
                                {{ $res_dm }}
                            </td>
                            <td>
                                {{ $diabetis_hombre*$res_dm }}
                            </td>
                            <td>
                                {{ $diabetis_hombre*$res_dm }}
                            </td>
                            <td>
                                {{ $diabetis_mujer*$res_dm }}
                            </td>
                            <td>
                                @php
                                    
                                    $f1_m=$valor_mujer*log($paciente->edad??'');
                                    $f2_m=$colesterol_total_mujer*log($colesterol_total_valor);
                                    $f3_m=$hdl_mujer*log($hdl_valor);
                                    $f4_m=$tension_sistolica_mujer*log($contante_valor);
                                    $f5_m=$tabaquismo_mujer*$tabaquismo_valor;
                                    $f6_m=$diabetis_mujer*$res_dm;

                                    $res_valor_final_mujer=$f1_m+$f2_m+$f3_m+$f4_m+$f5_m+$f6_m;
                                @endphp
                                {{ $res_valor_final_mujer }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sexo masculino 1 femenino 2
                            </td>
                            <td>

                            </td>
                            <td>
                                Sexo
                            </td>
                            <td>
                                1 m 2 f
                            </td>
                            <td>
                                {{ $res_sex }}
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                Hombre
                            </td>
                            <td>
                                Mujer
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                
                            </td>
                            <td>
                                Sumatoria
                            </td>
                            <td>
                                @php
                                    
                                    $f1_h=$valor_hombre_edad*log($paciente->edad??'');
                                    $f2_h=$colesterol_total_hombre*log($colesterol_total_valor);
                                    $f3_h=$hdl_hombre*log($hdl_valor);
                                    $f4_h=$tension_sistolica_hombre*log($contante_valor);
                                    $f5_h=$tabaquismo_hombre*$tabaquismo_valor;
                                    $f6_h=$diabetis_hombre*$res_dm;

                                    $res_valor_final_hombre=$f1_h+$f2_h+$f3_h+$f4_h+$f5_h+$f6_h;
                                @endphp
                                {{ $res_valor_final_hombre }}
                            </td>
                            <td>
                                @php
                                    $res_valor_final_hombre_estatico=23.9802;
                                @endphp
                                {{ $res_valor_final_hombre_estatico }}
                            </td>
                            <td>
                                @php
                                    $res_valor_final_mujer_estatico=26.1931;
                                @endphp
                                {{ $res_valor_final_mujer_estatico }}
                            </td>
                        </tr>

                        <tr class="table-primary">
                            <td colspan="6">
                                Riesgo
                            </td>
                            <td>
                                @php
                                    $riego_valor_hombre=exp($res_valor_final_hombre-$res_valor_final_hombre_estatico)
                                @endphp
                                {{ $riego_valor_hombre }}
                            </td>
                            <td colspan="2"></td>
                            <td>
                                @php
                                    $riego_valor_mujer=exp($res_valor_final_mujer-$res_valor_final_mujer_estatico)
                                @endphp
                                {{ $riego_valor_mujer }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">

                            </td>
                            <td>
                                @php
                                    $porcentaje_score_hombre=1-(pow(0.88936,$riego_valor_hombre));
                                @endphp
                                {{ round($porcentaje_score_hombre,2) }}
                            </td>
                            <td>
                                @php
                                    $valor_final_hombre_score_porcentaje=round(round($porcentaje_score_hombre,2)*100);
                                @endphp
                                {{ $valor_final_hombre_score_porcentaje }} %
                                
                            </td>
                            <td>
                                @php
                                    $porcentaje_score_mujer=1-(pow(0.95012,$riego_valor_mujer));
                                @endphp
                                
                                @php
                                   $valor_final_mujer_score_porcentaje=round( round($porcentaje_score_mujer,3)*100); 
                                @endphp
                                {{ $valor_final_mujer_score_porcentaje }} %


                                
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="table-responsive">
            <table class="table table-bordered">
             <tr class="table-info">
                 <th colspan="6" class="text-center">
                     SCORE DE FARMINGHAM
                 </th>
             </tr>
             <tr class="table-info">
                 <td colspan="4">
                     Riesgo cardiovasular a 10 años
                 </td>
                 <td>
                    @php
                        $valor_final_hombre_o_mujer=0;
                    @endphp
                    @if ($ficha->user_m->sexo=='Hombre')
                    @php
                        $valor_final_hombre_o_mujer=$valor_final_hombre_score_porcentaje;
                    @endphp
                    {{ $valor_final_hombre_score_porcentaje }} %
                    @else
                    @php
                        $valor_final_hombre_o_mujer=$valor_final_mujer_score_porcentaje;
                    @endphp
                    {{ $valor_final_mujer_score_porcentaje }} %
                    @endif
                 </td>
                 <td>
                    @switch(true)
                        @case($valor_final_hombre_o_mujer<10)
                            RIESGO BAJO
                            @break
                        @case($valor_final_hombre_o_mujer<20)
                            RIESGO MODERADO
                            @break
                        @case($valor_final_hombre_o_mujer<30)
                            RIESGO ALTO
                            @break
                        @case($valor_final_hombre_o_mujer>29)
                            RIESGO MUY ALTO
                            @break

                        @default
                            
                    @endswitch
                    
                 </td>
             </tr>
            </table>
        </div>
    </div>
</div>