<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" onclick="location.href='{{ route('editarEmpresa',$emp->id) }}'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
        <i class="fas fa-edit"></i>
    </button>
    <button type="button" onclick="location.href='{{ route('areas',$emp->id) }}'" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Áreas de trabajo">
        <i class="fas fa-table"></i>
    </button>
    <button type="button" onclick="location.href='{{ route('puestos',$emp->id) }}'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Puesto de trabajo">
        <i class="fas fa-archive"></i>
    </button>
    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarEmpresa',$emp->id) }}" data-msg="{{ $emp->nombre }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar">
        <i class="fas fa-trash"></i>
    </button>
</div>