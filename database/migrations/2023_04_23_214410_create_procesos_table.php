<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->decimal('calificacion',8,2)->nullable();
            $table->string('status',10)->nullable();
              //////DOCUMENTACIÓN PARA LA PREINSCRIPCIÓN/////////
            $table->char('copiaActa',2)->comment('Si = Si')->nullable();
            $table->char('copiaCurp',2)->comment('Si = Si')->nullable();
            $table->char('copiaVacuna',2)->comment('Si = Si')->nullable();
            $table->char('constanciaKinder',2)->comment('Si = Si')->nullable();
            $table->char('copiaIne',2)->comment('Si = Si')->nullable();
  
               //////DOCUMENTACIÓN PARA LA INSCRIPCIÓN/////////
            $table->char('curp',2)->comment('Si = Si')->nullable();
            $table->char('acta',2)->comment('Si = Si')->nullable();
            $table->char('certificadoKinder',2)->comment('Si = Si')->nullable();
  
              //////DOCUMENTACIÓN PARA TRASLADO/////////
            $table->string('escuelaProcedencia',30)->nullable();
            $table->char('boletaAnterior',2)->comment('Si = Si')->nullable();
            $table->char('constanciaPrimaria',2)->comment('Si = Si')->nullable();

            $table->foreignId('alumnos_id')
                    ->nullable()
                    ->constrained('alumnos')
                    ->cascadeUpdate()
                    ->nullOnDelete();
            $table->foreignId('cicloescolar_id')
                  ->nullable()
                  ->constrained('cicloescolar')
                  ->cascadeUpdate()
                  ->nullOnDelete();
            $table->foreignId('tramite_id')
                  ->nullable()
                  ->constrained('tramite')
                  ->cascadeUpdate()
                  ->nullOnDelete();
            $table->foreignId('grupos_id')
                  ->nullable()
                  ->constrained('grupos')
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
        Schema::dropIfExists('procesos');
    }
}
