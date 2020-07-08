
@if ($opcion=='editar')
    
    <button type="button" onclick="cambiarEmpresa(this);" data-id="{{ $emp->id }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Selecione empresa">
        <i class="fas fa-hand-pointer"></i>    
    </button>
    
@else
    <a href="{{ route('crearFichaPI',$emp->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Selecione empresa">
        <i class="fas fa-hand-pointer"></i>
    </a>
@endif