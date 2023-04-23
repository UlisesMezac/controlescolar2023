@extends('menutema')
@section('titulo')
Periodo escolar | Sistema escolar
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
              <li class="breadcrumb-item active">Ciclo escolar</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style=" background-color:#ffff">
                <h6 class="m-0 font-weight-bold text-danger">Lista de ciclo escolar</h6>
            </div>
            <div class="card-body">
                <a href="{{route('cicloescolar.create')}}">
                    <button type="button" class="btn btn-outline-primary"> <i class="far fa-calendar"></i> + Nuevo</button>
                </a>
                <form  method="GET" action="{{route('cicloescolar.index')}}" class="form-inline my-2 my-lg-0 float-right">
                    <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                    
                    <input type="submit" class="btn btn-outline-danger" value="Buscar">
                </form>
                <div class="table-responsive my-3 justify-content-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 300px">Nombre</th>
                                <th style="width: 120px">Fecha de inicio</th>
                                <th style="width: 130px">Fecha de fin</th>
                                <th style="width: 50px">Estatus</th>
                                <th style="width: 100px ">Acción</th>
                            </tr>
                        </thead>
                        @forelse ($ciclo as $cicloItem)
                            <tbody>
                                <tr>
                                    <td>{{$cicloItem->nombre}}</td>
                                    <td>{{$cicloItem->fechaIni}}</td>
                                    <td >{{$cicloItem->fechaFin}}</td>
                                    <td align="center">
                                        @if ($cicloItem->status == 1)
                                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-circle"></i> Activo</h6>
                                            @else
                                            <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-times"></i> Inactivo</h6>
                                        @endif
                                    </td>
                                    <td>
                                    
                                                <a href="{{route('cicloescolar.edit',$cicloItem)}}">
                                                    <button class="btn btn-outline-warning waves-effect px-3"><i class="far fa-edit"></i></button>
                                                </a>
                                       
                                                <form action="{{route('cicloescolar.destroy',['id' => $cicloItem->id])}}" class="d-inline formulario-eliminar" method="POST">
                                                    @csrf
                                                    @method('delete')       
                                                    <button  class="btn btn-outline-danger float-right waves-effect px-3 ">
                                                        <i class="fas fa-trash"></i>
                                                    </button> 
                                                </form>
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
                      Mostrando  {{$ciclo->count()}} elementos de  {{$ciclo->currentPage()}} entradas.
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                            {{$ciclo->links()}}
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

