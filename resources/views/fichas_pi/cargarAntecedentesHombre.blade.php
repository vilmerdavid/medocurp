
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th colspan="6" class="grey text-center">
                ANTECEDENTES REPRODUCTIVOS MASCULINOS
            </th>
        </tr>
        <tr class="grey lighten-2 text-center">
            <th>
                EXÁMEN
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
                <label for="eco_prostatico_hombre">APE</label>
                    <select class="form-control" id="ape_hombre" name="ape_hombre" id="ape_hombre">
                        @php($ape_hombre=$ficha->ape_hombre??'')
                        <option></option>
                        <option value="SI" {{ $ape_hombre=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $ape_hombre=='NO'?'selected':'' }}>NO</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_ape_hombre" name="tiempo_ape_hombre" value="{{ old('tiempo_ape_hombre',$ficha->tiempo_ape_hombre??'') }}" class="form-control @error('tiempo_ape_hombre') is-invalid @enderror">
                    <label for="tiempo_ape_hombre" class="active">Tiempo último APE</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_ape_hombre" class="form-control @error('resultado_ape_hombre') is-invalid @enderror" name="resultado_ape_hombre">{{ old('resultado_ape_hombre',$ficha->resultado_ape_hombre??'') }}</textarea>
                    <label for="resultado_ape_hombre" class="active">Resultado APE</label>
                </div>
            </td>
            

        </tr>
        

       

        <tr>
            <td>
                <div class="form-group">
                    <label for="eco_prostatico_hombre">ECO prostático</label>
                    <select class="form-control" id="eco_prostatico_hombre" name="eco_prostatico_hombre">
                        @php($eco_prostatico_hombre=$ficha->eco_prostatico_hombre??'')
                        <option></option>
                        <option value="SI" {{ $eco_prostatico_hombre=='SI'?'selected':'' }}>SI</option>
                    <option value="NO" {{ $eco_prostatico_hombre=='NO'?'selected':'' }}>NO</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="md-form md-outline">
                    <input type="number" id="tiempo_eco_prostatico_hombre" name="tiempo_eco_prostatico_hombre" value="{{ old('tiempo_eco_prostatico_hombre',$ficha->tiempo_eco_prostatico_hombre??'') }}" class="form-control @error('tiempo_eco_prostatico_hombre') is-invalid @enderror">
                    <label for="tiempo_eco_prostatico_hombre" class="active">Tiempo último ECO protático</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <textarea id="resultado_eco_prostatico_hombre" class="form-control @error('resultado_eco_prostatico_hombre') is-invalid @enderror" name="resultado_eco_prostatico_hombre">{{ old('resultado_eco_prostatico_hombre',$ficha->resultado_eco_prostatico_hombre??'') }}</textarea>
                    <label for="resultado_eco_prostatico_hombre" class="active">Resultado ECO protático</label>
                </div>
            </td>
        </tr>

        <tr class="grey lighten-2 text-center">
            <th>
                PLANIFICACIÓN FAMILIAR
            </th>
            <th>
                HIHOS VIVOS
            </th>
            <th>
                HIJOS MUERTOS
            </th>
        </tr>
        
        <tr>
            <td>
                <select name="planificacion_familiar_hombre" id="planificacion_familiar_hombre" class="form-control">
                    @php($planificacion_familiar_hombre=$ficha->planificacion_familiar_hombre??'')
                    <option value=""></option>
                    <option value="NO" {{ $planificacion_familiar_hombre=='NO'?'selected':'' }}>NO</option>
                    <option value="VASECTOMÍA" {{ $planificacion_familiar_hombre=='VASECTOMÍA'?'selected':'' }}>VASECTOMÍA</option>
                    <option value="PRESERVATIVO" {{ $planificacion_familiar_hombre=='PRESERVATIVO'?'selected':'' }}>PRESERVATIVO</option>
                </select>
            </td>

            <td>
                <div class="md-form md-outline mt-0">
                    <input type="text" id="hv_hombre" name="hv_hombre" value="{{ old('hv_hombre',$ficha->hv_hombre??'') }}" class="form-control @error('hv_hombre') is-invalid @enderror">
                    <label for="hv_hombre" class="active">Hijos vivos</label>
                </div>
            </td>
            <td>
                <div class="md-form md-outline mt-0">
                    <input type="text" id="hm_hombre" name="hm_hombre" value="{{ old('hm_hombre',$ficha->hm_hombre??'') }}" class="form-control @error('hm_hombre') is-invalid @enderror">
                    <label for="hm_hombre" class="active" >Hijos muertos</label>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="6">
                <div class="md-form md-outline my-0">
                    <textarea id="observaciones_hombre" class="form-control @error('observaciones_hombre') is-invalid @enderror" name="observaciones_hombre">{{ old('observaciones_hombre',$ficha->observaciones_hombre??'') }}</textarea>
                    <label for="observaciones_hombre" class="active">Observaciones</label>
                </div>
            </td>
        </tr>
    </tbody>
</table>

    
    