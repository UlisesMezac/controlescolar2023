<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 10)->unique();
            $table->string('nombres',50);
            $table->string('apellidoP',30);
            $table->string('apellidoM',30);
            $table->string('edad',5);
            $table->string('telefono',10);
            $table->string('foto', 255)->nullable();
            $table->string('correo',50)->unique();
            $table->string('status',10);
            $table->string('especialidad',50);
            $table->string('curp',18);
            $table->string('domicilio',100);
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
        Schema::dropIfExists('maestros');
    }
}
