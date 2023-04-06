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
              <li class="breadcrumb-item active">Registrar nuevo maestro</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row justify-content-center" >
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color:#E30707">
                    <h6 class="m-0 font-weight-bold text-light">Registrar nuevo maestro</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="mt-4" method="POST" action="{{route('maestro.store')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Nombre(s):</label>
                                        <input type="text" class="form-control form-control-user @error('nombres') is-invalid @enderror"
                                        id="exampleInputEmail" name="nombres"  value="{{old('nombres')}}">
                                            @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Apellido paterno:</label>
                                        <input type="text" class="form-control form-control-user @error('apellidoP') is-invalid @enderror"
                                        id="exampleInputEmail" name="apellidoP"   value="{{old('apellidoP')}}">
                                            @error('apellidoP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                                        <input type="text" class="form-control form-control-user @error('apellidoM') is-invalid @enderror"
                                        id="exampleInputEmail" name="apellidoM"  value="{{old('apellidoM')}}">
                                            @error('apellidoM')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Matricula:</label>
                                        <input type="number" class="form-control form-control-user @error('matricula') is-invalid @enderror"
                                        id="exampleInputEmail" name="matricula"  value="{{old('matricula')}}">
                                            @error('matricula')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad:</label>
                                            <input type="number"  class="form-control form-control-user @error('edad') is-invalid @enderror"
                                            id="exampleInputEmail" name="edad"  value="{{old('edad')}}">
                                                    @error('edad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                    </div>

                                    <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1" class="form-label">CURP:</label>
                                            <input type="text" class="form-control form-control-user @error('curp') is-invalid @enderror" 
                                            style="text-transform:uppercase;" onblur="upperCase()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            id="" name="curp"   value="{{old('curp')}}">
                                                @error('curp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div> 
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Teléfono:</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                                </div>
                                                <input type="number" class="form-control fas fa-phone form-control-user @error('telefono') is-invalid @enderror" 
                                                name="telefono"  value="{{old('telefono')}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                                @error('telefono')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>       
                                    </div>

                                    <div class="form-group col-md-8">
                                            <label for="exampleInputEmail1" class="form-label">Especialidad:</label>
                                            <input type="text" class="form-control form-control-user @error('especialidad') is-invalid @enderror"
                                            id="exampleInputEmail" name="especialidad"  value="{{old('especialidad')}}">
                                                @error('especialidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                            <label for="exampleInputEmail1" class="form-label">Correo:</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                                </div>
                                                <input type="email" class="form-control form-control-user @error('correo') is-invalid @enderror" name="correo"  value="{{old('correo')}}">
                                                @error('correo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>   
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Estado:</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option selected>{{old('status')}}</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                            @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto" id="exampleFormControlFile1">
                                            <label class="custom-file-label" for="exampleFormControlFile1" data-browse="Foto">Seleccione una foto</label>
                                            @error('foto')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>             
                                </div>

                            

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1" class="form-label">Domicilio:</label>
                                            <input type="text" class="form-control form-control-user @error('domicilio') is-invalid @enderror"
                                            id="exampleInputEmail" name="domicilio"  value="{{old('domicilio')}}">
                                                @error('domicilio')
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
                                        <a href="{{route('maestro.index')}}">
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
<script type="text/javascript">
function upperCase() {
   var x=document.getElementById("fname").value
   document.getElementById("fname").value=x.toUpperCase()
}
</script>

@endsection
