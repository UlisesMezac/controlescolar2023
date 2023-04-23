<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Cicloescolar;
use App\Models\Padre;
use App\Models\Grupo;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit(Alumno $alumno)
    {
        $ciclo = Cicloescolar::all();
        $grupo = Grupo::all();
        $padre = Padre::orderBy('created_at','DESC')->get();
        return view('alumnos.Editaralumno', compact('alumno','ciclo','grupo','padre'));

    }

    public function update(Request $request, Alumno $alumno)
    {
        $this->validate(request(),[
            'matricula' => ['required','max:10','min:10'],
            'nombres' => ['required','max:30'],
            'apellidoP' => ['required','max:30'],
            'apellidoM' => ['required','max:30'],
            'foto' => ['max:10000','mimes:jpeg,png,jpg'],
            'sexo' => ['required'],
            'fechaNac' => ['required'],
            'curp' => ['required','max:18','min:18'],
            'calle' => ['required','max:30'],
            'numero' => ['required','max:2'],
            'colonia' => ['required','max:30'],
            'codigoP' => ['required','max:5','min:5'],
            'telefono' => ['required','min:10','max:10'],
            'localidad' => ['required','max:30'],
            'municipio' => ['required','max:30'],
            'especialidad' => ['required'],
            'padres_id' => ['required'],
            'grupos_id' => ['required'],

        ]);
       
        $alum = $request->all();

        if($foto =$request->file('foto')){
            $rutaGuardarImg = 'foto/';
            $imagenProducto = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenProducto);
            $alum['foto'] = "$imagenProducto";
        }else{
            unset($alum['foto']);
        }
        $alumno->update($alum);
        return redirect()->route('grupo.index')->with('Editar', 'ok');
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

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
