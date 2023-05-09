<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Cicloescolar;
use App\Models\Tramite;
use App\Models\Padre;
use App\Models\Grupo;
use App\Models\Proceso;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PreinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(request $request)
    {
        $ciclo = Cicloescolar::all();
        $alumno = Alumno::all();
        $grupo = Grupo::all();
        $texto = $request->texto;
        $proceso = Proceso::where('id','LIKE','%'.$texto.'%')
                        ->orWhere('cicloescolar_id','LIKE','%'.$texto.'%')
                        ->latest('id')
                        ->orderBy('id','asc')
                        ->paginate(10);
        $data=[
            'proceso'=>$proceso,
            'texto'=>$texto,
        ];
        return view('preinscripcion.Indexpre', compact('proceso','ciclo','alumno','grupo'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno =  Alumno::latest('created_at')->get();
        $ciclo = Cicloescolar::all();
        $tramite = Tramite::all();
        return view('preinscripcion.Agregarpre',compact('alumno','ciclo','tramite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data =request()->validate([
            'alumnos_id' => ['required'],
            'copiaActa' => ['required'],
            'copiaCurp' => ['required'],
            'copiaVacuna' => ['required'],
            'constanciaKinder' => ['required'],
            'copiaIne' => ['required'],
        ],[

            'alumnos_id.required' => 'El campo alumnos es obligatorio',

            'copiaActa.required' => 'El campo acta es obligatorio',
          
            'copiaCurp.required' => 'El campo curp es obligatorio',

            'copiaVacuna.required' => 'El campo cartilla es obligatorio',

            'constanciaKinder.required' => 'El campo constancia es obligatorio',

            'copiaIne.required' => 'El campo Ine es obligatorio',

        ]);

        $proceso = new Proceso();
        $proceso->copiaActa=$request->copiaActa;
        $proceso->copiaCurp=$request->copiaCurp;
        $proceso->copiaVacuna=$request->copiaVacuna;
        $proceso->constanciaKinder=$request->constanciaKinder;
        $proceso->cicloescolar_id=$request->cicloescolar_id;
        $proceso->tramite_id=$request->tramite_id;
        $proceso->alumnos_id=$request->alumnos_id;
        $proceso->save();
        return redirect()->route('preinscripcion.index')->with('Guardar', 'ok');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $padre = Padre::all();
        $ciclo = Cicloescolar::all();
        $alumno = Alumno::all();
        $proceso = Proceso::find($id);
        return view('preinscripcion.Perfilpre', ['proceso'=>$proceso, 'alumno'=>$alumno, 'ciclo'=>$ciclo, 'padre'=>$padre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso $proceso)
    {
        $ciclo = Cicloescolar::all();
        $alumno = Alumno::orderBy('created_at','DESC')->get();
        $tramite = Tramite::all();
        return view('preinscripcion.Editarpre', compact('proceso','ciclo','alumno','tramite'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proceso $proceso)
    {
        $data =request()->validate([
           
            'copiaActa' => ['required'],
            'copiaCurp' => ['required'],
            'copiaVacuna' => ['required'],
            'constanciaKinder' => ['required'],
            'copiaIne' => ['required'],
        ],[

            'copiaActa.required' => 'El campo acta es obligatorio',
          
            'copiaCurp.required' => 'El campo curp es obligatorio',

            'copiaVacuna.required' => 'El campo cartilla es obligatorio',

            'constanciaKinder.required' => 'El campo constancia es obligatorio',

            'copiaIne.required' => 'El campo Ine es obligatorio',

        ]);
        $proceso->copiaActa=$request->copiaActa;
        $proceso->copiaCurp=$request->copiaCurp;
        $proceso->copiaVacuna=$request->copiaVacuna;
        $proceso->constanciaKinder=$request->constanciaKinder;
        $proceso->cicloescolar_id=$request->cicloescolar_id;

        $proceso->cicloescolar_id=$request->cicloescolar_id;
        $proceso->tramite_id=$request->tramite_id;
        $proceso->alumnos_id=$request->alumnos_id;
        $proceso->save();
        return redirect()->route('preinscripcion.index')->with('Editar', 'ok');
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

    public function pdf($id)
    {
        $padre = Padre::all();
        $alumno = Alumno::all();
        $proceso = Proceso::find($id);
        $pdf = pdf::loadView('preinscripcion.Pdfpre', compact('proceso','alumno','padre'));
        return $pdf->stream();
    }
  
}
