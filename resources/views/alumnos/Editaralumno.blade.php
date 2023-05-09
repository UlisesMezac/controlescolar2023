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
              <li class="breadcrumb-item"><a href="/Indexpre">Fichas de preinscripción</a></li>
              <li class="breadcrumb-item active">Editar preinscripción</li>
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
                    <h6 class="m-0 font-weight-bold text-light">Editar información</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="mt-4" method="POST" action="{{route('alumno.update',$alumno)}}" enctype="multipart/form-data">
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
                                <div class="form-group col-md-12">
                                    <label for="padres_id">Elegir padre de familia o <a class="btn-link" data-toggle="modal" data-target="#modal-lg"> Agregar</a></label>
                                    <select name="padres_id" class="form-control @error('padres_id') is-invalid @enderror">
                                        @forelse ($padre as $padreItem)
                                            <option value="{{$padreItem->id}}">{{$alumno->padre->nombresP}} {{$alumno->padre->apellido1P}} {{$alumno->padre->apellido2P}} {{$alumno->padre->nombresM}} {{$alumno->padre->apellido1M}} {{$alumno->padre->apellido2M}} </option>    
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
                                    id="exampleInputEmail1" name="nombres"  aria-describedby="emailHelp" value="{{$alumno->nombres}}">
                                    @error('nombres')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Primer apellido:</label>
                                    <input type="text" class="form-control @error('apellidoP') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellidoP"  aria-describedby="emailHelp" value="{{$alumno->apellidoP}}"> 
                                    @error('apellidoP')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Segundo apellido:</label>
                                    <input type="text" class="form-control @error('apellidoM') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellidoM"  aria-describedby="emailHelp" value="{{$alumno->apellidoM}}">
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
                                    id="" name="curp"  value="{{$alumno->curp}}">
                                        @error('curp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror             
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Matricula</label>
                                    <input type="number" class="form-control @error('matricula') is-invalid @enderror" 
                                    id="exampleInputEmail1" name="matricula"  aria-describedby="emailHelp" value="{{$alumno->matricula}}">
                                    @error('matricula')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start">Fecha de nacimiento:</label>
                                    <input type="date" id="fechaNac" name="fechaNac" class="form-control @error('fechaNac') is-invalid @enderror"
                                    value="{{$alumno->fechaNac}}" min="2010-01-01" max="2050-12-31">
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
                                    {{$alumno->sexo}}
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror" 
                                            name="sexo" id="sexoF" value="F {{ old('sexo') == 'F' ? 'checked' : ''}}"  value="{{$alumno->sexo}}">
                                            <label for="sexoF" class="form-check-label">
                                                Femenino:
                                        </label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                                name="sexo" id="sexoM" value="M {{ old('sexo') == 'M' ? 'checked' : ''}}" value="{{$alumno->sexo}}">
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
                                            <img src="{{ asset('foto').'/'.$alumno->foto}}" 
                                            style="height: 50px; width: 50px;display: block; justify-content: center;">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" name="foto" id="customFileLangHTML">
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
                                    {{$alumno->especialidad}}
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
                                    id="exampleInputEmail1" name="otraEspe"  aria-describedby="emailHelp" value="{{$alumno->otraEspe}}">   
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
                                    id="exampleInputEmail1" name="calle"  aria-describedby="emailHelp" value="{{$alumno->calle}}">
                                        @error('calle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Colonia:</label>
                                    <input type="text" class="form-control @error('colonia') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="colonia"  aria-describedby="emailHelp" value="{{$alumno->colonia}}">
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
                                        id="exampleInputEmail1" name="numero"  aria-describedby="emailHelp" value="{{$alumno->numero}}">
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
                                    id="exampleInputEmail1" name="codigoP"  aria-describedby="emailHelp" value="{{$alumno->codigoP}}"> 
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
                                        <input type="number" class="form-control fas fa-phone form-control-user @error('telefono') is-invalid @enderror" name="telefono"  value="{{$alumno->telefono}}">
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
                                    id="exampleInputEmail1" name="localidad"  aria-describedby="emailHelp" value="{{$alumno->localidad}}">   
                                    @error('localidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Municipio:</label>
                                    <input type="text" class="form-control @error('municipio') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="municipio"  aria-describedby="emailHelp" value="{{$alumno->municipio}}">   
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