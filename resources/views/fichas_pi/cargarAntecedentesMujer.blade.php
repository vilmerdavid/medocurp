<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th colspan="10" class="grey text-center">
                ANTECEDENTES PATOLÓGICOS GINECO OBSTÉTRICOS
            </th>
            <td colspan="2">
                <button class="btn btn-primary btn-sm btn-block" type="button" id="btnantecedentesPatologicosGineco" onclick="antecedentesPatologicosGineco(this);">(REVISAR ANTERIORES)</button>
            </td>
        </tr>

        <tr class="grey lighten-2 text-center">
            <th>
                MENARQUIA
            </th>
            <th>
                CICLOS
            </th>
            <th>
                DISMINORREA
            </th>
            <th>
                FUM
            </th>
            <th>
                G
            </th>
            <th>
                P
            </th>
            <th>
                C
            </th>
            <th>
                A
            </th>
            <th>
                HV
            </th>
            <th>
                HM
            </th>
            <th>
                VIDA SEXUAL ACTIVA
            </th>
            <th>
                PLANIFICACIÓN FAMILIAR 
            </th>
        </tr>

    </thead>
    <tbody>

        <tr>
            <td>
                <div class="md-form md-outline my-0">
                    
                    <input type="number" id="menarquia_mujer" name="menarquia_mujer" value="{{ old('menarquia_mujer',$ficha->menarquia_mujer??'') }}" class="form-control @error('menarquia_mujer') is-invalid @enderror">
                    <label for="menarquia_mujer" class="active">AÑO</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="number" id="ciclos_mujer" name="ciclos_mujer" value="{{ old('ciclos_mujer',$ficha->ciclos_mujer??'') }}" class="form-control @error('ciclos_mujer') is-invalid @enderror">
                    <label for="ciclos_mujer" class="active">DÍAS</label>
                </div>
            </td>
            <td>
                
                <select class="form-control" id="disminorrea_mujer" name="disminorrea_mujer">
                    @php($disminorrea_mujer=$ficha->disminorrea_mujer??'')
                    <option></option>
                    <option value="NO" {{ $disminorrea_mujer=='NO'?'selected':'' }}>NO</option>
                    <option value="LEVE" {{ $disminorrea_mujer=='LEVE'?'selected':'' }}>LEVE</option>
                    <option value="MODERADA" {{ $disminorrea_mujer=='MODERADA'?'selected':'' }}>MODERADA</option>
                    <option value="SEVERA" {{ $disminorrea_mujer=='SEVERA'?'selected':'' }}>SEVERA</option>
                </select>
                
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="fum_mujer" name="fum_mujer" value="{{ old('fum_mujer',$ficha->fum_mujer??'') }}" class="form-control @error('fum_mujer') is-invalid @enderror">
                    <label for="fum_mujer" class="active">FUM</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="g_mujer" name="g_mujer" value="{{ old('g_mujer',$ficha->g_mujer??'') }}" class="form-control @error('g_mujer') is-invalid @enderror">
                    <label for="g_mujer" class="active">G</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="p_mujer" name="p_mujer" value="{{ old('p_mujer',$ficha->p_mujer??'') }}" class="form-control @error('p_mujer') is-invalid @enderror">
                    <label for="p_mujer" class="active">P</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="c_mujer" name="c_mujer" value="{{ old('c_mujer',$ficha->c_mujer??'') }}" class="form-control @error('c_mujer') is-invalid @enderror">
                    <label for="c_mujer" class="active">C</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="a_mujer" name="a_mujer" value="{{ old('a_mujer',$ficha->a_mujer??'') }}" class="form-control @error('a_mujer') is-invalid @enderror">
                    <label for="a_mujer" class="active">A</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="hv_mujer" name="hv_mujer" value="{{ old('hv_mujer',$ficha->hv_mujer??'') }}" class="form-control @error('hv_mujer') is-invalid @enderror">
                    <label for="hv_mujer" class="active">HV</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="hm_mujer" name="hm_mujer" value="{{ old('hm_mujer',$ficha->hm_mujer??'') }}" class="form-control @error('hm_mujer') is-invalid @enderror">
                    <label for="hm_mujer" class="active">HM</label>
                </div>
            </td>
            <td>
                <select class="form-control" id="vida_sexual_activa_mujer" name="vida_sexual_activa_mujer">
                    @php($vida_sexual_activa_mujer=$ficha->vida_sexual_activa_mujer??'')
                    <option></option>
                    <option value="SI" {{ $vida_sexual_activa_mujer=='SI'?'selected':'' }}>SI</option>
                <option value="NO" {{ $vida_sexual_activa_mujer=='NO'?'selected':'' }}>NO</option>
                </select>
            </td>
            <td>
                <select class="form-control" id="planificacion_familiar_mujer" name="planificacion_familiar_mujer">
                    @PHP($planificacion_familiar_mujer=$ficha->planificacion_familiar_mujer??'')
                    <option value="NO" {{ $planificacion_familiar_mujer=='NO'?'selected':'' }}>NO</option>
                    <option value="ACO" {{ $planificacion_familiar_mujer=='ACO'?'selected':'' }}>ACO</option>
                    <option value="ACP" {{ $planificacion_familiar_mujer=='ACP'?'selected':'' }}>ACP/M</option>
                    <option value="ACP" {{ $planificacion_familiar_mujer=='ACP'?'selected':'' }}>ACP/3M</option>
                    <option value="IMPLANTE" {{ $planificacion_familiar_mujer=='IMPLANTE'?'selected':'' }}>IMPLANTE</option>
                    <option value="PRESERVATIVO" {{ $planificacion_familiar_mujer=='PRESERVATIVO'?'selected':'' }}>PRESERVATIVO</option>
                    <option value="SALPINGOCLASIA" {{ $planificacion_familiar_mujer=='SALPINGOCLASIA'?'selected':'' }}>SALPINGOCLASIA</option>
                    <option value="DIU" {{ $planificacion_familiar_mujer=='DIU'?'selected':'' }}>DIU</option>
                </select>
            </td>
        </tr>

    </tbody>
</table>


<table class="table table-bordered">
    <thead>
        <tr class="grey lighten-2 text-center">
            <th>
                EXAMEN
            </th>
            <th>
                TIEMPO
            </th>
            <th>
                RESULTADO
            </th>
        
            <th>
                EXAMEN
            </th>
            <th>
                TIEMPO
            </th>
            <th>
                RESULTADO
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="form-group">
                    <label for="papanicolaou_mujer">Papanicolaou</label>
                    <select class="form-control" id="papanicolaou_mujer" name="papanicolaou_mujer">
                        @php($papanicolaou_mujer=$ficha->papanicolaou_mujer??'')
                        <option></option>
                        <option value="SI" {{ $papanicolaou_mujer=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $papanicolaou_mujer=='NO'?'selected':'' }}>NO</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_papanicolaou_mujer" name="tiempo_papanicolaou_mujer" value="{{ old('tiempo_papanicolaou_mujer',$ficha->tiempo_papanicolaou_mujer??'') }}" class="form-control @error('tiempo_papanicolaou_mujer') is-invalid @enderror">
                    <label for="tiempo_papanicolaou_mujer" class="active">Tiempo del ultimo Papanicolaou</label>
                </div>
                
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_papanicolaou_mujer" class="form-control @error('resultado_papanicolaou_mujer') is-invalid @enderror" name="resultado_papanicolaou_mujer">{{ old('resultado_papanicolaou_mujer',$ficha->resultado_papanicolaou_mujer??'') }}</textarea>
                    <label for="resultado_papanicolaou_mujer" class="active">Resultado Papanicolaou</label>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="eco_mamario_mujer">ECO mamario</label>
                    <select class="form-control" id="eco_mamario_mujer" name="eco_mamario_mujer">
                        @php($eco_mamario_mujer=$ficha->eco_mamario_mujer??'')
                        <option></option>
                        <option value="SI" {{ $eco_mamario_mujer=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $eco_mamario_mujer=='NO'?'selected':'' }}>NO</option>
                    </select>
                </div>
            </td>

            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_eco_mamario_mujer" name="tiempo_eco_mamario_mujer" value="{{ old('tiempo_eco_mamario_mujer',$ficha->tiempo_eco_mamario_mujer??'') }}" class="form-control @error('tiempo_eco_mamario_mujer') is-invalid @enderror">
                    <label for="tiempo_eco_mamario_mujer" class="active">Tiempo ECO mamario</label>
                </div>
            </td>

            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_eco_mamario_mujer" class="form-control @error('resultado_eco_mamario_mujer') is-invalid @enderror" name="resultado_eco_mamario_mujer">{{ old('resultado_eco_mamario_mujer',$ficha->resultado_eco_mamario_mujer??'') }}</textarea>
                    <label for="resultado_eco_mamario_mujer" class="active">Resultado ECO mamario</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="colposcopia_mujer">Colposcopía</label>
                    <select class="form-control" id="colposcopia_mujer" name="colposcopia_mujer">
                        @php($colposcopia_mujer=$ficha->colposcopia_mujer??'')
                        <option></option>
                        <option value="SI" {{ $colposcopia_mujer='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $colposcopia_mujer='NO'?'selected':'' }}>NO</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_colposcopia_mujer" name="tiempo_colposcopia_mujer" value="{{ old('tiempo_colposcopia_mujer',$ficha->tiempo_colposcopia_mujer??'') }}" class="form-control @error('tiempo_colposcopia_mujer') is-invalid @enderror">
                    <label for="tiempo_colposcopia_mujer" class="active">Tiempo Colposcopía</label>
                </div>
            </td>

            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_colposcopia_mujer" class="form-control @error('resultado_colposcopia_mujer') is-invalid @enderror" name="resultado_colposcopia_mujer">{{ old('resultado_colposcopia_mujer',$ficha->resultado_colposcopia_mujer??'') }}</textarea>
                    <label for="resultado_colposcopia_mujer" class="active">Resultado Colposcopía</label>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <label for="mamografia_mujer">Mamografía</label>
                    <select class="form-control" id="mamografia_mujer" name="mamografia_mujer">
                        @php($mamografia_mujer=$ficha->mamografia_mujer??'')
                        <option></option>
                        <option value="SI" {{ $mamografia_mujer=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $mamografia_mujer=='NO'?'selected':'' }}>NO</option>
                    </select>
                </div>
            </td>

            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_mamografia_mujer" name="tiempo_mamografia_mujer" value="{{ old('tiempo_mamografia_mujer',$ficha->tiempo_mamografia_mujer??'') }}" class="form-control @error('tiempo_mamografia_mujer') is-invalid @enderror">
                    <label for="tiempo_mamografia_mujer" class="active">Tiempo mamografía</label>
                </div>
            </td>

            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_mamografia_mujer" class="form-control @error('resultado_mamografia_mujer') is-invalid @enderror" name="resultado_mamografia_mujer">{{ old('resultado_mamografia_mujer',$ficha->resultado_mamografia_mujer??'') }}</textarea>
                    <label for="resultado_mamografia_mujer" class="active">Resultado mamografía</label>
                </div>
            </td>

        </tr>
        <tr>
            <td colspan="6">

                <div class="md-form md-outline my-0">
                    <textarea id="observaciones_mujer" class="form-control @error('observaciones_mujer') is-invalid @enderror" name="observaciones_mujer">{{ old('observaciones_mujer',$ficha->observaciones_mujer??'') }}</textarea>
                    <label for="observaciones_mujer" class="active">Observaciones</label>
                </div>

            </td>
        </tr>

    </tbody>
</table>


