

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <tr>
            <th scope="col" colspan="5" class="np-logo" style=" width: 30% ;background-image:url({{ Storage::url($emp->logo) }})">
                
            </th>
            <th>
                <strong>Versión: </strong>{{ $emp->version }}
                <hr>
                <strong>Código: </strong>{{ $emp->codigo }}
            </th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>

            <tr class="grey">
                <th scope="row" colspan="6" class="text-center">
                    A. DATOS DEL ESTABLECIMIENTO - EMPRESA Y USUARIO
                </th>
            </tr>
            <tr class="grey lighten-2">
                <th>
                    INSTITUCIÓN DEL SISTEMA O NOMBRE DE LA EMPRESA
                </th>
                <th>  
                    R.U.C
                </th>
                <th>
                    C.I.I.U
                </th>
                <th>
                    ESTABLECIMIENTO DE SALUD
                </th>
                <th>
                    N° DE HISTORÍA CLÍNICA
                </th>
                <th>N° DE ARCHIVO</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>
                    {{ $emp->nombre }}
                </td>
                <td>
                    {{ $emp->ruc }}
                </td>
                <td>
                    {{ $emp->ciiu }}
                </td>
                <td>
                    {{ $emp->establecimiento }}
                </td>
                <td>
                    <div class="md-form md-outline my-0">
                        <input type="text" id="historia_clinica_ci" name="historia_clinica_ci" value="{{ old('historia_clinica_ci',$ficha->user_m->historia_clinica_ci??'') }}" class="form-control @error('historia_clinica_ci') is-invalid @enderror"  required>
                        <label for="historia_clinica_ci">C.I</label>
                        @error('historia_clinica_ci')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline my-0">
                        <input type="text" id="numero_archivo" name="numero_archivo" value="{{ old('numero_archivo',$ficha->user_m->numero_archivo??'') }}" class="form-control @error('numero_archivo') is-invalid @enderror"  required>
                        <label for="numero_archivo">N° DE ARCHIVO</label>
                        @error('numero_archivo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead class="grey lighten-2">
            <tr>
                <th scope="col">APELLIDOS</th>
                <th scope="col">NOMBRES</th>
                <th scope="col" style="width: 10%">SEXO</th>
                <th scope="col" style="width:10%">EDAD</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="form-row">
                <div class="md-form md-outline my-0 col">
                    
                    <input type="text" id="apellido_uno" name="apellido_uno" value="{{ old('apellido_uno',$ficha->user_m->apellido_uno??'') }}" class="form-control @error('apellido_uno') is-invalid @enderror"  required>
                    <label for="apellido_uno">Primer apellido</label>
                    @error('apellido_uno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0 col">
                    <input type="text" id="apellido_dos" name="apellido_dos" value="{{ old('apellido_dos',$ficha->user_m->apellido_dos??'') }}" class="form-control @error('apellido_dos') is-invalid @enderror">
                    <label for="apellido_dos">Segundo apellido</label>
                    @error('apellido_dos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            </td>
            <td>
                <div class="form-row">
                <div class="md-form md-outline my-0 col">
                    <input type="text" id="nombre_uno" name="nombre_uno" value="{{ old('nombre_uno',$ficha->user_m->nombre_uno??'') }}" class="form-control @error('nombre_uno') is-invalid @enderror"  required>
                    <label for="nombre_uno">Primer nombre</label>
                    @error('nombre_uno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0 col">
                    <input type="text" id="nombre_dos" name="nombre_dos" value="{{ old('nombre_dos',$ficha->user_m->nombre_dos??'') }}" class="form-control @error('nombre_dos') is-invalid @enderror">
                    <label for="nombre_dos">Segundo nombre</label>
                    @error('nombre_dos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
            </td>
            
            <td>
                <select class="form-control @error('sexo') is-invalid @enderror" name="sexo" id="sexo" onchange="cargarAntecedentes(this)" required>
                    @php($e_sexo=$ficha->user_m->sexo??'')
                    <option value="Hombre" {{ $e_sexo=='Hombre'?'selected':'' }}>Hombre</option>
                    <option value="Mujer" {{ $e_sexo=='Mujer'?'selected':'' }}>Mujer</option>
                </select>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="number" id="edad" name="edad" value="{{ old('edad',$ficha->user_m->edad??'') }}" class="form-control @error('edad') is-invalid @enderror" required>
                    <label for="edad">Edad</label>
                    @error('edad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </td>
            
        </tr>

        <tr class="grey lighten-2">
            <th scope="col">ESTADO CÍVIL</th>
            <th scope="col">RELIGIÓN</th>
            <th scope="col">GRUPO SANGUÍNEO</th>
            <th scope="col">LATERALIDAD</th>
        </tr>
        <tr>
            <td>
                <select class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil" required>
                    @php($e_estado_civil=$ficha->user_m->estado_civil??'')
                    <option value="Casado" {{ $e_estado_civil=='Casado'?'selected':'' }}>Casado</option>
                    <option value="Soltero" {{ $e_estado_civil=='Soltero'?'selected':'' }}>Soltero</option>
                    <option value="Vuido" {{ $e_estado_civil=='Vuido'?'selected':'' }}>Vuido</option>
                    <option value="Unión libre" {{ $e_estado_civil=='Unión libre'?'selected':'' }}>Unión libre</option>
                    <option value="Divorciado" {{ $e_estado_civil=='Divorciado'?'selected':'' }}>Divorciado</option>
                </select>
            </td>
            <td>
                <select class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion" required>
                    @php($e_religion=$ficha->user_m->religion??'')
                    <option value="Católica" {{ $e_religion=='Católica'?'selected':'' }}>Católica</option>
                    <option value="Evangélica" {{ $e_religion=='Evangélica'?'selected':'' }}>Evangélica</option>
                    <option value="Testigo de Jehova" {{ $e_religion=='Testigo de Jehova'?'selected':'' }}>Testigo de Jehova</option>
                    <option value="Mormona" {{ $e_religion=='Mormona'?'selected':'' }}>Mormona</option>
                    <option value="Otras" {{ $e_religion=='Otras'?'selected':'' }}>Otras</option>
                </select>
            </td>
            <td>
                
                <select class="form-control @error('grupo_sanguineo') is-invalid @enderror" id="grupo_sanguineo" name="grupo_sanguineo" required>
                    @php($e_grupo_sanguineo=$ficha->user_m->grupo_sanguineo??'')
                    <option value="O+" {{ $e_grupo_sanguineo=='O+'?'selected':'' }}>O+</option>
                    <option value="O-" {{ $e_grupo_sanguineo=='O-'?'selected':'' }}>O-</option>
                    <option value="A+" {{ $e_grupo_sanguineo=='A+'?'selected':'' }}>A+</option>
                    <option value="A-" {{ $e_grupo_sanguineo=='A-'?'selected':'' }}>A-</option>
                    <option value="B+" {{ $e_grupo_sanguineo=='B+'?'selected':'' }}>B+</option>
                    <option value="B-" {{ $e_grupo_sanguineo=='B-'?'selected':'' }}>B-</option>
                    <option value="AB+" {{ $e_grupo_sanguineo=='AB+'?'selected':'' }}>AB+</option>
                    <option value="AB-" {{ $e_grupo_sanguineo=='AB-'?'selected':'' }}>AB-</option>
                    <option value="N.S" {{ $e_grupo_sanguineo=='N.S'?'selected':'' }}>N.S</option>
                </select>
            </td>
            <td>
                
                <select class="form-control @error('lateralidad') is-invalid @enderror" id="lateralidad" name="lateralidad" required>
                    @php($e_lateralidad=$ficha->user_m->lateralidad??'')
                    <option value="Derecho" {{ $e_lateralidad=='Derecho'?'selected':'' }}>Derecho</option>
                    <option value="Izquierdo" {{ $e_lateralidad=='Izquierdo'?'selected':'' }}>Izquierdo</option>
                    <option value="Ambidiestro" {{ $e_lateralidad=='Ambidiestro'?'selected':'' }}>Ambidiestro</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="grey lighten-2">
                <th>
                    ORIENTACIÓN SEXUAL
                </th>
                <th>
                    IDENTIDAD DE GÉNERO
                </th>
                <th>
                    DISCAPACIDAD
                </th>
                <th>
                FECHA DE INGRESO AL TRABAJO
                </th>
                <th>
                PUESTO DE TRABAJO
                </th>
                <th>
                ÁREA DE TRABAJO
                </th>
            </tr>
            
        </thead>
        <tbody>
            <tr>
                <td>
                <select class="form-control @error('orientacion_sexual') is-invalid @enderror" id="orientacion_sexual" name="orientacion_sexual" required>
                    @php($e_orientacion_sexual=$ficha->user_m->orientacion_sexual??'')
                    <option value="Heterosexual" {{ $e_orientacion_sexual=='Heterosexual'?'selected':'' }}>Heterosexual</option>
                    <option value="Gay" {{ $e_orientacion_sexual=='Gay'?'selected':'' }}>Gay</option>
                    <option value="Lesbiana" {{ $e_orientacion_sexual=='Lesbiana'?'selected':'' }}>Lesbiana</option>
                    <option value="Bisexual" {{ $e_orientacion_sexual=='Bisexual'?'selected':'' }}>Bisexual</option>
                    <option value="No sabe" {{ $e_orientacion_sexual=='No sabe'?'selected':'' }}>No sabe</option>
                    <option value="No responde" {{ $e_orientacion_sexual=='No responde'?'selected':'' }}>No responde</option>
                    <option value="Homosexual" {{ $e_orientacion_sexual=='Homosexual'?'selected':'' }}>Homosexual</option>
                </select>
                </td>
                <td>
                <select class="form-control @error('identidad_genero') is-invalid @enderror" id="identidad_genero" name="identidad_genero" required>
                    @php($e_identidad_genero=$ficha->user_m->identidad_genero??'')
                    <option value="Masculino" {{ $e_identidad_genero=='Masculino'?'selected':'' }}>Masculino</option>
                    <option value="Femenino" {{ $e_identidad_genero=='Femenino'?'selected':'' }}>Femenino</option>
                    <option value="Transfemenino" {{ $e_identidad_genero=='Transfemenino'?'selected':'' }}>Transfemenino</option>
                    <option value="Transmasculino" {{ $e_identidad_genero=='Transmasculino'?'selected':'' }}>Transmasculino</option>
                    <option value="Ninguno" {{ $e_identidad_genero=='Ninguno'?'selected':'' }}>Ninguno</option>
                    <option value="No responde" {{ $e_identidad_genero=='No responde'?'selected':'' }}>No responde</option>
                    <option value="No sabe" {{ $e_identidad_genero=='No sabe'?'selected':'' }}>No sabe</option>
                </select>
                </td>
                <td>
                <select class="form-control @error('discapacidad') is-invalid @enderror" id="discapacidad" name="discapacidad" onchange="mostrarPorcentajeDiscapacidad(this);" required>
                    @php($e_discapacidad=$ficha->user_m->discapacidad??'')
                    <option value="NO" {{ $e_discapacidad=='NO'?'selected':'' }}>NO</option>
                    <option value="Auditiva" {{ $e_discapacidad=='Auditiva'?'selected':'' }}>Auditiva</option>
                    <option value="Física" {{ $e_discapacidad=='Física'?'selected':'' }}>Física</option>
                    <option value="Intelectual" {{ $e_discapacidad=='Intelectual'?'selected':'' }}>Intelectual</option>
                    <option value="Lenguaje" {{ $e_discapacidad=='Lenguaje'?'selected':'' }}>Lenguaje</option>
                    <option value="Psicosocial" {{ $e_discapacidad=='Psicosocial'?'selected':'' }}>Psicosocial</option>
                </select>
                
                <div class="md-form md-outline my-2" style="display: none;" id="porcentaje_discapacidad_text">
                    <input type="number" id="porcentaje_discapacidad" name="porcentaje_discapacidad" value="{{ old('porcentaje_discapacidad',$ficha->user_m->porcentaje_discapacidad??'') }}" class="form-control @error('porcentaje_discapacidad') is-invalid @enderror">
                    <label for="porcentaje_discapacidad">Porcentaje</label>
                    @error('porcentaje_discapacidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                </td>
                <td>
                    <input type="date" id="fecha_ingreso_trabajo" name="fecha_ingreso_trabajo" value="{{ old('fecha_ingreso_trabajo',$ficha->user_m->fecha_ingreso_trabajo??'') }}" class="form-control @error('fecha_ingreso_trabajo') is-invalid @enderror" required>
                </td>
                <td>
                    <input type="text" id="puesto_trabajo" name="puesto_trabajo" value="{{ old('puesto_trabajo',$ficha->user_m->puesto_trabajo??'') }}" class="form-control @error('puesto_trabajo') is-invalid @enderror" required>
                </td>
                <td>
                @if (count($emp->areaTrabajos_m)>0)
                <select class="form-control @error('area_trabajo') is-invalid @enderror" id="area_trabajo" name="area_trabajo" required>
                    @foreach ($emp->areaTrabajos_m as $area)
                        @php($e_area_trabajo=$ficha->area_trabajo_id??'')
                        <option value="{{ $area->id }}" {{ $e_area_trabajo==$area->id?'selected':'' }}>{{ $area->nombre }}</option>
                    @endforeach
                </select>
                @else
                <div class="alert alert-info" role="alert">
                    <strong>Empresa sin áreas</strong>
                </div>
                @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead class="grey lighten-2">
        <tr class="grey lighten-2 text-center">
            <th>
                ACTIVIDADES RELEVANTES AL PUESTO DE TRABAJO A OCUPAR
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="md-form md-outline my-0">
                    <textarea class="form-control @error('actividades_relevantes') is-invalid @enderror" name="actividades_relevantes" id="actividades_relevantes" required>{{ old('actividades_relevantes',$ficha->actividades_relevantes??'Ninguna') }}</textarea>
                    <label for="actividades_relevantes">Actividades</label>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="grey text-center">
                <th colspan="7">
                    B. MOTIVO DE CONSULTA
                </th>
            </tr>
        </thead>
        <tbody>
            <td colspan="7">
                <div class="md-form md-outline my-0">
                    <textarea class="form-control @error('motivo_cosulta') is-invalid @enderror" name="motivo_cosulta" id="motivo_cosulta" required>{{ old('motivo_cosulta',$ficha->motivo_cosulta??'Ninguna') }}</textarea>
                    <label for="motivo_cosulta">Motivos</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
      
<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="grey text-center">
                <th colspan="7">
                    C. ANTECEDENTES PERSONALES
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7">
                    <div class="md-form md-outline my-0">
                        <textarea class="form-control @error('antecedentes_clinicos') is-invalid @enderror" name="antecedentes_clinicos" id="antecedentes_clinicos" required>{{ old('antecedentes_clinicos',$ficha->antecedentes_clinicos??'Ninguna') }}</textarea>
                        <label for="antecedentes_clinicos">ANTECEDENTES PATOLÓGICOS CLÍNICOS</label>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <div class="md-form md-outline my-0">
                        <textarea class="form-control @error('antecedentes_quirurgicos') is-invalid @enderror" name="antecedentes_quirurgicos" id="antecedentes_quirurgicos" required>{{ old('antecedentes_quirurgicos',$ficha->antecedentes_quirurgicos??'Ninguna') }}</textarea>
                        <label for="antecedentes_quirurgicos">ANTECEDENTES PATOLÓGICOS QUIRÚRGICOS</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    

<div class="table-responsive" id="antecedentes">

</div>

{{-- habitos toxicos --}}
<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="grey text-center">
                <th colspan="5">HÁBITOS TÓXICOS</th>
            
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
                        <label for="tiempo_consumo_tabaco">Meses</label>
                    </div>
                </td>
    
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_tabaco" name="cantidad_tabaco" value="{{ old('cantidad_tabaco',$ficha->cantidad_tabaco??'') }}" class="form-control @error('cantidad_tabaco') is-invalid @enderror">
                        <label for="tiempo_consumo_tabaco"></label>
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
                        <label for="tiempo_abastecimiento_tabaco">Meses</label>
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
                        <label for="tiempo_consumo_alcohol">Meses</label>
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
                        <label for="tiempo_abastecimiento_alcohol">Meses</label>
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
                        <label for="tiempo_consumo_otras_drogas">Meses</label>
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
                        <label for="tiempo_abastecimiento_otras_drogas">Meses</label>
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
                        <label for="cual_que_actividad_fisica_uno">¿Cuál?</label>
                    </div>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_fisica_dos" name="cual_que_actividad_fisica_dos" value="{{ old('cual_que_actividad_fisica_dos',$ficha->cual_que_actividad_fisica_dos??'') }}" class="form-control @error('cual_que_actividad_fisica_dos') is-invalid @enderror">
                        <label for="cual_que_actividad_fisica_dos">¿Cuál?</label>
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
                        <label for="cual_que_actividad_mediacion_habitual_uno">¿Cuál?</label>
                    </div>
                    
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_mediacion_habitual_dos" name="cual_que_actividad_mediacion_habitual_dos" value="{{ old('cual_que_actividad_mediacion_habitual_dos',$ficha->cual_que_actividad_mediacion_habitual_dos??'') }}" class="form-control @error('cual_que_actividad_mediacion_habitual_dos') is-invalid @enderror">
                        <label for="cual_que_actividad_mediacion_habitual_dos">¿Cuál?</label>
                    </div>
                
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="tiempo_mediacion_habitual_uno" name="tiempo_mediacion_habitual_uno" value="{{ old('tiempo_mediacion_habitual_uno',$ficha->tiempo_mediacion_habitual_uno??'') }}" class="form-control @error('tiempo_mediacion_habitual_uno') is-invalid @enderror">
                        <label for="tiempo_mediacion_habitual_uno">Tiempo</label>
                    </div>
                    
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="tiempo_mediacion_habitual_dos" name="tiempo_mediacion_habitual_dos" value="{{ old('tiempo_mediacion_habitual_dos',$ficha->tiempo_mediacion_habitual_dos??'') }}" class="form-control @error('tiempo_mediacion_habitual_dos') is-invalid @enderror">
                        <label for="tiempo_mediacion_habitual_dos">Tiempo</label>
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
                        <label for="cual_que_alergias_uno">¿Cuál?</label>
                    </div>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_alergias_dos" name="cual_que_alergias_dos" value="{{ old('cual_que_alergias_dos',$ficha->cual_que_alergias_dos??'') }}" class="form-control @error('cual_que_alergias_dos') is-invalid @enderror">
                        <label for="cual_que_alergias_dos">¿Cuál?</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="md-form md-outline mt-0">
                        <textarea id="observacion_estilo_vida" name="observacion_estilo_vida" class="form-control @error('observacion_estilo_vida') is-invalid @enderror">{{ old('observacion_estilo_vida',$ficha->observacion_estilo_vida??'') }}</textarea>
                        <label for="observacion_estilo_vida">Observaciones</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>