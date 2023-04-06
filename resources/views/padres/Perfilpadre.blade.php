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

        <td>{{$padre->nombresP}} {{$padre->apellido1P}} {{$padre->apellido2P}}</td>
        <td>{{$padre->nombresM}} {{$padre->apellido1M}} {{$padre->apellido2M}}</td>
        <td>{{$padre->nombresT}} {{$padre->apellido1T}} {{$padre->apellido2T}}</td>

        @forelse ($alumno as $alumnoItem)
            {{$alumnoItem->nombres}} {{$alumnoItem->apellidoP}} {{$alumnoItem->apellidoP}} 
        @endforeach


@endsection