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
              <li class="breadcrumb-item active">Preinscripción</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style=" background-color:#ffff">
                <h6 class="m-0 font-weight-bold text-danger">Lista de fichas de preinscripción</h6>
            </div>
            <div class="card-body">
                @foreach ($ciclo as $cicloItem)
                    @if ($cicloItem->status ==1)
                        @if ($proceso->count() == $cicloItem->capacidad)
                            <a href="">
                                <form action="" class="d-inline ventana-2">
                                    <button type="submit" class="btn btn-outline-primary"> <i class="far fa-calendar"></i>+ Nuevo</button>
                                </form>
                            </a>
                        @else
                            <a href="{{route('alumno.create')}}">
                            <button type="button" class="btn btn-outline-primary"> <i class="far fa-calendar"></i> + Nuevo</button>
                            </a>
                        @endif
                    @endif
                @endforeach
                <form  method="GET" action="{{route('preinscripcion.index')}}" class="form-inline my-2 my-lg-0 float-right">
                    <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                    
                    <input type="submit" class="btn btn-outline-danger" value="Buscar">
                </form>
                @foreach ($ciclo as $cicloItem)
                    @if ($cicloItem->status ==1)
                        @if ($proceso->count() == $cicloItem->capacidad)
                            <h6 class="m-0 font-weight-bold text-danger">¡Espacio insuficiente!</h6>
                        @else
                            <h6 class="m-0 font-weight-bold text-success">¡Hay espacio suficiente!</h6>
                        @endif
                    @endif
                @endforeach
                   
                <div class="table-responsive my-3 justify-content-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 30px">Folio</th>
                                <th style="width: 100px">Matricula</th>
                                <th style="width: 80px">Curp</th>
                                <th style="width: 150px">Nombre</th>
                                <th style="width: 130px ">Acción</th>
                            </tr>
                        </thead>
                        @forelse ($proceso as $procesoItem)
                            <tbody>
                                <tr>
                                @if ($procesoItem->tramite_id == 1)
                                    <td>{{$procesoItem->id}}</td>
                                    <td>{{$procesoItem->alumno->matricula}}</td>
                                    <td>{{$procesoItem->alumno->curp}}</td>
                                    <td>{{$procesoItem->alumno->nombres}} {{$procesoItem->alumno->apellidoP}} {{$procesoItem->alumno->apellidoM}} </td>
                                    <td>  
                                        <form action="" class="d-inline formulario-eliminar" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger float-right waves-effect px-3 ml-2"><i class="fas fa-trash" aria-hidden="true"></i></button>        
                                        </form>
                                        <a href="{{route('preinscripcion.edit',$procesoItem)}}">
                                            <button class="btn btn-outline-warning float-right waves-effect px-3 ml-2"><i class="far fa-edit" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{ route('preinscripcion.show', ['id' => $procesoItem->id]) }}">
                                            <button class="btn btn-outline-primary float-right px-3"><i class="fas fa-users-cog" aria-hidden="true"></i></button>
                                        </a>

                                    </td>
                                @endif
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
                      Mostrando  {{$proceso->count()}} elementos de  {{$proceso->currentPage()}} entradas.
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                            {{$proceso->links()}}
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
    <script>
        $('.ventana-2').submit(function(e){

            e.preventDefault();
            Swal.fire({
            icon: 'warning',
            title: 'Alerta',
            text: '¡Ya no hay espacio suficiente!',
                })
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Editar') == 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Su archivo ha sido actualizado con exito',
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
