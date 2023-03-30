
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
              <li class="breadcrumb-item active">Editar profesor</li>
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
                    <h6 class="m-0 font-weight-bold text-danger">Editar información </h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                    <form class="mt-4" method="POST" action="{{route('maestro.update',$maestro)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Nombre(s):</label>
                                        <input type="text" class="form-control form-control-user @error('nombres') is-invalid @enderror"
                                        id="exampleInputEmail" name="nombres"  required autocomplete="nombres" autofocus value="{{$maestro->nombres}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Apellido paterno:</label>
                                        <input type="text" class="form-control form-control-user @error('apellidoP') is-invalid @enderror"
                                        id="exampleInputEmail" name="apellidoP"  required autocomplete="nombre" autofocus value="{{$maestro->apellidoP}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                                        <input type="text" class="form-control form-control-user @error('apellidoM') is-invalid @enderror"
                                        id="exampleInputEmail" name="apellidoM"  required autocomplete="nombre" autofocus autofocus value="{{$maestro->apellidoM}}">
                                           
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Matricula:</label>
                                        <input type="number" class="form-control form-control-user @error('matricula') is-invalid @enderror"
                                        id="exampleInputEmail" name="matricula"  required autocomplete="nombre" autofocus autofocus value="{{$maestro->matricula}}">
                                           
                                    </div>
                                    <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad:</label>
                                            <input type="number"  class="form-control form-control-user @error('edad') is-invalid @enderror"
                                            id="exampleInputEmail" name="edad"  required autocomplete="nombre" autofocus autofocus value="{{$maestro->edad}}">
                                                
                                    </div>

                                    <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1" class="form-label">CURP:</label>
                                            <input type="text" class="form-control form-control-user @error('curp') is-invalid @enderror"
                                            style="text-transform:uppercase;" onblur="upperCase()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            id="exampleInputEmail" name="curp"  required autocomplete="curp" autofocus autofocus value="{{$maestro->curp}}">
                                    </div> 
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Teléfono:</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                                </div>
                                                <input type="number" class="form-control fas fa-phone form-control-user @error('telefono') is-invalid @enderror" name="telefono"  required autofocus value="{{$maestro->telefono}}">
                                            </div>       
                                    </div>

                                    <div class="form-group col-md-8">
                                            <label for="exampleInputEmail1" class="form-label">Especialidad:</label>
                                            <input type="text" class="form-control form-control-user @error('especialidad') is-invalid @enderror"
                                            id="exampleInputEmail" name="especialidad"  required autocomplete="especialidad" autofocus autofocus value="{{$maestro->especialidad}}">
                        
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                            <label for="exampleInputEmail1" class="form-label">Correo:</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                                </div>
                                                <input type="email" class="form-control form-control-user @error('correo') is-invalid @enderror" name="correo" required autofocus value="{{$maestro->correo}}">
                                              
                                            </div>   
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Estado:</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option selected>
                                                @if ($maestro->status == 1)
                                                    <h6 class="m-0 font-weight-bold text-success">Activo</h6>
                                                    @else
                                                    <h6 class="m-0 font-weight-bold text-danger"> Inactivo</h6>
                                                @endif
                                            </option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                           
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <img src="{{ asset('foto').'/'.$maestro->foto}}" 
                                            style="height: 50px; width: 50px;display: block; justify-content: center;">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto" id="customFileLangHTML">
                                            <label class="custom-file-label" for="customFileLangHTML" data-browse="Foto">Seleccione una foto</label>
                                           
                                        </div>
                                    </div>             
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1" class="form-label">Domicilio:</label>
                                            <input type="text" class="form-control form-control-user @error('domicilio') is-invalid @enderror"
                                            id="exampleInputEmail" name="domicilio"  required autocomplete="domicilio" autofocus autofocus value="{{$maestro->domicilio}}">
                                                
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