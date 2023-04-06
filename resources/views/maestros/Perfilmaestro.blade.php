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
              <li class="breadcrumb-item"><a href="/Indexmaestro">Lista de profesores</a></li>
              <li class="breadcrumb-item active">Profesor {{$maestro->nombres}}</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <div class="card card-danger card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if ($maestro->status == 1)
                    <h6 class="m-0 font-weight-bold text-success text-center"><i class="fas fa-circle"></i> Activo</h6>
                  @else
                    <h6 class="m-0 font-weight-bold text-danger text-center"><i class="fas fa-times"></i> Inactivo</h6>
                  @endif
                  <br>
                  <img class="profile-user-img img-fluid img-circle" 
                  src="{{ asset('foto').'/'.$maestro->foto}}" alt="User profile picture"  style="height: 150px; width: 150px">
                </div>
                <br>
                <h3 class="profile-username text-center">{{$maestro->nombres}} 
                  {{$maestro->apellidoP}} {{$maestro->apellidoM}} </h3>

                <p class="text-muted text-center">{{$maestro->especialidad}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Matricula:</b> <a class="float-right">{{$maestro->matricula}}</a>
                  </li>
                  <li class="list-group-item">
                    <b> Curp:</b> <a class="float-right">{{$maestro->curp}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Edad:</b> <a class="float-right">{{$maestro->edad}}</a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-phone-alt"></i> Telefono:</b> <a class="float-right">{{$maestro->telefono}}</a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-envelope"></i>  Correo electrónic</b> <a class="float-right">{{$maestro->correo}}</a>
                  </li>
                </ul>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-">
                      <a href="{{route('maestro.edit',$maestro)}}">
                        <button type="button" class="btn btn-outline-warning">Editar información</button>
                      </a> 
                    </div>
                    <div class="form-group col-md-4">
                    <a href="">
                      <button type="button" class="btn btn-outline-info"> <i class="fas fa-file-alt"></i> PDF</button>
                    </a>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="card card">
              <div class="card-header text-danger">
                <h3 class="card-title">Más sobre mi </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
                <p class="text-muted">{{$maestro->domicilio}}</p>
                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-5">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <h6 class="m-0 font-weight-bold text-danger">Grupos asignados</h6>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                
                <div class="table-responsive my-3">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Grupo</th>
                        <th>Estado</th>            
                      </tr>
                    </thead>
                    <tbody>
                     
                          <tr>
                            <td><a href=""></a></td>
                            <td>
                                  
                            </td>
                          </tr>
                     
                      
                        <h6>No se ha asignado grupo al profesor. </h6> 
                        <a href="{{route ('grupo.create')}}">
                          ¿Desea asignar grupo?
                        </a>
                     
                    </tbody>
                  </table>
                </div>   


            
                </div>
              </div>
            </div>
          </div>
          
        </div>
  </div>
</section>

@endsection