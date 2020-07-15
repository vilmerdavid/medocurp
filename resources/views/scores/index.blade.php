@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            SCORE DE FARMINGHAM
            <br>
            Eventos cardiovasculares a 10 años
        </div>
        <div class="card-body">
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
                                    $colesterol_total_valor=$rg->colesterol_valor??'';
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
                                <form action="{{ route('actualizarScore') }}" method="POST">
                                    
                                    <div class="input-group mb-3">
                                        @csrf
                                        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                                        <input type="text" name="valor" class="form-control" placeholder="Ingrese" aria-label="Ingrese" value="{{ $hdl_valor }}"
                                          aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                          <button class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect"  type="submit" id="button-addon2">Guardar</button>
                                        </div>
                                    </div>
                                </form>
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
                                    $contante_valor=$constante->presion_arterial_uno??'';
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
                                    
                                    $f1=$valor_mujer*log($paciente->edad??'');
                                    $f2=$colesterol_total_mujer*log($colesterol_total_valor);
                                    $f3=$hdl_mujer*log($hdl_valor);
                                    $f4=$tension_sistolica_mujer*log($contante_valor);
                                    $f5=$tabaquismo_mujer*$tabaquismo_valor;
                                    $f6=$diabetis_mujer*$res_dm;

                                    $res_valor_final_mujer=$f1+$f2+$f3+$f4+$f5+$f6;
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
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>
</div>

@prepend('scriptsHeader')
   
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_score').addClass('active')
    </script>

@endpush

@endsection
