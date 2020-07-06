<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAsist extends Model
{
    public function fichaPI_m()
    {
        return $this->belongsTo(FichaPI::class,'ficha_p_i_id');
    }

    public function pregunta_m()
    {
        return $this->belongsTo(Pregunta::class,'pregunta_id');
    }
}
