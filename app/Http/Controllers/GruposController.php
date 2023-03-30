<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Cicloescolar;
use App\Models\Maestro;

class GruposController extends Controller
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
                    ->latest('id')
                    ->orderBy('nombre','asc')
                    ->paginate(10);
        $data=[
            'grupo'=>$grupo,
            'texto'=>$texto,
        ];

        return view('grupos.Indexgrupo',['grupo' => $grupo, 'ciclo'=>$ciclo,]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $grupo = new Grupo();
       $ciclo = Cicloescolar::all();
       $maestro = Maestro::all();
       return view('grupos.Agregargrupo',compact('grupo','ciclo','maestro'));
       
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
            'nombre' => ['required','max:3'],
            'status' => ['required'],
            'capacidad' => ['required','max:2','min:2'],
        
        ],[

            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre debe contener maximo 3 caracteres',
            'nombre.min' => 'El campo nombre debe contener minimo 3 caracteres',
            'status.required' => 'El campo status es obligatorio',
            'capacidad.max' => 'El campo capacidad debe contener maximo 2 caracteres',
            'capacidad.min' => 'El campo capacidad debe contener minimo 2 caracteres',
        ]);

      
        $grupo = new Grupo();
        $grupo->nombre = $request->nombre;
        $grupo->status = $request->status;
        $grupo->capacidad = $request->capacidad;
        $grupo->cicloescolar_id = $request->cicloescolar_id;
        $grupo->save();

        return redirect()->route('grupo.index')->with('Agregar', 'ok');

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
    public function edit(Grupo $grupo)
    {
        $ciclo = Cicloescolar::all();
        return view('grupos.Editargrupo', compact('grupo','ciclo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $grupo->nombre = $request->nombre;
        $grupo->status = $request->status;
        $grupo->capacidad = $request->capacidad;
        $grupo->cicloescolar_id = $request->cicloescolar_id;
        $grupo->save();

        /**Redireccionando a '' con su mensaje */
        return redirect()->route('grupo.index')->with('Editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();

        return redirect()->route('grupo.index')->with('Eliminar', 'ok');
    }
}
