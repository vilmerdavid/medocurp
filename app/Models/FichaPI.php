<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaPI extends Model
{
    public function testFagerstom_m()
    {
        return $this->hasOne(TestFagerstorm::class,'ficha_p_i_id');
    }


    public function testCage_m()
    {
        return $this->hasOne(TestCage::class,'ficha_p_i_id');
    }
}
