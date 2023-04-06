<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->id();
            //////DOCUMENTACIÓN PAPÁ/////////
            $table->string('nombresP',30);
            $table->string('apellido1P',20);
            $table->string('apellido2P',20);
            $table->string('edadP',2)->nullable();
            $table->date('fechaNacP')->nullable();
            $table->string('curpP',18)->nullable();
            $table->char('viveP',2)->comment('Si = Si, No = No')->nullable();
            $table->char('leeYescribeP',2)->comment('Si = Si, No = No')->nullable();
            $table->string('escolaridadP',30)->nullable();
            $table->string('noHijosP',2)->nullable();

            //////DOCUMENTACIÓN MAMÁ/////////
            $table->string('nombresM',30);
            $table->string('apellido1M',20);
            $table->string('apellido2M',20);
            $table->string('edadM',2)->nullable();
            $table->date('fechaNacM')->nullable();
            $table->string('curpM',18)->nullable();
            $table->char('viveM',2)->comment('Si = Si, No = No')->nullable();
            $table->char('leeYescribeM',2)->comment('Si = Si, No = No')->nullable();
            $table->string('escolaridadM',30)->nullable();
            $table->string('noHijosM',2)->nullable();

            //////DOCUMENTACIÓN TUTOR/////////
            $table->string('nombresT',30);
            $table->string('apellido1T',20);
            $table->string('apellido2T',20);
            $table->string('edadT',2)->nullable();
            $table->date('fechaNacT')->nullable();
            $table->string('curpT',18)->nullable();
            $table->char('viveT',2)->comment('Si = Si, No = No')->nullable();
            $table->char('leeYescribeT',2)->comment('Si = Si, No = No')->nullable();
            $table->string('escolaridadT',30)->nullable();
            $table->string('noHijosT',2)->nullable();


            //////DOCUMENTACIÓN TUTOR/////////
            $table->string('calle',30)->nullable();
            $table->string('numero',2)->nullable();
            $table->string('colonia',30)->nullable();
            $table->string('codigoP',5)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('localidad',20)->nullable();
            $table->string('municipio',20)->nullable();
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
        Schema::dropIfExists('padres');
    }
}
