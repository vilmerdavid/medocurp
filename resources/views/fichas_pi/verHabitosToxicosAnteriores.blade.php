<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr >
                <th class="grey text-center" colspan="5">HÁBITOS TÓXICOS</th>
                
            
            </tr>
            <tr class="grey lighten-2 text-center">
                <td>
                    CONSUMO NOCIVO
                </td>
                <td>
                    TIEMPO DE CONSUMO
                </td>
                <td>
                    CANTIDAD
                </td>
                <td>
                    EX-CONSUMIDOR
                </td>
                <td>
                    TIEMPO DE ABASTECIMIENTO
                </td>
            
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="tabaco">TABACO</label>
                        <select class="form-control" id="tabaco" name="tabaco" onchange="selecionarTabaco(this);">
                            @php($tabaco=$ficha->tabaco??'')
                            <option></option>
                            <option value="SI" {{ $tabaco=='SI'?'selected':'' }}>SI</option>
                            <option value="NO" {{ $tabaco=='NO'?'selected':'' }}>NO</option>
                        </select>
                    </div>
                </td>
                
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_consumo_tabaco" name="tiempo_consumo_tabaco" value="{{ old('tiempo_consumo_tabaco',$ficha->tiempo_consumo_tabaco??'') }}" class="form-control @error('tiempo_consumo_tabaco') is-invalid @enderror">
                        <label for="tiempo_consumo_tabaco" class="active">Meses</label>
                    </div>
                </td>
    
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_tabaco" name="cantidad_tabaco" value="{{ old('cantidad_tabaco',$ficha->cantidad_tabaco??'') }}" class="form-control @error('cantidad_tabaco') is-invalid @enderror">
                        <label for="tiempo_consumo_tabaco" class="active"></label>
                    </div>
                </td>
                <td>
                    <select class="form-control mt-4" id="exconsumidor_tabaco" name="exconsumidor_tabaco">
                        @php($exconsumidor_tabaco=$ficha->exconsumidor_tabaco??'')
                        <option></option>
                        <option value="SI" {{ $exconsumidor_tabaco=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $exconsumidor_tabaco=='NO'?'selected':'' }}>NO</option>
                    </select>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_abastecimiento_tabaco" name="tiempo_abastecimiento_tabaco" value="{{ old('tiempo_abastecimiento_tabaco',$ficha->tiempo_abastecimiento_tabaco??'') }}" class="form-control @error('tiempo_abastecimiento_tabaco') is-invalid @enderror">
                        <label for="tiempo_abastecimiento_tabaco" class="active">Meses</label>
                    </div>
                </td>
            </tr>
            <script>
                function selecionarTabaco(arg){
                    if($(arg).val()=='SI'){
                        $('#exconsumidor_tabaco').attr('disabled', true);
                        $('#tiempo_abastecimiento_tabaco').prop('disabled', true);
                        
                        $('#tiempo_consumo_tabaco').attr('disabled',false);
                        $('#cantidad_tabaco').attr('disabled',false);

                    }else{
                        $('#exconsumidor_tabaco').attr('disabled', false);
                        $('#tiempo_abastecimiento_tabaco').prop('disabled', false);

                        $('#tiempo_consumo_tabaco').attr('disabled',true);
                        $('#cantidad_tabaco').attr('disabled',true);

                    }
                }
            </script>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="alcohol">ALCOHOL</label>
                        <select class="form-control" id="alcohol" name="alcohol" onchange="selecionarAlcohol(this);">
                            @php($alcohol=$ficha->alcohol??'')
                            <option></option>
                            <option value="SI" {{ $alcohol=='SI'?'selected':'' }}>SI</option>
                            <option value="NO" {{ $alcohol=='NO'?'selected':'' }}>NO</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_consumo_alcohol" name="tiempo_consumo_alcohol" value="{{ old('tiempo_consumo_alcohol',$ficha->tiempo_consumo_alcohol??'') }}" class="form-control @error('tiempo_consumo_alcohol') is-invalid @enderror">
                        <label for="tiempo_consumo_alcohol" class="active">Meses</label>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_alcohol" name="cantidad_alcohol" value="{{ old('cantidad_alcohol',$ficha->cantidad_alcohol??'') }}" class="form-control @error('cantidad_alcohol') is-invalid @enderror">
                        <label for="cantidad_alcohol"></label>
                    </div>
                </td>
                <td>
                    <select class="form-control mt-4" id="exconsumidor_alcohol" name="exconsumidor_alcohol" >
                        @php($exconsumidor_alcohol=$ficha->exconsumidor_alcohol??'')
                        <option></option>
                        <option value="SI" {{ $exconsumidor_alcohol=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $exconsumidor_alcohol=='NO'?'selected':'' }}>NO</option>
                    </select>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_abastecimiento_alcohol" name="tiempo_abastecimiento_alcohol" value="{{ old('tiempo_abastecimiento_alcohol',$ficha->tiempo_abastecimiento_alcohol??'') }}" class="form-control @error('tiempo_abastecimiento_alcohol') is-invalid @enderror">
                        <label for="tiempo_abastecimiento_alcohol" class="active">Meses</label>
                    </div>
                </td>
            </tr>
            <script>
                function selecionarAlcohol(arg){
                    if($(arg).val()=='SI'){
                        $('#exconsumidor_alcohol').attr('disabled', true);
                        $('#tiempo_abastecimiento_alcohol').prop('disabled', true);
                        
                        $('#tiempo_consumo_alcohol').attr('disabled',false);
                        $('#cantidad_alcohol').attr('disabled',false);

                    }else{
                        $('#exconsumidor_alcohol').attr('disabled', false);
                        $('#tiempo_abastecimiento_alcohol').prop('disabled', false);

                        $('#tiempo_consumo_alcohol').attr('disabled',true);
                        $('#cantidad_alcohol').attr('disabled',true);

                    }
                }
            </script>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="otras_drogas">Otras drogas</label>
                        @php($otras_drogas=$ficha->otras_drogas??'')
                        <select class="form-control" id="otras_drogas" name="otras_drogas" onchange="seleccionarDrogas(this);" >
                            
                            <option></option>
                            <option value="SI" {{ $otras_drogas=='SI'?'selected':'' }}>SI</option>
                            <option value="NO" {{ $otras_drogas=='NO'?'selected':'' }}>NO</option>
                        </select>
                    </div>
                    
                    <div class="form-group" id="selecionar_drogas" style="display: {{ $otras_drogas?'':'none' }};">
                        <label for="cual_droga">¿CUÁL?</label>
                        <select class="form-control" id="cual_droga" name="cual_droga">
                            @php($cual_droga=$ficha->cual_droga??'')        
                            <option></option>
                            <option value="Anfetaminas (Speed)" {{ $cual_droga=='Anfetaminas (Speed)'?'selected':'' }}>Anfetaminas (Speed)</option>
                            <option value="Bade de Cocaína" {{ $cual_droga=='Bade de Cocaína'?'selected':'' }}>Bade de Cocaína</option>
                            <option value="Cannabis (Hachís marihuana)" {{ $cual_droga=='Cannabis (Hachís marihuana)'?'selected':'' }}>Cannabis (Hachís marihuana)</option>
                            <option value="Cocaína" {{ $cual_droga=='Cocaína'?'selected':'' }}>Cocaína</option>
                            <option value="Drogas de Síntesis (Éxtasis, MDMA, Ketamina)" {{ $cual_droga=='Drogas de Síntesis (Éxtasis, MDMA, Ketamina)'?'selected':'' }}>Drogas de Síntesis (Éxtasis, MDMA, Ketamina)</option>
                            <option value="Hongos" {{ $cual_droga=='Hongos'?'selected':'' }}>Hongos</option>
                            <option value="Inhalantes" {{ $cual_droga=='Inhalantes'?'selected':'' }}>Inhalantes</option>
                            <option value="L.S.D" {{ $cual_droga=='L.S.D'?'selected':'' }}>L.S.D</option>
                            <option value="Mezcalina" {{ $cual_droga=='Mezcalina'?'selected':'' }}>Mezcalina</option>
                            <option value="Opiácios (Opio, Heroína, Morfina, Metadona)" {{ $cual_droga=='Opiácios (Opio, Heroína, Morfina, Metadona)'?'selected':'' }}>Opiácios (Opio, Heroína, Morfina, Metadona)</option>
                            <option value="Psilocibina" {{ $cual_droga=='Psilocibina'?'selected':'' }}>Psilocibina</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_consumo_otras_drogas" name="tiempo_consumo_otras_drogas" value="{{ old('tiempo_consumo_otras_drogas',$ficha->tiempo_consumo_otras_drogas??'') }}" class="form-control @error('tiempo_consumo_otras_drogas') is-invalid @enderror">
                        <label for="tiempo_consumo_otras_drogas" class="active">Meses</label>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_otras_drogas" name="cantidad_otras_drogas" value="{{ old('cantidad_otras_drogas',$ficha->cantidad_otras_drogas??'') }}" class="form-control @error('cantidad_otras_drogas') is-invalid @enderror">
                        <label for="cantidad_otras_drogas"></label>
                    </div>
                </td>
                <td>
                    <select class="form-control mt-4" id="exconsumidor_otras_drogas" name="exconsumidor_otras_drogas">
                        @php($exconsumidor_otras_drogas=$ficha->exconsumidor_otras_drogas??'')
                        <option></option>
                        <option value="SI" {{ $exconsumidor_otras_drogas=='SI'?'selected':'' }}>SI</option>
                        <option value="NO" {{ $exconsumidor_otras_drogas=='NO'?'selected':'' }}>NO</option>
                    </select>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_abastecimiento_otras_drogas" name="tiempo_abastecimiento_otras_drogas" value="{{ old('tiempo_abastecimiento_otras_drogas',$ficha->tiempo_abastecimiento_otras_drogas??'') }}" class="form-control @error('tiempo_abastecimiento_otras_drogas') is-invalid @enderror">
                        <label for="tiempo_abastecimiento_otras_drogas" class="active">Meses</label>
                    </div>
                </td>
            </tr>
            <script>
                function seleccionarDrogas(arg){
                    if($(arg).val()=='SI'){
                     
                        $('#exconsumidor_otras_drogas').attr('disabled', true);
                        $('#tiempo_abastecimiento_otras_drogas').prop('disabled', true);
                    // $('#selecionar_drogas').prop('disabled', true);
                        $('#tiempo_consumo_otras_drogas').attr('disabled',false);
                        $('#cantidad_otras_drogas').attr('disabled',false);
                        $('#selecionar_drogas').show();
                    }else{
                        $('#exconsumidor_otras_drogas').attr('disabled', false);
                        $('#tiempo_abastecimiento_otras_drogas').prop('disabled', false);

                        $('#tiempo_consumo_otras_drogas').attr('disabled',true);
                        $('#cantidad_otras_drogas').attr('disabled',true);
                        $('#selecionar_drogas').hide();
                    }
                }
            </script>
        </tbody>
    </table>

</div>