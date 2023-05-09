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
                           
                        </thead>
                        
                                <tr>
                                 
                                    <td>{{$proceso->alumno->id}}</td>
                                    <td>{{$proceso->alumno->matricula}}</td>
                                    <td >{{$proceso->alumno->curp}}</td>
                                    <td>{{$proceso->alumno->nombres}} {{$proceso->alumno->apellidoP}} {{$proceso->alumno->apellidoM}} {{$proceso->alumno->padre->nombresP}}</td>
                                        


                                    <td>
                                    
                                </tr>
                            </tbody>
                     
                         
                    </table>
  
</body>
</html>