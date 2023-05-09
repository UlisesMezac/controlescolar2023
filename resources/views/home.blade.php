@extends('menutema')

@section('titulo')
    Menú principal | Sistema escolar
@endsection


@section('content')

<section class="content-header">
      <div class="container-fluid">
      </div>
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg" style=" background-color:#ffff">
              <div class="inner">
                <h3>150</h3>
                <p>Ciclo escolar</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <a href="{{route ('cicloescolar.index')}}" class="small-box-footer" style=" background-color:#E30707">
                Consultar <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg" style=" background-color:#ffff">
              <div class="inner">
                <h3>65</h3>
                <p>Profesores</p>
              </div>
              <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="{{route ('maestro.index')}}" class="small-box-footer" style=" background-color:#E30707">
                Consultar <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg" style=" background-color:#ffff">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Alumnos</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="{{route ('grupo.index')}}" class="small-box-footer" style=" background-color:#E30707">
                Consultar<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg" style=" background-color:#ffff">
              <div class="inner">
                <h3>44</h3>
                <p>Padres de familia</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{route ('padre.index')}}" class="small-box-footer" style=" background-color:#E30707">
                Consultar <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
    </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card card-widget">
          <div class="card-header">
            <div class="user-block">
              <span class="username"><i class="fas fa-exclamation-circle"></i> Alumnos no aprobados</span>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive my-3 justify-content-center">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Matricula</th>
                    <th>Alumno</th>
                    <th>Grupo</th>
                    <th>Calificación</th>
                  </tr>
                </thead>
                @forelse ($proceso as $procesoItem)
                  @if ($procesoItem->calificacioin < 6.5)
                  <tbody>
                    <tr>
                      <td><a href="{{ route('grupo.perfil', ['id' => $procesoItem->id]) }}">{{$procesoItem->alumno->matricula}} </a></td>
                      <td>{{$procesoItem->alumno->nombres}}</td>
                      <td>{{$procesoItem->grupo->nombre}}</td>
                      <td>{{$procesoItem->calificacion}}</td>
                    </tr>
                  </tbody>
                  @else
                    <h4>No se encontraron registros</h4>
                  @endif
                @empty
                    <h4>No se encontraron registros</h4>
                @endforelse
              </table>
            </div>
          </div> 
        </div>       
      </div>

     
   
  </div>
</section>
@endsection
