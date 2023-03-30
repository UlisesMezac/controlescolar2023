@extends('menutema')

@section('titulo')
Grados y grupos | Sistema escolar
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Indexgrupo">Lista de grupos</a></li>
              <li class="breadcrumb-item active">Agregar grupo</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row justify-content-center" >
        <div class="col-lg-7 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style=" background-color:#ffff">
                    <h6 class="m-0 font-weight-bold text-danger">Editar información</h6>
                </div>
                <div class="card-body">
                    <div class="container  border mt-2">
                    <form class="mt-4"  method="POST" action="{{route('grupo.update',$grupo)}}" enctype="multipart/form-data">
                        @csrf                             
                        @method('put') 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Grupo:</label>
                                    <input type="text" class="form-control form-control-user @error('nombre') is-invalid @enderror"
                                    id="exampleInputEmail" name="nombre" value="{{$grupo->nombre}}" required autocomplete="nombre" autofocus
                                    style="text-transform:uppercase;" onblur="upperCase()" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-6">
                                            <label for="inputState">Estado</label>
                                            <select name="status" class="form-control">
                                                <option selected>
                                                    @if ($grupo->status == 1)
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
                                <div class="form-group col-md-6">
                                    <label for="cicloescolar_id">Ciclo escolar:</label>
                                    <select name="cicloescolar_id" class="form-control">
                                    
                                        @forelse ($ciclo as $cicloItem)   
                                            <option>{{$grupo->ciclo->nombre}}</option>                       
                                            <option value="{{$cicloItem->id}}" >{{$cicloItem->nombre}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Capacidad:</label>
                                    <input type="number" class="form-control form-control-user @error('capacidad') is-invalid @enderror"
                                    id="exampleInputEmail" name="capacidad" value="{{$grupo->capacidad}}">
                                                @error('capacidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                </div>
                            </div>                     
                            <div class="form-row justify-content-center mt-4">
                                <div class="form-group col-md-3 ml-2">
                                    <button type="submit" class="btn btn-outline-warning">{{ __('Registrar') }}</button>
                                </div>
                                <div class="form-group col-md-3 ml-4">
                                    <a href="{{route('grupo.index')}}">
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