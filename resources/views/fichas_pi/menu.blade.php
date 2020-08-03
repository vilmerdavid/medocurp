<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
      <a class="nav-link" id="menu_empresa_usuario" href="{{ route('editarFichaPI',$ficha->id) }}">EMPRESA Y USUARIO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="mene_assis" href="{{ route('detalleFichaPI',$ficha->id) }}">TEST</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu_antecedente_trabajo" href="{{ route('antecedentesTrabajo',$ficha->id) }}">TRABAJO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu_patologicos" href="{{ route('antecedentesPatologicos',$ficha->id) }}">PATOLÓGICOS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu_riesgos" href="{{ route('factoresRiesgos',$ficha->id) }}">RIESGOS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu_actividades" href="{{ route('actividadesExtralaborales',$ficha->id) }}">ACTIVIDADES EXTRALABORALES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu_revisiones" href="{{ route('revisionOrganosSistemas',$ficha->id) }}">
        R. ÓRGANOS Y SISTEMAS
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="menu_constantes" href="{{ route('constantes',$ficha->id) }}">
        J. CONSTANTES V.A
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" id="menu_resultados_generales" href="{{ route('resultadosGenerales',$ficha->id) }}">
        L. RESULTADOS EX.G
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" id="menu_diagnostico" href="{{ route('diagnosticos',$ficha->id) }}">
        M. DIAGNÓSTICO
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="menu_aptitudes_medicas" href="{{ route('aptitudesMedicas',$ficha->id) }}">
        N. APTITUD M
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="menu_score" href="{{ route('scores',$ficha->id) }}">
        SCORE DE FARMINGHAM
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="menu_certificado_medico" href="{{ route('certificadoMedico',$ficha->id) }}">
        CERTIFICADO MÉDICO
      </a>
    </li>

  </ul>