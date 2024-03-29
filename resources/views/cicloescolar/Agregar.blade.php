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
              <li class="breadcrumb-item"><a href="/Index">Lista de ciclo escolar</a></li>
              <li class="breadcrumb-item active">Agregar ciclo escolar</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color:#E30707">
                    <h6 class="m-0 font-weight-bold text-light">Registrar ciclo escolar</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="mt-4" method="POST" action="{{route('cicloescolar.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="exampleInputEmail1" class="form-label">Ciclo escolar:</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="nombre"  aria-describedby="emailHelp" value="{{ old('nombre') }}"
                                    placeholder="Ej: Ciclo escolar 2020 - 2021">
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado:</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1" class="form-label">Capacidad:</label>
                                        <input type="number" class="form-control form-control-user @error('capacidad') is-invalid @enderror"
                                        id="exampleInputEmail" name="capacidad" value="{{ old('capacidad') }}">

                                                @error('capacidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                            </div>
                            <div class="mb-4">
                                    <label for="start">Fecha de inicio:</label>
                                    <input type="date" id="fechaIni" name="fechaIni"  class="form-control @error('fechaIni') is-invalid @enderror"
                                    value="{{ old('fechaIni') }}" min="2023-01-01" max="20250-12-31">
                                        @error('fechaIni')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            <div class="mb-4">
                                        <label for="start">Fecha de fin:</label>
                                        <input type="date" id="fechaFin" name="fechaFin"  class="form-control @error('fechaFin') is-invalid @enderror"
                                        value="{{ old('fechaFin') }}" min="2024-01-01" max="2050-12-31">
                                            @error('fechaFin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                            </div>    
                       
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-outline-success">{{ __('Registrar') }}</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <a href="{{route('cicloescolar.index')}}">
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

@section('js')

@endsection