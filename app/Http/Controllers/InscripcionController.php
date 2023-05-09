<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Tramite;
use App\Models\Cicloescolar;
use App\Models\Padre;
use App\Models\Proceso;
use App\Models\Grupo;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $alumno = Alumno::all();
        $texto = $request->texto;
        $proceso = Proceso::where('id','LIKE','%'.$texto.'%')
                ->orWhere('cicloescolar_id','LIKE','%'.$texto.'%')
                ->latest('id')
                ->orderBy('id','asc')
                ->paginate(10);
        $data=[
            'alumno'=>$alumno,
            'texto'=>$texto,
        ];
        return view('inscripcion.Indexinscripcion', compact('alumno','proceso'));
    }


    public function procesoindex(request $request)
    {
        $alumno = Alumno::all();
        $texto = $request->texto;
        $proceso = Proceso::where('id','LIKE','%'.$texto.'%')
                ->orWhere('cicloescolar_id','LIKE','%'.$texto.'%')
                ->latest('id')
                ->orderBy('id','asc')
                ->paginate(10);
        $data=[
            'alumno'=>$alumno,
            'texto'=>$texto,
        ];
        return view('inscripcion.procesoindex', compact('alumno','proceso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Proceso $proceso)
    {
        $tramite = Tramite::all();
        $ciclo = Cicloescolar::all();
        $alumno = Alumno::orderBy('created_at','DESC')->get();
        $grupo = Grupo::all();
        return view('inscripcion.Agregarinscripcion', compact('alumno','tramite','ciclo','grupo','proceso'));
    }
  
    public function store(Request $request, Proceso $proceso)
    {
        $data =request()->validate([
           
            'acta' => ['required'],
            'curp' => ['required'],
            'certificadoKinder' => ['required'],
           
        ],[

            'acta.required' => 'El campo acta es obligatorio',
          
            'curp.required' => 'El campo curp es obligatorio',

            'certificadoKinder.required' => 'El campo certificado es obligatorio',

        ]);

        $proceso->acta=$request->acta;
        $proceso->curp=$request->curp;
        $proceso->certificadoKinder=$request->certificadoKinder;
        $proceso->cicloescolar_id=$request->cicloescolar_id;
        $proceso->tramite_id=$request->tramite_id;
        $proceso->alumnos_id=$request->alumnos_id;
        $proceso->grupos_id=$request->grupos_id;
        $proceso->save();
        return redirect()->route('inscripcion.index')->with('Editar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit(Proceso $proceso)
    {
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        
       
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
