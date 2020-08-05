<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="grey text-center">
                <th colspan="5">
                ESTILO DE VIDA 
                </th>
                
            </tr>
            <tr class="grey lighten-2 text-center">
                <th>
                    ESTILO
                </th>
                <th>
                    ¿CUÁL O QUÉ?
                </th>
                <th>
                    TIEMPO/CANTIDAD
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="actividad_fisica">Actividad Física</label>
                        <select class="form-control" id="actividad_fisica" name="actividad_fisica">
                            @php($actividad_fisica=$ficha->actividad_fisica??'')
                            <option></option>
                            <option value="SI" {{ $actividad_fisica=='SI'?'selected':'' }}>SI</option>
                            <option value="NO" {{ $actividad_fisica=='NO'?'selected':'' }}>NO</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_fisica_uno" name="cual_que_actividad_fisica_uno" value="{{ old('cual_que_actividad_fisica_uno',$ficha->cual_que_actividad_fisica_uno??'') }}" class="form-control @error('cual_que_actividad_fisica_uno') is-invalid @enderror">
                        <label for="cual_que_actividad_fisica_uno" class="active">¿Cuál?</label>
                    </div>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_fisica_dos" name="cual_que_actividad_fisica_dos" value="{{ old('cual_que_actividad_fisica_dos',$ficha->cual_que_actividad_fisica_dos??'') }}" class="form-control @error('cual_que_actividad_fisica_dos') is-invalid @enderror">
                        <label for="cual_que_actividad_fisica_dos" class="active">¿Cuál?</label>
                    </div>
                </td>
                <td>
                    <select class="form-control" id="tiempo_cantidad_actividad_fisica_uno" name="tiempo_cantidad_actividad_fisica_uno">
                        @php($tiempo_cantidad_actividad_fisica_uno=$ficha->tiempo_cantidad_actividad_fisica_uno??'')
                        <option></option>
                        <option value="< 3 d/semana" {{ $tiempo_cantidad_actividad_fisica_uno=='< 3 d/semana'?'selected':'' }}> < 3 d/semana</option>
                        <option value="3 o más d/semana" {{ $tiempo_cantidad_actividad_fisica_uno=='3 o más d/semana'?'selected':'' }}>3 o más d/semana</option>
                    </select>
                    <br>
                    <select class="form-control" id="tiempo_cantidad_actividad_fisica_dos" name="tiempo_cantidad_actividad_fisica_dos">
                        @php($tiempo_cantidad_actividad_fisica_dos=$ficha->tiempo_cantidad_actividad_fisica_dos??'')
                        <option></option>
                        <option value="< 3 d/semana" {{ $tiempo_cantidad_actividad_fisica_dos=='< 3 d/semana'?'selected':'' }}> < 3 d/semana</option>
                        <option value="3 o más d/semana" {{ $tiempo_cantidad_actividad_fisica_dos=='3 o más d/semana'?'selected':'' }}>3 o más d/semana</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="mediacion_habitual">Medicación habitual</label>
                        <select class="form-control" id="mediacion_habitual" name="mediacion_habitual">
                            @php($mediacion_habitual=$ficha->mediacion_habitual??'')
                            <option></option>
                            <option value="SI" {{ $mediacion_habitual=='SI'?'selected':'' }}>SI</option>
                            <option value="NO" {{ $mediacion_habitual=='NO'?'selected':'' }}>NO</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_mediacion_habitual_uno" name="cual_que_actividad_mediacion_habitual_uno" value="{{ old('cual_que_actividad_mediacion_habitual_uno',$ficha->cual_que_actividad_mediacion_habitual_uno??'') }}" class="form-control @error('cual_que_actividad_mediacion_habitual_uno') is-invalid @enderror">
                        <label for="cual_que_actividad_mediacion_habitual_uno" class="active">¿Cuál?</label>
                    </div>
                    
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_mediacion_habitual_dos" name="cual_que_actividad_mediacion_habitual_dos" value="{{ old('cual_que_actividad_mediacion_habitual_dos',$ficha->cual_que_actividad_mediacion_habitual_dos??'') }}" class="form-control @error('cual_que_actividad_mediacion_habitual_dos') is-invalid @enderror">
                        <label for="cual_que_actividad_mediacion_habitual_dos" class="active">¿Cuál?</label>
                    </div>
                
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="tiempo_mediacion_habitual_uno" name="tiempo_mediacion_habitual_uno" value="{{ old('tiempo_mediacion_habitual_uno',$ficha->tiempo_mediacion_habitual_uno??'') }}" class="form-control @error('tiempo_mediacion_habitual_uno') is-invalid @enderror">
                        <label for="tiempo_mediacion_habitual_uno" class="active">Tiempo</label>
                    </div>
                    
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="tiempo_mediacion_habitual_dos" name="tiempo_mediacion_habitual_dos" value="{{ old('tiempo_mediacion_habitual_dos',$ficha->tiempo_mediacion_habitual_dos??'') }}" class="form-control @error('tiempo_mediacion_habitual_dos') is-invalid @enderror">
                        <label for="tiempo_mediacion_habitual_dos" class="active">Tiempo</label>
                    </div>

                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group">
                        <label for="alergias">Alergias</label>
                        <select class="form-control" id="alergias" name="alergias">
                            @php($alergias=$ficha->alergias??'')
                            <option></option>
                            <option value="SI" {{ $alergias=='SI'?'selected':'' }}>SI</option>
                            <option value="NO" {{ $alergias=='NO'?'selected':'' }}>NO</option>
                        </select>
                    </div>
                </td>
                <td colspan="2">
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_alergias_uno" name="cual_que_alergias_uno" value="{{ old('cual_que_alergias_uno',$ficha->cual_que_alergias_uno??'') }}" class="form-control @error('cual_que_alergias_uno') is-invalid @enderror">
                        <label for="cual_que_alergias_uno" class="active">¿Cuál?</label>
                    </div>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_alergias_dos" name="cual_que_alergias_dos" value="{{ old('cual_que_alergias_dos',$ficha->cual_que_alergias_dos??'') }}" class="form-control @error('cual_que_alergias_dos') is-invalid @enderror">
                        <label for="cual_que_alergias_dos" class="active">¿Cuál?</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="md-form md-outline mt-0">
                        <textarea id="observacion_estilo_vida" name="observacion_estilo_vida" class="form-control @error('observacion_estilo_vida') is-invalid @enderror">{{ old('observacion_estilo_vida',$ficha->observacion_estilo_vida??'') }}</textarea>
                        <label for="observacion_estilo_vida" class="active">Observaciones</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>