<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        {{$proceso->grupo->ciclo->nombre}}
        
        {{$proceso->grupo->maestro->nombres}}
       
        {{$proceso->grupo->nombre}}

        {{$proceso->alumno->nombres}} {{$proceso->alumno->apellidoP}} {{$proceso->alumno->apellidoM}}

        {{$proceso->alumno->curp}} 

       
                
</body>
</html>