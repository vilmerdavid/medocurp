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