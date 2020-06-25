<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestFagerstorm extends Model
{
    
    public function fichaPI_m()
    {
        return $this->belongsTo(FichaPI::class,'ficha_p_i_id');
    }
}
