<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Cicloescolar;
use App\Models\Padre;
use App\Models\Grupo;
use App\Models\Proceso;
use App\Models\Maestro;

class AlumnosController extends Controller
{
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
        $alumno = new Alumno();
        $padre = Padre::orderBy('created_at','DESC')->get();
        return view('alumnos.Agregaralumno',compact('alumno','padre'));
    }


    public function createTraslado()
    {
        $alumno = new Alumno();
        $padre = Padre::orderBy('created_at','DESC')->get();
        return view('traslado.Agregartras',compact('alumno','padre'));
    }

    public function store(Request $request)
    {
        $data =request()->validate([
            'matricula' => ['required','max:10','min:10','unique:alumnos'],
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
        ],[

            'matricula.required' => 'El campo matricula es obligatorio',
            'matricula.min' => 'El campo matricula debe contener al menos 10 caracteres',
            'matricula.max' => 'El campo matricula debe contener maximo 10 caracteres',
            'matricula.unique' => 'La información ya ha sido registrada',

            'nombres.required' => 'El campo nombres es obligatorio',
            'nombres.max' => 'El campo nombres debe contener maximo 30 caracteres',

            'apellidoP.required' => 'El campo apellido es obligatorio',
            'apellidoP.max' => 'El campo apellido debe contener maximo 30 caracteres',

            'apellidoM.required' => 'El campo apellido es obligatorio',
            'apellidoM.max' => 'El campo apellido debe contener maximo 30 caracteres',

            'sexo.required' => 'El campo sexo es obligatorio',

            'fechaNac.required' => 'El campo fecha de nacimiento es obligatorio',

            'curp.required' => 'El campo curp es obligatorio',
            'curp.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curp.min' => 'El campo curp debe contener al menos 18 caracteres',

            'calle.required' => 'El campo calle es obligatorio',

            'numero.required' => 'El campo numero es obligatorio',
            'numero.max' => 'El campo numero debe contener maximo 2 caracteres',

            'colonia.required' => 'El campo colonia es obligatorio',
            'colonia.max' => 'El campo colonia debe contener maximo 30 caracteres',
            
            'codigoP.required' => 'El campo código postal es obligatorio',
            'codigoP.max' => 'El campo código postal debe contener maximo 5 caracteres',
            'codigoP.min' => 'El campo código postal debe contener al menos 5 caracteres',

            'telefono.required' => 'El campo teléfono es obligatorio',
            'telefono.min' => 'El campo telefono debe contener al menos 10 caracteres',
            'telefono.max' => 'El campo teléfono debe contener maximo 10 caracteres',

            'localidad.required' => 'El campo localidad es obligatorio',
            'localidad.max' => 'El campo localidad debe contener maximo 30 caracteres',

            'municipio.required' => 'El campo municipio es obligatorio',
            'municipio.max' => 'El campo municipio debe contener maximo 30 caracteres',

            'especialidad.required' => 'El campo necesidades es obligatorio',
           
        ]);
        
        $alumno = $request->all();
       
        if($foto =$request->file('foto')){
            $rutaGuardarImg = 'foto/';
            $imagenProducto = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenProducto);
            $alumno['foto'] = "$imagenProducto";
            
        }

        Alumno::create($alumno);    
        return redirect()->route('preinscripcion.create')->with('Agregar', 'ok');
         
    }


    public function storeTraslado(Request $request)
    {
        $data =request()->validate([
            'matricula' => ['required','max:10','min:10','unique:alumnos'],
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
           
        ],[

            'matricula.required' => 'El campo matricula es obligatorio',
            'matricula.min' => 'El campo matricula debe contener al menos 10 caracteres',
            'matricula.max' => 'El campo matricula debe contener maximo 10 caracteres',
            'matricula.unique' => 'La información ya ha sido registrada',

            'nombres.required' => 'El campo nombres es obligatorio',
            'nombres.max' => 'El campo nombres debe contener maximo 30 caracteres',

            'apellidoP.required' => 'El campo apellido es obligatorio',
            'apellidoP.max' => 'El campo apellido debe contener maximo 30 caracteres',

            'apellidoM.required' => 'El campo apellido es obligatorio',
            'apellidoM.max' => 'El campo apellido debe contener maximo 30 caracteres',

            'sexo.required' => 'El campo sexo es obligatorio',

            'fechaNac.required' => 'El campo fecha de nacimiento es obligatorio',

            'curp.required' => 'El campo curp es obligatorio',
            'curp.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curp.min' => 'El campo curp debe contener al menos 18 caracteres',

            'calle.required' => 'El campo calle es obligatorio',

            'numero.required' => 'El campo numero es obligatorio',
            'numero.max' => 'El campo numero debe contener maximo 2 caracteres',

            'colonia.required' => 'El campo colonia es obligatorio',
            'colonia.max' => 'El campo colonia debe contener maximo 30 caracteres',
            
            'codigoP.required' => 'El campo código postal es obligatorio',
            'codigoP.max' => 'El campo código postal debe contener maximo 5 caracteres',
            'codigoP.min' => 'El campo código postal debe contener al menos 5 caracteres',

            'telefono.required' => 'El campo teléfono es obligatorio',
            'telefono.min' => 'El campo telefono debe contener al menos 10 caracteres',
            'telefono.max' => 'El campo teléfono debe contener maximo 10 caracteres',

            'localidad.required' => 'El campo localidad es obligatorio',
            'localidad.max' => 'El campo localidad debe contener maximo 30 caracteres',

            'municipio.required' => 'El campo municipio es obligatorio',
            'municipio.max' => 'El campo municipio debe contener maximo 30 caracteres',

            'especialidad.required' => 'El campo necesidades es obligatorio',
           
        ]);
        
        $alumno = $request->all();
       
        if($foto =$request->file('foto')){
            $rutaGuardarImg = 'foto/';
            $imagenProducto = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenProducto);
            $alumno['foto'] = "$imagenProducto";
            
        }

        Alumno::create($alumno);    
        return redirect()->route('traslado.create')->with('Agregar', 'ok');
         
    }


    public function show($id)
    {
        //
    }



    public function edit(Alumno $alumno)
    {
        $ciclo = Cicloescolar::all();
        $proceso = Proceso::all();
        $padre = Padre::orderBy('created_at','DESC')->get();
        return view('alumnos.Editaralumno', compact('alumno','ciclo','padre','proceso'));

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
        return redirect()->route('preinscripcion.index')->with('Editar', 'ok');
    }

    public function destroy($id)
    {
        //
    }

    
    public function calificacion(Proceso $proceso)
    {
        $grupo = Grupo::all();
        $alumno = Alumno::all();
        $maestro = Maestro::all();
        return view('alumnos.Calificacion', compact('proceso','grupo','maestro'));
    }

    public function GuardarCali(Request $request, Proceso $proceso)
    {
        $data =request()->validate([
           
            'calificacion' => ['required','max:3','min:3'],
           
        ],[

            'calificacion.required' => 'El campo acta es obligatorio',
            'calificacion.max' => 'El campo calificación debe contener como maximo 3 caracteres',
            'calificacion.min' => 'El campo calificación debe contener como minimo 3 caracteres',
            

        ]);

        $proceso->calificacion=$request->calificacion;
        $proceso->alumnos_id=$request->alumnos_id;
        $proceso->grupos_id=$request->grupos_id;
        $proceso->save();
        return redirect()->route('grupo.index')->with('Editar', 'ok');
    }

}
