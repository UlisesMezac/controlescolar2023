<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
   //use HasFactory;
   protected $table="grupos";
   protected $primaryKey="id";
   protected $fillable = [
        'nombre','status','capacidad', 'cicloescolar_id',
   ];

   public $timestamps = false;

   public function ciclo(){
        return $this->belongsTo(Cicloescolar::class, 'cicloescolar_id');
   }

   public function maestro(){
    return $this->belongsTo(Maestro::class, 'maestro_id');
     }
}
