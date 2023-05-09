<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Proceso;
use App\Models\Alumno;
use App\Models\Grupo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alumno = Alumno::all();
        $grupo = Grupo::all();
        $proceso = Proceso::orderBy('created_at','DESC')->get();
        return view('home', compact('alumno','proceso','grupo'));
    }

    public function store(Request $request)
    {
        request()->validate(Evento::$rules);
        $evento=Evento::create($request->all());
    }
}
