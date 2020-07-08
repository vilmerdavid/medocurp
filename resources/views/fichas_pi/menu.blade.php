<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
      <a class="nav-link" id="menu_empresa_usuario" href="{{ route('editarFichaPI',$ficha->id) }}">EMPRESA Y USUARIO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="mene_assis" href="{{ route('detalleFichaPI',$ficha->id) }}">ASSIST V3.0</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu_antecedente_trabajo" href="{{ route('antecedentesTrabajo',$ficha->id) }}">TRABAJO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="menu" href="#">Otros</a>
    </li>
  </ul>