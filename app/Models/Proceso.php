<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table="procesos";
    protected $primaryKey="id";
    protected $fillable = [
        'calificacion',
        'status',
        'copiaActa',
        'copiaCurp',
        'copiaVacuna',
        'constanciaKinder',
        'copiaIne',
        'acta',
        'curp',
        'certificadoKinder',
        'escuelaProcedencia',
        'boletaAnterior',
        'constanciaPrimaria',
        'alumnos_id',
        'cicloescolar_id',
        'tramite_id',
        'grupos_id',
   ];

    public function alumno(){
    return $this->belongsTo(Alumno::class, 'alumnos_id');
    }

    public function ciclo(){
        return $this->belongsTo(Cicloescolar::class, 'cicloescolar_id');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'grupos_id');
    }
}
