<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    
    <button type="button" onclick="location.href='{{ route('detalleFichaPI',$fi->id) }}'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Detalle">
        <i class="fas fa-edit"></i>
    </button>
    
    <button type="button" onclick="location.href='{{ route('detalleFichaPI',$fi->id) }}'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Informe">
        <i class="fas fa-edit"></i>
    </button>
</div>