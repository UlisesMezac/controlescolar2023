<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
     //use HasFactory;
     protected $table="alumnos";
     protected $primaryKey="id";
     protected $fillable = [
        'folio',
        'matricula', 
        'nombres',
        'apellidoP',
        'apellidoM',
        'foto',
        'sexo',
        'fechaNac',
        'status',
        'curp',
        'calle',
        'numero',
        'colonia',
        'codigoP',
        'telefono',
        'localidad',
        'municipio',
        'especialidad',
        'otraEsp',
        'copiaActa',
        'copiaCurp',
        'copiaVacuna',
        'constanciaKinder',
        'copiaIne',
        'acta',
        'certificadoKinder',
        'escuelaProcedencia',
        'boletaAnterior',
        'constanciaPrimaria',
        'cicloescolar_id',
        'tramite_id',
        'padres_id',
     ];

    public $timestamps = false;

    public function ciclo(){
        return $this->belongsTo(Cicloescolar::class, 'cicloescolar_id');
    }

    public function padre(){
    return $this->belongsTo(Padre::class, 'padres_id');
    }

    public function trami(){
        return $this->belongsTo(Tramite::class, 'tramite_id');
        }
    


}
