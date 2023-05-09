<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Cicloescolar;
use App\Models\Maestro;
use App\Models\Alumno;
use App\Models\Padre;
use App\Models\Tramite;
use App\Models\Proceso;

class ReinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $ciclo = Cicloescolar::all();
        $maestro = Maestro::all();

        $texto = $request->texto;
        $grupo = Grupo::where('nombre','LIKE','%'.$texto.'%')
                    ->orWhere('cicloescolar_id','LIKE','%'.$texto.'%')
                    ->orWhere('maestros_id','LIKE','%'.$texto.'%')
                    ->latest('id')
                    ->orderBy('nombre','asc')
                    ->paginate(10);
        
        $data=[
            'grupo'=>$grupo,
            'texto'=>$texto,
        ];

        return view('reinscripcion.Indexreins',['grupo' => $grupo, 'ciclo'=>$ciclo, 'maestro'=>$maestro]);
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
        return view('reinscripcion.Agregarreins', compact('alumno','tramite','ciclo','grupo','proceso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Proceso $proceso)
    {
        $proceso = new Proceso();
        $proceso->cicloescolar_id=$request->cicloescolar_id;
        $proceso->tramite_id=$request->tramite_id;
        $proceso->alumnos_id=$request->alumnos_id;
        $proceso->grupos_id=$request->grupos_id;
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
        $proceso = Proceso::all();
        $alumno = Alumno::all();
        $ciclo = Cicloescolar::all();
        $maestro = Maestro::all();
        $grupo = Grupo::find($id);
     
        return view('reinscripcion.Perfilreins', ['grupo'=>$grupo, 'alumno'=>$alumno, 'ciclo'=>$ciclo, 'maestro'=>$maestro, 'proceso'=>$proceso]);
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
