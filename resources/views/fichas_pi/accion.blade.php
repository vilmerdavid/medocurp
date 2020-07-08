<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    
    <button type="button" onclick="location.href='{{ route('editarFichaPI',$fi->id) }}'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
        <i class="fas fa-edit"></i>
    </button>
    
    <button type="button" onclick="location.href='{{ route('detalleFichaPI',$fi->id) }}'" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Test e Informe">
        <i class="fas fa-vial"></i>
    </button>
</div>