<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;


class Maestro extends Model
{
   //use HasFactory;
   protected $table="maestros";
   protected $primaryKey="id";
   protected $fillable = [
       'matricula', 'nombres', 'apellidoP', 'apellidoM', 'edad', 'telefono', 'foto','correo','status',
       'especialidad','curp','domicilio'
   ];

   /*public function grupo(){
        return $this->hasMany(Grupo::class, 'id');
    }*/


    //relación de uno a muchos
    public function grupos(){
        return $this->hasMany('App\Models\Grupo');
    }
}
