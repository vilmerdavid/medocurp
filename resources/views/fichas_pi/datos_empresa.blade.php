<table class="table table-bordered">
  <thead>
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
  </thead>
  <tbody>
   
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
                <input type="text" id="historia_clinica_ci" name="historia_clinica_ci" value="{{ old('historia_clinica_ci') }}" class="form-control @error('historia_clinica_ci') is-invalid @enderror"  required autofocus>
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
<table class="table table-bordered">
    <thead class="grey lighten-2">
      <tr>
        <th scope="col">APELLIDOS</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">SEXO</th>
        <th scope="col">ESTADO CÍVIL</th>
        <th scope="col">RELIGIÓN</th>
        <th scope="col">GRUPO SANGUÍNEO</th>
        <th scope="col">LATERALIDAD</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form md-outline my-0">
                        <input type="text" id="apellido_uno" name="apellido_uno" value="{{ old('apellido_uno') }}" class="form-control @error('apellido_uno') is-invalid @enderror"  required>
                        <label for="apellido_uno">Primer apellido</label>
                        @error('apellido_uno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form md-outline my-0">
                        <input type="text" id="apellido_dos" name="apellido_dos" value="{{ old('apellido_dos') }}" class="form-control @error('apellido_dos') is-invalid @enderror">
                        <label for="apellido_dos">Segundo apellido</label>
                        @error('apellido_dos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form md-outline my-0">
                        <input type="text" id="nombre_uno" name="nombre_uno" value="{{ old('nombre_uno') }}" class="form-control @error('nombre_uno') is-invalid @enderror"  required>
                        <label for="nombre_uno">Primer nombre</label>
                        @error('nombre_uno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form md-outline my-0">
                        <input type="text" id="nombre_dos" name="nombre_dos" value="{{ old('nombre_dos') }}" class="form-control @error('nombre_dos') is-invalid @enderror">
                        <label for="nombre_dos">Segundo nombre</label>
                        @error('nombre_dos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </td>
        <td>
            <select class="form-control @error('sexo') is-invalid @enderror" name="sexo" id="sexo" onchange="cargarAntecedentes(this)" required>
                <option>Hombre</option>
                <option>Mujer</option>
            </select>
        </td>
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
          <th colspan="2">
            ÁREA DE TRABAJO
          </th>
      </tr>
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
            <input type="date" id="fecha_ingreso_trabajo" name="fecha_ingreso_trabajo" value="{{ old('fecha_ingreso_trabajo') }}" class="form-control @error('fecha_ingreso_trabajo') is-invalid @enderror">
          </td>
          <td>
            <input type="text" id="puesto_trabajo" name="puesto_trabajo" value="{{ old('puesto_trabajo') }}" class="form-control @error('puesto_trabajo') is-invalid @enderror">
          </td>
          <td colspan="2">
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

      <tr class="grey lighten-2 text-center">
          <th colspan="7">
              ACTIVIDADES RELEVANTES AL PUESTO DE TRABAJO A OCUPAR
          </th>
      </tr>
      <tr>
        <td colspan="7">
            <div class="md-form md-outline my-0">
                <textarea class="form-control" name="actividades_relevantes" id="actividades_relevantes" required></textarea>
                <label for="actividades_relevantes">Actividades</label>
              </div>
          </td>
      </tr>

      <tr class="grey text-center">
        <th colspan="7">
            B. MOTIVO DE CONSULTA
        </th>
    </tr>
    <tr>
      <td colspan="7">
          <div class="md-form md-outline my-0">
              <textarea class="form-control" name="motivo_cosulta" id="motivo_cosulta" required></textarea>
              <label for="motivo_cosulta">Motivos</label>
            </div>
        </td>
    </tr>

    <tr class="grey text-center">
        <th colspan="7">
            C. ANTECEDENTES PERSONALES
        </th>
    </tr>
   
    <tr>
        <td colspan="7">
            <div class="md-form md-outline my-0">
                <textarea class="form-control" name="antecedentes_clinicos" id="antecedentes_clinicos" required></textarea>
                <label for="antecedentes_clinicos">ANTECEDENTES PATOLÓGICOS CLÍNICOS</label>
              </div>
              <div class="md-form md-outline my-0">
                <textarea class="form-control" name="antecedentes_quirurgicos" id="antecedentes_quirurgicos" required></textarea>
                <label for="antecedentes_quirurgicos">ANTECEDENTES PATOLÓGICOS QUIRÚRGICOS</label>
              </div>
          </td>
      </tr>
      
    </tbody>
</table>

<table class="table table-bordered" id="antecedentes">

</table>

<script>
    $('#antecedentes').load("{{ route('cargarAntecedentesHombre') }}");
</script>
