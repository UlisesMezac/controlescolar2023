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
              <li class="breadcrumb-item"><a href="/Indexpadre">Padres de familia</a></li>
              <li class="breadcrumb-item active">Ficha de preinscripción</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-danger">Detalles de padre de familia </h3>
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
                    <a class="float">{{$padre->nombresP}} {{$padre->apellido1P}} {{$padre->apellido2P}} </a>
                  </span>
                  <span class="description">Fecha de nacimiento:  {{$padre->fechaNacP}}</span>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-5">
                      <b>Edad:</b> <a class="float-right text-secondary">{{$padre->edadP}} años</a>
                      <br>
                      <b>¿Vive?</b> <a class="float-right text-secondary">{{$padre->viveP}}</a>
                      <br>
                      <b>¿Lee y escribe?</b> <a class="float-right text-secondary">{{$padre->leeYescribeP}}</a>
                  </div>
                  <div class="col-12 col-sm-5">
                    <b>Curp:</b> <a class="float-right text-secondary">{{$padre->curpP}}</a>
                    <br>
                    <b>Escolaridad:</b> <a class="float-right text-secondary">{{$padre->escolaridadP}}</a>
                    <br>
                    <b>Número de hijos:</b> <a class="float-right text-secondary">{{$padre->noHijosP}}</a>
                  </div>
                </div>
              </div>
              <h4>Información de la mamá</h4>
              <div class="post clearfix">
                <div class="user-block">
                  <span class="username">
                    <a class="float">{{$padre->nombresM}} {{$padre->apellido1M}} {{$padre->apellido2M}} </a>
                  </span>
                  <span class="description">Fecha de nacimiento:  {{$padre->fechaNacM}}</span>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-5">
                      <b>Edad:</b> <a class="float-right text-secondary">{{$padre->edadM}} años</a>
                      <br>
                      <b>¿Vive?</b> <a class="float-right text-secondary">{{$padre->viveM}}</a>
                      <br>
                      <b>¿Lee y escribe?</b> <a class="float-right text-secondary">{{$padre->leeYescribeM}}</a>
                  </div>
                  <div class="col-12 col-sm-5">
                    <b>Curp:</b> <a class="float-right text-secondary">{{$padre->curpM}}</a>
                    <br>
                    <b>Escolaridad:</b> <a class="float-right text-secondary">{{$padre->escolaridadM}}</a>
                    <br>
                    <b>Número de hijos:</b> <a class="float-right text-secondary">{{$padre->noHijosM}}</a>
                  </div>
                </div>
              </div>
              <h4>Información del tutor</h4>
              <div class="post">
                <div class="user-block">
                   
                  <span class="username">
                    <a class="float">{{$padre->nombresT}} {{$padre->apellido1T}} {{$padre->apellido2T}} </a>
                  </span>
                  <span class="description">Fecha de nacimiento:  {{$padre->fechaNacT}}</span>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-5">
                      <b>Edad:</b> <a class="float-right text-secondary">{{$padre->edadT}} años</a>
                      <br>
                      <b>¿Vive?</b> <a class="float-right text-secondary">{{$padre->viveT}}</a>
                      <br>
                      <b>¿Lee y escribe?</b> <a class="float-right text-secondary">{{$padre->leeYescribeT}}</a>
                  </div>
                  <div class="col-12 col-sm-5">
                    <b>Curp:</b> <a class="float-right text-secondary">{{$padre->curpT}}</a>
                    <br>
                    <b>Escolaridad:</b> <a class="float-right text-secondary">{{$padre->escolaridadT}}</a>
                    <br>
                    <b>Número de hijos:</b> <a class="float-right text-secondary">{{$padre->noHijosT}}</a>
                  </div>
                </div>
              </div>
              <h4> <i class="fas fa-map-marker-alt mr-1"></i> Domicilio</h4>
              <div class="post">
                <div class="user-block">
                </div>
                <div class="row">
                  <div class="col-12 col-sm-7">
                  <p class="text-muted">{{$padre->calle}} {{$padre->numero}}, 
                        {{$padre->colonia}}, {{$padre->codigoP}}, {{$padre->localidad}}, {{$padre->municipio}}, 
                      </p>
                  </div>
                  <div class="col-12 col-sm-">
                  <div class="text-center mt-5 mb-3">
                    <a href="{{route('padre.edit',$padre)}}" class="btn btn-sm btn-primary">Editar información</a>
                    <a href="" target="_blank" class="btn btn-sm btn-warning"><i class="fas fa-download"></i> Descargar ficha</a>
                  </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h6 class="m-0 font-weight-bold text-danger">Número de hijos</h6>
          <div class="tab-content">
            <div class="table-responsive my-3">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Matricula</th>
                    <th>Alumno</th>            
                  </tr>
                </thead>
                <tbody>
                @if ($padre->hijos->count() > 0)
                  @foreach ($padre->hijos as $alumno ) 
                    <tr>
                      <td>{{$alumno->matricula}}</td>
                      <td><a href="{{ route('grupo.perfil', ['id' => $alumno->id]) }}">{{$alumno->nombres}} {{$alumno->apellidoP}} {{$alumno->apellidoM}} </a></td>
                    </tr>
                  @endforeach
                @else
                  <h6>No se encontraron hijos registrados al padre de familia.</h6> 
                @endif
                </tbody>
              </table>
            </div>   
          </div>
      </div>
    </div>
  </div>
</div>
</section>

@endsection