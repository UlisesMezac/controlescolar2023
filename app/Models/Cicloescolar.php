<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cicloescolar extends Model
{
    //use HasFactory;
    protected $table="cicloescolar";
    protected $primaryKey="id";
    protected $fillable = [
        'nombre', 'fechaIni', 'fechaFin','status','capacidad'];

    public $timestamps = false;

    public function grupo(){
        return $this->hasMany(Grupo::class, 'id');
    }

    public function procesos(){
        return $this->hasMany(Proceso::class, 'id');
    }

   
}
