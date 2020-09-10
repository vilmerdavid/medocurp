@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container">

    <form action="{{ route('actualizarCertificadoMedico') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header">
                CERTIFICADO MÉDICO DE APTITUD LABORAL
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="border-collapse: collapse; border: none;" class="table">
                        <tr>
                            @if (Storage::exists($empresa->logo))
                                @php
                                    $url=Storage::url($empresa->logo);
                                @endphp
                            @else
                                @php
                                    $url=asset('img/logo-na.jpg');
                                @endphp
                            @endif
                            <td class="np-logo noBorder" style=" background-image:url('{{$url}}'); width: 25% heigth:40% ">
                                
                            </td>
                
                            @php
                                $url_lg=asset('img/logo-richar.png');
                            @endphp
                            <td class="np-logo noBorder" style=" background-image:url('{{$url_lg}}'); width: 25%">
                                
                            </td>
                            <th>
                                <strong>VERSIÓN:</strong>
                                {{ $empresa->version }}
                                <hr>
                                <strong>CÓDIGO:</strong>
                                {{ $empresa->codigo }}
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align: center;">
                                CERTIFICADO MÉDICO DE APTITUD LABORAL
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align: center;">
                                A. DATOS DEL ESTABLECIMIENTO - EMPRESA Y USUARIO
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>
                                INSTITUCIÓN DEL SISTEMA O NOMBRE DE LA EMPRESA
                            </th>
                            <th>
                                RUC
                            </th>
                            <th>
                                C.I.I.U.
                            </th>
                            <th>
                                ESTABLECIMIENTO DE SALUD
                            </th>
                            <th>
                                N° DE HISTORIA CLÍNICA
                            </th>
                            <th>
                                N° DE ARCHIVO
                            </th>
                        </tr>
                        <tr>
                            <td>
                                {{  $empresa->nombre}}                
                            </td>
                            <td>
                                {{ $empresa->ruc }}
                            </td>
                            <td>
                                {{ $empresa->ciiu }}
                            </td>
                            <td>
                                {{ $empresa->establecimiento }}
                            </td>
                            <td>
                                {{ $paciente->historia_clinica_ci }}
                            </td>
                            <td>
                                {{ $paciente->numero_archivo }}
                            </td>
                        </tr>
                
                        <tr>
                            <th>
                                PRIMER APELLIDO	
                            </th>
                            <th>
                                SEGUNDO APELLIDO
                            </th>
                            <th>
                                PRIMER NOMBRE
                            </th>
                            <th>
                                SEGUNDO NOMBRE
                            </th>
                            <th>
                                SEXO
                            </th>
                            <th>
                                P. TRABAJO (CIUO)
                            </th>
                        </tr>
                        <tr>
                            <td>
                                {{ $paciente->apellido_uno }}
                            </td>
                            <td>
                                {{ $paciente->apellido_dos }}
                            </td>
                            <td>
                                {{ $paciente->nombre_uno }}
                            </td>
                            <td>
                                {{ $paciente->nombre_dos }}
                            </td>
                            <td>
                                {{ $paciente->sexo }}
                            </td>
                            <td>
                                {{ $ficha->areaTrabajo_m->nombre??'' }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th colspan="4">
                                B. DATOS GENERALES
                            </th>
                        </tr>
                        <tr>
                            <th>
                                FECHA DE EMISIÓN:
                            </th>
                            <td>
                                {{ Carbon\Carbon::now() }}
                            </td>
                            <th>
                                EVALUACIÓN:
                            </th>
                            <td>
                                <div class="form-group">
                                    @php
                                        $evaluacion=$ficha->tipoFicha??'';
                                    @endphp
                                    <select class="form-control" name="evaluacion">
                                        <option></option>
                                        <option value="DE INGRESO" {{ $evaluacion=='DE INGRESO'?'selected':'' }}>DE INGRESO</option>
                                        <option value="PERIÓDICA" {{ $evaluacion=='PERIÓDICA'?'selected':'' }}>PERIÓDICA</option>
                                        <option value="DE REINTEGRO" {{ $evaluacion=='DE REINTEGRO'?'selected':'' }}>DE REINTEGRO</option>
                                        <option value="DE RETIRO" {{ $evaluacion=='DE RETIRO'?'selected':'' }}>DE RETIRO</option>
                                        
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th colspan="2">
                                C. APTITUD MÉDICA LABORAL
                            </th>
                        </tr>
                        <tr>
                            <td>
                                Después de la valoración médica ocupacional se certifica que la persona en mención, es calificada como:
                            </td>
                            <td>
                                {{ $am->opcion??'' }}
                            </td>
                        </tr>
                        <tr >
                            <th colspan="2">
                                OBSERVACIONES:
                            </th>
                        </tr>

                        <tr>
                            <td colspan="2">
                                {{ $am->observacion??'' }}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                LIMITACIONES:
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {{ $am->limitacion??'' }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th colspan="2">
                                D. EVALUACIÓN MÉDICA DE RETIRO
                            </th>
                        </tr>
                        <tr>
                            <th>
                                El usuario se realizó la evaluación médica de retiro?
                            </th>
                            <td>
                                @php
                                    $evaluacion_a=$ficha->evaluacion_a??'';
                                @endphp
                                <div class="form-group">
                                    <select name="evaluacion_a" class="form-control">
                                        <option></option>
                                        <option value="Si" {{ $evaluacion_a=='Si'?'selected':'' }}>Si</option>
                                        <option value="No" {{ $evaluacion_a=='No'?'selected':'' }}>No</option>
                                        <option value="No aplica" {{ $evaluacion_a=='No aplica'?'selected':'' }}>No aplica</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                El usuario se realizó la evaluación médica de retiro?
                            </th>
                            <td>
                                @php
                                    $evaluacion_b=$ficha->evaluacion_b??'';
                                @endphp
                                <div class="form-group">
                                    <select class="form-control" name="evaluacion_b" >
                                    <option></option>
                                    <option value="Presuntivo" {{ $evaluacion_b=='Presuntivo'?'selected':'' }}>Presuntivo</option>
                                    <option value="Definitivo" {{ $evaluacion_b=='Definitivo'?'selected':'' }}>Definitivo</option>
                                    <option value="No aplica" {{ $evaluacion_b=='No aplica'?'selected':'' }}>No aplica</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                El usuario se realizó la evaluación médica de retiro?
                            </th>
                            <td>
                                @php
                                    $evaluacion_c=$ficha->evaluacion_c??'';
                                @endphp
                                <div class="form-group">
                                    <select class="form-control" name="evaluacion_c">
                                        <option></option>
                                        <option value="Si" {{ $evaluacion_c=='Si'?'selected':'' }}>Si</option>
                                        <option value="No" {{ $evaluacion_c=='No'?'selected':'' }}>No</option>
                                        <option value="No aplica" {{ $evaluacion_c=='No aplica'?'selected':'' }}>No aplica</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>
                                E. RECOMENDACIONES
                            </th>
                        </tr>
                        @if (count($recomendaciones)>0)
                            @foreach ($recomendaciones as $rec)
                                <tr>
                                    <td>
                                        {{ $rec->recomendacion }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        <tr>
                            <th>
                                Con este documento certifico que el trabajador se ha sometido a la evaluación médica requerida para (el ingreso /la ejecución/ el reintegro y retiro) al puesto laboral y se ha informado sobre los riesgos relacionados con el trabajo emitiendo recomendaciones relacionadas con su estado de salud.
                            </th>
                        </tr>
                        <tr>
                            <td>
                                La presente certificación se expide con base en la historia ocupacional del usuario (a), la cual tiene carácter de confidencial.
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </form>

    <div class="embed-responsive embed-responsive-16by9 mt-3">
        <iframe class="embed-responsive-item" src="{{ route('descargarCertificado',$ficha->id) }}" allowfullscreen></iframe>
      </div>
</div>

@prepend('scriptsHeader')
   <style>
       table {
            border-collapse: collapse;
            width: 100%
        }

        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
       .np-logo {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 20%;
            height: 75px;
        }

        .noBorder {
            border:none !important;
        }
   </style>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_certificado_medico').addClass('active')
    </script>

@endpush

@endsection
