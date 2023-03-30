<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cicloescolar;


class CicloescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->texto;
        $ciclo = Cicloescolar::where('nombre','LIKE','%'.$texto.'%')
                    ->orWhere('fechaIni','LIKE','%'.$texto.'%')
                    ->orWhere('fechaFin','LIKE','%'.$texto.'%')
                    ->latest('id')
                    ->orderBy('nombre','asc')
                    ->paginate(10);
        $data=[
            'ciclo'=>$ciclo,
            'texto'=>$texto,
        ];

        return view('cicloescolar.Index',compact('ciclo'));
        return view('home',compact('ciclo'));
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cicloescolar.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre' => ['required', 'string','min:5','max:30','unique:cicloescolar'],
            'fechaIni' => 'required',
            'fechaFin' => 'required',
            'status' => 'required',
        ]);
        $ciclo =  Cicloescolar::create(request([
            'nombre',
            'fechaIni',
            'fechaFin',
            'status',
            ]));
     
            
            return redirect()->route('cicloescolar.index')->with('Agregar', 'ok');

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
    public function edit(Cicloescolar $ciclo)
    {
        return view('cicloescolar.Editar', compact('ciclo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cicloescolar $ciclo)
    {
        
        $ciclo->nombre=$request->nombre;
        $ciclo->fechaIni=$request->fechaIni;
        $ciclo->fechaFin=$request->fechaFin;
        $ciclo->status=$request->status;
        $ciclo->save();
        return redirect()->route('cicloescolar.index')->with('Editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciclo = Cicloescolar::find($id);
        $ciclo->delete();

        return redirect()->route('cicloescolar.index')->with('Eliminar', 'ok');
    }
}
