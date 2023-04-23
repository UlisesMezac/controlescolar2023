<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
                    <div class="col-12 col-sm-3">
                        <p class="font-weight-bold"> {{$grupo->ciclo->nombre}}</p> 
                    </div>
                    <div class="col-12 col-sm-2">
                        <b>Grado y grupo:</b> <a class=" text-secondary"> {{$grupo->nombre}}</a>
                    </div>
                    <div class="col-12 col-sm-3">
                        <b> Profesor: </b>  <a class=" text-secondary">{{$grupo->maestro->nombres}} {{$grupo->maestro->apellidoP}} {{$grupo->maestro->apellidoM}} </a>
                    </div>
                    <div class="col-12 col-sm-4">
                    </div>
                </div>
    <div class="table-responsive my-3">
        <table class="table table-bordered" id="dataTable"  cellspacing="0">
            <thead>
                <tr>
                    <th style="width: 80px">Matricula</th>
                    <th style="width: 200px">Curp</th>
                    <th style="width: 100px">Primer apellido</th>
                    <th style="width: 200px">Segundo apellido</th>
                    <th style="width: 100px">Nombre(s)</th>
                </tr>
            </thead>
            <tbody>
                
            
            @if ($grupo->alumnos->count() > 0)
                                @foreach ($grupo->alumnos as $alumno )
                                    <tr>
                                        <td>  {{$alumno->matricula}}</td>
                                        <td>{{$alumno->curp}} </td>
                                        <td>{{$alumno->apellidoP}}</td>
                                        <td>{{$alumno->apellidoM}}</td>
                                        <td>{{$alumno->nombres}}</td>
                                    </tr>      
                                @endforeach
                            @endif
        
              
            </tbody>
        </table>                        
    </div>
</body>
</html>