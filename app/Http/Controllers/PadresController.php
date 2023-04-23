<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Padre;
use App\Models\Alumno;

class PadresController extends Controller
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
        $padre = Padre::where('nombresP','LIKE','%'.$texto.'%')
                    ->orWhere('apellido1P','LIKE','%'.$texto.'%')
                    ->orWhere('apellido2P','LIKE','%'.$texto.'%')
                    ->orWhere('nombresM','LIKE','%'.$texto.'%')
                    ->orWhere('apellido1M','LIKE','%'.$texto.'%')
                    ->orWhere('apellido2M','LIKE','%'.$texto.'%')
                    ->orWhere('nombresT','LIKE','%'.$texto.'%')
                    ->orWhere('apellido1T','LIKE','%'.$texto.'%')
                    ->orWhere('apellido2T','LIKE','%'.$texto.'%')
                    ->latest('id')
                    ->orderBy('nombresP','asc')
                    ->paginate(10);
        $data=[
            'padre'=>$padre,
            'texto'=>$texto,
        ];
        return view('padres.Indexpadre',['padre' => $padre, 'alumno' => $alumno]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padre = new Padre();
        return view('padres.Agregarpadre',compact('padre'));
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
            'nombresP'=>['required', 'max:30'], 'apellido1P'=>['required', 'max:30'],
            'apellido2P'=>['required', 'max:30'], 'edadP'=>['required', 'max:2','min:2'],
            'fechaNacP'=>['required'], 'curpP'=>['required', 'max:18','min:18'],
            'viveP'=>['required'], 'leeYescribeP'=>['required'], 'escolaridadP'=>['required'],
            'noHijosP'=>['required', 'max:15'], 'nombresM'=>['required', 'max:30'],
            'apellido1M'=>['required', 'max:30'], 'apellido2M'=>['required', 'max:30'],
            'edadM'=>['required', 'max:2','min:2'], 'fechaNacM'=>['required'],
            'curpM'=>['required', 'max:18','min:18'], 'viveM'=>['required'], 'leeYescribeM'=>['required'],
            'escolaridadM'=>['required'], 'noHijosM'=>['required','max:15'], 'nombresT'=>['required', 'max:30'],
            'apellido1T'=>['required', 'max:30'], 'apellido2T'=>['required', 'max:30'],
            'edadT'=>['required', 'max:2','min:2'], 'fechaNacT'=>['required'], 'curpT'=>['required', 'max:18','min:18'],
            'viveT'=>['required'], 'leeYescribeT'=>['required'], 'escolaridadT'=>['required'],
            'noHijosT'=>['required','max:15'], 'calle'=>['required', 'max:30'], 'numero'=>['required','max:2'],
            'colonia'=>['required', 'max:30'], 'codigoP'=>['required','max:5','min:5'],
            'telefono'=>['required','max:10','min:10'], 'localidad'=>['required', 'max:30'],
            'municipio'=>['required', 'max:30'],
        
        ],[

            'nombresP.required' => 'El campo nombre es obligatorio',
            'nombresP.max' => 'El campo nombre debe contener maximo 30 caracteres',
            'apellido1P.required' => 'El campo apellido es obligatorio',
            'apellido1P.max' => 'El apellido debe contener maximo 30 caracteres',
            'apellido2P.required' => 'El campo apellido es obligatorio',
            'apellido2P.max' => 'El apellido debe contener maximo 30 caracteres',
            'edadP.required' => 'El campo edad es obligatorio',
            'edadP.min' => 'El campo edad debe contener al menos 2 caracteres',
            'edadP.max' => 'el campo edad debe contener maximo 2 caracteres',
            'fechaNacP.required' => 'El campo es obligatorio', 
            'curpP.required' => 'El campo curp es obligatorio',
            'curpP.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curpP.min' => 'El campo curp debe contener al menos 18 caracteres',           
            'viveP.required' => 'El campo es obligatorio',
            'leeYescribeP.required' => 'El campo es obligatorio',
            'escolaridadP.required' => 'El campo escolaridad es obligatorio',
            'noHijosP.required' => 'El campo es obligatorio',


            'nombresM.required' => 'El campo nombre es obligatorio',
            'nombresM.max' => 'El campo nombre debe contener maximo 30 caracteres',
            'apellido1M.required' => 'El campo apellido es obligatorio',
            'apellido1M.max' => 'El apellido debe contener maximo 30 caracteres',
            'apellido2M.required' => 'El campo apellido es obligatorio',
            'apellido2M.max' => 'El apellido debe contener maximo 30 caracteres',
            'edadM.required' => 'El campo edad es obligatorio',
            'edadM.min' => 'El campo edad debe contener al menos 2 caracteres',
            'edadM.max' => 'el campo edad debe contener maximo 2 caracteres',
            'fechaNacM.required' => 'El campo es obligatorio', 
            'curpM.required' => 'El campo curp es obligatorio',
            'curpM.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curpM.min' => 'El campo curp debe contener al menos 18 caracteres',       
            'viveM.required' => 'El campo es obligatorio',
            'leeYescribeM.required' => 'El campo es obligatorio',
            'escolaridadM.required' => 'El campo escolaridad es obligatorio',
            'noHijosM.required' => 'El campo es obligatorio',

            'nombresT.required' => 'El campo nombre es obligatorio',
            'nombresT.max' => 'El campo nombre debe contener maximo 30 caracteres',
            'apellido1T.required' => 'El campo apellido es obligatorio',
            'apellido1T.max' => 'El apellido debe contener maximo 30 caracteres',
            'apellido2T.required' => 'El campo apellido es obligatorio',
            'apellido2T.max' => 'El apellido debe contener maximo 30 caracteres',
            'edadT.required' => 'El campo edad es obligatorio',
            'edadT.min' => 'El campo edad debe contener al menos 2 caracteres',
            'edadT.max' => 'el campo edad debe contener maximo 2 caracteres',
            'fechaNacT.required' => 'El campo es obligatorio', 
            'curpT.required' => 'El campo curp es obligatorio',
            'curpT.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curpT.min' => 'El campo curp debe contener al menos 18 caracteres',       
            'viveT.required' => 'El campo es obligatorio',
            'leeYescribeT.required' => 'El campo es obligatorio',
            'escolaridadT.required' => 'El campo escolaridad es obligatorio',
            'noHijosT.required' => 'El campo es obligatorio',

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
           
        ]);

        /**asignando valores y guardando */
        $padre = new Padre();
        $padre->nombresP = $request->nombresP;
        $padre->apellido1P = $request->apellido1P;
        $padre->apellido2P = $request->apellido2P;
        $padre->edadP = $request->edadP;
        $padre->fechaNacP = $request->fechaNacP;
        $padre->curpP = $request->curpP;
        $padre->viveP = $request->viveP;
        $padre->leeYescribeP = $request->leeYescribeP;
        $padre->escolaridadP = $request->escolaridadP;
        $padre->noHijosP = $request->noHijosP;
        $padre->nombresM = $request->nombresM;
        $padre->apellido1M = $request->apellido1M;
        $padre->apellido2M = $request->apellido2M;
        $padre->edadM = $request->edadM;
        $padre->fechaNacM = $request->fechaNacM;
        $padre->curpM = $request->curpM;
        $padre->viveM = $request->viveM;
        $padre->leeYescribeM = $request->leeYescribeM;
        $padre->escolaridadM = $request->escolaridadM;
        $padre->noHijosM = $request->noHijosM;
        $padre->nombresT = $request->nombresT;
        $padre->apellido1T = $request->apellido1T;
        $padre->apellido2T = $request->apellido2T;
        $padre->edadT = $request->edadT;
        $padre->fechaNacT = $request->fechaNacT;
        $padre->curpT = $request->curpT;
        $padre->viveT = $request->viveT;
        $padre->leeYescribeT = $request->leeYescribeT;
        $padre->escolaridadT = $request->escolaridadT;
        $padre->noHijosT = $request->noHijosT;
        $padre->calle = $request->calle;
        $padre->numero = $request->numero;
        $padre->colonia = $request->colonia;
        $padre->codigoP = $request->codigoP;
        $padre->telefono = $request->telefono;
        $padre->localidad = $request->localidad;
        $padre->municipio = $request->municipio;
      
        $padre->save();
  
        return redirect()->route('preinscripcion.create')->with('Agregar', 'ok');

    }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::all();
        $padre = Padre::find($id);
        return view('padres.Perfilpadre', ['padre'=>$padre,'alumno'=>$alumno]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Padre $padre)
    {
        return view('padres.Editarpadre', compact('padre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Padre $padre)
    {

        $data =request()->validate([
            'nombresP'=>['required', 'max:30'], 'apellido1P'=>['required', 'max:30'],
            'apellido2P'=>['required', 'max:30'], 'edadP'=>['required', 'max:2','min:2'],
            'fechaNacP'=>['required'], 'curpP'=>['required', 'max:18','min:18'],
            'viveP'=>['required'], 'leeYescribeP'=>['required'], 'escolaridadP'=>['required'],
            'noHijosP'=>['required', 'max:15'], 'nombresM'=>['required', 'max:30'],
            'apellido1M'=>['required', 'max:30'], 'apellido2M'=>['required', 'max:30'],
            'edadM'=>['required', 'max:2','min:2'], 'fechaNacM'=>['required'],
            'curpM'=>['required', 'max:18','min:18'], 'viveM'=>['required'], 'leeYescribeM'=>['required'],
            'escolaridadM'=>['required'], 'noHijosM'=>['required','max:15'], 'nombresT'=>['required', 'max:30'],
            'apellido1T'=>['required', 'max:30'], 'apellido2T'=>['required', 'max:30'],
            'edadT'=>['required', 'max:2','min:2'], 'fechaNacT'=>['required'], 'curpT'=>['required', 'max:18','min:18'],
            'viveT'=>['required'], 'leeYescribeT'=>['required'], 'escolaridadT'=>['required'],
            'noHijosT'=>['required','max:15'], 'calle'=>['required', 'max:30'], 'numero'=>['required','max:2'],
            'colonia'=>['required', 'max:30'], 'codigoP'=>['required','max:5','min:5'],
            'telefono'=>['required','max:10','min:10'], 'localidad'=>['required', 'max:30'],
            'municipio'=>['required', 'max:30'],
        
        ],[

            'nombresP.required' => 'El campo nombre es obligatorio',
            'nombresP.max' => 'El campo nombre debe contener maximo 30 caracteres',
            'apellido1P.required' => 'El campo apellido es obligatorio',
            'apellido1P.max' => 'El apellido debe contener maximo 30 caracteres',
            'apellido2P.required' => 'El campo apellido es obligatorio',
            'apellido2P.max' => 'El apellido debe contener maximo 30 caracteres',
            'edadP.required' => 'El campo edad es obligatorio',
            'edadP.min' => 'El campo edad debe contener al menos 2 caracteres',
            'edadP.max' => 'el campo edad debe contener maximo 2 caracteres',
            'fechaNacP.required' => 'El campo es obligatorio', 
            'curpP.required' => 'El campo curp es obligatorio',
            'curpP.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curpP.min' => 'El campo curp debe contener al menos 18 caracteres',           
            'viveP.required' => 'El campo es obligatorio',
            'leeYescribeP.required' => 'El campo es obligatorio',
            'escolaridadP.required' => 'El campo escolaridad es obligatorio',
            'noHijosP.required' => 'El campo es obligatorio',


            'nombresM.required' => 'El campo nombre es obligatorio',
            'nombresM.max' => 'El campo nombre debe contener maximo 30 caracteres',
            'apellido1M.required' => 'El campo apellido es obligatorio',
            'apellido1M.max' => 'El apellido debe contener maximo 30 caracteres',
            'apellido2M.required' => 'El campo apellido es obligatorio',
            'apellido2M.max' => 'El apellido debe contener maximo 30 caracteres',
            'edadM.required' => 'El campo edad es obligatorio',
            'edadM.min' => 'El campo edad debe contener al menos 2 caracteres',
            'edadM.max' => 'el campo edad debe contener maximo 2 caracteres',
            'fechaNacM.required' => 'El campo es obligatorio', 
            'curpM.required' => 'El campo curp es obligatorio',
            'curpM.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curpM.min' => 'El campo curp debe contener al menos 18 caracteres',       
            'viveM.required' => 'El campo es obligatorio',
            'leeYescribeM.required' => 'El campo es obligatorio',
            'escolaridadM.required' => 'El campo escolaridad es obligatorio',
            'noHijosM.required' => 'El campo es obligatorio',

            'nombresT.required' => 'El campo nombre es obligatorio',
            'nombresT.max' => 'El campo nombre debe contener maximo 30 caracteres',
            'apellido1T.required' => 'El campo apellido es obligatorio',
            'apellido1T.max' => 'El apellido debe contener maximo 30 caracteres',
            'apellido2T.required' => 'El campo apellido es obligatorio',
            'apellido2T.max' => 'El apellido debe contener maximo 30 caracteres',
            'edadT.required' => 'El campo edad es obligatorio',
            'edadT.min' => 'El campo edad debe contener al menos 2 caracteres',
            'edadT.max' => 'el campo edad debe contener maximo 2 caracteres',
            'fechaNacT.required' => 'El campo es obligatorio', 
            'curpT.required' => 'El campo curp es obligatorio',
            'curpT.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curpT.min' => 'El campo curp debe contener al menos 18 caracteres',       
            'viveT.required' => 'El campo es obligatorio',
            'leeYescribeT.required' => 'El campo es obligatorio',
            'escolaridadT.required' => 'El campo escolaridad es obligatorio',
            'noHijosT.required' => 'El campo es obligatorio',

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
           
        ]);

        $padre->nombresP = $request->nombresP;
        $padre->apellido1P = $request->apellido1P;
        $padre->apellido2P = $request->apellido2P;
        $padre->edadP = $request->edadP;
        $padre->fechaNacP = $request->fechaNacP;
        $padre->curpP = $request->curpP;
        $padre->viveP = $request->viveP;
        $padre->leeYescribeP = $request->leeYescribeP;
        $padre->escolaridadP = $request->escolaridadP;
        $padre->noHijosP = $request->noHijosP;

        $padre->nombresM = $request->nombresM;
        $padre->apellido1M = $request->apellido1M;
        $padre->apellido2M = $request->apellido2M;
        $padre->edadM = $request->edadM;
        $padre->fechaNacM = $request->fechaNacM;
        $padre->curpM = $request->curpM;
        $padre->viveM = $request->viveM;
        $padre->leeYescribeM = $request->leeYescribeM;
        $padre->escolaridadM = $request->escolaridadM;
        $padre->noHijosM = $request->noHijosM;
      
        $padre->nombresT = $request->nombresT;
        $padre->apellido1T = $request->apellido1T;
        $padre->apellido2T = $request->apellido2T;
        $padre->edadT = $request->edadT;
        $padre->fechaNacT = $request->fechaNacT;
        $padre->curpT = $request->curpT;
        $padre->viveT = $request->viveT;
        $padre->leeYescribeT = $request->leeYescribeT;
        $padre->escolaridadT = $request->escolaridadT;
        $padre->noHijosT = $request->noHijosT;


        $padre->calle = $request->calle;
        $padre->numero = $request->numero;
        $padre->colonia = $request->colonia;
        $padre->codigoP = $request->codigoP;
        $padre->telefono = $request->telefono;
        $padre->localidad = $request->localidad;
        $padre->municipio = $request->municipio;
        $padre->save();

        return redirect()->route('padre.index')->with('Editar', 'ok');
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
