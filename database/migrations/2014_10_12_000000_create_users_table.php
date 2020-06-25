<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->string('historia_clinica_ci')->nullable()->unique();
            $table->integer('numero_archivo')->nullable()->unique();
            
            $table->string('apellido_uno')->nullable();
            $table->string('apellido_dos')->nullable();
            $table->string('nombre_uno')->nullable();
            $table->string('nombre_dos')->nullable();
            $table->enum('sexo',['Hombre','Mujer'])->nullable();
            $table->integer('edad')->nullable();
            $table->enum('estado_civil',['Casado','Soltero','Vuido','Unión libre','Divorciado'])->nullable();
            $table->enum('religion',['Católica','Evangélica','Testigo de Jehova','Mormona','Otras'])->nullable();

            $grupo_sanguineo = array(
                'O+','O-','A+','A-','B+','B-','AB+','AB-','N.S'
            );
            $table->enum('grupo_sanguineo',$grupo_sanguineo)->nullable();
            $table->enum('lateralidad',['Derecho','Izquierdo','Ambidiestro'])->nullable();
            $table->enum('orientacion_sexual',['Heterosexual','Gay','Lesbiana','Bisexual','No sabe','No responde'])->nullable();
            $table->enum('identidad_genero',['Masculino','Femenino','Transfemenino','Transmasculino','Ninguno','No responde','No sabe'])->nullable();
            $table->enum('discapacidad',['No','Auditiva','Física','Intelectual','Lenguaje','Psicosocial'])->nullable();
            $table->decimal('porcentaje_discapacidad',9,2)->nullable();
            $table->date('fecha_ingreso_trabajo')->nullable();
            $table->string('puesto_trabajo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
