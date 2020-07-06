<?php

use App\Models\Pregunta;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'a. Tabaco (cigarrillos, cigarros habanos, tabaco de mascar, pipa, etc.)',
            'b. Bebidas alcohólicas (cerveza, vino, licores, destilados, etc.)',
            'c. Cannabis (marihuana, costo, hierba, hashish, etc.)',
            'd. Cocaína (coca, farlopa, crack, base, etc.)',
            'e. Anfetaminas u otro tipo de estimulantes (speed, éxtasis, píldoras adelgazantes, etc.)',
            'f. Inhalantes (colas, gasolina/nafta, pegamento, etc.)',
            'g. Tranquilizantes o pastillas para dormir (valium/diazepam, Alprazolam/Xanax, Orfidal/Lorazepam, Rohipnol, etc.)',
            'h. Alucinógenos (LSD, ácidos, ketamina, PCP, etc.)',
            'i. Opiáceos (heroína, metadona, codeína, morfina, dolantina/petidina, etc.)',
            'j. Otros - especifique:'
        );

        for ($i=1; $i <=7 ; $i++) { 
            for ($j=1; $j <=10 ; $j++) { 
                $p=new Pregunta();
                $p->nombre=$data[$j-1];
                $p->codigo='p'.$i.'_'.$j;
                $p->save();
            }
        }

        $p_8='¿Ha consumido alguna vez alguna droga por vía inyectada? (ÚNICAMENTE PARA USOS NO MÉDICOS)';
        $p=new Pregunta();
        $p->nombre=$p_8;
        $p->codigo='p8_1';
        $p->save();

        $p_9='PATRÓN DE INYECCIÓN';
        $p=new Pregunta();
        $p->nombre=$p_9;
        $p->codigo='p9_1';
        $p->save();
    }
}
