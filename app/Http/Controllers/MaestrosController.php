<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;
use App\Models\Grupo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->texto;
        $maestro = Maestro::where('matricula','LIKE','%'.$texto.'%')
                    ->orWhere('nombres','LIKE','%'.$texto.'%')
                    ->orWhere('apellidoP','LIKE','%'.$texto.'%')
                    ->orWhere('apellidoM','LIKE','%'.$texto.'%')
                    ->orWhere('telefono','LIKE','%'.$texto.'%')
                    ->orWhere('status','LIKE','%'.$texto.'%')
                    ->orWhere('curp','LIKE','%'.$texto.'%')
                    ->latest('id')
                    ->orderBy('matricula','asc')
                    ->paginate(10);
        $data=[
            'maestro'=>$maestro,
            'texto'=>$texto,
        ];




        return view('maestros.Indexmaestro',compact('maestro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('maestros.Agregarmaestro');
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
            'matricula' => ['required','min:10', 'max:10'],
            'nombres' => ['required','max:30'],
            'apellidoP' => ['required','max:30'],
            'apellidoM' => ['required','max:30'],
            'fechaNac' => ['required'],
            'telefono' => ['required','min:10','max:10'],
            'foto' => ['required','max:10000','mimes:jpeg,png,jpg'],
            'correo' => ['required','max:50','unique:maestros'],
            'status' => ['required'],
            'especialidad' => ['required','max:50'],
            'curp' => ['required','max:18','min:18'],
            'domicilio' => ['required','max:100'],
        ],[

            'matricula.required' => 'El campo matricula es obligatorio',
            'matricula.min' => 'El campo matricula debe contener al menos 10 caracteres',
            'matricula.max' => 'El campo matricula debe contener maximo 10 caracteres',
            
            'nombres.required' => 'El campo nombre es obligatorio',
            'nombres.max' => 'El campo nombre debe contener maximo 30 caracteres',
            
            'apellidoP.required' => 'El campo apellido es obligatorio',
            'apellidoP.max' => 'El apellido debe contener maximo 30 caracteres',
            
            'apellidoM.required' => 'El campo apellido es obligatorio',
            'apellidoM.max' => 'El apellido debe contener maximo 30 caracteres',
            
            'fechaNac.required' => 'El campo fecha es obligatorio',

            'telefono.required' => 'El campo teléfono es obligatorio',
            'telefono.min' => 'El campo telefono debe contener al menos 10 caracteres',
            'telefono.max' => 'El campo teléfono debe contener maximo 10 caracteres',

            'correo.required' => 'El campo correo es obligatorio',
            'correo.unique' => 'La cuenta ya ha sido registrada',

            'especialidad.required' => 'El campo especialidad es obligatorio',

            'especialidad.max' => 'El campo especialidad debe contener maximo 50 caracteres.',

            'curp.required' => 'El campo curp es obligatorio',
            'curp.max' => 'El campo curp debe contener maximo 18 caracteres',
            'curp.min' => 'El campo curp debe contener al menos 18 caracteres',

            'domicilio.required' => 'El campo domicilio es obligatorio',
            'domicilio.required' => 'El campo domicilio debe contener maximo 100 caracteres',

        ]);
 
        $maestro = $request->all();
       
        if($foto =$request->file('foto')){
            $rutaGuardarImg = 'foto/';
            $imagenProducto = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenProducto);
            $maestro['foto'] = "$imagenProducto";

        }

        Maestro::create($maestro);    
        return redirect()->route('maestro.index')->with('Agregar', 'ok');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupo::all();
        $maestro = Maestro::find($id);
        return view('maestros.Perfilmaestro', ['maestro'=>$maestro,'grupo'=>$grupo]);

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maestro $maestro)
    {
        
        return view('maestros.Editarmaestro', compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestro $maestro)
    {
        $this->validate(request(),[
            'matricula' => ['required','min:10', 'max:10'],
            'nombres' => ['required','max:30'],
            'apellidoP' => ['required','max:30'],
            'apellidoM' => ['required','max:30'],
            'fechaNac' => ['required'],
            'telefono' => ['required','max:10'],
            'correo' => ['required','max:50'],
            'status' => ['required'],
            'especialidad' => ['required','max:50'],
            'curp' => ['required','max:18','min:18'],
            'domicilio' => ['required','max:100'],

        ]);
       
        $maes = $request->all();

        if($foto =$request->file('foto')){
            $rutaGuardarImg = 'foto/';
            $imagenProducto = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenProducto);
            $maes['foto'] = "$imagenProducto";
        }else{
            unset($maes['foto']);
        }
        $maestro->update($maes);
        return redirect()->route('maestro.index')->with('Editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestro $maestro)
    {
        $maestro->delete();
        return redirect()->route('maestro.index')->with('Eliminar', 'ok');
    }

    public function pdf()
    {
        $maestro=Maestro::all();
        $pdf = Pdf::loadView('Maestros.Pdfmaestros', compact('maestro'));
        return $pdf->stream();
    }

    /*public function pdf()
    {
        $maestro=Maestro::all();
        $pdf = Pdf::loadView('preinscripcion.Pdfpre', compact('maestro'));
        return $pdf->stream();
    }*/

}
