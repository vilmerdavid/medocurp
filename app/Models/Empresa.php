<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    // la empresa tien varios areas de trabajo
    public function areaTrabajos_m()
    {
        return $this->hasMany(AreaTrabajo::class);
    }
}
