@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            M. DIAGNÓSTICO
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr colspan="9">
                            <th colspan="5">
                                DIAGNOSTICO
                            </th>
                            <th colspan="1">
                                CIE 10
                            </th>
                           
                            <th  colspan="1">
                                PRESUNTIVO
                            </th>
                            <th th colspan="1">
                                DEFINITIVO
                            </th>
                            <th colspan="1">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('guardarDiagnostico') }}" method="POST">
                            <tr>
                                <td  colspan="5" >
                                    @csrf
                                    <input type="hidden" name="ficha" id="ficha" value="{{ $ficha->id }}">
                                    <input  type="text" class="form-control @error('presuntivo') is-invalid @enderror" name="presuntivo" id="presuntivo" value="{{ old('presuntivo') }}" required>
                                </td>
                                <td th colspan="1">
                                    <input type="text" class="form-control @error('cie') is-invalid @enderror" name="cie" id="cie" value="{{ old('cie') }}" required>
                                </td>
                                <td th colspan="1">
                                    <input type="text" class="form-control @error('pr') is-invalid @enderror" name="pr" id="pr" value="{{ old('pr') }}" required>
                                </td>
                                <td th colspan="1">
                                    <input type="text" class="form-control @error('de') is-invalid @enderror" name="de" id="de" value="{{ old('de') }}" required>
                                </td>
                                <td th colspan="1">
                                    <button type="submit" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Guardar">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </td>
                            </tr>
                            

                        </form>


                        @foreach ($diagnosticos as $dg)
                        <form action="{{ route('actualizarDiagnostico') }}" method="POST">
                            <tr colspan="9">
                                <td colspan="5">
                                    @csrf
                                    <input type="hidden" name="diagnostico" id="diagnostico_{{ $dg->id }}" value="{{ $dg->id }}">
                                    <input type="text" class="form-control" name="presuntivo" id="presuntivo_{{ $dg->id }}" value="{{ $dg->presuntivo }}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="cie" id="cie_{{ $dg->id }}" value="{{ $dg->cie }}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="pr" id="pr_{{ $dg->id }}" value="{{ $dg->pr }}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="de" id="de_{{ $dg->id }}" value="{{ $dg->de }}" required>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Actualizar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" onclick="eliminar(this);" class="btn btn-danger btn-sm" data-url="{{ route('eliminarDiagnostico',$dg->id) }}" data-msg="{{ $dg->cie }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                            

                        </form>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" style="width: 10%">
                                Con mi peso actual:
                            </th>
                            <td colspan="4">

                                @php
                                                                                    
                                    $c_p=$constante->peso??'1';
                                    $c_t=$constante->talla??'1';
                                    $r_i_m_c=($c_p/($c_t*$c_t));

                                @endphp

                                @switch(true)
                                    @case($r_i_m_c<18.5)
                                        Al momento no tengo riesgos para mi salud, pero si adelgazo más puedo presentar trastornos digestivos, fatiga crónica, debilidad, estrés, ansiedad y disfunciones hormonales
                                        @break
                                    @case($r_i_m_c<25)
                                        Me mantendré saludable, tendré un buen nivel de energía, vitalidad y una buena condición física
                                        @break
                                    @case($r_i_m_c<30)
                                        Tengo mayor posibilidad de presentar fatiga, enfemedades digestivas, problemas cardíacos, várices
                                        @break
                                    @case($r_i_m_c<35)
                                        Tengo mayor probabilidad de presentar diabetes, hipertensión arterial, cálculos biliares, enfermedades cardiovasculares, problemas articulares de rodillas y columna
                                        @break
                                    @case($r_i_m_c<40)
                                        Tengo mayor probabilidad de presentar diabetes, cáncer, angina de pecho, infartos, tromboflebitis, arterioesclerosis, embolias, alteraciones menstruales
                                        @break
                                    @case($r_i_m_c>=40)
                                        Tengo un riesgo inmediato para mi salud, falta de aire, somnolencia, ulceras varicosas, cáncer de próstata, reflujo gastro-esofágico, discriminación laboral social y sexual, me indicarán tratamiento farmacológico o quirúrgico
                                        @break
                                    @default
                                        
                                @endswitch                            

                            </td>
                        </tr>
                        <tr>
                            <th colspan="1">
                                Con mi Tensión arterial actual
                            </th>
                            <td colspan="4">
                                @php
                                    $p1=$constante->presion_arterial_uno??0;
                                    $p2=$constante->presion_arterial_dos??0;
                                @endphp

                                @switch(true)
                                    
                                    
                                    @case($p1 && $p1<=129 && $p2<80)
                                        {{-- Tensión arterial elevada --}}
                                        Debo cambiar mi estilo de vida, bajar el uso de sal en las comidas, hacer ejercicio 3 días a la semana, cuidar mi peso y realizarme un chequeo médico cada 3 a 6 meses
                                        @break
                                    @case($p2>=80 && $p2<=89)
                                        {{-- HTA grado I --}}
                                        Debo cambiar mi estilo de vida, reducir al máximo el uso de sal en las comidas, hacer ejercicio 3 días a la semana, cuidar mi peso y realizarme un chequeo médico mensual hasta controlar mi tensión arterial
                                        @break
                                    @case($p2>=90 && $p2<=120)
                                        {{-- HTA grado II --}}
                                        Debo cambiar mi estilo de vida, reducir al máximo el uso de sal en las comidas, hacer ejercicio 3 días a la semana, cuidar mi peso y realizarme un chequeo médico mensual hasta controlar mi tensión arterial
                                        @break
                                    @case($p2>120)
                                        {{-- Crisis hipertensiva --}}
                                        Necesito atención médica cardiológica urgente, mi vida corre riesgo grave","Debo mantener una dieta adecuada, cuidar mi peso, hacer ejercicio 3 días a la semana y realizarme un chequeo médico anual
                                        @break
                                    @case($p1>=130 && $p1<=139)
                                        {{-- HTA grado I --}}
                                        Debo cambiar mi estilo de vida, reducir al máximo el uso de sal en las comidas, hacer ejercicio 3 días a la semana, cuidar mi peso y realizarme un chequeo médico mensual hasta controlar mi tensión arterial
                                        @break
                                    @case($p1>=140 && $p1<=180)
                                        {{-- HTA grado II --}}
                                        Debo cambiar mi estilo de vida, reducir al máximo el uso de sal en las comidas, hacer ejercicio 3 días a la semana, cuidar mi peso y realizarme un chequeo médico mensual hasta controlar mi tensión arterial
                                        @break
                                    @case($p1>180)
                                        {{-- Crisis hipertensiva --}}
                                        Necesito atención médica cardiológica urgente, mi vida corre riesgo grave","Debo mantener una dieta adecuada, cuidar mi peso, hacer ejercicio 3 días a la semana y realizarme un chequeo médico anual
                                        @break
                                    
                                    @default
                                        
                                @endswitch
                            </td>
                        </tr>
                        
                    </tfoot>
                </table>
            </div>
        </div>
        
    </div>

    @include('scores.datos')

    
</div>

@prepend('scriptsHeader')
{{-- confirm --}}
<link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
<script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_diagnostico').addClass('active')

     $('#contenidoDeScore').hide()
    </script>

@endpush

@endsection
