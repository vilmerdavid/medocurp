<?php
namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class PuestoTrabajo extends Model
{
    public function empresa_mt()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
