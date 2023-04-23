@extends('menutema')

@section('titulo')
Alumno | Sistema escolar
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Indexgrupo">Lista de grupos</a></li>
              <li class="breadcrumb-item active">{{$alumno->nombres}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</li>
            </ol>
          </div>
        </div>
    </div>
</section>

<section class="content">
  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="card card-danger card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <h4 class="m-0 font-weight-bold text-danger text-center">{{$alumno->grupo->nombre}}</h4>
                    <br>
                  <img class="profile-user-img img-fluid img-circle" 
                  src="{{ asset('foto').'/'.$alumno->foto}}" alt="User profile picture"  style="height: 150px; width: 150px">
                </div>
                <br>
                <h3 class="profile-username text-center"> {{$alumno->nombres}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Matricula:</b><a class="float-right"> {{$alumno->matricula}}</a>
                  </li>
                  <li class="list-group-item">
                    <b> Curp:</b> <a class="float-right">{{$alumno->curp}} </a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="far fa-calendar-alt"></i> Fecha de nacimiento:</b> <a class="float-right">{{$alumno->fechaNac}}</a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-phone-alt"></i> Telefono:</b> <a class="float-right">{{$alumno->telefono}}</a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-envelope"></i> Profesor: </b> <a class="float-right">{{$alumno->grupo->maestro->nombres}} {{$alumno->grupo->maestro->apellidoP}} {{$alumno->grupo->maestro->apellidoM}}</a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-user-friends"></i> Tutor: </b> <a class="float-right">{{$alumno->padre->nombresT}} {{$alumno->padre->apellido1T}} {{$alumno->padre->apellido2T}}</a>
                  </li>

                </ul>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                      <a href="{{route('alumno.edit',$alumno)}}">
                        <button type="button" class="btn btn-outline-warning">Editar información</button>
                      </a> 
                    </div>
                    <div class="form-group col-md-3">
                        <a href="{{ route('grupo.credencial', ['id' => $alumno->id]) }}" target="_blank">
                        <button type="button" class="btn btn-outline-success"><i class="fas fa-download"></i> Credencial</button>
                        </a>
                    </div>
                    <div class="form-group col-md-3">
                        <a href="">
                        <button type="button" class="btn btn-outline-info"> <i class="fas fa-download"></i> Constancia</button>
                        </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</section>                  
@endsection