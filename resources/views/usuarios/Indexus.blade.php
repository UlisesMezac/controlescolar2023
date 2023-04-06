@extends('menutema')

@section('titulo')
    Usuarios | Sistema escolar
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
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style=" background-color:#ffff">
                <h6 class="m-0 font-weight-bold text-danger">Lista de usuarios</h6>
            </div>
            <div class="card-body">
                <a href="register">
                <button type="button" class="btn btn-outline-primary"> <i class="fas fa-user"></i>  +Nuevo</button>
                </a>

                <form  method="GET" action="" class="form-inline my-2 my-lg-0 float-right">
                    <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                    
                    <input type="submit" class="btn btn-outline-danger" value="Buscar">
                </form>
                <div class="table-responsive my-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre(s)</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Cuenta</th>
                               
                                <th style="width: 150px">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $userItem)
                            <tr>
                                <td>{{$userItem->name}}</td>
                                <td>{{$userItem->apellidoP}} </td>
                                <td> {{$userItem->apellidoM}}</td>
                                <td>{{$userItem->email}}</td>
                               
                               
                                <td>
                                        <form action="" class="d-inline formulario-eliminar" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-outline-danger float-right waves-effect px-3 ml-2"><i class="fas fa-trash" aria-hidden="true"></i></button>        
                                        </form>

                                        <a href="">
                                                    <button class="btn btn-outline-warning float-right waves-effect px-3 ml-2"><i class="far fa-edit" aria-hidden="true"></i></button>
                                        </a>
                                        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection