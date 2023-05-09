<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Padre extends Model
{
    protected $table="padres";
    protected $primaryKey="id";
    protected $fillable = [
        'nombresP',
        'apellido1P',
        'apellido2P',
        'edadP',
        'fechaNacP',
        'curpP',
        'viveP',
        'leeYescribeP',
        'escolaridadP',
        'noHijosP',
        'nombresM',
        'apellido1M',
        'apellido2M',
        'edadM',
        'fechaNacM',
        'curpM',
        'viveM',
        'leeYescribeM',
        'escolaridadM',
        'noHijosM',
        'calle',
        'numero',
        'colonia',
        'codigoP',
        'telefono',
        'localidad',
        'municipio',
    ];

   

    public function hijos(){
        return $this->hasMany(Alumno::class, 'padres_id');
    }

}
