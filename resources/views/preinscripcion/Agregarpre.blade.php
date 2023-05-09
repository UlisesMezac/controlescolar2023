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
              <li class="breadcrumb-item active">Agregar preinscripción</li>
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
                    <h6 class="m-0 font-weight-bold text-light">Preinscripción</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                        <form class="" method="POST" action="{{route('preinscripcion.store')}}" enctype="multipart/form-data">
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
                                <div class="form-group col-md-4">
                                    <label for="alumnos_id">Alumno</label>
                                    <select name="alumnos_id" class="form-control @error('alumnos_id') is-invalid @enderror">
                                        @forelse ($alumno as $alumnoItem)
                                            <option value="{{$alumnoItem->id}}">{{$alumnoItem->nombres}} {{$alumnoItem->apellidoP}} {{$alumnoItem->apellidoM}}</option>      
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tramite_id">Tramite</label>
                                    <select name="tramite_id" class="form-control @error('tramite_id') is-invalid @enderror">
                                        @forelse ($tramite as $tramiteItem)
                                            @if ($tramiteItem->id == 1)     
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
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Documentos:
                                </label>

                                <div class="icheck-danger">
                                    <input class="form-check-input @error('copiaActa') is-invalid @enderror" type="checkbox" value="Si {{ old('copiaActa') == 'Si' ? 'checked' : ''}}" 
                                    name="copiaActa" id="copiaActaSi">
                                    <label class="form-check-label" for="copiaActaSi">
                                        Copia del acta de nacimiento
                                    </label>
                                        @error('copiaActa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>

                                <div class="icheck-danger">
                                    <input class="form-check-input @error('copiaCurp') is-invalid @enderror" type="checkbox" value="Si {{ old('copiaCurp') == 'Si' ? 'checked' : ''}}" 
                                    name="copiaCurp" id="copiaCurpSi">
                                    <label class="form-check-label" for="copiaCurpSi">
                                        Copia de la CURP
                                    </label>
                                        @error('copiaCurp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>

                                <div class="icheck-danger">
                                    <input class="form-check-input @error('copiaVacuna') is-invalid @enderror" type="checkbox" value="Si {{ old('copiaVacuna') == 'Si' ? 'checked' : ''}}" 
                                    name="copiaVacuna" id="copiaVacunaSi">
                                    <label class="form-check-label" for="copiaVacunaSi">
                                        Copia de cartilla de vacunación
                                    </label>
                                        @error('copiaVacuna')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>

                                <div class="icheck-danger">
                                    <input class="form-check-input @error('constanciaKinder') is-invalid @enderror" type="checkbox" value="Si {{ old('constanciaKinder') == 'Si' ? 'checked' : ''}}" 
                                    name="constanciaKinder" id="constanciaKinderSi">
                                    <label class="form-check-label" for="constanciaKinderSi">
                                        Constancia de preescolar
                                    </label>
                                        @error('constanciaKinder')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>

                                <div class="icheck-danger">
                                    <input class="form-check-input @error('copiaIne') is-invalid @enderror" type="checkbox" value="Si {{ old('copiaIne') == 'Si' ? 'checked' : ''}}" 
                                    name="copiaIne" id="copiaIneSi">
                                    <label class="form-check-label" for="copiaIneSi">
                                        Copia del INE de padre o tutor
                                    </label>
                                        @error('copiaIne')
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