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
              <li class="breadcrumb-item"><a href="/Indexpre">Preinscripción</a></li>
              <li class="breadcrumb-item active">Ficha de preinscripción</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-danger">Detalles de ficha de preinscripción</h3>

    <h3 class="card-title text float-right"><b>Fecha de registro:</b> {{ date('d - m - Y', strtotime($proceso->created_at))}}</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12">
            <h4>Información del papá</h4>
              <div class="post">
                <div class="user-block">
                  <span class="username">
                    <a class="float">{{$proceso->alumno->padre->nombresP}} {{$proceso->alumno->padre->apellido1P}} {{$proceso->alumno->padre->apellido2P}} </a>
                  </span>
                  <span class="description">Fecha de nacimiento:  {{$proceso->alumno->padre->fechaNacP}}</span>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-5">
                      <b>Edad:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->edadP}} años</a>
                      <br>
                      <b>¿Vive?</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->viveP}}</a>
                      <br>
                      <b>¿Lee y escribe?</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->leeYescribeP}}</a>
                  </div>
                  <div class="col-12 col-sm-5">
                    <b>Curp:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->curpP}}</a>
                    <br>
                    <b>Escolaridad:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->escolaridadP}}</a>
                    <br>
                    <b>Número de hijos:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->noHijosP}}</a>
                  </div>
                </div>
              </div>
              <h4>Información de la mamá</h4>
              <div class="post clearfix">
                <div class="user-block">
                  <span class="username">
                    <a class="float">{{$proceso->alumno->padre->nombresM}} {{$proceso->alumno->padre->apellido1M}} {{$proceso->alumno->padre->apellido2M}} </a>
                  </span>
                  <span class="description">Fecha de nacimiento:  {{$proceso->alumno->padre->fechaNacM}}</span>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-5">
                      <b>Edad:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->edadM}} años</a>
                      <br>
                      <b>¿Vive?</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->viveM}}</a>
                      <br>
                      <b>¿Lee y escribe?</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->leeYescribeM}}</a>
                  </div>
                  <div class="col-12 col-sm-5">
                    <b>Curp:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->curpM}}</a>
                    <br>
                    <b>Escolaridad:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->escolaridadM}}</a>
                    <br>
                    <b>Número de hijos:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->noHijosM}}</a>
                  </div>
                </div>
              </div>
              <h4>Información del tutor</h4>
              <div class="post">
                <div class="user-block">
                   
                  <span class="username">
                    <a class="float">{{$proceso->alumno->padre->nombresT}} {{$proceso->alumno->padre->apellido1T}} {{$proceso->alumno->padre->apellido2T}} </a>
                  </span>
                  <span class="description">Fecha de nacimiento:  {{$proceso->alumno->padre->fechaNacT}}</span>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-5">
                      <b>Edad:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->edadT}} años</a>
                      <br>
                      <b>¿Vive?</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->viveT}}</a>
                      <br>
                      <b>¿Lee y escribe?</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->leeYescribeT}}</a>
                  </div>
                  <div class="col-12 col-sm-5">
                    <b>Curp:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->curpT}}</a>
                    <br>
                    <b>Escolaridad:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->escolaridadT}}</a>
                    <br>
                    <b>Número de hijos:</b> <a class="float-right text-secondary">{{$proceso->alumno->padre->noHijosT}}</a>
                  </div>
                </div>
              </div>
              <h4> <i class="fas fa-map-marker-alt mr-1"></i> Domicilio</h4>
              <div class="post">
                <div class="user-block">
                </div>
                <div class="row">
                  <div class="col-12 col-sm-7">
                  <p class="text-muted">{{$proceso->alumno->padre->calle}} {{$proceso->alumno->padre->numero}}, 
                        {{$proceso->alumno->padre->colonia}}, {{$proceso->alumno->padre->codigoP}}, {{$proceso->alumno->padre->localidad}}, {{$proceso->alumno->padre->municipio}}, 
                      </p>
                  </div>
                  <div class="col-12 col-sm-">
                   
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <div class="card-body box-profile">
          <div class="text-center">
            <h3 class="profile-username text-center">Aspirante</h3>
            <img class="profile-user-img img-fluid img-circle" 
            src="{{ asset('foto').'/'.$proceso->alumno->foto}}" alt="User profile picture"  style="height: 150px; width: 150px">
          </div>
          <br>
          <p class="text-muted text-center">{{$proceso->alumno->matricula}}</p>
          <ul class="list-group list-group-unbordered mb-3">  
            <li class="list-group-item">
              <b>Nombre(s):</b><a class="float-right">{{$proceso->alumno->nombres}}</a>
            </li>
            <li class="list-group-item">
              <b>Primer apellido:</b> <a class="float-right">{{$proceso->alumno->apellidoP}}</a>
            </li>
            <li class="list-group-item">
              <b>Segundo apellido:</b> <a class="float-right">{{$proceso->alumno->apellidoM}}</a>
            </li>
            <li class="list-group-item">
              <b>Sexo:</b> <a class="float-right">{{$proceso->alumno->sexo}}</a>
            </li>
            <li class="list-group-item">
              <b><i class="far fa-calendar-alt"></i> Fecha de nacimiento:</b> <a class="float-right">{{$proceso->alumno->fechaNac}}</a>
            </li>
            <li class="list-group-item">
              <b>Curp:</b> <a class="float-right">{{$proceso->alumno->curp}}</a>
            </li>
            <li class="list-group-item">
              <b><i class="fas fa-phone-alt"></i> Telefono:</b><a class="float-right">{{$proceso->alumno->telefono}}</a>
            </li>
            <li class="list-group-item">
              <b>Necesidades especiales:</b> <a class="float-right">{{$proceso->alumno->especialidad}}</a>
            </li>
          </ul>
          <div class="text-center mt-5 mb-3">
            <a href="{{route('alumno.edit',$proceso->alumno)}}" class="btn btn-sm btn-primary">Editar información</a>
            <a href="{{ route('preinscripcion.pdf', ['id' => $proceso->id]) }}" target="_blank" class="btn btn-sm btn-warning"><i class="fas fa-download"></i> Descargar ficha</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

@endsection