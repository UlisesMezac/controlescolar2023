@extends('menutema')

@section('titulo')
Padres de familia | Sistema escolar
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
              <li class="breadcrumb-item active">Editar información</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
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
                        <form class="mt-4" method="POST" action="{{route('padre.update',$padre)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
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
                                    id="exampleInputEmail1" name="nombresP"  aria-describedby="emailHelp" value="{{$padre->nombresP}}">
                                    @error('nombresP')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Primer apellido:</label>
                                    <input type="text" class="form-control @error('apellido1P') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellido1P"  aria-describedby="emailHelp" value="{{$padre->apellido1P}}"> 
                                    @error('apellido1P')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Segundo apellido:</label>
                                    <input type="text" class="form-control @error('apellido2P') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellido2P"  aria-describedby="emailHelp" value="{{$padre->apellido2P}}">
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
                                    id="exampleInputEmail1" name="edadP"  aria-describedby="emailHelp" value="{{$padre->edadP}}">
                                    @error('edadP')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start">Fecha de nacimiento:</label>
                                    <input type="date" id="fechaNacP" name="fechaNacP" class="form-control @error('fechaNacP') is-invalid @enderror"
                                    value="{{$padre->fechaNacP}}">
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
                                    id="" name="curpP"  value="{{$padre->curpP}}">
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
                                    {{$padre->viveP}}
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
                                    {{$padre->leeYescribeP}}
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
                                        <option selected>{{$padre->escolaridadP}}</option>
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
                                    id="exampleInputEmail1" name="noHijosP"  aria-describedby="emailHelp" value="{{$padre->noHijosP}}">
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
                                    id="exampleInputEmail1" name="nombresM"  aria-describedby="emailHelp" value="{{$padre->nombresM}}">
                                    @error('nombresM')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Primer apellido:</label>
                                    <input type="text" class="form-control @error('apellido1M') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellido1M"  aria-describedby="emailHelp" value="{{$padre->apellido1M}}"> 
                                    @error('apellido1M')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Segundo apellido:</label>
                                    <input type="text" class="form-control @error('apellido2M') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="apellido2M"  aria-describedby="emailHelp" value="{{$padre->apellido2M}}">
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
                                    id="exampleInputEmail1" name="edadM"  aria-describedby="emailHelp" value="{{$padre->edadM}}">
                                    @error('edadM')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start">Fecha de nacimiento:</label>
                                    <input type="date" id="fechaNacM" name="fechaNacM" class="form-control @error('fechaNacM') is-invalid @enderror"
                                    value="{{$padre->fechaNacM}}">
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
                                    id="" name="curpM"  value="{{$padre->curpM}}">
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
                                    {{$padre->viveM}}
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
                                    {{$padre->leeYescribeM}}
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
                                        <option selected>{{$padre->escolaridadM}}</option>
                                            <option>Primaria</option>    
                                            <option>Secundaria</option>
                                            <option>Preparatoria</option>
                                            <option>Licenciatura</option>
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
                                    id="exampleInputEmail1" name="noHijosM"  aria-describedby="emailHelp" value="{{$padre->noHijosM}}">
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
                                    id="exampleInputEmail1" name="calle"  aria-describedby="emailHelp" value="{{$padre->calle}}">
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
                                        id="exampleInputEmail1" name="numero"  aria-describedby="emailHelp" value="{{$padre->numero}}">
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
                                    id="exampleInputEmail1" name="colonia"  aria-describedby="emailHelp" value="{{$padre->colonia}}">
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
                                    id="exampleInputEmail1" name="codigoP"  aria-describedby="emailHelp" value="{{$padre->codigoP}}"> 
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
                                        id="exampleInputEmail1" name="telefono"  aria-describedby="emailHelp" value="{{$padre->telefono}}">
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
                                    id="exampleInputEmail1" name="localidad"  aria-describedby="emailHelp" value="{{$padre->localidad}}">   
                                    @error('localidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Municipio</label>
                                    <input type="text" class="form-control @error('municipio') is-invalid @enderror"  
                                    id="exampleInputEmail1" name="municipio"  aria-describedby="emailHelp" value="{{$padre->municipio}}">   
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
                                    <a href="{{route('padre.index')}}">
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