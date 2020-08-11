@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">

    <form action="{{ route('actualizarResultadosGenerales') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" id="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header">
                L. RESULTADOS DE EXÁMENES GENERALES Y ESPECÍFICOS DE ACUERDO AL RIESGO Y PUESTO DE TRABAJO
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>
                                    EXAMEN
                                </th>
                                <th>
                                    FECHA
                                </th>
                                <th>
                                    RESULTADO
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Hematocrito
                                </td>
                                <td>
                                    <input type="date" name="hematocrito_fecha" id="hematocrito_fecha" value="{{ $rg->hematocrito_fecha??'' }}" class="form-control @error('hematocrito_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="hematocrito_valor" id="hematocrito_valor" value="{{ $rg->hematocrito_valor??'' }}" class="form-control @error('hematocrito_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $hematocrito_valor=$rg->hematocrito_valor??0;
                                    @endphp
                                    @if (!($hematocrito_valor<=47)) 
                                        Alerta!
                                    @endif           
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hemoglobina
                                </td>
                                <td>
                                    <input type="date" name="hemoglobina_fecha" id="hemoglobina_fecha" value="{{ $rg->hemoglobina_fecha??'' }}" class="form-control @error('hemoglobina_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="hemoglobina_valor" id="hemoglobina_valor" value="{{ $rg->hemoglobina_valor??'' }}" class="form-control @error('hemoglobina_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $hemoglobina_valor=$rg->hemoglobina_valor??0;
                                    @endphp
                                    @if (!($hemoglobina_valor<=16.2))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Úrea
                                </td>
                                <td>
                                    <input type="date" name="urea_fecha" id="urea_fecha" value="{{ $rg->urea_fecha??'' }}" class="form-control @error('urea_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="urea_valor" id="urea_valor" value="{{ $rg->urea_valor??'' }}" class="form-control @error('urea_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $urea_valor=$rg->urea_valor??0;
                                    @endphp
                                    @if (!($urea_valor<=50))
                                        Alerta!                                        
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Glucosa
                                </td>
                                <td>
                                    <input type="date" name="glucosa_fecha" id="glucosa_fecha" value="{{ $rg->glucosa_fecha??'' }}" class="form-control @error('glucosa_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="glucosa_valor" id="glucosa_valor" value="{{ $rg->glucosa_valor??'' }}" class="form-control @error('glucosa_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    
                                    @php
                                        $glucosa_valor=$rg->glucosa_valor??0;
                                    @endphp
                                    @if (!($glucosa_valor<=115))
                                        Alerta!
                                        <br>    
                                    @endif
                                    <span class="badge badge-primary">
                                        DMNID

                                        <strong class="m-l-2">
                                            @if (($glucosa_valor>=115))
                                                SI
                                            @endif  
                                        </strong>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Creatinina
                                </td>
                                <td>
                                    <input type="date" name="creatinina_fecha" id="creatinina_fecha" value="{{ $rg->creatinina_fecha??'' }}" class="form-control @error('creatinina_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="creatinina_valor" id="creatinina_valor" value="{{ $rg->creatinina_valor??'' }}" class="form-control @error('creatinina_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $creatinina_valor=$rg->creatinina_valor??0;
                                    @endphp
                                    @if (!($creatinina_valor<=1.2))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Colesterol
                                </td>
                                <td>
                                    <input type="date" name="colesterol_fecha" id="colesterol_fecha" value="{{ $rg->colesterol_fecha??'' }}" class="form-control @error('colesterol_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="colesterol_valor" id="colesterol_valor" value="{{ $rg->colesterol_valor??'' }}" class="form-control @error('colesterol_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $colesterol_valor=$rg->colesterol_valor??0;
                                    @endphp

                                    @if (!($colesterol_valor<=200))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Triglicéridos Masculinos
                                </td>
                                <td>
                                    <input type="date" name="trigliceridos_m_fecha" id="trigliceridos_m_fecha" value="{{ $rg->trigliceridos_m_fecha??'' }}" class="form-control @error('trigliceridos_m_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="trigliceridos_m_valor" id="trigliceridos_m_valor" value="{{ $rg->trigliceridos_m_valor??'' }}" class="form-control @error('trigliceridos_m_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $trigliceridos_m_valor=$rg->trigliceridos_m_valor??0;
                                    @endphp
                                    @if (!($trigliceridos_m_valor<=165))
                                    Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Triglicéridos femenino
                                </td>
                                <td>
                                    <input type="date" name="trigliceridos_f_fecha" id="trigliceridos_f_fecha" value="{{ $rg->trigliceridos_f_fecha??'' }}" class="form-control @error('trigliceridos_f_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="trigliceridos_f_valor" id="trigliceridos_f_valor" value="{{ $rg->trigliceridos_f_valor??'' }}" class="form-control @error('trigliceridos_f_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $trigliceridos_f_valor=$rg->trigliceridos_f_valor??0;
                                    @endphp
                                    @if (!($trigliceridos_f_valor<=140))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ácido úrico masculino
                                </td>
                                <td>
                                    <input type="date" name="acido_urico_m_fecha" id="acido_urico_m_fecha" value="{{ $rg->acido_urico_m_fecha??'' }}" class="form-control @error('acido_urico_m_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="acido_urico_m_valor" id="acido_urico_m_valor" value="{{ $rg->acido_urico_m_valor??'' }}" class="form-control @error('acido_urico_m_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $acido_urico_m_valor=$rg->acido_urico_m_valor??0;
                                    @endphp
                                    @if (!($acido_urico_m_valor<=7))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ácido úrico femenino
                                </td>
                                <td>
                                    <input type="date" name="acido_urico_f_fecha" id="acido_urico_f_fecha" value="{{ $rg->acido_urico_f_fecha??'' }}" class="form-control @error('acido_urico_f_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="acido_urico_f_valor" id="acido_urico_f_valor" value="{{ $rg->acido_urico_f_valor??'' }}" class="form-control @error('acido_urico_f_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $acido_urico_f_valor=$rg->acido_urico_f_valor??0;
                                    @endphp
                                    @if (!($acido_urico_f_valor<=5.7))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    TGO
                                </td>
                                <td>
                                    <input type="date" name="tgo_fecha" id="tgo_fecha" value="{{ $rg->tgo_fecha??'' }}" class="form-control @error('tgo_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="tgo_valor" id="tgo_valor" value="{{ $rg->tgo_valor??'' }}" class="form-control @error('tgo_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $tgo_valor=$rg->tgo_valor??0;
                                    @endphp

                                    @if (!($tgo_valor<=38))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    TGP
                                </td>
                                <td>
                                    <input type="date" name="tgp_fecha" id="tgp_fecha" value="{{ $rg->tgp_fecha??'' }}" class="form-control @error('tgp_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="tgp_valor" id="tgp_valor" value="{{ $rg->tgp_valor??'' }}" class="form-control @error('tgp_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $tgp_valor=$rg->tgp_valor??0;
                                    @endphp
                                    @if (!($tgp_valor<=40))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PSA
                                </td>
                                <td>
                                    <input type="date" name="psa_fecha" id="psa_fecha" value="{{ $rg->psa_fecha??'' }}" class="form-control @error('psa_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="psa_valor" id="psa_valor" value="{{ $rg->psa_valor??'' }}" class="form-control @error('psa_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $psa_valor=$rg->psa_valor??0;
                                    @endphp
                                    @if (!($psa_valor<=4))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    E.M.O
                                </td>
                                <td>
                                    <input type="date" name="emo_fecha" id="emo_fecha" value="{{ $rg->emo_fecha??'' }}" class="form-control @error('emo_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $emo_valor=$rg->emo_valor??0;
                                    @endphp
                                    <select name="emo_valor" id="emo_valor" class="form-control @error('emo_valor') is-invalid @enderror">
                                        <option value=""></option>
                                        <option value="Positivo" {{ $emo_valor=='Positivo'?'selected':'' }}>Positivo</option>
                                        <option value="Negativo" {{ $emo_valor=='Negativo'?'selected':'' }}>Negativo</option>
                                    </select>
                                </td>
                                <td>
                                    @if ($emo_valor=='Positivo')
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="md-form md-outline my-0">
                                        <input type="text" name="agregar_a_nombre" id="agregar_a_nombre" value="{{$rg->agregar_a_nombre??'' }}" class="form-control @error('agregar_a_nombre') is-invalid @enderror">
                                        <label for="agregar_a_nombre">Agregar a.</label>
                                        @error('agregar_a_nombre')
                                            <span>
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>                        
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    
                                    <input type="date" name="agregar_a_fecha" id="agregar_a_fecha" value="{{ $rg->agregar_a_fecha??'' }}" class="form-control @error('agregar_a_fecha') is-invalid @enderror">

                                </td>
                                <td>
                                    <input type="text" name="agregar_a_valor" id="agregar_a_valor" value="{{ $rg->agregar_a_valor??'' }}" class="form-control @error('agregar_a_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $agregar_a_valor=$rg->agregar_a_valor??0;
                                    @endphp
                                    @if (!($agregar_a_valor<=40))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="md-form md-outline my-0">
                                        <input type="text" name="agregar_b_nombre" id="agregar_b_nombre" value="{{$rg->agregar_b_nombre??'' }}" class="form-control @error('agregar_b_nombre') is-invalid @enderror">
                                        <label for="agregar_b_nombre">Agregar b.</label>
                                        @error('agregar_b_nombre')
                                            <span>
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>                        
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <input type="date" name="agregar_b_fecha" id="agregar_b_fecha" value="{{ $rg->agregar_b_fecha??'' }}" class="form-control @error('agregar_b_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="agregar_b_valor" id="agregar_b_valor" value="{{ $rg->agregar_b_valor??'' }}" class="form-control @error('agregar_b_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $agregar_b_valor=$rg->agregar_b_valor??0;
                                    @endphp
                                    @if (!($agregar_b_valor<=40))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="md-form md-outline my-0">
                                        <input type="text" name="agregar_c_nombre" id="agregar_c_nombre" value="{{$rg->agregar_c_nombre??'' }}" class="form-control @error('agregar_c_nombre') is-invalid @enderror">
                                        <label for="agregar_c_nombre">Agregar c.</label>
                                        @error('agregar_c_nombre')
                                            <span>
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>                        
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <input type="date" name="agregar_c_fecha" id="agregar_c_fecha" value="{{ $rg->agregar_c_fecha??'' }}" class="form-control @error('agregar_c_fecha') is-invalid @enderror">
                                </td>
                                <td>
                                    <input type="text" name="agregar_c_valor" id="agregar_c_valor" value="{{ $rg->agregar_c_valor??'' }}" class="form-control @error('agregar_c_valor') is-invalid @enderror">
                                </td>
                                <td>
                                    @php
                                        $agregar_c_valor=$rg->agregar_c_valor??0;
                                    @endphp
                                    @if (!($agregar_c_valor<=40))
                                        Alerta!
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="md-form md-outline my-0">
                                        
                                        <textarea name="observaciones_rg" id="observaciones_rg" class="form-control @error('observaciones_rg') is-invalid @enderror">{{$rg->observaciones_rg??'' }}</textarea>
                                        <label for="observaciones_rg">Observaciones</label>
                                        @error('observaciones_rg')
                                            <span>
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>                        
                                        @enderror
                                    </div>
                                </td>
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
</div>

@prepend('scriptsHeader')

@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_resultados_generales').addClass('active')

     
    </script>

@endpush

@endsection
