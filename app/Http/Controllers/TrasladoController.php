<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Cicloescolar;
use App\Models\Tramite;
use App\Models\Padre;
use App\Models\Grupo;
use App\Models\Proceso;

class TrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


     public function create()
    {
        $alumno = Alumno::latest('created_at')->get();
        $ciclo = Cicloescolar::all();
        $tramite = Tramite::all();
        $grupo = Grupo::all();
        return view('traslado.Procesotraslado',compact('alumno','ciclo','tramite','grupo'));
    }

    public function store(Request $request)
    {
        $data =request()->validate([
           
            'acta' => ['required'],
            'curp' => ['required'],
            'copiaVacuna' => ['required'],
            'copiaIne' => ['required'],
            'boletaAnterior' => ['required'],
            'constanciaPrimaria' => ['required'],
            'escuelaProcedencia' => ['required','max:30','min:5'],
        ],[

            'acta.required' => 'El campo acta es obligatorio',
          
            'curp.required' => 'El campo curp es obligatorio',

            'copiaVacuna.required' => 'El campo cartilla es obligatorio',

            'copiaIne.required' => 'El campo INE es obligatorio',

            'boletaAnterior.required' => 'El campo boleta es obligatorio',

            'constanciaPrimaria.required' => 'El campo constancia es obligatorio',

            'escuelaProcedencia.required' => 'El campo escuela es obligatorio',

            'escuelaProcedencia.max' => 'El campo escuela debe contener maximo 30 caracteres',

            'escuelaProcedencia.min' => 'El campo escuela debe contener minimo 5 caracteres',
        ]);

        $proceso = new Proceso();
        $proceso->acta=$request->acta;
        $proceso->curp=$request->curp;
        $proceso->copiaVacuna=$request->copiaVacuna;
        $proceso->copiaIne=$request->copiaIne;
        $proceso->boletaAnterior=$request->boletaAnterior;
        $proceso->constanciaPrimaria=$request->constanciaPrimaria;
        $proceso->escuelaProcedencia=$request->escuelaProcedencia;
        $proceso->cicloescolar_id=$request->cicloescolar_id;
        $proceso->tramite_id=$request->tramite_id;
        $proceso->alumnos_id=$request->alumnos_id;
        $proceso->grupos_id=$request->grupos_id;
        $proceso->save();
        return redirect()->route('inscripcion.index')->with('Agregar', 'ok');
         
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
