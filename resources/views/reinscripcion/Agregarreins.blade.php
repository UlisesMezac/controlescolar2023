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
                        <form class="" method="POST" action="{{route('reins.store',$proceso)}}" enctype="multipart/form-data">
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
                                    <label for="tramite_id">Tramite</label>
                                    <select name="tramite_id" class="form-control @error('tramite_id') is-invalid @enderror">
                                        @forelse ($tramite as $tramiteItem)
                                            @if ($tramiteItem->id == 4)     
                                                <option value="{{$tramiteItem->id}}">{{$tramiteItem->tramite}} </option>
                                            @endif         
                                        @endforeach
                                    </select>
                                        @error('tramite_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="cicloescolar_id">Ciclo escolar:</label>
                                    <select name="cicloescolar_id" class="form-control @error('cicloescolar_id') is-invalid @enderror">
                                        @forelse ($ciclo as $cicloItem)
                                            @if ($cicloItem->status == 1)  
                                                <option value="{{$cicloItem->id}}">{{$cicloItem->nombre}} </option>
                                            @endif 
                                        @endforeach
                                    </select>
                                        @error('cicloescolar_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grupos_id">Grupo:</label>
                                    <select name="grupos_id" class="form-control @error('grupos_id') is-invalid @enderror">
                                        @forelse ($grupo as $grupoItem)
                                                @if ($proceso->grupo->nombre == 1)
                                                        @if ($grupoItem->nombre == 2 && $grupoItem->procesos->count() < $grupoItem->capacidad && $grupoItem->status == 1)
                                                            <option value="{{$grupoItem->id}}">{{$grupoItem->nombre}} </option>
                                                        @endif
                                                @endif    
                                        @endforeach

                                        @forelse ($grupo as $grupoItem)
                                                @if ($proceso->grupo->nombre == 2)
                                                    @if ($grupoItem->nombre == 3 && $grupoItem->procesos->count() < $grupoItem->capacidad && $grupoItem->status == 1)
                                                        <option value="{{$grupoItem->id}}">{{$grupoItem->nombre}} </option>
                                                    @endif
                                                @endif    
                                        @endforeach

                                        @forelse ($grupo as $grupoItem)
                                                @if ($proceso->grupo->nombre == 3)
                                                    @if ($grupoItem->nombre == 4 && $grupoItem->procesos->count() < $grupoItem->capacidad && $grupoItem->status == 1)
                                                        <option value="{{$grupoItem->id}}">{{$grupoItem->nombre}} </option>
                                                    @endif
                                                @endif    
                                        @endforeach

                                        @forelse ($grupo as $grupoItem)
                                                @if ($proceso->grupo->nombre == 4)
                                                    @if ($grupoItem->nombre == 5 && $grupoItem->procesos->count() < $grupoItem->capacidad && $grupoItem->status == 1)
                                                        <option value="{{$grupoItem->id}}">{{$grupoItem->nombre}} </option>
                                                    @endif
                                                @endif    
                                        @endforeach

                                        @forelse ($grupo as $grupoItem)
                                                @if ($proceso->grupo->nombre == 5)
                                                    @if ($grupoItem->nombre == 6 && $grupoItem->procesos->count() < $grupoItem->capacidad && $grupoItem->status == 1)
                                                        <option value="{{$grupoItem->id}}">{{$grupoItem->nombre}} </option>
                                                    @endif
                                                @endif    
                                        @endforeach


                                    </select>
                                        @error('grupos_id')
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