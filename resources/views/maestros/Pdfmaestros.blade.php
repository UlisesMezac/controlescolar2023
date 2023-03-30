<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nombre(s)</th>
                                        <th>Primer apellido</th>
                                        <th>Segundo apellido</th>
                                        <th>Estado</th>
                                        <th style="width: 200px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($maestro as $maestroItem)
                                <tr>
                                    <td>{{$maestroItem->matricula}}</td>
                                    <td>{{$maestroItem->nombres}}</td>
                                    <td>{{$maestroItem->apellidoP}} </td>
                                    <td> {{$maestroItem->apellidoM}}</td>
                                    <td align="center">
                                        @if ($maestroItem->status == 1)
                                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-circle"></i> Activo</h6>
                                            @else
                                            <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-times"></i> Inactivo</h6>
                                        @endif
                                    </td>
                                </tr>
                            
                                        @endforeach
                                </tbody>
                            </table>
    
</body>
</html>