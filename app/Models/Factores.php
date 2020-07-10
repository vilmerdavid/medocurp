<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factores extends Model
{
    public function riesgos_m()
    {
        return $this->belongsToMany(Riesgo::class, 'factoritems', 'factores_id', 'riesgos_id')->withPivot('valor','id');
    }

    public function fichaPI_m()
    {
        return $this->belongsTo(FichaPI::class,'ficha_p_i_id');
    }
}
