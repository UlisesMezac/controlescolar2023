<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Tramite;
use App\Models\Cicloescolar;
use App\Models\Padre;
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
        $texto = $request->texto;
        $alumno = Alumno::where('folio','LIKE','%'.$texto.'%')
                        ->orWhere('matricula','LIKE','%'.$texto.'%')
                        ->orWhere('nombres','LIKE','%'.$texto.'%')
                        ->orWhere('apellidoP','LIKE','%'.$texto.'%')
                        ->orWhere('apellidoM','LIKE','%'.$texto.'%')
                        ->orWhere('curp','LIKE','%'.$texto.'%')
                        ->orWhere('padres_id','LIKE','%'.$texto.'%')
                        ->latest('id')
                        ->orderBy('folio','asc')
                        ->paginate(10);
        $data=[
            'alumno'=>$alumno,
            'texto'=>$texto,
        ];
        return view('inscripcion.Indexinscripcion', compact('alumno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Alumno $alumno)
    {
        $tramite = Tramite::all();
        $ciclo = Cicloescolar::all();
        $padre = Padre::all();
        $grupo = Grupo::all();
        return view('inscripcion.Agregarinscripcion', compact('alumno', 'tramite','ciclo','padre','grupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Alumno $alumno)
    {
        $data =request()->validate([
            'matricula' => ['required','max:10','min:10'],
            'nombres' => ['required','max:30'],
            'apellidoP' => ['required','max:30'],
            'apellidoM' => ['required','max:30'],
            'fechaNac' => ['required'],
            'acta' => ['required'],
            'certificadoKinder' => ['required'],
            'curp' => ['required','max:18','min:18'],
            'cicloescolar_id' => ['required'],
            'tramite_id' => ['required'],
            'padres_id' => ['required'],
        
        ],[

            'nombres.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre debe contener maximo 30 caracteres',

            'matricula.required' => 'El campo matricula  es obligatorio',
            'matricula.max' => 'El campo matricula debe contener maximo 10 caracteres',
            'matricula.min' => 'El campo matricula debe contener minimo 10 caracteres',

            'curp.required' => 'El campo curp  es obligatorio',
            'curp.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curp.min' => 'El campo curp debe contener minimo 18 caracteres',

            'apellidoP.required' => 'El campo apellidos es obligatorio',
            'apellidoM.required' => 'El campo apelidos es obligatorio',
            'fechaNac.required' => 'El campo fecha de nacimiento es obligatorio',
            'curp.required' => 'El campo curp es obligatorio',
            'acta.required' => 'El campo acta es obligatorio',
            'certificadoKinder.required' => 'El campo certificado es obligatorio',


        ]);


        $alumno->nombres=$request->nombres;
        $alumno->apellidoP=$request->apellidoP;
        $alumno->apellidoM=$request->apellidoM;
        $alumno->curp=$request->curp;
        $alumno->matricula=$request->matricula;
        $alumno->fechaNac=$request->fechaNac;
        $alumno->acta=$request->acta;
        $alumno->certificadoKinder=$request->certificadoKinder;
        $alumno->padres_id=$request->padres_id;
        $alumno->cicloescolar_id=$request->cicloescolar_id;
        $alumno->tramite_id=$request->tramite_id;
        $alumno->grupos_id=$request->grupos_id;
       
        $alumno->save();
        return redirect()->route('inscripcion.index')->with('Editar', 'ok');
       
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
