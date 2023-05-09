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
              <li class="breadcrumb-item"><a href="/Index">Lista de periodos escolar</a></li>
              <li class="breadcrumb-item active">Agregar ciclo escolar</li>
            </ol>
          </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="row justify-content-center" >
        <div class="col-lg-10 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color:#E30707">
                    <h6 class="m-0 font-weight-bold text-light">Reinscripción</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="" method="POST" action="{{route('alumno.guardar',$proceso)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put') 
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div  data-target="">
                                        <div class="step-trigger" >
                                            <span class="bs-stepper-circle" style=" background-color:#E30707">1</span>
                                            <span class="bs-stepper-label">DATOS DEL ASPIRANTE</span>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="alumnos_id">Alumno</label>
                                    <select name="alumnos_id" class="form-control @error('alumnos_id') is-invalid @enderror">
                                        <option value="{{$proceso->alumno->id}}"> {{$proceso->alumno->nombres}} {{$proceso->alumno->apellidoP}} {{$proceso->alumno->apellidoM}}</option>
                                    </select>
                                        @error('tramite_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grupos_id">Profesor</label>
                                    <select name="grupos_id" class="form-control @error('tramite_id') is-invalid @enderror">
                                        <option value="{{$proceso->grupo->maestro->id}}"> {{$proceso->grupo->maestro->nombres}} {{$proceso->grupo->maestro->apellidoP}} {{$proceso->grupo->maestro->apellidoM}}</option>
                                    </select>
                                        @error('tramite_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grupos_id">Grupo:</label>
                                    <select name="grupos_id" class="form-control @error('grupos_id') is-invalid @enderror">
                                        <option value="{{$proceso->grupo->id}}"> {{$proceso->grupo->nombre}}</option>
                                    </select>
                                    </select>
                                        @error('grupos_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Asignar calificación final:</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control @error('calificacion') is-invalid @enderror"  
                                        id="exampleInputEmail1" name="calificacion"  aria-describedby="emailHelp" value="{{old('calificacion')}}">
                                            @error('calificacion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                    </div>   
                                </div>
                        
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-outline-success">{{ __('Registrar') }}</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="{{route('preinscripcion.index')}}">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection