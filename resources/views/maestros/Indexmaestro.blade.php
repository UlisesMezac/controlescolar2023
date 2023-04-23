

@extends('menutema')
@section('titulo')
Maestros | Sistema escolar
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
              <li class="breadcrumb-item active">Profesores</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style=" background-color:#ffff">
                <h6 class="m-0 font-weight-bold text-danger">Lista de profesores</h6>
            </div>
            <div class="card-body">
                <a href="{{route('maestro.create')}}">
                <button type="button" class="btn btn-outline-primary"> <i class="fas fa-chalkboard-teacher"></i>  Agregar profesor</button>
                </a>

                <a href="{{route('maestro.pdf')}}" target="_blank">
                      <button type="button" class="btn btn-outline-info"> <i class="fas fa-file-alt"></i> PDF</button>
                </a>
                <form  method="GET" action="{{route('maestro.index')}}" class="form-inline my-2 my-lg-0 float-right">
                    <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                    
                    <input type="submit" class="btn btn-outline-danger" value="Buscar">
                </form>
                <div class="table-responsive my-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre(s)</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Estado</th>
                                <th style="width: 250px">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maestro as $maestroItem)
                            <tr>
                                <td>{{$maestroItem->matricula}}</td>
                                <td>{{$maestroItem->nombres}}</td>
                                <td>{{$maestroItem->apellidoP}} </td>
                                <td> {{$maestroItem->apellidoM}}</td>
                                <td align="center">
                                        @if ($maestroItem->status == 1)
                                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-circle"></i> Activo</h6>
                                            @else
                                            <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-times"></i> Inactivo</h6>
                                        @endif
                                </td>
                                <td>
                                        <form action="{{route('maestro.destroy',$maestroItem)}}" class="d-inline formulario-eliminar" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger float-right waves-effect px-3 ml-2"><i class="fas fa-trash" aria-hidden="true"></i></button>        
                                        </form>

                                        <a href="{{route('maestro.edit',$maestroItem)}}">
                                                    <button class="btn btn-outline-warning float-right waves-effect px-3 ml-2"><i class="far fa-edit" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{ route('maestro.show', ['id' => $maestroItem->id]) }}">
                                            <button class="btn btn-outline-primary float-right px-3"><i class="fas fa-users-cog" aria-hidden="true"></i></button>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                      Mostrando  {{$maestro->count()}} elementos de  {{$maestro->currentPage()}} entradas.
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                            {{$maestro->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<!--link de modal --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
@if (session('Editar') == 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Se archivo ha sido actualizado con exito',
        showConfirmButton: false,
        timer: 1500
        })
       </script> 
    @endif
    @if (session('Agregar') == 'ok')
        <script>
       Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Su archivo ha sido registrado con exito',
        showConfirmButton: false,
        timer: 1500
        })
       </script>
    @endif
@if (session('Eliminar') == 'ok')
       <script>
        Swal.fire(
      'Eliminado!',
      'Su archivo ha sido eliminado.',
      'success'
    )
       </script> 
    @endif
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        
        Swal.fire({
        title: '¿Desea eliminar ?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
        if (result.isConfirmed) {
           this.submit();
        }
        })
    });
   </script>
@endsection