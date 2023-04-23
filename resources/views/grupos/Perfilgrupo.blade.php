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
                                <th style="width: 200px">Curp</th>
                                <th style="width: 100px">Primer apellido</th>
                                <th style="width: 200px">Segundo apellido</th>
                                <th style="width: 100px">Nombre(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($grupo->alumnos->count() > 0)
                                @foreach ($grupo->alumnos as $alumno )
                                    <tr>
                                        <td> <a href="{{ route('grupo.perfil', ['id' => $alumno->id]) }}"> {{$alumno->matricula}}</a> </td>
                                        <td>{{$alumno->curp}} </td>
                                        <td>{{$alumno->apellidoP}}</td>
                                        <td>{{$alumno->apellidoM}}</td>
                                        <td>{{$alumno->nombres}}</td>
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
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <a href="{{ route('grupo.pdf', ['id' => $grupo->id]) }}" target="_blank" class="btn btn-sm btn-warning"><i class="fas fa-download"></i> Descargar lista de alunmos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection