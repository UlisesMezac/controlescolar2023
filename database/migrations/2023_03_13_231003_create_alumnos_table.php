<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();

            //////INFORMACIÓN DEL ASPIRANTE/////////
            $table->string('folio',)->nullable();
            $table->string('matricula', 10)->unique()->nullable();
            $table->string('nombres',30);
            $table->string('apellidoP',20);
            $table->string('apellidoM',20);
            $table->string('foto', 255)->nullable();
            $table->char('sexo',1)->comment('F = Femenino, M = Masculino')->nullable();
            $table->date('fechaNac')->nullable();
            $table->string('status')->nullable();
            $table->string('curp',18)->nullable();
            $table->string('calle',30)->nullable();
            $table->string('numero',2)->nullable();
            $table->string('colonia',30)->nullable();
            $table->string('codigoP',5)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('localidad',20)->nullable();
            $table->string('municipio',20)->nullable();
            $table->char('especialidad',13)->comment('Sobresaliente = Sobresaliente, 
                                                        Visual = Visual,
                                                        Auditiva = Auditiva,
                                                        Ninguna = Ninguna,
                                                        Otra = Otra')->nullable();

            $table->string('otraEsp')->nullable();
          


            //////LLAVES FORANEAS/////////
                  
            $table->foreignId('padres_id')
                  ->nullable()
                  ->constrained('padres')
                  ->cascadeUpdate()
                  ->nullOnDelete();
                 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
