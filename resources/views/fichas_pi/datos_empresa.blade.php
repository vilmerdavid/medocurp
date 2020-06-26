<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <tr>
            <th scope="col" colspan="5">
                <img src="{{ Storage::url($emp->logo) }}" alt="" class="img-fluid">
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
                        <input type="text" id="historia_clinica_ci" name="historia_clinica_ci" value="{{ old('historia_clinica_ci') }}" class="form-control @error('historia_clinica_ci') is-invalid @enderror"  required>
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
                        <input type="text" id="numero_archivo" name="numero_archivo" value="{{ old('numero_archivo') }}" class="form-control @error('numero_archivo') is-invalid @enderror"  required>
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
                    <input type="text" id="apellido_uno" name="apellido_uno" value="{{ old('apellido_uno') }}" class="form-control @error('apellido_uno') is-invalid @enderror"  required>
                    <label for="apellido_uno">Primer apellido</label>
                    @error('apellido_uno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0 col">
                    <input type="text" id="apellido_dos" name="apellido_dos" value="{{ old('apellido_dos') }}" class="form-control @error('apellido_dos') is-invalid @enderror">
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
                    <input type="text" id="nombre_uno" name="nombre_uno" value="{{ old('nombre_uno') }}" class="form-control @error('nombre_uno') is-invalid @enderror"  required>
                    <label for="nombre_uno">Primer nombre</label>
                    @error('nombre_uno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0 col">
                    <input type="text" id="nombre_dos" name="nombre_dos" value="{{ old('nombre_dos') }}" class="form-control @error('nombre_dos') is-invalid @enderror">
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
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </td>
            <td>
                <div class="md-form md-outline my-0">
                    <input type="number" id="edad" name="edad" value="{{ old('edad') }}" class="form-control @error('edad') is-invalid @enderror" required>
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
                    <option value="Casado">Casado</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Vuido">Vuido</option>
                    <option value="Unión libre">Unión libre</option>
                    <option value="Divorciado">Divorciado</option>
                </select>
            </td>
            <td>
                <select class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion" required>
                    <option value="Católica">Católica</option>
                    <option value="Evangélica">Evangélica</option>
                    <option value="Testigo de Jehova">Testigo de Jehova</option>
                    <option value="Mormona">Mormona</option>
                    <option value="Otras">Otras</option>
                </select>
            </td>
            <td>
                <select class="form-control @error('grupo_sanguineo') is-invalid @enderror" id="grupo_sanguineo" name="grupo_sanguineo" required>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="N.S">N.S</option>
                </select>
            </td>
            <td>
                
                <select class="form-control @error('lateralidad') is-invalid @enderror" id="lateralidad" name="lateralidad" required>
                    <option value="Derecho">Derecho</option>
                    <option value="Izquierdo">Izquierdo</option>
                    <option value="Ambidiestro">Ambidiestro</option>
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
                    <option value="Heterosexual">Heterosexual</option>
                    <option value="Gay">Gay</option>
                    <option value="Lesbiana">Lesbiana</option>
                    <option value="Bisexual">Bisexual</option>
                    <option value="No sabe">No sabe</option>
                    <option value="No responde">No responde</option>
                </select>
                </td>
                <td>
                <select class="form-control @error('identidad_genero') is-invalid @enderror" id="identidad_genero" name="identidad_genero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Transfemenino">Transfemenino</option>
                    <option value="Transmasculino">Transmasculino</option>
                    <option value="Ninguno">Ninguno</option>
                    <option value="No responde">No responde</option>
                    <option value="No sabe">No sabe</option>
                </select>
                </td>
                <td>
                <select class="form-control @error('discapacidad') is-invalid @enderror" id="discapacidad" name="discapacidad" onchange="mostrarPorcentajeDiscapacidad(this);" required>
                    <option value="NO">NO</option>
                    <option value="Auditiva">Auditiva</option>
                    <option value="Física">Física</option>
                    <option value="Intelectual">Intelectual</option>
                    <option value="Lenguaje">Lenguaje</option>
                    <option value="Psicosocial">Psicosocial</option>
                </select>
                
                <div class="md-form md-outline my-2" style="display: none;" id="porcentaje_discapacidad_text">
                    <input type="number" id="porcentaje_discapacidad" name="porcentaje_discapacidad" value="{{ old('porcentaje_discapacidad') }}" class="form-control @error('porcentaje_discapacidad') is-invalid @enderror">
                    <label for="porcentaje_discapacidad">Porcentaje</label>
                    @error('porcentaje_discapacidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                </td>
                <td>
                    <input type="date" id="fecha_ingreso_trabajo" name="fecha_ingreso_trabajo" value="{{ old('fecha_ingreso_trabajo') }}" class="form-control @error('fecha_ingreso_trabajo') is-invalid @enderror" required>
                </td>
                <td>
                    <input type="text" id="puesto_trabajo" name="puesto_trabajo" value="{{ old('puesto_trabajo') }}" class="form-control @error('puesto_trabajo') is-invalid @enderror" required>
                </td>
                <td>
                @if (count($emp->areaTrabajos_m)>0)
                <select class="form-control @error('area_trabajo') is-invalid @enderror" id="area_trabajo" name="area_trabajo" required>
                    @foreach ($emp->areaTrabajos_m as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
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
                    <textarea class="form-control @error('actividades_relevantes') is-invalid @enderror" name="actividades_relevantes" id="actividades_relevantes" required>{{ old('actividades_relevantes','Ninguna') }}</textarea>
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
                    <textarea class="form-control @error('motivo_cosulta') is-invalid @enderror" name="motivo_cosulta" id="motivo_cosulta" required>{{ old('motivo_cosulta','Ninguna') }}</textarea>
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
                        <textarea class="form-control @error('antecedentes_clinicos') is-invalid @enderror" name="antecedentes_clinicos" id="antecedentes_clinicos" required>{{ old('antecedentes_clinicos','Ninguna') }}</textarea>
                        <label for="antecedentes_clinicos">ANTECEDENTES PATOLÓGICOS CLÍNICOS</label>
                    </div>
                    <div class="md-form md-outline my-0">
                        <textarea class="form-control @error('antecedentes_quirurgicos') is-invalid @enderror" name="antecedentes_quirurgicos" id="antecedentes_quirurgicos" required>{{ old('antecedentes_quirurgicos','Ninguna') }}</textarea>
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
                            <option></option>
                            <option value="SI">SI</option>
                        <option value="NO">NO</option>
                        </select>
                    </div>
                </td>
                
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_consumo_tabaco" name="tiempo_consumo_tabaco" value="{{ old('tiempo_consumo_tabaco') }}" class="form-control @error('tiempo_consumo_tabaco') is-invalid @enderror">
                        <label for="tiempo_consumo_tabaco">Meses</label>
                    </div>
                </td>
    
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_tabaco" name="cantidad_tabaco" value="{{ old('cantidad_tabaco') }}" class="form-control @error('cantidad_tabaco') is-invalid @enderror">
                        <label for="tiempo_consumo_tabaco"></label>
                    </div>
                </td>
                <td>
                    <select class="form-control mt-4" id="exconsumidor_tabaco" name="exconsumidor_tabaco">
                        <option></option>
                        <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    </select>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_abastecimiento_tabaco" name="tiempo_abastecimiento_tabaco" value="{{ old('tiempo_abastecimiento_tabaco') }}" class="form-control @error('tiempo_abastecimiento_tabaco') is-invalid @enderror">
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
                        <select class="form-control" id="alcohol" name="alcohol">
                            <option></option>
                            <option value="SI">SI</option>
                        <option value="NO">NO</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_consumo_alcohol" name="tiempo_consumo_alcohol" value="{{ old('tiempo_consumo_alcohol') }}" class="form-control @error('tiempo_consumo_alcohol') is-invalid @enderror">
                        <label for="tiempo_consumo_alcohol">Meses</label>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_alcohol" name="cantidad_alcohol" value="{{ old('cantidad_alcohol') }}" class="form-control @error('cantidad_alcohol') is-invalid @enderror">
                        <label for="cantidad_alcohol"></label>
                    </div>
                </td>
                <td>
                    <select class="form-control mt-4" id="exconsumidor_alcohol" name="exconsumidor_alcohol">
                        <option></option>
                        <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    </select>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_abastecimiento_alcohol" name="tiempo_abastecimiento_alcohol" value="{{ old('tiempo_abastecimiento_alcohol') }}" class="form-control @error('tiempo_abastecimiento_alcohol') is-invalid @enderror">
                        <label for="tiempo_abastecimiento_alcohol">Meses</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="otras_drogas">Otras drogas</label>
                        <select class="form-control" id="otras_drogas" name="otras_drogas" onchange="mostrarOtrasDrogas(this);">
                            <option></option>
                            <option value="SI">SI</option>
                        <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="form-group" id="selecionar_drogas" style="display: none;">
                        <label for="cual_droga">¿CUÁL?</label>
                        <select class="form-control" id="cual_droga" name="cual_droga">
                            <option></option>
                            <option value="Anfetaminas (Speed)">Anfetaminas (Speed)</option>
                            <option value="Bade de Cocaína">Bade de Cocaína</option>
                            <option value="Cannabis (Hachís marihuana)">Cannabis (Hachís marihuana)</option>
                            <option value="Cocaína">Cocaína</option>
                            <option value="Drogas de Síntesis (Éxtasis, MDMA, Ketamina)">Drogas de Síntesis (Éxtasis, MDMA, Ketamina)</option>
                            <option value="Hongos">Hongos</option>
                            <option value="Inhalantes">Inhalantes</option>
                            <option value="L.S.D">L.S.D</option>
                            <option value="Mezcalina">Mezcalina</option>
                            <option value="Opiácios (Opio, Heroína, Morfina, Metadona)">Opiácios (Opio, Heroína, Morfina, Metadona)</option>
                            <option value="Psilocibina">Psilocibina</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_consumo_otras_drogas" name="tiempo_consumo_otras_drogas" value="{{ old('tiempo_consumo_otras_drogas') }}" class="form-control @error('tiempo_consumo_otras_drogas') is-invalid @enderror">
                        <label for="tiempo_consumo_otras_drogas">Meses</label>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="cantidad_otras_drogas" name="cantidad_otras_drogas" value="{{ old('cantidad_otras_drogas') }}" class="form-control @error('cantidad_otras_drogas') is-invalid @enderror">
                        <label for="cantidad_otras_drogas"></label>
                    </div>
                </td>
                <td>
                    <select class="form-control mt-4" id="exconsumidor_otras_drogas" name="exconsumidor_otras_drogas">
                        <option></option>
                        <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    </select>
                </td>
                <td>
                    <div class="md-form md-outline">
                        <input type="number" id="tiempo_abastecimiento_otras_drogas" name="tiempo_abastecimiento_otras_drogas" value="{{ old('tiempo_abastecimiento_otras_drogas') }}" class="form-control @error('tiempo_abastecimiento_otras_drogas') is-invalid @enderror">
                        <label for="tiempo_abastecimiento_otras_drogas">Meses</label>
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
                            <option></option>
                            <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_fisica_uno" name="cual_que_actividad_fisica_uno" value="{{ old('cual_que_actividad_fisica_uno') }}" class="form-control @error('cual_que_actividad_fisica_uno') is-invalid @enderror">
                        <label for="cual_que_actividad_fisica_uno">¿Cuál?</label>
                    </div>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_fisica_dos" name="cual_que_actividad_fisica_dos" value="{{ old('cual_que_actividad_fisica_dos') }}" class="form-control @error('cual_que_actividad_fisica_dos') is-invalid @enderror">
                        <label for="cual_que_actividad_fisica_dos">¿Cuál?</label>
                    </div>
                </td>
                <td>
                    <select class="form-control" id="tiempo_cantidad_actividad_fisica_uno" name="tiempo_cantidad_actividad_fisica_uno">
                        <option></option>
                        <option value="< 3 d/semana"> < 3 d/semana</option>
                        <option value="3 o más d/semana">3 o más d/semana</option>
                    </select>
                    <br>
                    <select class="form-control" id="tiempo_cantidad_actividad_fisica_dos" name="tiempo_cantidad_actividad_fisica_dos">
                        <option></option>
                        <option value="< 3 d/semana"> < 3 d/semana</option>
                        <option value="3 o más d/semana">3 o más d/semana</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="mediacion_habitual">Medicación habitual</label>
                        <select class="form-control" id="mediacion_habitual" name="mediacion_habitual">
                            <option></option>
                            <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_mediacion_habitual_uno" name="cual_que_actividad_mediacion_habitual_uno" value="{{ old('cual_que_actividad_mediacion_habitual_uno') }}" class="form-control @error('cual_que_actividad_mediacion_habitual_uno') is-invalid @enderror">
                        <label for="cual_que_actividad_mediacion_habitual_uno">¿Cuál?</label>
                    </div>
                    
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_actividad_mediacion_habitual_dos" name="cual_que_actividad_mediacion_habitual_dos" value="{{ old('cual_que_actividad_mediacion_habitual_dos') }}" class="form-control @error('cual_que_actividad_mediacion_habitual_dos') is-invalid @enderror">
                        <label for="cual_que_actividad_mediacion_habitual_dos">¿Cuál?</label>
                    </div>
                
                </td>
                <td>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="tiempo_mediacion_habitual_uno" name="tiempo_mediacion_habitual_uno" value="{{ old('tiempo_mediacion_habitual_uno') }}" class="form-control @error('tiempo_mediacion_habitual_uno') is-invalid @enderror">
                        <label for="tiempo_mediacion_habitual_uno">Tiempo</label>
                    </div>
                    
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="tiempo_mediacion_habitual_dos" name="tiempo_mediacion_habitual_dos" value="{{ old('tiempo_mediacion_habitual_dos') }}" class="form-control @error('tiempo_mediacion_habitual_dos') is-invalid @enderror">
                        <label for="tiempo_mediacion_habitual_dos">Tiempo</label>
                    </div>

                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group">
                        <label for="alergias">Alergias</label>
                        <select class="form-control" id="alergias" name="alergias">
                            <option></option>
                            <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                    </div>
                </td>
                <td colspan="2">
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_alergias_uno" name="cual_que_alergias_uno" value="{{ old('cual_que_alergias_uno') }}" class="form-control @error('cual_que_alergias_uno') is-invalid @enderror">
                        <label for="cual_que_alergias_uno">¿Cuál?</label>
                    </div>
                    <div class="md-form md-outline mt-0">
                        <input type="text" id="cual_que_alergias_dos" name="cual_que_alergias_dos" value="{{ old('cual_que_alergias_dos') }}" class="form-control @error('cual_que_alergias_dos') is-invalid @enderror">
                        <label for="cual_que_alergias_dos">¿Cuál?</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="md-form md-outline mt-0">
                        <textarea id="observacion_estilo_vida" name="observacion_estilo_vida" class="form-control @error('observacion_estilo_vida') is-invalid @enderror"></textarea>
                        <label for="observacion_estilo_vida">Observaciones</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>