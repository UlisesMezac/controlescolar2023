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
              <li class="breadcrumb-item"><a href="/home">Menú principal</a></li>
              <li class="breadcrumb-item active">Padres de familia</li>
            </ol>
          </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style=" background-color:#ffff">
                <h6 class="m-0 font-weight-bold text-danger">Padres de familia</h6>
            </div>
            <div class="card-body">
             
                <form  method="GET" action="{{route('padre.index')}}" class="form-inline my-2 my-lg-0 float-right ">
                    <input type="text" name="texto" class="form-control mr-sm-2" placeholder="Buscar...." aria-label="Search" >
                    <input type="submit" class="btn btn-outline-danger" value="Buscar">
                </form>
                <div class="table-responsive my-3 justify-content-center">
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 200px">Hijo(s)</th>
                                <th style="width: 200px">Papá</th>
                                <th style="width: 200px">Mamá</th>
                                <th style="width: 200px">Tutor</th>
                                <th style="width: 20px">Accion</th>
                            </tr>
                        </thead>
                        @forelse ($padre as $padreItem)
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($padreItem->hijos->count() > 0)
                                            @foreach ($padreItem->hijos as $alumnoItem ) 
                                                {{$alumnoItem->nombres}} {{$alumnoItem->apellidoP}} {{$alumnoItem->apellidoM}} 
                                            @endforeach 
                                        @endif
                                    </td>
                                    <td>{{$padreItem->nombresP}} {{$padreItem->apellido1P}} {{$padreItem->apellido2P}}</td>
                                    <td>{{$padreItem->nombresM}} {{$padreItem->apellido1M}} {{$padreItem->apellido2M}}</td>
                                    <td>{{$padreItem->nombresT}} {{$padreItem->apellido1T}} {{$padreItem->apellido2T}}</td>
                                    <td>
                                        <a href="{{ route('padre.show', ['id' => $padreItem->id]) }}">
                                            <button class="btn btn-outline-primary float-right px-3"><i class="fas fa-users-cog" aria-hidden="true"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <h4>No se encontraron registros</h4>
                        @endforelse
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</section>



@endsection