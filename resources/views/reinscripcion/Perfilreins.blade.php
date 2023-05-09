@extends('menutema')

@section('titulo')
Grados y grupos | Sistema escolar
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Indexgrupo">Grupos</a></li>
              <li class="breadcrumb-item active"> {{$grupo->nombre}}</li>
            </ol>
          </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Lista de alumnos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-3">
                        <p class="font-weight-bold"> {{$grupo->ciclo->nombre}}</p> 
                    </div>
                    <div class="col-12 col-sm-2">
                        <b>Grado y grupo:</b> <a class=" text-secondary"> {{$grupo->nombre}}</a>
                    </div>
                    <div class="col-12 col-sm-3">
                        <b> Profesor: </b>  <a class=" text-secondary">{{$grupo->maestro->nombres}} {{$grupo->maestro->apellidoP}} {{$grupo->maestro->apellidoM}} </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <form  method="GET" action="{{ route('grupo.show', ['id' => $grupo->id]) }}" class="form-inline my-2 my-lg-0 float-right">
                            <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                            <input type="submit" class="btn btn-outline-danger" value="Buscar">
                        </form>
                    </div>
                </div>
                
               
                <div class="table-responsive my-3">
                    <table class="table table-bordered" id="dataTable"  cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 80px">Matricula</th>
                                <th style="width: 120px">Curp</th>
                                <th style="width: 200px">Primer apellido</th>
                                <th style="width: 200px">Segundo apellido</th>
                                <th style="width: 100px">Nombre(s)</th>
                                <th style="width: 100px">Calificación</th>
                                <th style="width: 100px">Estatus</th>
                                <th style="width: 100px">Accion</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if ($grupo->procesos->count() > 0)
                                @foreach ($grupo->procesos as $proceso )
                                    <tr>
                                        <td> <a href="{{ route('grupo.perfil', ['id' => $proceso->id]) }}"> {{$proceso->alumno->matricula}}</a> </td>
                                        <td>{{$proceso->alumno->curp}} </td>
                                        <td>{{$proceso->alumno->apellidoP}}</td>
                                        <td>{{$proceso->alumno->apellidoM}}</td>
                                        <td>{{$proceso->alumno->nombres}}</td>
                                        <td>{{$proceso->calificacion}}</td>
                                        <td>
                                            @if ($proceso->calificacion >= 6.5)
                                                <button class="btn btn-success">A</button>
                                                @else
                                                <button class="btn btn-danger">NA</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($proceso->calificacion >= 6.5)
                                                <a href="{{route('reins.create',$proceso)}}">
                                                    <button class="btn btn-outline-primary">Reinscribir</button>
                                                </a>
                                                @else
                                                
                                            @endif
                                            
                                        </td>
                                    </tr>      
                                @endforeach
                            @endif
                        </tbody>
                    </table>                        
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                    
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                            
                            </ul>
                           
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection