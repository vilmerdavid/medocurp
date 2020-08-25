<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarPuesto',$puesto->id) }}" data-msg="{{ $puesto->nombre }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar">
        <i class="fas fa-trash"></i>
    </button>
</div>