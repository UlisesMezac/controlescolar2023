@extends('menutema')

@section('titulo')
Inscripción | Sistema escolar
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Menú principal</a></li>
              <li class="breadcrumb-item active">Inscripciones</li>
            </ol>
          </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
         <!-- FORMULARIO PARA AGREGAR  -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Lista de fichas de preinscripción</h6>
            </div>
            <div class="card-body">
                
                <form  method="GET" action="{{route('inscripcion.index')}}" class="form-inline my-2 my-lg-0 float-right">
                    <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                    
                    <input type="submit" class="btn btn-outline-danger" value="Buscar">
                </form>
                <div class="table-responsive my-3">
                    <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 30px">Folio</th>
                                <th style="width: 100px">Matricula</th>
                                <th style="width: 80px">Curp</th>
                                <th style="width: 150px">Nombre</th>
                                <th style="width: 60px ">Acción</th>
                            </tr>
                        </thead>
                        @forelse ($alumno as $alumnoItem)
                            <tbody>
                                <tr>
                                    <td>{{$alumnoItem->id}}</td>
                                    <td>{{$alumnoItem->matricula}}</td>
                                    <td >{{$alumnoItem->curp}}</td>
                                    <td>{{$alumnoItem->nombres}} {{$alumnoItem->apellidoP}} {{$alumnoItem->apellidoM}}</td>
                                    <td>
                                  @if ($alumnoItem->tramite_id == 1)
                                    <a href="{{route('inscripcion.create',$alumnoItem)}}">
                                        <button type="button" class="btn btn-sm btn-warning">Inscribir <i class="fas fa-angle-right"></i></button>
                                    </a>
                                    @else
                                    <a href="">
                                        <button type="button" class="btn btn-sm btn-success">Inscrito </button>
                                    </a>
                                  @endif
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                            <h4>No se encontraron registros</h4>
                        @endforelse
                    </table>                        
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                     
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                           
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection