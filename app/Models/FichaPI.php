<?php

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class FichaPI extends Model
{
    
    public function testFagerstom_m()
    {
        return $this->hasOne(TestFagerstorm::class,'ficha_p_i_id');
    }

    public function factores_m()
    {
        return $this->hasMany(Factores::class,'ficha_p_i_id');
    }

    public function nea_m()
    {
        return $this->hasOne(Nea::class,'ficha_p_i_id');
    }

    public function patologico_m()
    {
        return $this->hasOne(Patologico::class,'ficha_p_i_id');
    }


    public function testCage_m()
    {
        return $this->hasOne(TestCage::class,'ficha_p_i_id');
    }

    public function antecedentesTrabajo_m()
    {
        return $this->hasMany(Antecedendentetrabajo::class,'ficha_p_i_id');
    }
    

    public function testAsist_m()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id');
    }

    public function user_m()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function areaTrabajo_m()
    {
        return $this->belongsTo(AreaTrabajo::class,'area_trabajo_id');
    }


    // para el informe
    public function informeTabaco()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_1','p3_1','p4_1','p5_1','p6_1']);
    }


    public function informeAlcohol()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_2','p3_2','p4_2','p5_2','p6_2','p7_2']);
    }

    public function informeCannabis()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_3','p3_3','p4_3','p5_3','p6_3','p7_3']);
    }

    public function informeCocaina()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_4','p3_4','p4_4','p5_4','p6_4','p7_4']);
    }


    public function informeAnfetaminas()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_5','p3_5','p4_5','p5_5','p6_5','p7_5']);
    }


    public function informeInhalantes()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_6','p3_6','p4_6','p5_6','p6_6','p7_6']);
    }

    public function informeTranquilizantes()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_7','p3_7','p4_7','p5_7','p6_7','p7_7']);
    }


    public function informeAlucinogenos()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_8','p3_8','p4_8','p5_8','p6_8','p7_8']);
    }


    public function informeOpiaceos()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_9','p3_9','p4_9','p5_9','p6_9','p7_9']);
    }

    public function informeOtrasDrogas()
    {
        return $this->hasMany(TestAsist::class,'ficha_p_i_id')
        ->whereIn('codigo',['p2_10','p3_10','p4_10','p5_10','p6_10','p7_10']);
    }

}
