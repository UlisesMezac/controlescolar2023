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
              <a href="{{route ('padre.create')}}" class="small-box-footer" style=" background-color:#E30707">
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
        </div>
    </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div id="agenda" class="card shadow mb-4">
      <div>

      </div>
    </div>
  </div>
</section>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evento">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">

        @csrf
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento.">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="descripcion">Descripción </label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="start">start</label>
            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="end">end</label>
            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>


        </form>
      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
      <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
      <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
       
      </div>
    </div>
  </div>
</div>
     
            



@endsection
