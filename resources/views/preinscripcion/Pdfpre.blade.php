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
                                 
                                    {{$alumno->id}}</td>
                                    <td>{{$alumno->matricula}}</td>
                                    <td >{{$alumno->curp}}</td>
                                    <td>{{$alumno->nombres}} {{$alumno->apellidoP}} {{$alumno->apellidoM}} {{$alumno->padre->nombresP}}</td>
                                        


                                    <td>
                                    
                                </tr>
                            </tbody>
                     
                         
                    </table>
  
</body>
</html>