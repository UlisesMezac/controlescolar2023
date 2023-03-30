<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Cicloescolar;
use App\Models\Tramite;
use App\Models\Padre;
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
        return view('preinscripcion.Indexpre', compact('alumno'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        $ciclo = Cicloescolar::all();
        $tramite = Tramite::all();
        $padre = Padre::orderBy('created_at','DESC')->get();
        return view('preinscripcion.Agregarpre',compact('alumno','ciclo','tramite','padre'));
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
            'copiaActa' => ['required'],
            'copiaCurp' => ['required'],
            'copiaVacuna' => ['required'],
            'constanciaKinder' => ['required'],
            'copiaIne' => ['required'],
            'cicloescolar_id' => ['required'],
            'tramite_id' => ['required'],
            'padres_id' => ['required'],
           

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
            
            'copiaActa.required' => 'El campo copia acta es obligatorio',

            'copiaCurp.required' => 'El campo copia curp es obligatorio',

            'copiaVacuna.required' => 'El campo copia vacuna es obligatorio',

            'constanciaKinder.required' => 'El campo constancia es obligatorio',

            'copiaIne.required' => 'El campo copia ine es obligatorio',

            'cicloescolar_id.required' => 'El campo cicloescolar es obligatorio',

            'tramite.required' => 'El campo tramite es obligatorio',
           
        ]);
        
        $alumno = $request->all();
       
        if($foto =$request->file('foto')){
            $rutaGuardarImg = 'foto/';
            $imagenProducto = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenProducto);
            $alumno['foto'] = "$imagenProducto";
            
        }

        Alumno::create($alumno);    
        return redirect()->route('preinscripcion.index')->with('Agregar', 'ok');
         
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
        $alumno = Alumno::find($id);
        return view('preinscripcion.Perfilpre', ['alumno'=>$alumno,'padre'=>$padre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        $ciclo = Cicloescolar::all();
        $padre = Padre::orderBy('created_at','DESC')->get();
        $tramite = Tramite::all();
        return view('Preinscripcion.Editarpre', compact('alumno','ciclo','padre','tramite'));

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
            'copiaActa' => ['required'],
            'copiaCurp' => ['required'],
            'copiaVacuna' => ['required'],
            'constanciaKinder' => ['required'],
            'copiaIne' => ['required'],
            'cicloescolar_id' => ['required'],
            'tramite_id' => ['required'],
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
        $alumno = Alumno::find($id);
        $pdf = pdf::loadView('preinscripcion.Pdfpre', compact('alumno','padre'));
        return $pdf->stream();
    }
  
}
