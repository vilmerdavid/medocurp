@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <div class="table-responsive">
        <table class="rotate-table-grid table-hover">
            <thead>
                <tr>
                    <td colspan="2" style="width: 75%"></td>
                    <td colspan="10" class="table-warning">FÍSICO</td>
                    <td colspan="14" class="table-primary">MECÁNICO</td>
                    <td colspan="10" class="table-success">QUÍMICO</td>
                    <td colspan="7" class="table-danger">BIOLÓGICO</td>
                    <td colspan="5" class=""> ERGONÓMICO</td>
                    <td colspan="13" class="table-dark">PSICOSOCIAL</td>
                    <td colspan="1"></td>
                    <td></td>
                </tr>
                <tr>
                    <th style="padding-top: 15px;">
                        PUESTO DE TRABAJO / ÁREA
                        <small style="color: white;">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</small>
                    </th>
                    <th>
                        ACTIVIDADES
                        <small style="color: white;">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</small>
                    </th>
                    <th><span>Temperaturas altas</span></th>
                    <th><span>Temperaturas bajas</span></th>
                    <th><span>Radiación Ionizante</span></th>
                    <th><span>Radiación No Ionizante</span></th>
                    <th><span>Ruido</span></th>
                    <th><span>Vibración</span></th>
                    <th><span>Iluminación</span></th>
                    <th><span>Ventilación</span></th>
                    <th><span>Fluido eléctrico</span></th>
                    <th><span>Otros</span></th>
                    <th><span>Atrapamiento entre máquinas</span></th>
                    <th><span>Atrapamiento entre superficies</span></th>
                    <th><span>Atrapamiento entre objetos</span></th>
                    <th><span>Caída de objetos</span></th>
                    <th><span>Caídas al mismo nivel</span></th>
                    <th><span>Caídas a diferente nivel</span></th>
                    <th><span>Contacto eléctrico</span></th>
                    <th><span>Contacto con superficies de trabajos</span></th>
                    <th><span>Proyección de partículas-fragmentos</span></th>
                    <th><span>Proyección de fluidos</span></th>
                    <th><span>Pinchazos</span></th>
                    <th><span>Cortes</span></th>
                    <th><span>Atropellamientos por vehículos</span></th>
                    <th><span>Choques /colisión vehicular</span></th>
                    <th><span>Otros</span></th>
                    <th><span>Sólidos</span></th>
                    <th><span>Polvos</span></th>
                    <th><span>Humos</span></th>
                    <th><span>líquidos</span></th>
                    <th><span>vapores</span></th>
                    <th><span>Aerosoles</span></th>
                    <th><span>Neblinas</span></th>
                    <th><span>Gaseosos</span></th>
                    <th><span>Otros</span></th>
                    <th><span>Virus</span></th>
                    <th><span>Hongos</span></th>
                    <th><span>Bacterias</span></th>
                    <th><span>Parásitos</span></th>
                    <th><span>Exposición a vectores</span></th>
                    <th><span>Exposición a animales selváticos</span></th>
                    <th><span>Otros</span></th>
                    <th><span>Manejo manual de cargas</span></th>
                    <th><span>Movimiento repetitivos	</span></th>
                    <th><span>Posturas forzadas	</span></th>
                    <th><span>Trabajos con PVD	</span></th>
                    <th><span>Otros</span></th>
                    <th><span>Monotonía del trabajo 	</span></th>
                    <th><span>Sobrecarga laboral	</span></th>
                    <th><span>Minuciosidad de la tarea</span></th>
                    <th><span>Alta responsabilidad	</span></th>
                    <th><span>Autonomía  en la toma de decisiones</span></th>
                    <th><span>Supervisión y estilos de dirección deficiente	</span></th>
                    <th><span>Conflicto de rol</span></th>
                    <th><span>Falta de Claridad en las funciones</span></th>
                    <th><span>Incorrecta distribución del trabajo</span></th>
                    <th><span>Turnos rotativos	</span></th>
                    <th><span>Relaciones interpersonales 	</span></th>
                    <th><span>inestabilidad laboral	</span></th>
                    <th><span>Otros</span></th>
                    <th>
                        MEDIDAS PREVENTIVAS
                        <small style="color: white;">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</small>
                    </th>
                    <td></td>

                </tr>
            </thead>
            <tbody>

                <form action="{{ route('factoresRiesgosGuardar') }}" method="POST">
                    <tr>
                        @php
                            $i=0
                        @endphp
                        @foreach ($riesgos as $r)
                         
                        
                        @if ($i==0)
                        <td>
                            @csrf
                            <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                            <input type="text" name="{{ $r->nombre }}" id="{{ $r->nombre }}" value="{{ old($r->nombre) }}" class="form-control @error($r->nombre) is-invalid @enderror">    
                        </td>
                        @endif

                        @if ($i==1)
                        <td>
                            <input type="text" name="{{ $r->nombre }}" id="{{ $r->nombre }}" value="{{ old($r->nombre) }}" class="form-control @error($r->nombre) is-invalid @enderror">
                        </td>
                        @endif
                         
                        @if ($i>1 && $i<61)
                        <td>
                            <select name="{{ $r->nombre }}" id="{{ $r->nombre }}">
                                <option value=""></option>
                                <option value="L">LEVE</option>
                                <option value="M">MODERADO</option>
                                <option value="A">ALTO</option>
                            </select>
                        </td>
                        @endif

                        @if ($i==61)
                        <td>
                            <input type="text" name="{{ $r->nombre }}" id="{{ $r->nombre }}" value="{{ old($r->nombre) }}" class="form-control @error($r->nombre) is-invalid @enderror">
                        </td>
                        @endif
                         
                         
                         
                         
                         
                         @php
                             $i++
                         @endphp

                        @endforeach

                        <td>
                            <button type="submit" data-toggle="tooltip" data-placement="top" title="Guardar">
                                <i class="fas fa-save"></i>
                            </button>
                        </td>
                    </tr>
                    
                   

                </form>

                
                    @foreach ($factores as $fac)
                    <form action="{{ route('actualizarFactorItems') }}" method="POST">
                        <tr>
                            
                            @php
                                $x=0
                            @endphp
                            @foreach ($fac->riesgos_m as $ri)

                                @if ($x==0)
                                    
                                    <td>
                                        @csrf
                                        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                                        <input type="hidden" name="factoritems[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->id }}">
                                        <input type="text" name="valor[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->valor }}" class="form-control">
                                    </td>
                                @endif
                                
                                
                                @if ($x==1)
                                    <td>
                                        <input type="hidden" name="factoritems[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->id }}">
                                        <input type="text" name="valor[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->valor }}" class="form-control">
                                    </td>
                                @endif
                                

                                @if ($x>1 && $x<61)
                                
                                    <td>
                                        <input type="hidden" name="factoritems[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->id }}">
                                        <select name="valor[{{ $ri->pivot->id }}]">
                                            <option value=""></option>
                                            <option value="L" {{ $ri->pivot->valor=='L'?'selected':'' }}>Leve</option>
                                            <option value="M" {{ $ri->pivot->valor=='M'?'selected':'' }}>Moderado</option>
                                            <option value="A" {{ $ri->pivot->valor=='A'?'selected':'' }}>Alto</option>
                                        </select>
                                    </td>
                                
                                @endif

                                @if ($x==61)
                                    <td>
                                        <input type="hidden" name="factoritems[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->id }}">
                                        <input type="text" name="valor[{{ $ri->pivot->id }}]" value="{{ $ri->pivot->valor }}" class="form-control">
                                    </td>
                                @endif

                                
                                @php
                                    $x++
                                @endphp


                            @endforeach

                            @if (count($fac->riesgos_m)>0)
                                <td>
                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" data-url="{{ route('eliminarFactor',$fac->id) }}" onclick="eliminar(this);" data-msg="Fila" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    </form>
                    @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@prepend('scriptsHeader')
    <style>
    table{
        width: 100%;
        text-align: center;
    }
    
    table.rotate-table-grid{
        box-sizing: border-box;
        border-collapse: collapse;
    }
    
    .rotate-table-grid tr, .rotate-table-grid td, .rotate-table-grid th {
        border: 1px solid #ddd;
        position: relative;
    }
    .rotate-table-grid th span {
        transform-origin: 0 50%;
        transform: rotate(-90deg); 
        white-space: nowrap; 
        display: block;
        position: absolute;
        bottom: 0;
        left: 50%;
    }
    </style>
    {{-- confirm --}}
    <link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_riesgos').addClass('active')

        var header_height = 0;
        $('.rotate-table-grid th span').each(function() {
            if ($(this).outerWidth() > header_height) header_height = $(this).outerWidth();
        });

        $('.rotate-table-grid th').height(header_height);
    </script>

@endpush

@endsection
