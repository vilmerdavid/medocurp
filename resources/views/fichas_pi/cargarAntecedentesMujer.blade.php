<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="12" class="grey text-center">
                ANTECEDENTES PATOLÓGICOS GINECO OBSTÉTRICOS
            </th>
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
                    <input type="number" id="menarquia_mujer" name="menarquia_mujer" value="{{ old('menarquia_mujer') }}" class="form-control @error('menarquia_mujer') is-invalid @enderror">
                    <label for="menarquia_mujer">AÑO</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="number" id="ciclos_mujer" name="ciclos_mujer" value="{{ old('ciclos_mujer') }}" class="form-control @error('ciclos_mujer') is-invalid @enderror">
                    <label for="ciclos_mujer">DÍAS</label>
                </div>
            </td>
            <td>
                
                <select class="form-control" id="disminorrea_mujer" name="disminorrea_mujer">
                    <option></option>
                    <option value="NO">NO</option>
                    <option value="LEVE">LEVE</option>
                    <option value="MODERADA">MODERADA</option>
                    <option value="SEVERA">SEVERA</option>
                </select>
                
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="fum_mujer" name="fum_mujer" value="{{ old('fum_mujer') }}" class="form-control @error('fum_mujer') is-invalid @enderror">
                    <label for="fum_mujer">FUM</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="g_mujer" name="g_mujer" value="{{ old('g_mujer') }}" class="form-control @error('g_mujer') is-invalid @enderror">
                    <label for="g_mujer">G</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="p_mujer" name="p_mujer" value="{{ old('p_mujer') }}" class="form-control @error('p_mujer') is-invalid @enderror">
                    <label for="p_mujer">P</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="c_mujer" name="c_mujer" value="{{ old('c_mujer') }}" class="form-control @error('c_mujer') is-invalid @enderror">
                    <label for="c_mujer">C</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="a_mujer" name="a_mujer" value="{{ old('a_mujer') }}" class="form-control @error('a_mujer') is-invalid @enderror">
                    <label for="a_mujer">A</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="hv_mujer" name="hv_mujer" value="{{ old('hv_mujer') }}" class="form-control @error('hv_mujer') is-invalid @enderror">
                    <label for="hv_mujer">HV</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="text" id="hm_mujer" name="hm_mujer" value="{{ old('hm_mujer') }}" class="form-control @error('hm_mujer') is-invalid @enderror">
                    <label for="hm_mujer">HM</label>
                </div>
            </td>
            <td>
                <select class="form-control" id="vida_sexual_activa_mujer" name="vida_sexual_activa_mujer">
                    <option></option>
                    <option value="SI">SI</option>
                <option value="NO">NO</option>
                </select>
            </td>
            <td>
                <select class="form-control" id="planificacion_familiar_mujer" name="planificacion_familiar_mujer">
                    <option value="NO">NO</option>
                    <option value="SI">ACO</option>
                    <option value="NO">ACP/M</option>
                    <option value="SI">ACP/3M</option>
                    <option value="NO">IMPLANTE</option>
                    <option value="SI">PRESERVATIVO</option>
                    <option value="NO">SALPINGOCLASIA</option>
                    <option value="SI">DIU</option>
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
                        <option></option>
                        <option value="SI">SI</option>
                      <option value="NO">NO</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_papanicolaou_mujer" name="tiempo_papanicolaou_mujer" value="{{ old('tiempo_papanicolaou_mujer') }}" class="form-control @error('tiempo_papanicolaou_mujer') is-invalid @enderror">
                    <label for="tiempo_papanicolaou_mujer">Tiempo Papanicolaou</label>
                </div>
                
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_papanicolaou_mujer" class="form-control @error('resultado_papanicolaou_mujer') is-invalid @enderror" name="resultado_papanicolaou_mujer">{{ old('resultado_papanicolaou_mujer') }}</textarea>
                    <label for="resultado_papanicolaou_mujer">Resultado Papanicolaou</label>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="eco_mamario_mujer">ECO mamario</label>
                    <select class="form-control" id="eco_mamario_mujer" name="eco_mamario_mujer">
                        <option></option>
                        <option value="SI">SI</option>
                      <option value="NO">NO</option>
                    </select>
                </div>
            </td>

            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_eco_mamario_mujer" name="tiempo_eco_mamario_mujer" value="{{ old('tiempo_eco_mamario_mujer') }}" class="form-control @error('tiempo_eco_mamario_mujer') is-invalid @enderror">
                    <label for="tiempo_eco_mamario_mujer">Tiempo ECO mamario</label>
                </div>
            </td>

            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_eco_mamario_mujer" class="form-control @error('resultado_eco_mamario_mujer') is-invalid @enderror" name="resultado_eco_mamario_mujer">{{ old('resultado_eco_mamario_mujer') }}</textarea>
                    <label for="resultado_eco_mamario_mujer">Resultado ECO mamario</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="colposcopia_mujer">Colposcopía</label>
                    <select class="form-control" id="colposcopia_mujer" name="colposcopia_mujer">
                        <option></option>
                        <option value="SI">SI</option>
                      <option value="NO">NO</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_colposcopia_mujer" name="tiempo_colposcopia_mujer" value="{{ old('tiempo_colposcopia_mujer') }}" class="form-control @error('tiempo_colposcopia_mujer') is-invalid @enderror">
                    <label for="tiempo_colposcopia_mujer">Tiempo Colposcopía</label>
                </div>
            </td>

            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_colposcopia_mujer" class="form-control @error('resultado_colposcopia_mujer') is-invalid @enderror" name="resultado_colposcopia_mujer">{{ old('resultado_colposcopia_mujer') }}</textarea>
                    <label for="resultado_colposcopia_mujer">Resultado Colposcopía</label>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <label for="mamografia_mujer">Mamografía</label>
                    <select class="form-control" id="mamografia_mujer" name="mamografia_mujer">
                        <option></option>
                        <option value="SI">SI</option>
                      <option value="NO">NO</option>
                    </select>
                </div>
            </td>

            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_mamografia_mujer" name="tiempo_mamografia_mujer" value="{{ old('tiempo_mamografia_mujer') }}" class="form-control @error('tiempo_mamografia_mujer') is-invalid @enderror">
                    <label for="tiempo_mamografia_mujer">Tiempo mamografía</label>
                </div>
            </td>

            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_mamografia_mujer" class="form-control @error('resultado_mamografia_mujer') is-invalid @enderror" name="resultado_mamografia_mujer">{{ old('resultado_mamografia_mujer') }}</textarea>
                    <label for="resultado_mamografia_mujer">Resultado mamografía</label>
                </div>
            </td>

        </tr>
        <tr>
            <td colspan="6">

                <div class="md-form md-outline my-0">
                    <textarea id="observaciones_mujer" class="form-control @error('observaciones_mujer') is-invalid @enderror" name="observaciones_mujer">{{ old('observaciones_mujer') }}</textarea>
                    <label for="observaciones_mujer">Observaciones</label>
                </div>

            </td>
        </tr>

    </tbody>
</table>


