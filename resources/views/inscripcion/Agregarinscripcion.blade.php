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
                    <h6 class="m-0 font-weight-bold text-light">Inscribir alumno</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="mt-4" method="POST" action="{{route('inscripcion.update',$alumno)}}" enctype="multipart/form-data">
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
                                    <label for="tramite_id">Tramite</label>
                                    <select name="tramite_id" class="form-control @error('tramite_id') is-invalid @enderror">
                                    
                                        @forelse ($tramite as $tramiteItem)
                                            @if ($tramiteItem->id == 2)  
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
                                <div class="form-group col-md-5">
                                    <label for="padres_id">Elegir padre de familia o <a class="btn-link" data-toggle="modal" data-target="#modal-lg"> Agregar</a></label>
                                    <select name="padres_id" class="form-control @error('padres_id') is-invalid @enderror">
                                       
                                        @forelse ($padre as $padreItem)
                                            <option>{{$alumno->padre->nombresP}}</option>
                                            <option value="{{$padreItem->id}}">{{$padreItem->nombresP}} </option>    
                                        @endforeach
                                    </select>
                                        @error('padres_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                
                                <div class="form-group col-md-3">
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

                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div  data-target="">
                                        <div class="step-trigger" >
                                            <span class="bs-stepper-circle" style=" background-color:#E30707">1</span>
                                            <span class="bs-stepper-label">DOCUMENTOS</span>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>

                            <div class="form-group">
                             
                                <div class="icheck-danger">
                                    <input class="form-check-input @error('acta') is-invalid @enderror" type="checkbox" value="Si {{ old('acta') == 'Si' ? 'checked' : ''}}" 
                                    name="acta" id="actaSi">
                                    <label class="form-check-label" for="actaSi">
                                        Acta de nacimiento orginal
                                    </label>
                                        @error('acta')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>

                                <div class="icheck-danger">
                                    <input class="form-check-input @error('certificadoKinder') is-invalid @enderror" type="checkbox" value="Si {{ old('certificadoKinder') == 'Si' ? 'checked' : ''}}" 
                                    name="certificadoKinder" id="certificadoKinderSi">
                                    <label class="form-check-label" for="certificadoKinderSi">
                                        Certificado de preescolar
                                    </label>
                                        @error('certificadoKinder')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                            </div>

                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div  data-target="">
                                        <div  class="step-trigger" >
                                            <span class="bs-stepper-circle" style=" background-color:#E30707">2</span>
                                            <span class="bs-stepper-label">ASIGNAR GRUPO</span>
                                    </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                    <label for="grupos_id">Grupos:</label>
                                    <select name="grupos_id" class="form-control @error('grupos_id') is-invalid @enderror">
                                        @forelse ($grupo as $grupoItem)
                                            @if ($grupoItem->nombre == 1) 
                                                <option value="{{$grupoItem->id}}">{{$grupoItem->nombre}} </option>  
                                            @endif     
                                        @endforeach
                                    </select>
                                        @error('grupos_id')
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