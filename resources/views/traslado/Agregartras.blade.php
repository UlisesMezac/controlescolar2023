@extends('menutema')

@section('titulo')
Alumno | Sistema escolar
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Indexpre">Fichas de preinscripción</a></li>
              <li class="breadcrumb-item active">Editar alumno</li>
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
                    <h6 class="m-0 font-weight-bold text-light">Alumno</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="" method="POST" action="{{route('alumno.storeTraslado')}}" enctype="multipart/form-data">
                            @csrf
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
                                <div class="form-group col-md-12">
                                    <label for="padres_id">Elegir padre de familia o <a class="btn-link" data-toggle="modal" data-target="#modal-lg"> Agregar</a></label>
                                    <select name="padres_id" class="form-control @error('padres_id') is-invalid @enderror">
                                        <option>-----</option>
                                        @forelse ($padre as $padreItem)
                                            <option value="{{$padreItem->id}}">{{$padreItem->nombresP}} {{$padreItem->apellido1P}} {{$padreItem->apellido2P}}, {{$padreItem->nombresM}} {{$padreItem->apellido1M}} {{$padreItem->apellido2M}} </option>    
                                        @endforeach
                                    </select>
                                        @error('padres_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Nombre(s):</label>
                                    <input type="text" class="form-control @error('nombres') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="nombres"  aria-describedby="emailHelp" value="{{ old('nombres') }}">
                                    @error('nombres')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Primer apellido:</label>
                                    <input type="text" class="form-control @error('apellidoP') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellidoP"  aria-describedby="emailHelp" value="{{ old('apellidoP') }}"> 
                                    @error('apellidoP')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Segundo apellido:</label>
                                    <input type="text" class="form-control @error('apellidoM') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellidoM"  aria-describedby="emailHelp" value="{{ old('apellidoP') }}">
                                    @error('apellidoM')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">CURP:</label>
                                    <input type="text" class="form-control form-control-user @error('curp') is-invalid @enderror" 
                                    style="text-transform:uppercase;" onblur="upperCase()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    id="" name="curp"  value="{{old('curp')}}">
                                        @error('curp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror             
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Matricula</label>
                                    <input type="number" class="form-control @error('matricula') is-invalid @enderror" 
                                    id="exampleInputEmail1" name="matricula"  aria-describedby="emailHelp" value="{{ old('matricula') }}">
                                    @error('matricula')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start">Fecha de nacimiento:</label>
                                    <input type="date" id="fechaNac" name="fechaNac" class="form-control @error('fechaNac') is-invalid @enderror"
                                    value="{{ old('fechaNac') }}" min="2010-01-01" max="2050-12-31">
                                        @error('fechaNac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="sexo">
                                        Sexo:
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror" 
                                        name="sexo" id="sexoF" value="F {{ old('sexo') == 'F' ? 'checked' : ''}}"  value="{{ old('sexo') }}">
                                        <label for="sexoF" class="form-check-label">
                                            Femenino:
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                        name="sexo" id="sexoM" value="M {{ old('sexo') == 'M' ? 'checked' : ''}}" value="{{ old('sexo') }}">
                                        <label for="sexoM" class="form-check-label">
                                            Masculino:
                                        </label>
                                        @error('sexo')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                    </div> 
                                </div>
                                <div class="form-group col-md-8">
                                <label for="exampleInputEmail1" class="form-label">Foto:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " name="foto" id="customFileLangHTML">
                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Foto">Seleccione una foto</label>
                                    </div>
                                </div>             
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-7">
                                    <label for="especialidad">
                                        Necesidades especiales:
                                    </label> 
                                    <br>
                                    <div class="form-check  form-check-inline">
                                        <input type="radio" class="form-check-input @error('especialidad') is-invalid @enderror" 
                                        name="especialidad" id="especialidadS" value="Sobresaliente {{ old('especialidad') == 'Sobresaliente' ? 'checked' : ''}}">
                                        <label for="especialidadS" class="form-check-label">
                                            Sobresaliente
                                        </label>
                                    </div>

                                    <div class="form-check  form-check-inline">
                                        <input type="radio" class="form-check-input @error('especialidad') is-invalid @enderror" 
                                        name="especialidad" id="especialidadV" value="Visual {{ old('especialidad') == 'Visual' ? 'checked' : ''}}">
                                        <label for="especialidadV" class="form-check-label">
                                            Visual
                                        </label>
                                    </div>

                                    <div class="form-check  form-check-inline">
                                        <input type="radio" class="form-check-input @error('especialidad') is-invalid @enderror" 
                                        name="especialidad" id="especialidadA" value="Auditiva {{ old('especialidad') == 'Auditiva' ? 'checked' : ''}}">
                                        <label for="especialidadA" class="form-check-label">
                                            Auditiva
                                        </label>
                                    </div>

                                    <div class="form-check  form-check-inline">
                                        <input type="radio" class="form-check-input @error('especialidad') is-invalid @enderror" 
                                        name="especialidad" id="especialidadN" value="Ninguna {{ old('especialidad') == 'Ninguna' ? 'checked' : ''}}">
                                        <label for="especialidadN" class="form-check-label">
                                            Ninguna
                                        </label>
                                    </div>

                                    <div class="form-check  form-check-inline">
                                        <input type="radio" class="form-check-input @error('especialidad') is-invalid @enderror" 
                                        name="especialidad" id="especialidadO" value="Otra {{ old('especialidad') == 'Otra' ? 'checked' : ''}}">
                                        <label for="especialidadO" class="form-check-label">
                                            Otra:
                                        </label>
                                        @error('especialidad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="exampleInputEmail1" class="form-label">Especificar:</label>
                                    <input type="text" class="form-control"  
                                    id="exampleInputEmail1" name="otraEspe"  aria-describedby="emailHelp" value="{{old('otraEspe')}}">   
                                </div>
                            </div>

                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div  data-target="">
                                        <div  class="step-trigger" >
                                            <span class="bs-stepper-circle" style=" background-color:#E30707">2</span>
                                            <span class="bs-stepper-label">DOMICILIO</span>
                                    </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Calle:</label>
                                    <input type="text" class="form-control @error('calle') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="calle"  aria-describedby="emailHelp" value="{{old('calle')}}">
                                        @error('calle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Colonia:</label>
                                    <input type="text" class="form-control @error('colonia') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="colonia"  aria-describedby="emailHelp" value="{{old('colonia')}}">
                                        @error('colonia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Numero:</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">#</div>
                                        </div>
                                        <input type="number" class="form-control @error('numero') is-invalid @enderror"  
                                        id="exampleInputEmail1" name="numero"  aria-describedby="emailHelp" value="{{old('numero')}}">
                                            @error('numero')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                    </div>   
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Código postal:</label>
                                    <input type="number" class="form-control @error('codigoP') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="codigoP"  aria-describedby="emailHelp" value="{{old('codigoP')}}"> 
                                        @error('codigoP')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Teléfono:</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                        </div>
                                        <input type="number" class="form-control fas fa-phone form-control-user @error('telefono') is-invalid @enderror" name="telefono"  value="{{old('telefono')}}">
                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>       
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Localidad:</label>
                                    <input type="text" class="form-control @error('localidad') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="localidad"  aria-describedby="emailHelp" value="{{old('localidad')}}">   
                                    @error('localidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Municipio:</label>
                                    <input type="text" class="form-control @error('municipio') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="municipio"  aria-describedby="emailHelp" value="{{old('municipio')}}">   
                                    @error('municipio')
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

<section>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#E30707">
                    <h4 class="modal-title text-light">Registrar padre de familia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="mt-4" method="POST" action="{{route('padre.storeTraslado')}}" enctype="multipart/form-data">
                    <div class="modal-body">
                                    @csrf
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div  data-target="">
                                                <div class="step-trigger" >
                                                    <span class="bs-stepper-circle" style=" background-color:#E30707">1</span>
                                                    <span class="bs-stepper-label">DATOS DEL PADRE</span>
                                                </div>
                                            </div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1" class="form-label">Nombre(s):</label>
                                            <input type="text" class="form-control @error('nombresP') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="nombresP"  aria-describedby="emailHelp" value="{{ old('nombresP') }}">
                                            @error('nombresP')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Primer apellido:</label>
                                            <input type="text" class="form-control @error('apellido1P') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="apellido1P"  aria-describedby="emailHelp" value="{{ old('apellido1P') }}"> 
                                            @error('apellido1P')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Segundo apellido:</label>
                                            <input type="text" class="form-control @error('apellido2P') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="apellido2P"  aria-describedby="emailHelp" value="{{ old('apellido2P') }}">
                                            @error('apellido2P')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror    
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad</label>
                                            <input type="number" class="form-control @error('edadP') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="edadP"  aria-describedby="emailHelp" value="{{old('edadP')}}">
                                            @error('edadP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="start">Fecha de nacimiento:</label>
                                            <input type="date" id="fechaNacP" name="fechaNacP" class="form-control @error('fechaNacP') is-invalid @enderror"
                                            value="{{ old('fechaNacP') }}">
                                            @error('fechaNacP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1" class="form-label">CURP:</label>
                                            <input type="text" class="form-control form-control-user @error('curpP') is-invalid @enderror" 
                                            style="text-transform:uppercase;" onblur="upperCase()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            id="" name="curpP"  value="{{old('curpP')}}">
                                            @error('curpP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror             
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="viveP">
                                                ¿Vive?
                                            </label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('viveP') is-invalid @enderror" 
                                                name="viveP" id="vivePs" value="Si {{ old('viveP') == 'Si' ? 'checked' : ''}}">
                                                <label for="vivePs" class="form-check-label">
                                                    Si
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('viveP') is-invalid @enderror"
                                                name="viveP" id="vivePn" value="No {{ old('viveP') == 'No' ? 'checked' : ''}}">
                                                <label for="vivePn" class="form-check-label">
                                                    No
                                                </label>
                                                @error('viveP')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div> 
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="leeYescribeP">
                                                ¿Lee y escribe?
                                            </label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('leeYescribeP') is-invalid @enderror" 
                                                name="leeYescribeP" id="leeYescribePs" value="Si {{ old('leeYescribeP') == 'Si' ? 'checked' : ''}}">
                                                <label for="leeYescribePs" class="form-check-label">
                                                    Si
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('leeYescribeP') is-invalid @enderror"
                                                name="leeYescribeP" id="leeYescribePn" value="No {{ old('leeYescribeP') == 'No' ? 'checked' : ''}}">
                                                <label for="leeYescribePn" class="form-check-label">
                                                    No
                                                </label>
                                                @error('leeYescribeP')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div> 
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="escolaridadP">Escolaridad:</label>
                                            <select name="escolaridadP" class="form-control @error('escolaridadP') is-invalid @enderror">
                                                <option selected>-----</option>
                                                    <option>Primaria</option>    
                                                    <option>Secundaria</option>
                                                    <option>Preparatoria</option>
                                                    <option>Licenciatura</option>
                                                    <option>Ninguna</option>
                                            </select>
                                                @error('escolaridadP')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                            
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">No de hijos</label>
                                            <input type="number" class="form-control @error('noHijosP') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="noHijosP"  aria-describedby="emailHelp" value="{{old('noHijosP')}}">
                                            @error('noHijosP')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror    
                                        </div>
                                    </div>

                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div  data-target="">
                                                <div class="step-trigger" >
                                                    <span class="bs-stepper-circle" style=" background-color:#E30707">2</span>
                                                    <span class="bs-stepper-label">DATOS DE LA MADRE</span>
                                                </div>
                                            </div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1" class="form-label">Nombre(s):</label>
                                            <input type="text" class="form-control @error('nombresM') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="nombresM"  aria-describedby="emailHelp" value="{{ old('nombresM') }}">
                                            @error('nombresM')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Primer apellido:</label>
                                            <input type="text" class="form-control @error('apellido1M') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="apellido1M"  aria-describedby="emailHelp" value="{{ old('apellido1M') }}"> 
                                            @error('apellido1M')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Segundo apellido:</label>
                                            <input type="text" class="form-control @error('apellido2M') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="apellido2M"  aria-describedby="emailHelp" value="{{ old('apellido2M') }}">
                                            @error('apellido2M')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror    
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad</label>
                                            <input type="number" class="form-control @error('edadM') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="edadM"  aria-describedby="emailHelp" value="{{old('edadM')}}">
                                            @error('edadM')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="start">Fecha de nacimiento:</label>
                                            <input type="date" id="fechaNacM" name="fechaNacM" class="form-control @error('fechaNacM') is-invalid @enderror"
                                            value="{{ old('fechaNacM') }}">
                                            @error('fechaNacM')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror 
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1" class="form-label">CURP:</label>
                                            <input type="text" class="form-control form-control-user @error('curpM') is-invalid @enderror" 
                                            style="text-transform:uppercase;" onblur="upperCase()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            id="" name="curpM"  value="{{old('curpM')}}">
                                            @error('curpM')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror             
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="viveM">
                                                ¿Vive?
                                            </label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('viveM') is-invalid @enderror" 
                                                name="viveM" id="viveMs" value="Si {{ old('viveM') == 'Si' ? 'checked' : ''}}">
                                                <label for="viveMs" class="form-check-label">
                                                    Si
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('viveM') is-invalid @enderror"
                                                name="viveM" id="viveMn" value="No {{ old('viveM') == 'No' ? 'checked' : ''}}">
                                                <label for="viveMn" class="form-check-label">
                                                    No
                                                </label>
                                                @error('viveM')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div> 
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="leeYescribeM">
                                                ¿Lee y escribe?
                                            </label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('leeYescribeM') is-invalid @enderror" 
                                                name="leeYescribeM" id="leeYescribeMs" value="Si {{ old('leeYescribeM') == 'Si' ? 'checked' : ''}}">
                                                <label for="leeYescribeMs" class="form-check-label">
                                                    Si
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input @error('leeYescribeM') is-invalid @enderror"
                                                name="leeYescribeM" id="leeYescribeMn" value="No {{ old('leeYescribeM') == 'No' ? 'checked' : ''}}">
                                                <label for="leeYescribeMn" class="form-check-label">
                                                    No
                                                </label>
                                                @error('leeYescribeM')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                            </div> 
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="escolaridadM">Escolaridad:</label>
                                            <select name="escolaridadM" class="form-control @error('escolaridadM') is-invalid @enderror">
                                                <option selected>-----</option>
                                                    <option>Primaria</option>    
                                                    <option>Secundaria</option>
                                                    <option>Preparatoria</option>
                                                    <option>Licenciatura</option>
                                                    <option>Ninguna</option>
                                            </select>
                                                @error('escolaridadM')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                            
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">No de hijos</label>
                                            <input type="number" class="form-control @error('noHijosM') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="noHijosM"  aria-describedby="emailHelp" value="{{old('noHijosM')}}">
                                            @error('noHijosM')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror    
                                        </div>
                                    </div>

                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div  data-target="">
                                                <div class="step-trigger" >
                                                    <span class="bs-stepper-circle" style=" background-color:#E30707">4</span>
                                                    <span class="bs-stepper-label">DOMICILIO</span>
                                                </div>
                                            </div>
                                            <div class="line"></div>
                                        </div>
                                    </div>

                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1" class="form-label">Calle</label>
                                            <input type="text" class="form-control @error('calle') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="calle"  aria-describedby="emailHelp" value="{{old('calle')}}">
                                            @error('calle')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror    
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Numero</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">#</div>
                                                </div>
                                                <input type="number" class="form-control @error('numero') is-invalid @enderror"  
                                                id="exampleInputEmail1" name="numero"  aria-describedby="emailHelp" value="{{old('numero')}}">
                                                @error('numero')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror    
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Colonia</label>
                                            <input type="text" class="form-control @error('colonia') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="colonia"  aria-describedby="emailHelp" value="{{old('colonia')}}">
                                            @error('colonia')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1" class="form-label">Código postal</label>
                                            <input type="number" class="form-control @error('codigoP') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="codigoP"  aria-describedby="emailHelp" value="{{old('codigoP')}}"> 
                                            @error('codigoP')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                                </div>
                                                <input type="number" class="form-control @error('telefono') is-invalid @enderror"  
                                                id="exampleInputEmail1" name="telefono"  aria-describedby="emailHelp" value="{{old('telefono')}}">
                                                @error('telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Localidad</label>
                                            <input type="text" class="form-control @error('localidad') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="localidad"  aria-describedby="emailHelp" value="{{old('localidad')}}">   
                                            @error('localidad')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Municipio</label>
                                            <input type="text" class="form-control @error('municipio') is-invalid @enderror"  
                                            id="exampleInputEmail1" name="municipio"  aria-describedby="emailHelp" value="{{old('municipio')}}">   
                                            @error('municipio')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                        </div>
                                    </div>
                                   
                               
                        </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-success">{{ __('Registrar') }}</button>
                    </div>
                </form>
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

<!--link de modal --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Editar') == 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Su archivo ha sido actualizado con exito',
        showConfirmButton: false,
        timer: 1500
        })
       </script> 
    @endif
    @if (session('Agregar') == 'ok')
        <script>
       Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Su archivo ha sido registrado con exito',
        showConfirmButton: false,
        timer: 1500
        })
       </script>
    @endif

    

    @if (session('Eliminar') == 'ok')
       <script>
        Swal.fire(
      'Eliminado!',
      'Su archivo ha sido eliminado.',
      'success'
    )
       </script> 
    @endif
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        
        Swal.fire({
        title: '¿Desea eliminar ?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
        if (result.isConfirmed) {
           this.submit();
        }
        })
    });
   </script>
@endsection