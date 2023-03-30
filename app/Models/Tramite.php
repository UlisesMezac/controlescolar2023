<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
     //use HasFactory;
   protected $table="tramite";
   protected $primaryKey="id";
   protected $fillable = [
        'tramite'
   ];

   public $timestamps = false;

   public function alumnos(){
     return $this->hasMany('App\Models\Alumno');
 }
}
