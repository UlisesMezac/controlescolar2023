

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
              <li class="breadcrumb-item active">Editar ciclo escolar</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row justify-content-center" >
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style=" background-color:#ffff">
                    <h6 class="m-0 font-weight-bold text-danger">Editar información</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="mt-4" method="POST" action="{{route('cicloescolar.update',$ciclo)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put') 

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Ciclo escolar:</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="exampleInputEmail" name="nombre" value="{{$ciclo->nombre}}" required autocomplete="nombre" autofocus
                                    placeholder="Ej: Ciclo escolar 2020 - 2021">
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputState">Estado:</label>
                                        <select name="status" class="form-control">
                                            <option selected>
                                                @if ($ciclo->status == 1)
                                                    <h6 class="m-0 font-weight-bold text-success">Activo</h6>
                                                    @else
                                                    <h6 class="m-0 font-weight-bold text-danger"> Inactivo</h6>
                                                @endif
                                            </option>
                                            <option>Activo</option>
                                            <option>Inactivo</option>
                                    </select>
                                        @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="start">Fecha de inicio:</label>
                                
                                <input type="date" id="fechaIni" name="fechaIni"  class="form-control  @error('fechaIni') is-invalid @enderror"
                                value="{{$ciclo->fechaIni}}" min="2018-01-01" max="2050-12-31">
                                    @error('fechaIni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                <label for="start">Fecha de fin:</label>
                                <input type="date" id="fechaFin" name="fechaFin"  class="form-control @error('fechaFin') is-invalid @enderror"
                                value="{{$ciclo->fechaFin}}" min="2018-01-01" max="2050-12-31" >
                                    @error('fechaFin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-outline-warning">{{ __('Registrar') }}</button>
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