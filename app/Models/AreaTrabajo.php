<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaTrabajo extends Model
{
    public function empresa_m()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
